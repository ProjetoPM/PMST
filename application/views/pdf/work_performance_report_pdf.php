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

 extract($work_performance_report);
// Set some content to print
$main_activities = str_replace('
', '<br>', $main_activities);

$next_activities = str_replace('
', '<br>', $next_activities);

$comments = str_replace('
', '<br>', $comments);

$issues = str_replace('
', '<br>', $issues);

$changes = str_replace('
', '<br>', $changes);

$risks = str_replace('
', '<br>', $risks);

$attention_points = str_replace('
', '<br>', $attention_points);


$html =
<<<EOD

<h1 align="center">Work Performance Report</h1>
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
    <th class="tg-cly1">Responsible Name:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$responsible</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Date:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$date</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Main activities in execution (with %):</th>
  </tr>
  <tr>
    <td class="tg-alz1">$main_activities</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Upcoming activities to perform:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$next_activities</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">General Comments:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$comments</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Issues:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$issues</td>
  </tr>
</table>
</div>


<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Changes:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$changes</td>
  </tr>
</table>
</div>


<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Risks:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$risks</td>
  </tr>
</table>
</div>


<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Attention Points:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$attention_points</td>
  </tr>
</table>
</div>


<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">Responsible</p>
<br>
</div>



EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
