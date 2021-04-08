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

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Description:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->project_description</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Purpose:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->project_purpose</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Objectives:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->project_objective</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Benefits:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->benefits</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">High Level Requirements:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->high_level_requirements</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Initial Assumptions:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->initial_assumptions</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Initial Restrictions:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->initial_restrictions</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Limits:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->project_limits</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">High Level Risks:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->high_level_risks</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Summary Schedule:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->summary_schedule</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Budge Summary:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->budge_summary</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Approval Requirements:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$tap->project_approval_requirements</td>
  </tr>
</table>
</div>


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
