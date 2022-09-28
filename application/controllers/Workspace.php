<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workspace extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$langs = ['user', 'workspace', 'feedback'];
		loadLangs($langs);

		$this->load->helper('url');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('User_Model');
		$this->load->model('Admin_Model');
		$this->load->model('View_model');
		$this->load->model('Project_model');
		$this->load->model('Access_level_model');
		$this->load->model('Workspace_model');
		$this->load->model('Workspace_user_model');
		$this->load->model('Workspace_invite_model');
	}

	public function list()
	{
		$data['workspace'] = $this->Workspace_model->getUserWorkSpaces($_SESSION['user_id']);
		$data['invites'] = $this->Workspace_invite_model->getInvitesPerUser($_SESSION['user_id']);
		$data['view_id'] = $this->View_model->GetIDByName('workspace');

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar', $data);
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('workspace/list', $data);
	}

	public function members($workspace_id)
	{
		$_SESSION['workspace_access_level'] = $this->Workspace_model->getRole($workspace_id, $_SESSION['user_id']);
		$_SESSION['workspace_id'] = $workspace_id;
		$data['users'] = $this->Workspace_model->getWorkSpaceUsers($workspace_id);
		$data['workspace_id'] = $this->uri->segment(3);

		if (count($data['users']) <= 0)
			redirect(base_url());

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('frame/footer_view');
		$this->load->view('workspace/members/list', $data);
	}

	public function editMembers($user_id)
	{
		$data['user'] = $this->Workspace_model->getWorkSpaceUser($_SESSION['workspace_id'], $user_id);
		$language = getIndexOfLanguage();

		$data['access_levels'] = $this->Access_level_model->getAll($language);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('frame/footer_view');
		$this->load->view('workspace/members/edit', $data);
	}

	public function updateMember($user_id)
	{
		$isWorkspaceOwner = $this->Workspace_model->isWorkspaceOwner($_SESSION['workspace_id'], $_SESSION['user_id']);

		if(!$isWorkspaceOwner){
			$this->session->set_flashdata('error', $this->lang->line('no_permission'));
			redirect("workspace/list");
		}

		$member['access_level'] = $this->input->post('access_level');
		$insert  = $this->Workspace_user_model->update($member, $user_id, $_SESSION['workspace_id']);

		if ($insert) {
			$this->session->set_flashdata('success', $this->lang->line('item_created'));
			insertLogActivity('update', 'workspace');
		} else
			$this->session->set_flashdata('error', 'An error occurred while inserting.');

		redirect("workspace/list");
	}

	public function new()
	{
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('frame/footer_view');
		$this->load->view('workspace/new');
	}

	public function edit($project_id)
	{
	}

	public function insert()
	{
		$feedback_success = strcmp($_SESSION['language'], "US") === 0
			? 'Item created successfully!'
			: 'Item criado com sucesso!';

		$workspace['name'] = $this->input->post('workspace_name');
		$workspace['status'] = 1;

		$workspace_user['user_id'] = $_SESSION['user_id'];
		$workspace_user['access_level'] = 1;

		$insert  = $this->Workspace_model->insert($workspace, $workspace_user);

		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'workspace');
		} else
			$this->session->set_flashdata('error', 'An error occurred while inserting.');

		redirect("workspace/list");
	}

	public function delete($workspace_id)
	{

		$isWorkspaceOwner = $this->Workspace_model->isWorkspaceOwner($_SESSION['workspace_id'], $_SESSION['user_id']);

		if(!$isWorkspaceOwner){
			$this->Workspace_user_model->delete($_SESSION['user_id'], $workspace_id);
			$this->session->set_flashdata('info', $this->lang->line('ws_exit_workspace'));
			redirect("workspace/list");
		}


		$feedback_success = strcmp($_SESSION['language'], "US") === 0
			? 'Workspace removed successfully!'
			: 'Workspace removido com sucesso!';

		$remove = $this->Workspace_model->delete($workspace_id);

		if ($remove) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('delete', 'workspace');
		} else
			$this->session->set_flashdata('error', 'An error has occurred while removing.');

		redirect("workspace/list");
	}
    
	public function update($user_id, $email)
	{
	}

	public function sendInvite()
	{
		$senderRole = $this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']);

		if (strcmp($senderRole, "1") !== 0) {
			$this->session->set_flashdata('error', $this->lang->line('ws_feedback_invite_error'));
			redirect('workspace/list');
		}
		
		$date = date('Y-m-d H:i:s', time());
		$receiver = $this->input->post('sendTo');
		$sender = $this->User_Model->getUserEmail($_SESSION['user_id']);
		
		$workspace_name = $this->Workspace_model->getWorkspaceName($_SESSION['workspace_id']);
		$user_id = $this->User_Model->getUserIdByEmail($receiver) !== -1
			? $this->User_Model->getUserIdByEmail($receiver) 
			: null;
		
		
		$alreadyInvited = $this->Workspace_invite_model->userAlreadyInvited($_SESSION['workspace_id'], $user_id);
		$alreadyInWorkspace = $this->Workspace_user_model->userAlreadyInWorkspace($_SESSION['workspace_id'], $user_id);
		
		if($alreadyInWorkspace) {
			$this->session->set_flashdata('error', $this->lang->line('already_in_workspace'));
			redirect('workspace/list');
		}
		
		if($alreadyInvited) {
			$this->session->set_flashdata('error', $this->lang->line('already_invited'));
			redirect('workspace/list');
		}
		
		if (!isset($user_id)) {
			$subject = "Convite para se juntar a uma área de trabalho";
			$message = "O usuário $sender te convidou para se juntar ao workspace $workspace_name";
			$this->session->set_flashdata('warning', $this->lang->line('ws_feedback_invite_warning'));
			$this->Admin_model->send_email($message, $subject, $receiver);
		} else {
			$this->session->set_flashdata('success', $this->lang->line('ws_feedback_invite_success'));
			$workspace['user_id'] = $user_id;
		}

		$workspace['workspace_id'] = $_SESSION['workspace_id'];
		$workspace['invited_at'] = $date;
		$workspace['access_level'] = $this->input->post('access_level');
		$workspace['email'] = $receiver;

		$insertStatus = $this->Workspace_invite_model->insert($workspace);

		if ($insertStatus) {
			redirect("workspace/members/{$_SESSION['workspace_id']}");
		}
	}

    public function inviteUsers() {
        $user_exists_or_already_invited = false;
        $senderRole = $this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']);
        $date = date('Y-m-d H:i:s', time());
        $workspace_name = $this->Workspace_model->getWorkspaceName($_SESSION['workspace_id']);

		if (strcmp($senderRole, "1") !== 0) {
			$this->session->set_flashdata('error', $this->lang->line('ws_feedback_invite_error'));
			redirect('workspace/list');
		}

        $new_users = trim($this->input->post('new_users') ?? []);
        $eliminating_spaces = str_replace(' ', '', $new_users);
        $split_users = explode(',', $eliminating_spaces);

        if (empty($new_users)) {
            $this->session->set_flashdata('error', $this->lang->line('ws_feedback_error'));
            redirect("workspace/members/{$_SESSION['workspace_id']}");
        }

        foreach ($split_users as $user) {
            if (empty($user)) continue;

            $user_id = $this->User_Model->getUserIdByEmail($user) !== -1 
				? $this->User_Model->getUserIdByEmail($user) 
				: null;

			if (isset($user_id)) {
				$already_invited = $this->Workspace_invite_model->userAlreadyInvited($_SESSION['workspace_id'], $user_id);
				$already_in_workspace = $this->Workspace_user_model->userAlreadyInWorkspace($_SESSION['workspace_id'], $user_id);

				if ($already_invited || $already_in_workspace) { 
					$user_exists_or_already_invited = true;
					continue;
				}
			}

            $workspace['workspace_id'] = $_SESSION['workspace_id'];
            $workspace['invited_at'] = $date;
            $workspace['access_level'] = $this->input->post('access_level');;
            $workspace['email'] = $user;
            $workspace['user_id'] = $user_id;

            $this->Workspace_invite_model->insert($workspace);
        }

        if ($user_exists_or_already_invited) {
            $this->session->set_flashdata('warning', $this->lang->line('ws_feedback_invite_warning'));
            redirect("workspace/members/{$_SESSION['workspace_id']}");
        }

        $this->session->set_flashdata('success', $this->lang->line('ws_feedback_invite_success'));
        redirect("workspace/members/{$_SESSION['workspace_id']}");
    }

	public function acceptInvite($workspace_id, $access_level)
	{
		$workspace_user['workspace_id'] = $workspace_id;
		$workspace_user['user_id'] = $_SESSION['user_id'];
		$workspace_user['access_level'] = $access_level;

		$insertStatus = $this->Workspace_user_model->insert($workspace_user);
		$insertStatus = $this->Workspace_invite_model->delete($workspace_id, $_SESSION['user_id']);

		if ($insertStatus) {
			redirect("workspace/list");
		}
	}

	public function declineInvite($workspace_id)
	{
		$user_id =  $_SESSION['user_id'];
		$insertStatus = $this->Workspace_invite_model->delete($workspace_id, $user_id);

		if ($insertStatus) {
			redirect("workspace/list");
		}
	}
}
