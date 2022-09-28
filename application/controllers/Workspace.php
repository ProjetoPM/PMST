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

		$teste = $this->lang->line('no_permission');

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
		$user_id = $this->User_Model->getUserIdByEmail($receiver);
		
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

		if ($user_id == -1) {
			$subject = "Convite para se juntar a uma área de trabalho";
			$message = "O usuário $sender te convidou para se juntar ao workspace $workspace_name";
			$this->send_email_invite($sender, $message, $subject, $receiver);
		} else {
			$workspace['user_id'] = $user_id;
		}

		$workspace['workspace_id'] = $_SESSION['workspace_id'];
		$workspace['invited_at'] = $date;
		$workspace['access_level'] = $this->input->post('access_level');
		$workspace['email'] = $receiver;

		$insertStatus = $this->Workspace_invite_model->insert($workspace);

		if ($insertStatus) {
			redirect("workspace/members/{$_SESSION['user_id']}");
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

        if ($user_exists_or_already_invited || $some_user_does_not_exist) {
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

	function send_email_invite($message, $subject, $sendTo)
	{
		require_once APPPATH . 'libraries/mailer/class.phpmailer.php';
		require_once APPPATH . 'libraries/mailer/class.smtp.php';
		// require_once APPPATH.'libraries/mailer/mailer_config.php';
		include APPPATH . 'libraries/mailer/template/template.php';

		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Username =  "rp1.time6@gmail.com";
		$mail->Password = "84956251asd";
		$mail->SetFrom("rp1.time6@gmail.com", "Admin SilverBullet");
		$mail->AddReplyTo('no-reply@email.com.br');
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($sendTo);
		$mail->CharSet = "UTF-8";
		$mail->WordWrap = 0;

		$hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:38px;letter-spacing:-1px">Olá, &#9786;</h1>';
		$thanks = "<br><br><i>This is autogenerated email please do not reply.</i><br/><br/>Thanks,<br/>Admin<br/><br/>";

		$body = $hello . $message . $thanks;
		$mail->Body = $header . $body . $footer;
		$mail->AddAddress($sendTo);
		// $mail->SMTPSecure = 'tls';
		if (!$mail->Send()) {
			$error = 'Mail error: ' . $mail->ErrorInfo;
			return array('status' => false, 'message' => $error);
			// return false;
		} else {
			return array('status' => true, 'message' => '');
			// return true;
		}
	}
}
