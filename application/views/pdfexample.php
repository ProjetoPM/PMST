<?php
// Include the main TCPDF library (search for installation path).
$this->load->library('Pdf');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
               require_once(dirname(__FILE__).'/lang/eng.php');
               $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2,
 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

	foreach($project_charter as $tap){
    $tap->project_description;
    $tap->project_purpose;
    $tap->project_objective;
    $tap->benefits;
    $tap->high_level_requirements;
    $tap->initial_assumptions;
    $tap->initial_restrictions;
    $tap->project_limits;
    $tap->high_level_risks;
    $tap->summary_schedule;
    $tap->budge_summary;
    $tap->project_approval_requirements;
  }
// Set some content to print
$html =
<<<EOD

<h1 align="center">Project Charter</h1>
</br>

<div>
<p class="foo">Project Description:</p>
$tap->project_description
</div>
<div>
<p>Project Purpose: </p>
$tap->project_purpose
</div>
<div>
<p>Project Objectives:</p>
$tap->project_objective
</div>
<div>
<p>Benefits:</p>
$tap->benefits
</div>
<div>
<p>High Level Requirements:</p>
$tap->high_level_requirements
</div>
<div>
<p>Initial Assumptions:</p>
$tap->initial_assumptions
</div>
<div>
<p>Initial Restrictions:</p>
$tap->initial_restrictions
</div>
<div>
<p>Project Limits:</p>
$tap->project_limits
</div>
<div>
<p>High Level Risks:</p>
$tap->high_level_risks
</div>
<div>
<p>Summary Schedule:</p>
$tap->summary_schedule
</div>
<div>
<p>Budge Summary:</p>
$tap->budge_summary
</div>
<div>
<p>Project Approval Requirements:</p>
$tap->project_approval_requirements
</div>


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
