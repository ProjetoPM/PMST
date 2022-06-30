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
		$views = ['user', 'workspace'];
		loadLangs($views);

		$this->load->helper('url');
		$this->load->helper('log_activity');

		$this->load->model('log_model');
		$this->load->model('User_Model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Workspace_model');
		$this->load->model('Workspace_invite_model');
		$this->load->model('Workspace_user_model');
	}

	public function list()
	{
		$data['workspace'] = $this->Workspace_model->getUserWorkSpaces($_SESSION['user_id']);
		$data['invites'] = $this->Workspace_invite_model->getInvitesPerUser($_SESSION['user_id']);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar', $data);
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('workspace/list', $data);
	}

	public function members($workspace_id)
	{
		$_SESSION['workspace_id'] = $workspace_id;
		$data['users'] = $this->Workspace_model->getWorkSpaceUsers($workspace_id);
		$data['workspace_id'] = $this->uri->segment(3);

		if (count($data['users']) <= 0)
			redirect(base_url());

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('frame/footer_view');
		$this->load->view('workspace/members', $data);
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

	public function delete($workspace_id) {
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
	public function update()
	{
	}

	public function sendInvite()
	{
		$date = date('Y-m-d H:i:s', time());
		$receiver = $this->input->post('sendTo');
		$sender = $this->User_Model->getUserEmail($_SESSION['user_id']);

		$workspace_name = $this->Workspace_model->getWorkspaceName($_SESSION['workspace_id']);
		$user_id = $this->User_Model->getUserIdByEmail($receiver);
		if ($user_id == -1){
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

	public function acceptInvite($workspace_id, $access_level)
	{
		$workspace_user['workspace_id'] = $workspace_id;
		$workspace_user['user_id'] = $_SESSION['user_id'];
		$workspace_user['access_level'] = $access_level;

		$insertStatus = $this->Workspace_user_model->insert($workspace_user);

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
