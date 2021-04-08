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

 extract($project_mp);
// Set some content to print
// $project_guidelines = str_replace('
// ', '<br>', $project_guidelines);

// $planned_forecasts = str_replace('
// ', '<br>', $planned_forecasts);

// $forecasts_considering_current_performance = str_replace('
// ', '<br>', $forecasts_considering_current_performance);

// $current_risk_situation = str_replace('
// ', '<br>', $current_risk_situation);

// $current_status_of_issues = str_replace('
// ', '<br>', $current_status_of_issues);

// $work_completed_during_the_period = str_replace('
// ', '<br>', $work_completed_during_the_period);

// $work_to_be_completed_in_the_next_period = str_replace('
// ', '<br>', $work_to_be_completed_in_the_next_period);

// $summary_of_changes = str_replace('
// ', '<br>', $summary_of_changes);

// $earned_value_management = str_replace('
// ', '<br>', $earned_value_management);

// $other_relevant_information = str_replace('
// ', '<br>', $other_relevant_information);

$title = $this->lang->line('pmp_title');

// <h3>Subsidiary Management Plans</h3>
$guidelines_lang = $this->lang->line('pmp_guidelines'); // $project_guidelines
$requirements_lang = $this->lang->line('pmp_requirements_mp'); // $requirements_mp
$schedule_lang = $this->lang->line('pmp_schedule_mp'); // $schedule_mp
$cost_lang = $this->lang->line('pmp_cost_mp'); // $cost_mp
$quality_lang = $this->lang->line('pmp_quality_mp'); // $quality_mp
$resource_lang = $this->lang->line('pmp_resource_mp'); // $resource_mp
$stake_communication_lang = $this->lang->line('pmp_stakeholders'); // $stakeholders_communication
$risk_lang = $this->lang->line('pmp_risk_mp'); // $risk_mp
$procurement_lang = $this->lang->line('pmp_procurement_mp'); // $procurement_mp
$stake_mp_lang = $this->lang->line('pmp_stakeholder_mp'); // $stakeholder_mp

// <h3>Baselines</h3>
$scope_baseline_lang = $this->lang->line('pmp_scope_baseline'); // $scope_baseline
$baseline_lang = $this->lang->line('pmp_baseline'); // $baseline_maintenance
$cost_baseline_lang = $this->lang->line('pmp_cost_baseline'); // $cost_baseline

// <h3>Additional Components</h3>
$change_lang = $this->lang->line('pmp_change_mp'); // $change_mp
$configuration_lang = $this->lang->line('pmp_configuration_mp'); // $configuration_mp
$performance_lang = $this->lang->line('pmp_performance'); // $performance
$lifecycle_lang = $this->lang->line('pmp_lifecycle'); // $project_lifecycle
$development_lang = $this->lang->line('pmp_development'); // $development
$key_lang = $this->lang->line('pmp_key_review'); // $key_review



$html =
<<<EOD

<h1 align="center">$title</h1>
</br>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<h3>Subsidiary Management Plans</h3>
<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$guidelines_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$project_guidelines</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$requirements_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$requirements_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$schedule_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$schedule_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$cost_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$cost_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$quality_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$quality_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$resource_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$resource_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$stake_communication_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$stakeholders_communication</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$risk_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$risk_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$procurement_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$procurement_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$stake_mp_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$stakeholder_mp</td>
  </tr>
</table>
</div>
<h3>Baselines</h3>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$scope_baseline_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$scope_baseline</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$baseline_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$baseline_maintenance</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$cost_baseline_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$cost_baseline</td>
  </tr>
</table>
</div>

<h3>Additional Components</h3>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$change_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$change_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$configuration_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$configuration_mp</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$performance_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$performance</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$lifecycle_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$project_lifecycle</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$development_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$development</td>
  </tr>
</table>
</div>

<div>
<table class="tg">
  <tr>
    <th class="tg-cly1">$key_lang:</th>
  </tr>
  <tr>
    <td class="tg-alz1">$key_review</td>
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
