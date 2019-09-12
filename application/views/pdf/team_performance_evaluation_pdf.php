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

 extract($team_performance_evaluation);
// Set some content to print
$team_member_comments = str_replace('
', '<br>', $team_member_comments);

$strong_points = str_replace('
', '<br>', $strong_points);

$improvement = str_replace('
', '<br>', $improvement);

$development_plan = str_replace('
', '<br>', $development_plan);

$already_developed = str_replace('
', '<br>', $already_developed);

$external_comments = str_replace('
', '<br>', $external_comments);

$team_mates_comments = str_replace('
', '<br>', $team_mates_comments);

$team_performance_evaluationcol = str_replace('
', '<br>', $team_performance_evaluationcol);



$html =
<<<EOD

<h1 align="center">Team Performance Evaluation</h1>
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
    <th class="tg-cly1">Team member Name:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$team_member_name</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Role:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$role</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Project Function:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$project_function</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Evaluation Date:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$report_date</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Team member Comments:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$team_member_comments</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Strong Points:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$strong_points</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Improvement Opportunities:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$improvement</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Development Plan:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$development_plan</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Already Developed:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$already_developed</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Comments External to the Project team:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$external_comments</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Team mates comments:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$team_mates_comments</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Evaluator Comments:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$team_performance_evaluationcol</td>
  </tr>
</table>
</div>

<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">$team_member_name</p>
<br>

</div>

<div>
</div>

<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">Evaluator</p>
<br>

</div>

<div>
</div>

<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">Project Manager</p>
<br>
</div>


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
