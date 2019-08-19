<?php
    class TapPdf extends CI_Controller{
    function __construct()
    { parent::__construct(); } function index() {
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

		function dispatches() {
        $this->load->view('pdfexample');
      }
}
    ?>
