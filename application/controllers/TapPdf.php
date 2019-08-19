<?php
    class TapPdf extends CI_Controller{

			function __construct(){
				parent::__construct();

				if (!$this->session->userdata('logged_in')) {
					redirect(base_url());
				}

				//$this->load->helper('url');
				$this->lang->load('btn', 'english');
				//$this->lang->load('btn', 'portuguese-brazilian');
				$this->lang->load('tap', 'english');
				//$this->lang->load('tap', 'portuguese-brazilian');
				$this->load->model('Tap_model');
				$this->load->model('Stakeholder_mp_model');
				$this->load->model('Project_model');
			}

		function index() {
	    $this->load->library('Pdf');
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
			$this->load->view('pdfexample');
    }

		function pdfGenerator($project_id) {
			$this->load->library('Pdf');

      $dadinho = array(
        'nome' => 'joaozinho',
        'idade' => 'twste'
      );

			$idusuario = $_SESSION['user_id'];
	    $this->db->where('user_id', $idusuario);
	    $this->db->where('project_id', $project_id);
	    $project['dados'] = $this->db->get('project_user')-> result();

	    if (count($project['dados']) > 0) {

				$dado['project_charter'] = $this->Tap_model->readTap($project_id);
				$dado['id'] = $project_id;
				$this->db->where('project_id', $project_id);
				$dado['project'] =  $this->db->get('project')->result();

				$dado['stakeholder'] = $this->Tap_model->getAllStk();
				$dado['stakeholder_mp'] = $this->Tap_model->getAllStk_mp();

				$this->db->where('project_id', $project_id);
				$dataproject['project'] = $this->db->get('project')->result();

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
			$this->load->view('pdfexample', $dado);
		}

		}
}
    ?>
