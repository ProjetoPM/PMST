<?php
    class ChangeRequest_PDF extends CI_Controller{

			function __construct(){
				parent::__construct();

				if (!$this->session->userdata('logged_in')) {
					redirect(base_url());
				}

				//$this->load->helper('url');
				$this->lang->load('btn', 'english');
				//$this->lang->load('btn', 'portuguese-brazilian');
				$this->lang->load('change_request', 'english');
				$this->load->model('Change_request_model');
				$this->load->model('Project_model');
			}

		function index() {
	    $this->load->library('Pdf');
	    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
	    $pdf->SetTitle('Change Request');
	    $pdf->SetHeaderMargin(30);
	    $pdf->SetTopMargin(20);
	    $pdf->setFooterMargin(20);
	    $pdf->SetAutoPageBreak(true);
	    $pdf->SetAuthor('Author');
	    $pdf->SetDisplayMode('real', 'default');
	    $pdf->Write(5, 'CodeIgniter TCPDF Integration');
	    //$pdf->Output('tap.pdf', 'I'); }
			$this->load->view('pdf/change_request_pdf');
    }

		function pdfGenerator($project_id) {
			$this->load->library('Pdf');


			$idusuario = $_SESSION['user_id'];
	    $this->db->where('user_id', $idusuario);
	    $project['dados'] = $this->db->get('project_user')-> result();

	    if (count($project['dados']) > 0) {

				$dado['change_request'] = $this->Change_request_model->getChangeRequest($project_id);
        $this->db->where('id', $project_id);

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Termo de Abertura do Projeto');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->Write(5, 'CodeIgniter TCPDF Integration');
			//$pdf->Output('tap.pdf', 'I'); }
			$this->load->view('pdf/change_request_pdf', $dado);
		}

		}
}
    ?>
