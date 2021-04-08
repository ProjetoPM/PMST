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

 extract($project_performance_report);
// Set some content to print
$current_performance_analysis = str_replace('
', '<br>', $current_performance_analysis);

$planned_forecasts = str_replace('
', '<br>', $planned_forecasts);

$forecasts_considering_current_performance = str_replace('
', '<br>', $forecasts_considering_current_performance);

$current_risk_situation = str_replace('
', '<br>', $current_risk_situation);

$current_status_of_issues = str_replace('
', '<br>', $current_status_of_issues);

$work_completed_during_the_period = str_replace('
', '<br>', $work_completed_during_the_period);

$work_to_be_completed_in_the_next_period = str_replace('
', '<br>', $work_to_be_completed_in_the_next_period);

$summary_of_changes = str_replace('
', '<br>', $summary_of_changes);

$earned_value_management = str_replace('
', '<br>', $earned_value_management);

$other_relevant_information = str_replace('
', '<br>', $other_relevant_information);



$html =
<<<EOD

<h1 align="center">Project Performance and Monitoring Report</h1>
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
    <th class="tg-cly1">Date of Report:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$date</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Current Performance Analysis:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$current_performance_analysis</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Forecasts as planned:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$planned_forecasts</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Forecasts Considering Currently Performance:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$forecasts_considering_current_performance</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Current Risk Situation:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$current_risk_situation</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Current Status of Issues:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$current_status_of_issues</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Work Completed During the Period:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$work_completed_during_the_period</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Work to be Completed in the Next Period:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$work_to_be_completed_in_the_next_period</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Summary of changes approved in the period:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$summary_of_changes</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Earned Value Management:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$earned_value_management</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Other relevant information:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$other_relevant_information</td>
  </tr>
</table>
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
