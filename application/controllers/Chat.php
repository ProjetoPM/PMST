<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Chat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('chat', 'english');
            $this->lang->load('project-page', 'english');
        }else{
			$this->lang->load('chat', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }
		
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->model(['Chat_model', 'Outh_model', 'Admin_model', 'Project_model']);
		$this->load->helper('log_activity');
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		// $this->SeesionModel->not_logged_in();
		// $this->load->helper('string');
	}
	public function index()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		//$project_id['project_id'] = $project_id;
		$project['name'] = $this->Project_model->getProjectName($_SESSION['project_id']);
		$project['idp'] = $this->Outh_model->Encryptor('encrypt', $_SESSION['project_id']);
		$project['id'] = $_SESSION['project_id'];



		//$data['chatTitle']= $project['title'];

		// // if($this->session->userdata['Admin']['role'] == 'Client_cs'){
		// // 	$list = $this->UserModel->VendorsList();
		// // 	$data['strTitle']='All Vendors';
		// // 	$data['strsubTitle']='Vendors';
		// // 	$data['chatTitle']='Select Vendor with Chat';
		// // }else{
		// // 	$list = $this->UserModel->ClientsListCs();
		// // 	$data['strTitle']='All Connected Clients';
		// // 	$data['strsubTitle']='Clients';
		// // 	$data['chatTitle']='Select Client with Chat';

		// // }
		// // $vendorslist=[];
		// // foreach($list as $u){
		// // 	$vendorslist[]=
		// // 	[
		// // 		'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
		// // 		'name' => $u['name'],
		// // 		'picture_url' => $this->UserModel->PictureUrlById($u['id']),
		// // 	];
		// // }






		$this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		// $this->load->view('construction_services/chat_template');
		$this->load->view('construction_services/chat_template', $project);
		//$this->parser->parse('construction_services/chat_template',$project);
	}

	public function send_text_message()
	{


		$post = $this->input->post();
		$messageTxt = 'NULL';
		insertLogActivity('send message', 'chat');
	
		$messageTxt = $post['messageTxt'];

		date_default_timezone_set('america/sao_paulo');
		$dataTime = date('d/m/Y H:i:s');
		$data = [
			'sender_id' => $this->session->userdata('user_id'),
			'receiver_id' => $this->Outh_model->Encryptor('decrypt', $post['receiver_id']),
			'message' =>   $messageTxt,
			'message_date_time' => $dataTime, //23 Jan 2:05 pm
			'ip_address' => $this->input->ip_address(),

		];

		$query = $this->Chat_model->SendTxtMessage($data);
		$response = '';
		if ($query == true) {
			$response = ['status' => 1, 'message' => ''];
		} else {
			$response = ['status' => 0, 'message' => 'sorry we re having some technical problems. please try again !'];
		}

		echo json_encode($response);
	}



	public function get_chat_history()
	{
		$receiver_id = $this->Outh_model->Encryptor('decrypt', $this->input->get('receiver_id'));
		$Logged_sender_id = $this->session->userdata("user_id");
		$history = $this->Chat_model->GetReciverChatHistory($receiver_id);
		foreach ($history as $chat) :
			$sender_id = $chat['sender_id'];

			$userName = $this->Admin_model->get_user_name($chat['sender_id']);


			$message = $chat['message'];

			date_default_timezone_set('america/sao_paulo');
			$messagedatetime = $chat['message_date_time'];

?>
			<?php
			$messageBody = '';
			$messageBody = $message;

			?>



			<?php if ($Logged_sender_id != $sender_id) { ?>
				<!-- Message. Default to the left -->
				<div class="direct-chat-msg">
					<div class="direct-chat-info clearfix">
						<span class="direct-chat-name pull-left"><?= $userName; ?></span>
						<span class="direct-chat-timestamp pull-right"><?= $messagedatetime; ?></span>
					</div>
					<!-- /.direct-chat-info -->

					<!-- /.direct-chat-img -->
					<div class="direct-chat-text">
						<?= $messageBody; ?>
					</div>
					<!-- /.direct-chat-text -->

				</div>
				<!-- /.direct-chat-msg -->
			<?php } else { ?>
				<!-- Message to the right -->
				<div class="direct-chat-msg right">
					<div class="direct-chat-info clearfix">
						<span class="direct-chat-name pull-right"><?= $userName; ?></span>
						<span class="direct-chat-timestamp pull-left"><?= $messagedatetime; ?></span>
					</div>
					<!-- /.direct-chat-info -->

					<!-- /.direct-chat-img -->
					<div class="direct-chat-text">
						<?= $messageBody; ?>
						<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                            </div>-->
					</div>
					<!-- /.direct-chat-text -->
				</div>
				<!-- /.direct-chat-msg -->
			<?php } ?>

<?php
		endforeach;
	}
}
