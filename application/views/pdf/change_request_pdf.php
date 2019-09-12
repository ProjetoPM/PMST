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

 extract($change_request);
// Set some content to print
$type = str_replace('
', '<br>', $type);

$comments = str_replace('
', '<br>', $comments);

$description = str_replace('
', '<br>', $description);

$impacted_areas = str_replace('
', '<br>', $impacted_areas);

$impacted_docs = str_replace('
', '<br>', $impacted_docs);

$justification = str_replace('
', '<br>', $justification);

$manager_opinion = str_replace('
', '<br>', $manager_opinion);

$committee_opinion = str_replace('
', '<br>', $committee_opinion);



$html =
<<<EOD

<h1 align="center">Change Request</h1>
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
    <th class="tg-cly1">Requester:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$requester</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Request Identification Number:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$number_id</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Request Date:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$request_date</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Type of Change:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$type</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Description of Change:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$description</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Impacted Areas:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$impacted_areas</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Deliveries/Documents Impacted:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$impacted_docs</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Justification:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$justification</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Additional comments:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$comments</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Opinion of Project Manager:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$manager_opinion</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Opinion of the Change Control Committee:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$committee_opinion</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Status/Situation:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$status</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">Date of Opinion of the Change Control Committee:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$committee_date</td>
  </tr>
</table>
</div>

<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">Requester</p>
<br>

</div>

<div>
</div>

<br>
<div>
<br>
<p align="center">______________________________________________</p>
<p align="center">Change Control Committee</p>
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
