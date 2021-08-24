<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectToOverleaf extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('overleaf', 'english');
		// $this->lang->load('quality_mp','portuguese-brazilian');

		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('log_model');
		$this->load->helper('url');
		// $this->load->model('Project_to_overleaf_model');
		$this->load->helper('log_activity');


		// Integration
		$this->load->model('Admin_model');
		$this->load->model('Project_Charter_model');
		$this->load->model('Project_Management_model');
		$this->load->model('Project_performance_report_model');
		$this->load->model('Change_request_model');
		$this->load->model('Project_Closure_model');
		$this->load->model('Business_case_model');
		$this->load->model('Delivery_acceptance_term_model');
		$this->load->model('Change_log_model');
		$this->load->model('Final_report_model');
		$this->load->model('Benefits_plan_model');
		$this->load->model('Work_performance_report_model');
		$this->load->model('Issues_record_model');
		$this->load->model('Lesson_learned_register_model');
		$this->load->model('Assumption_log_model');

		// Scope
		$this->load->model('Requirements_mp_model');
		$this->load->model('Scope_mp_model');
		$this->load->model('Requirement_registration_model');
		$this->load->model('Scope_specification_model');

		// Schedule
		$this->load->model('Schedule_model');
		$this->load->model('Activity_model');
		$this->load->model('DurationEstimates_model');

		// Cost
		$this->load->model("Cost_model");

		// Quality
		$this->load->model("Quality_model");
		$this->load->model("Quality_reports_model");
		$this->load->model("QualityChecklist_model");


	}

	public function PCH_Overleaf($project_id)
	{
		$dataProjectCharter = $this->Project_Charter_model->get($project_id);
		if ($dataProjectCharter != null) {
			$file["name_task"] = "ProjectCharter.tex";
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Charter}\n";

			$file["task"] .= "\subsection{High-Level Project Description}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_description) . "\n";

			$file["task"] .= "\subsection{Start Date}";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataProjectCharter[0]->start_date))) . "\n";

			$file["task"] .= "\subsection{End Date}\n";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataProjectCharter[0]->end_date))) . "\n";

			$file["task"] .= "\subsection{Project Purpose}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_purpose) . "\n";

			$file["task"] .= "\subsection{Measurable Project Objectives}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_objective) . "\n";

			$file["task"] .= "\subsection{Key Benefits}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->benefits) . "\n";

			$file["task"] .= "\subsection{High-Level Requirements}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->high_level_requirements) . "\n";

			$file["task"] .= "\subsection{Boundaries}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->boundaries) . "\n";

			$file["task"] .= "\subsection{Overall Project Risk}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->high_level_risks) . "\n";

			$file["task"] .= "\subsection{Summary Milestone Schedule}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->summary_schedule) . "\n";

			$file["task"] .= "\subsection{Preapproved Financial Resources}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->budge_summary) . "\n";

			$file["task"] .= "\subsection{Project Approval Requirements}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_approval_requirements) . "\n";

			$file["task"] .= "\subsection{Success Criteria}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->success_criteria) . "\n";

			$file["task"] .= "\subsection{Project Exit Criteria}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->exit_criteria) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function BC_Overleaf($project_id)
	{
		$dataBusinessCase = $this->Business_case_model->get($project_id);
		if ($dataBusinessCase != null) {
			$file["name_task"] = "BusinessCase.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Business Case}\n";
			$file["task"]  .= "\subsubsection{Business Deals}\n";
			$file["task"]  .= $this->verificaDados($dataBusinessCase[0]->business_deals) . "\n";

			$file["task"]  .= "\subsubsection{Situation Analysis}\n";
			$file["task"]  .= $this->verificaDados($dataBusinessCase[0]->situation_analysis) . "\n";

			$file["task"]  .= "\subsubsection{Recommendation}\n";
			$file["task"]  .= $this->verificaDados($dataBusinessCase[0]->recommendation) . "\n";

			$file["task"]  .= "\subsubsection{Evaluation}\n";
			$file["task"]  .= $this->verificaDados($dataBusinessCase[0]->evaluation) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function BMP_Overleaf($project_id)
	{
		$dataBMP = $this->Benefits_plan_model->get($project_id);
		if ($dataBMP != null) {
			$file["name_task"] = "BenefitsManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"] .= "\section{Benefits Management Plan}\n";

			$file["task"] .= "\subsection{Target Benefits}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->target_benefits) . "\n";

			$file["task"] .= "\subsection{Strategic Alignment}";
			$file["task"] .= $this->verificaDados($dataBMP[0]->strategic_alignment) . "\n";

			$file["task"] .= "\subsection{Schedule for Benefits}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->schedule_benefit) . "\n";

			$file["task"] .= "\subsection{Benefits Owner}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->benefits_owner) . "\n";

			$file["task"] .= "\subsection{Indicators}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->indicators) . "\n";

			$file["task"] .= "\subsection{Premises}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->premises) . "\n";

			$file["task"] .= "\subsection{Risks}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->risks) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function ACL_Overleaf($project_id)
	{
		$dataACL = $this->Assumption_log_model->getAll($project_id);
		$file["name_task"] = "AssumptionLog.tex";
		$file["task"] = "\n";
		$file["task"]  .= "\section{Assumption Log}\n";
		$file["task"]  .= "\begin{longtable}{ p{.15\\textwidth} | p{.85\\textwidth}}\n";
		$file["task"] .= "\bottomrule \n";
		$file["task"] .= "\\rowcolor{gray}\n";
		$file["task"] .= "\\textbf{Type} & \\textbf{Description} \\\ \n";
		$file["task"] .= "\hline \n";
		$count = 0;
		if ($dataACL != null) {
			foreach ($dataACL as $data) {
				if ($count % 2 != 0) {
					$file["task"] .= "\\rowcolor{white}\n";
				} else {
					$file["task"] .= "\\rowcolor{lightgray}\n";
				}
				$count++;
				$temp = $this->verificaDados($data->type);
				if ($temp == "A") {
					$temp = "Assumption";
				} else if ($temp == "C") {
					$temp = "Constraint";
				}

				$file["task"] .= $temp . " & " . $this->verificaDados($data->description_log) . " \\\ \n";

				$file["task"] .= "\hline \n";
			}
			$file["task"]  .= "\\toprule \n";
			$file["task"] .= "\caption{Assumption Log} \n";
			$file["task"] .= "\label{tab:AssumptionLog} \n";
			$file["task"] .= "\\end{longtable} \n";

			return $file;
		} else {
			return null;
		}
	}

	public function PMP_Overleaf($project_id)
	{
		$dataPMP = $this->Project_Management_model->get($project_id);
		if ($dataPMP != null) {
			$file["name_task"] = "ProjectManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Management Plan}\n";

			// Subsidiary Management Plans
			$file["task"] .= "\subsection{Subsidiary Management Plans}\n";

			$file["task"] .= "\subsubsection{Scope Management Plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["project_guidelines"]) . "\n";

			$file["task"] .= "\subsubsection{Requirements management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["requirements_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Schedule management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["schedule_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Cost management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["cost_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Quality management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["quality_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Resource management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["resource_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Communications management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["stakeholders_communication"]) . "\n";

			$file["task"] .= "\subsubsection{Risk management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["risk_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Procurement management plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["procurement_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Stakeholder engagement plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["stakeholder_mp"]) . "\n";

			// Baselines
			$file["task"] .= "\subsection{Baselines}\n";

			$file["task"] .= "\subsubsection{Scope Baseline}\n";
			$file["task"] .= $this->verificaDados($dataPMP["scope_baseline"]) . "\n";

			$file["task"] .= "\subsubsection{Schedule Baseline}\n";
			$file["task"] .= $this->verificaDados($dataPMP["baseline_maintenance"]) . "\n";

			$file["task"] .= "\subsubsection{Cost Baseline}\n";
			$file["task"] .= $this->verificaDados($dataPMP["cost_baseline"]) . "\n";

			// Additional Components
			$file["task"] .= "\subsection{Additional Components}\n";

			$file["task"] .= "\subsubsection{Change Management Plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["change_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Configuration Management Plan}\n";
			$file["task"] .= $this->verificaDados($dataPMP["configuration_mp"]) . "\n";

			$file["task"] .= "\subsubsection{Performance Measurement Baseline}\n";
			$file["task"] .= $this->verificaDados($dataPMP["performance"]) . "\n";

			$file["task"] .= "\subsubsection{Project Life Cycle}\n";
			$file["task"] .= $this->verificaDados($dataPMP["project_lifecycle"]) . "\n";

			$file["task"] .= "\subsubsection{Development Approach}\n";
			$file["task"] .= $this->verificaDados($dataPMP["development"]) . "\n";

			$file["task"] .= "\subsubsection{Management Reviews}\n";
			$file["task"] .= $this->verificaDados($dataPMP["key_review"]) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function PPR_Overleaf($project_id)
	{
		$dataPPR = $this->Project_performance_report_model->getAll($project_id);
		$file["name_task"] = "ProjectPerformaceMonitoringReport.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Project Performance and Monitoring Report}\n";
		$file["task"] .= "\begin{itemize}\n";

		if ($dataPPR != null) {
			foreach ($dataPPR as $data) {
				$file["task"] .= "\item \\textbf{Date of report}: " . $this->verificaDados(date("d/m/Y", strtotime($data->date))) . "\n";
				$file["task"] .= "\item \\textbf{Current Performance Analysis}: " . $this->verificaDados($data->current_performance_analysis) . "\n";
				$file["task"] .= "\item \\textbf{Forecasts as planned}: " . $this->verificaDados($data->planned_forecasts) . "\n";
				$file["task"] .= "\item \\textbf{Work Completed During the Period}: " .  $this->verificaDados($data->work_completed_during_the_period) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Forecasts Considering Currently Performance}: ";
				$file["task"] .= $this->verificaDados($data->forecasts_considering_current_performance) . "\n";

				$file["task"] .= "\item \\textbf{Current Risk Situation}: ";
				$file["task"] .= $this->verificaDados($data->current_risk_situation) . ";\n";

				$file["task"] .= "\item \\textbf{Current Status of Issues}: ";
				$file["task"] .= $this->verificaDados($data->current_status_of_issues) . ";\n";

				$file["task"] .= "\item \\textbf{Work to be Completed in the Next Period}: ";
				$file["task"] .= $this->verificaDados($data->work_to_be_completed_in_the_next_period) . ";\n";

				$file["task"] .= "\item \\textbf{Summary of changes approved in the period}: ";
				$file["task"] .= $this->verificaDados($data->summary_of_changes) . ";\n";

				$file["task"] .= "\item \\textbf{Earned Value Management}: ";
				$file["task"] .= $this->verificaDados($data->earned_value_management) . ";\n";

				$file["task"] .= "\item \\textbf{Other relevant information}: ";
				$file["task"] .= $this->verificaDados($data->other_relevant_information) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function DS_Overleaf($project_id)
	{
		$dataDS = $this->Delivery_acceptance_term_model->getAll($project_id);
		$file["name_task"] = "DeliverableStatus.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Deliverable Status}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataDS != null) {
			foreach ($dataDS as $data) {

				$file["task"] .= "\item \\textbf{Validator Name}: " .  $this->verificaDados($data->validator_name) . " | \\textbf{Validation Date}: " . date("d/m/Y", strtotime($data->validation_date)) .  "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Role}: ";
				$file["task"] .=  $this->verificaDados($data->role) . ";\n";

				$file["task"] .= "\item \\textbf{Function in the Project}: ";
				$file["task"] .= $this->verificaDados($data->function) . ";\n";

				$file["task"] .= "\item \\textbf{Comments}: ";
				$file["task"] .= $this->verificaDados($data->comments) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function WP_Overleaf($project_id)
	{
		$dataWP = $this->Work_performance_report_model->getAll($project_id);
		$file["name_task"] = "WorkPerformanceReport.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Work Performance Reports}\n";
		$file["task"] .= "\begin{itemize}\n";

		if ($dataWP != null) {
			foreach ($dataWP as $data) {



				// $name = getStakeholderName($this->verificaDados($data->project_id));

				// $file["task"] .= "\item \\textbf{Responsible}: " . $this->verificaDados($name) . "\n";
				$file["task"] .= "\item \\textbf{Date}: " . $this->verificaDados(date("d/m/Y", strtotime($data->date))) . "\n";
				$file["task"] .= "\item \\textbf{Main activities in execution (with \%)}: " . $this->verificaDados($data->main_activities) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Upcoming activities to perform}: ";
				$file["task"] .= $this->verificaDados($data->next_activities) . ";\n";

				$file["task"] .= "\item \\textbf{General Comments}: ";
				$file["task"] .= $this->verificaDados($data->comments) . ";\n";

				$file["task"] .= "\item \\textbf{Issues}: ";
				$file["task"] .= $this->verificaDados($data->issues) . ";\n";

				$file["task"] .= "\item \\textbf{Changes}: ";
				$file["task"] .= $this->verificaDados($data->changes) . ";\n";

				$file["task"] .= "\item \\textbf{Risks}: ";
				$file["task"] .= $this->verificaDados($data->risks) . ";\n";

				$file["task"] .= "\item \\textbf{Attention Points}: ";
				$file["task"] .= $this->verificaDados($data->attention_points) . ";\n";

				$file["task"] .= "\\end{itemize}\n";

				$file["task"] .= "\\end{itemize}\n";
				$file["task"] .= "\n";

				return $file;
			}
		} else {
			return null;
		}
	}

	public function IR_Overleaf($project_id)
	{
		$dataIR = $this->Issues_record_model->getAll($project_id);
		$file["name_task"] = "IssueRecord.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Issue Record}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataIR != null) {
			foreach ($dataIR as $data) {

				$file["task"] .= "\item \\textbf{Issue Responsible}: " .  $this->verificaDados($data->responsable) . " | \\textbf{Identification Date}: " . date("d/m/Y", strtotime($data->identification_date)) . "\n";
				$file["task"] .= "\item \\textbf{Description of the Issue}: " . $this->verificaDados($data->question_description) . " | \\textbf{Situation}: " . $this->verificaDados($data->situation) . "\n";
				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Responsible for the Identifying}: ";
				$file["task"] .=  $this->verificaDados($data->identification) . ";\n";

				$file["task"] .= "\item \\textbf{Issue Type}: ";
				$file["task"] .= $this->verificaDados($data->type) . ";\n";

				$file["task"] .= "\item \\textbf{Required Action}: ";
				$file["task"] .= $this->verificaDados($data->action) . ";\n";

				$file["task"] .= "\item \\textbf{Required Action}: ";
				$file["task"] .= $this->verificaDados($data->action) . ";\n";

				$file["task"] .= "\item \\textbf{Planned Resolution Date}: ";
				$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($data->resolution_date))) . ";\n";


				$file["task"] .= "\item \\textbf{Reorganized Resolution Date}: ";
				$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($data->replan_date))) . ";\n";

				$file["task"] .= "\item \\textbf{Comments}: ";
				$file["task"] .= $this->verificaDados($data->observations) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function LLR_Overleaf($project_id)
	{
		$dataLLR = $this->Lesson_learned_register_model->getAll($project_id);
		$file["name_task"] = "LessonLearnedRegister.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Lesson Learned Register}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataLLR != null) {
			foreach ($dataLLR as $data) {

				$file["task"] .= "\item \\textbf{Issue Responsible}: " .  $this->verificaDados($data->stakeholder) . " | \\textbf{Identification Date}: " . date("d/m/Y", strtotime($data->date)) . "\n";
				$file["task"] .= "\item \\textbf{Description of the Issue}: " . $this->verificaDados($data->description) . "\n";
				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Category}: ";
				$file["task"] .=  $this->verificaDados($data->category) . ";\n";

				$file["task"] .= "\item \\textbf{Who Could Be Interested}: ";
				$file["task"] .= $this->verificaDados($data->interested) . ";\n";

				$file["task"] .= "\item \\textbf{Status}: ";
				$file["task"] .= $this->verificaDados($data->status) . ";\n";

				$file["task"] .= "\item \\textbf{Impact}: ";
				$file["task"] .= $this->verificaDados($data->impact) . ";\n";

				$file["task"] .= "\item \\textbf{Recommendations}: ";
				$file["task"] .= $this->verificaDados($data->recommendations) . ";\n";

				$file["task"] .= "\item \\textbf{Associated Life Cycle Stage}: ";
				$file["task"] .= $this->verificaDados($data->life_cycle) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function CR_Overleaf($project_id)
	{
		$dataCR = $this->Change_request_model->getAll($project_id);
		$file["name_task"] = "ChangeRequest.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Change Request}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataCR != null) {
			foreach ($dataCR as $data) {

				$file["task"] .= "\item \\textbf{Id}: " .  $this->verificaDados($data->number_id) . " | \\textbf{Requester}: " .  $this->verificaDados($data->requester) . " | \\textbf{Request Date}: " . date("d/m/Y", strtotime($data->request_date)) . "\n";
				$file["task"] .= "\item \\textbf{Type of change}: " . $this->verificaDados($data->type) . " | \\textbf{Status/Situation}: " .  $this->verificaDados($data->status) . "\n";
				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Date of Opinion of the CCB}: ";
				$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($data->committee_date))) . ";\n";

				$file["task"] .= "\item \\textbf{Description of Change}: ";
				$file["task"] .=  $this->verificaDados($data->description) . ";\n";

				$file["task"] .= "\item \\textbf{Impacted Knowledge Areas}: ";
				$file["task"] .= $this->verificaDados($data->impacted_areas) . ";\n";

				$file["task"] .= "\item \\textbf{Impacted Deliveries/Documents}: ";
				$file["task"] .= $this->verificaDados($data->impacted_docs) . ";\n";

				$file["task"] .= "\item \\textbf{Justification}: ";
				$file["task"] .= $this->verificaDados($data->justification) . ";\n";

				$file["task"] .= "\item \\textbf{Additional Comments}: ";
				$file["task"] .= $this->verificaDados($data->comments) . ";\n";

				$file["task"] .= "\item \\textbf{Opinion of the CCB}: ";
				$file["task"] .= $this->verificaDados($data->committee_opinion) . ";\n";

				$file["task"] .= "\item \\textbf{Opinion of Project Manager}: ";
				$file["task"] .= $this->verificaDados($data->manager_opinion) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function CL_Overleaf($project_id)
	{
		$dataCL = $this->Change_request_model->getAll($project_id);
		$file["name_task"] = "ChangeLog.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Change Log}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataCL != null) {
			foreach ($dataCL as $data) {
				// if ($data->log != 0) {
				$file["task"] .= "\item \\textbf{Id}: " .  $this->verificaDados($data->number_id) . " | \\textbf{Requester}: " .  $this->verificaDados($data->requester) . " | \\textbf{Request Date}: " . date("d/m/Y", strtotime($data->request_date)) . "\n";
				$file["task"] .= "\item \\textbf{Type of change}: " . $this->verificaDados($data->type) . " | \\textbf{Status/Situation}: " .  $this->verificaDados($data->status) . "\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
			// }else {
			// 	return null;
			// }
		} else {
			return null;
		}
	}

	public function TEP_Overleaf($project_id)
	{
		$dataTEP = $this->Project_Closure_model->get($project_id);
		if ($dataTEP != null) {
			$file["name_task"] = "ProjectClosureReport.tex";
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Closure Report}\n";

			$file["task"] .= "\subsection{Client}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->client) . "\n";

			$file["task"] .= "\subsection{Date of project closure}\n";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataTEP[0]->project_closure_date))) . "\n";

			$file["task"] .= "\subsection{Main changes approved}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_changes_approved) . "\n";

			$file["task"] .= "\subsection{Main lessons learned}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_lessons_learned) . "\n";

			$file["task"] .= "\subsection{Main deviations}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_deviations) . "\n";

			$file["task"] .= "\subsection{Customer comments}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->client_comments) . "\n";

			$file["task"] .= "\subsection{Sponsor's comments}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->sponsor_comments) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function FR_Overleaf($project_id)
	{
		$dataTEP = $this->Final_report_model->get($project_id);
		if ($dataTEP != null) {
			$file["name_task"] = "FinalReport.tex";
			$file["task"] = "\n";
			$file["task"] .= "\section{Final Report}\n";

			$file["task"] .= "\subsection{Summary Level Description of the Project or Phase}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->description) . "\n";

			$file["task"] .= "\subsection{Scope Objectives, Scope Criteria, and Evidences}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->scope_objectives) . "\n";

			$file["task"] .= "\subsection{Quality Objectives}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->quality_objectives) . "\n";

			$file["task"] .= "\subsection{Cost Objectives}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->cost_objectives) . "\n";

			$file["task"] .= "\subsection{Schedule Objectives}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->schedule_objectives) . "\n";

			$file["task"] .= "\subsection{Summary of the Validation Information for the Results}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->summary_validation) . "\n";

			$file["task"] .= "\subsection{Summary of Results Achieved the Business Needs}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->summary_business) . "\n";

			$file["task"] .= "\subsection{Summary Risks or Issues}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->summary_risks) . "\n";



			return $file;
		} else {
			return null;
		}
	}

	// Scope
	public function RMP_Overleaf($project_id) // 1 1
	{
		$dataRMP = $this->Requirements_mp_model->get($project_id);
		if ($dataRMP  != null) {
			$file["name_task"] = "RequirementsManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Requirements Management Plan}\n";

			$file["task"]  .= "\subsubsection{How requirements activities will be planned, tracked, and reported}\n";
			$file["task"]  .= $this->verificaDados($dataRMP[0]->requirements_collection_proc) . "\n";

			$file["task"]  .= "\subsubsection{Configuration management activities}\n";
			$file["task"]  .=  $this->verificaDados($dataRMP[0]->configuration) . "\n";

			$file["task"]  .= "\subsubsection{Requirements prioritization process}\n";
			$file["task"]  .=  $this->verificaDados($dataRMP[0]->requirements_prioritization) . "\n";

			$file["task"]  .= "\subsubsection{Metrics that will be used and the rationale for using them}\n";
			$file["task"]  .=  $this->verificaDados($dataRMP[0]->product_metrics) . "\n";

			$file["task"]  .= "\subsubsection{Traceability structure that reflects the requirement attributes captured on the traceability matrix}\n";
			$file["task"]  .=  $this->verificaDados($dataRMP[0]->traceability) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function SCOMP_Overleaf($project_id) // 1 1
	{
		$dataSCOMP = $this->Scope_mp_model->get($project_id);
		if ($dataSCOMP  != null) {
			$file["name_task"] = "ScopeManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Scope Management Plan}\n";
			$file["task"]  .= "\subsubsection{Project Scope Specification Process}\n";
			$file["task"]  .= $this->verificaDados($dataSCOMP[0]->scope_specification) . "\n";

			$file["task"]  .= "\subsubsection{Delivery acceptance process}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->deliveries_acceptance) . "\n";

			$file["task"]  .= "\subsubsection{Processes for creating, Approving, and Maintaining WBS }\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->eap_process) . "\n";

			$file["task"]  .= "\subsubsection{Scope Change Management Plan}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->scope_change_mp) . "\n";

			$file["task"]  .= "\subsubsection{Process that establishes how the scope baseline will be approved and maintained}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->baseline) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function RD_Overleaf($project_id)
	{
		$dataRD = $this->Requirement_registration_model->getAll($project_id);
		$file["name_task"] = "RequirementDocumentation.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Requirement Documentation}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataRD != null) {
			foreach ($dataRD as $data) {

				$file["task"] .= "\item \\textbf{Associated Id}: " .  $this->verificaDados($data->associated_id) . " | \\textbf{Requirement Description}: " .  $this->verificaDados($data->description) . " | \\textbf{Priority}: " . $this->verificaDados($data->priority) . "\n";
				$file["task"] .= "\item \\textbf{Business needs, opportunities, goals and objectives}: " . $this->verificaDados($data->business_strategy) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Version}:\n";
				$file["task"] .= $this->verificaDados($data->version) . ";\n";

				$file["task"] .= "\item \\textbf{Phase}:\n";
				$file["task"] .= $this->verificaDados($data->phase) . ";\n";

				$file["task"] .= "\item \\textbf{Associated Delivery}:\n";
				$file["task"] .= $this->verificaDados($data->associated_delivery) . ";\n";

				$file["task"] .= "\item \\textbf{Type}:\n";
				$file["task"] .= $this->verificaDados($data->type) . ";\n";

				$file["task"] .= "\item \\textbf{Requester}:\n";
				$file["task"] .= $this->verificaDados($data->requester) . ";\n";

				$file["task"] .= "\item \\textbf{Complexity}:\n";
				$file["task"] .= $this->verificaDados($data->complexity) . ";\n";

				$file["task"] .= "\item \\textbf{Responsible}:\n";
				$file["task"] .= $this->verificaDados($data->responsible) . ";\n";

				$file["task"] .= "\item \\textbf{Validity}:\n";
				$file["task"] .= $this->verificaDados($data->validity) . ";\n";

				$file["task"] .= "\item \\textbf{Acceptance Criteria}:\n";
				$file["task"] .= $this->verificaDados($data->acceptance_criteria) . ";\n";

				$file["task"] .= "\item \\textbf{Supporting Documentation}:\n";
				$file["task"] .= $this->verificaDados($data->supporting_documentation) . ";\n";

				$file["task"] .= "\item \\textbf{Requirement Situation}:\n";
				$file["task"] .= $this->verificaDados($data->requirement_situation) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function SSP_Overleaf($project_id) // 1 1
	{
		$dataSSP = $this->Scope_specification_model->get($project_id);
		if ($dataSSP  != null) {
			$file["name_task"] = "ScopeSpecification.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Project Scope Statement}\n";
			$file["task"]  .= "\subsubsection{Product scope description}\n";
			$file["task"]  .= $this->verificaDados($dataSSP[0]->scope_description) . "\n";

			$file["task"]  .= "\subsubsection{Acceptance criteria}\n";
			$file["task"]  .=  $this->verificaDados($dataSSP[0]->acceptance_criteria) . "\n";

			$file["task"]  .= "\subsubsection{Deliverables}\n";
			$file["task"]  .=  $this->verificaDados($dataSSP[0]->deliveries) . "\n";

			$file["task"]  .= "\subsubsection{Project Exclusions}\n";
			$file["task"]  .=  $this->verificaDados($dataSSP[0]->exclusions) . "\n";
			return $file;
		} else {
			return null;
		}
	}

	// Schedule
	public function SMP_Overleaf($project_id) // 1 1
	{
		$dataSMP = $this->Schedule_model->get($project_id);
		if ($dataSMP  != null) {
			$file["name_task"] = "ScheduleManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Schedule Management Plan}\n";

			$file["task"]  .= "\subsubsection{Project schedule model development}\n";
			$file["task"]  .= $this->verificaDados($dataSMP[0]->schedule_model) . "\n";

			$file["task"]  .= "\subsubsection{Level of accuracy}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->accuracy_level) . "\n";

			$file["task"]  .= "\subsubsection{Organizational procedures links}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->organizational_procedures) . "\n";

			$file["task"]  .= "\subsubsection{Project schedule model maintenance}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->schedule_maintenance) . "\n";

			$file["task"]  .= "\subsubsection{Performance measurement rules}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->performance_measurement) . "\n";

			$file["task"]  .= "\subsubsection{Reporting formats}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->report_format) . "\n";

			$file["task"]  .= "\subsubsection{Release and iteration length}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->release_iteration) . "\n";

			$file["task"]  .= "\subsubsection{Release and iteration length}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->units_measure) . "\n";

			$file["task"]  .= "\subsubsection{Control thresholds}\n";
			$file["task"]  .=  $this->verificaDados($dataSMP[0]->control_thresholds) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function EVM_Overleaf($project_id)
	{
		$dataEVM = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "EarnedValueManagement.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Earned Value Management}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataEVM != null) {
			foreach ($dataEVM as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " | \\textbf{EV-Earned Value}: " .  $this->verificaDados($data->agregate_value) . " | \\textbf{PV-Planned Value}: " . $this->verificaDados($data->planned_value) . "\n";
				$file["task"] .= "\item \\textbf{SV-Schedule Variance}: " .  $this->verificaDados($data->variation_of_terms) . " | \\textbf{CV-Cost Variance}: " .  $this->verificaDados($data->variation_of_costs) . " | \\textbf{Variation at the end}: " . $this->verificaDados($data->variation_at_the_end) . "\n";
				$file["task"] .= "\item \\textbf{ETC-Estimate To Complete}: " . $this->verificaDados($data->estimate_for_completion) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{AC-Actual Cost}:\n";
				$file["task"] .= $this->verificaDados($data->real_agregate_cost) . ";\n";

				$file["task"] .= "\item \\textbf{Budget at Cumulative Cost}:\n";
				$file["task"] .= $this->verificaDados($data->budget_at_cumulative_end) . ";\n";

				$file["task"] .= "\item \\textbf{SPI-Schedule Performance Index}:\n";
				$file["task"] .= $this->verificaDados($data->deadline_performance_index) . ";\n";

				$file["task"] .= "\item \\textbf{Costs Performance Index }:\n";
				$file["task"] .= $this->verificaDados($data->costs_performance_index) . ";\n";

				$file["task"] .= "\item \\textbf{EAC-Estimate At Completion}:\n";
				$file["task"] .= $this->verificaDados($data->estimated_of_completation) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function SND_Overleaf($project_id)
	{
		$dataSND = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ScheduleNetworkDiagram.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Schedule Network Diagram}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataSND != null) {
			foreach ($dataSND as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " | \\textbf{Predecessor Activity}: " .  $this->verificaDados($data->predecessor_activity) . "\n";
				$file["task"] .= "\item \\textbf{Dependence Type}: " . $this->verificaDados($data->dependence_type) . " | \\textbf{Antecipation}: " .  $this->verificaDados($data->anticipation) . " | \\textbf{Wait}: " .  $this->verificaDados($data->wait) . "\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function RR_Overleaf($project_id)
	{
		$dataSND = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ResourceRequirements.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Resource Requirements}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataSND != null) {
			foreach ($dataSND as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " | \\textbf{Resource Description}: " .  $this->verificaDados($data->resource_description) . "\n";
				$file["task"] .= "\item \\textbf{Required Amount of Resource}: " . $this->verificaDados($data->required_amount_of_resource) . " | \\textbf{Resource Cost per Unit}: " .  $this->verificaDados($data->resource_cost_per_unit) . " | \\textbf{Resource Type}: " .  $this->verificaDados($data->resource_type) . "\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function ADE_Overleaf($project_id)
	{
		$dataADE = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ActivityDurationEstimates.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Activity Duration Estimates}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataADE != null) {
			foreach ($dataADE as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " \n";
				$file["task"] .= "\item \\textbf{Estimated Duration in Hours}: " .  $this->verificaDados($data->estimated_duration) . " | \\textbf{Performed Duration in Hours}: " .  $this->verificaDados($data->performed_duration) . "\n";
				$file["task"] .= "\item \\textbf{Estimated Start Date}: " . $this->verificaDados($data->estimated_start_date) . " | \\textbf{Performed Start Date}: " .  $this->verificaDados($data->performed_start_date) . "\n";
				$file["task"] .= "\item \\textbf{Estimated End Date}: " . $this->verificaDados($data->estimated_end_date) . " | \\textbf{Performed End Date}: " .  $this->verificaDados($data->performed_end_date) . "\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function PCA_Overleaf($project_id)
	{
		$dataPCA = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ProjectCalendars.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{ProjectCalendars}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataPCA != null) {
			foreach ($dataPCA as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " \n";
				$file["task"] .= "\item \\textbf{Resource Name}: " .  $this->verificaDados($data->resource_name) . " | \\textbf{Function}: " .  $this->verificaDados($data->function) . "\n";
				$file["task"] .= "\item \\textbf{Availability Start}: " . $this->verificaDados($data->availability_start) . " | \\textbf{Availability Ends}: " .  $this->verificaDados($data->availability_ends) . "\n";
				$file["task"] .= "\item \\textbf{Allocation Start}: " . $this->verificaDados($data->allocation_start) . " | \\textbf{Allocation Ends}: " .  $this->verificaDados($data->allocation_ends) . "\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	// Cost
	public function CMP_Overleaf($project_id)
	{
		$dataCostMP = $this->Cost_model->get($project_id);
		if ($dataCostMP != null) {
			$file["name_task"] = "CostManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Cost Management Plan}\n";

			$file["task"]  .= "\subsubsection{Processes for Managing Project Costs}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->project_costs_m) . "\n";

			$file["task"]  .= "\subsubsection{Level of Accuracy}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->accuracy_level) . "\n";

			$file["task"]  .= "\subsubsection{Organizational Procedures Links}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->organizational_procedures) . "\n";

			$file["task"]  .= "\subsubsection{Rules of Performance Measurement}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->measurement_rules) . "\n";

			$file["task"]  .= "\subsubsection{Units of Measure to be Used}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->units_measure) . "\n";

			$file["task"]  .= "\subsubsection{Level of Precision}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->precision_level) . "\n";

			$file["task"]  .= "\subsubsection{Control Thresholds}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->control_thresholds) . "\n";

			$file["task"]  .= "\subsubsection{Additional Details}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->details) . "\n";

			$file["task"]  .= "\subsubsection{Reporting Formats}\n";
			$file["task"]  .= $this->verificaDados($dataCostMP[0]->format_report) . "\n";

			return $file;
		} else {
			return null;
		}
	}



	public function CE_Overleaf($project_id)
	{
		$dataCE = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "CostEstimates.tex";
		$file["task"] = "\n";
		$file["task"] .= "\section{Cost Estimates}\n";
		$file["task"] .= "\begin{itemize}\n";
		if ($dataCE != null) {
			foreach ($dataCE as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . "\n";
				$file["task"] .= "\item \\textbf{Estimated Cost}: " .  $this->verificaDados($data->estimated_cost) . " | \\textbf{Cumulative Estimated Cost}: " .  $this->verificaDados($data->cumulative_estimated_cost) . " | \\textbf{Replanted Cost}: " . $this->verificaDados($data->replanted_cost) . "\n";
				$file["task"] .= "\item \\textbf{Contingency Reserve}: " .  $this->verificaDados($data->contingency_reserve) . " | \\textbf{Sum of Work Packages}: " .  $this->verificaDados($data->sum_of_work_packages) . " | \\textbf{Contingency Reserve of Packages}: " . $this->verificaDados($data->contingency_reserve_of_packages) . "\n";
				$file["task"] .= "\item \\textbf{Baseline}: " .  $this->verificaDados($data->baseline) . " | \\textbf{Budget}: " .  $this->verificaDados($data->budget) . " | \\textbf{Cumulative Replanted Cost}: " . $this->verificaDados($data->cumulative_replanted_cost) . "\n";
				$file["task"] .= "\item \\textbf{Real Cost}: " . $this->verificaDados($data->real_cost) . " | \\textbf{Cumulative Real Cost}: " . $this->verificaDados($data->cumulative_real_cost) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Management Reserve}:\n";
				$file["task"] .= $this->verificaDados($data->reserve) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	// Quality
	public function QMP_Overleaf($project_id)
	{
		$dataQualityMP = $this->Quality_model->get($project_id);
		if ($dataQualityMP != null) {
			$file["name_task"] = "QualityManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Quality Management Plan}\n";

			$file["task"]  .= "\subsubsection{Quality Standards that will be used by the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->standards) . "\n";

			$file["task"]  .= "\subsubsection{Quality Objectives of the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->objectives) . "\n";

			$file["task"]  .= "\subsubsection{Quality Roles and Responsibilities}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->roles_responsibilities) . "\n";

			$file["task"]  .= "\subsubsection{Project Deliverables and Processes Subject to Quality Review}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->deliverables) . "\n";

			$file["task"]  .= "\subsubsection{Quality Control and Quality Management Activities Planned for the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->activities) . "\n";

			$file["task"]  .= "\subsubsection{Quality Tools that will be used for the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->tools) . "\n";

			$file["task"]  .= "\subsubsection{Major Procedures Relevant for the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->procedures) . "\n";
			return $file;
		} else {
			return null;
		}
	}

	public function verificaDados($dado)
	{
		if ($dado == null)
			return "Not Defined";
		else {
			$dado = str_replace("%", "\%", $dado);
			return str_replace("&", "\&", $dado);
		}
	}

	public function exportLatex($project_id)
	{

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $project_id);
		$project['dados'] = $this->db->get('project_user')->result();


		if (count($project['dados']) > 0) {

			// todos os documentos
			// Integration
			$PCH = $this->PCH_Overleaf($project_id);
			$BC = $this->BC_Overleaf($project_id);
			$BMP = $this->BMP_Overleaf($project_id);
			$ACL = $this->ACL_Overleaf($project_id);
			$PMP = $this->PMP_Overleaf($project_id);
			$PPR = $this->PPR_Overleaf($project_id);
			$DS = $this->DS_Overleaf($project_id);
			$WP = $this->WP_Overleaf($project_id);
			$IR = $this->IR_Overleaf($project_id);
			$LLR = $this->LLR_Overleaf($project_id);
			$CR = $this->CR_Overleaf($project_id);
			$CL = $this->CL_Overleaf($project_id);
			$TEP = $this->TEP_Overleaf($project_id);
			$FR = $this->FR_Overleaf($project_id);

			// Scope
			$RMP = $this->RMP_Overleaf($project_id);
			$SCOMP = $this->SCOMP_Overleaf($project_id);
			$RD = $this->RD_Overleaf($project_id);
			$SSP = $this->SSP_Overleaf($project_id);

			// Schedule
			$SMP = $this->SMP_Overleaf($project_id);
			$EVM = $this->EVM_Overleaf($project_id);
			$SND = $this->SND_Overleaf($project_id);
			$RR = $this->RR_Overleaf($project_id);
			$ADE = $this->ADE_Overleaf($project_id);
			$PCA = $this->PCA_Overleaf($project_id);

			// Cost
			$CMP = $this->CMP_Overleaf($project_id);
			$CE = $this->CE_Overleaf($project_id);

			// Quality
			$QMP = $this->QMP_Overleaf($project_id);
			


			// template + array dos documentos
			$files["template"] = $this->templateOverleaf($project_id);
			$files["knowledge_areas"] = array("integration" => array($PCH, $BC, $BMP, $ACL, $PMP, $PPR, $DS, $WP, $IR, $LLR, $CR, $CL, $TEP, $FR), "scope" => array($RMP, $SCOMP, $RD, $SSP), "schedule" => array($SMP, $EVM, $SND, $RR, $ADE, $PCA), "cost" => array($CMP, $CE), "quality"=> array($QMP));
		}

		// $files["knowledge_areas"] = array("integration" =>array($BC,$outra,$outra), "scope" =>array($outra,$outra));


		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/project_to_overleaf', $files);
	}

	function templateOverleaf($project_id)
	{
		$file = "";

		//Configuring File Latex
		$file .= "\documentclass[twoside,a4paper,11pt]{book}\n";
		$file .= "\usepackage[utf8]{inputenc}\n";
		$file .= "\usepackage{color, colortbl}\n";
		$file .= "\usepackage{xcolor}\n";
		$file .= "\usepackage{longtable}\n";
		$file .= "\usepackage{titlesec}\n";
		$file .= "\usepackage{graphicx}\n";
		$file .= "\usepackage{booktabs}\n";
		$file .= "\usepackage{float}\n";
		$file .= "\usepackage{paralist}\n";
		$file .= "\usepackage[alf]{abntex2cite}\n";
		$file .= "\usepackage[brazilian,hyperpageref]{backref}\n";

		$file .= "\\renewcommand{\backrefpagesname}{Citado na(s) página(s):~}\n";
		$file .= "\\renewcommand{\backref}{}\n";
		$file .= "\\renewcommand*{\backrefalt}[4]{\n";
		$file .= "\ifcase #1 %\n";
		$file .= "Nenhuma citação no texto.%\n";
		$file .= "\or\n";
		$file .= "Citado na página #2.%\n";
		$file .= "\\else\n";
		$file .= "Citado #1 vezes nas páginas #2.%\n";
		$file .= "\\fi}%\n";
		$file .= "\n";

		$file .= "\begin{document}\n";

		//Title
		$data['title'] = $this->Project_model->getProjectName($project_id);
		$file .= "\\title {" . $data['title'] . "}\n";

		// Authors
		$file .= "\author{Lucas Abner}\n";
		$file .= "\hspace{.45\\textwidth}\n";
		$file .= "\begin{minipage}{.5\\textwidth}\n";
		$file .= "Generated By: Silver Bullet 2021\n";
		$file .= "\\end{minipage}\n";

		// Document

		$file .= "\maketitle\n";

		$file .= "\\tableofcontents\n";
		$file .= "\listoffigures\n";
		$file .= "\listoftables\n";
		$file .= "\n";

		// chapter, and includes +++
		// Integration
		$file .= "\chapter{Project Integration Management}\n";
		$file .= "\include{ProjectCharter}\n";
		$file .= "\include{BusinessCase}\n"; //mesmo do name_task
		$file .= "\include{BenefitsManagementPlan}\n";
		$file .= "\include{AssumptionLog}\n";
		$file .= "\include{ProjectManagementPlan}\n";
		$file .= "\include{ProjectPerformaceMonitoringReport}\n";
		$file .= "\include{DeliverableStatus}\n";
		$file .= "\include{WorkPerformanceReport}\n";
		$file .= "\include{IssueRecord}\n";
		$file .= "\include{LessonLearnedRegister}\n";
		$file .= "\include{ChangeRequest}\n";
		$file .= "\include{ChangeLog}\n";
		$file .= "\include{ProjectClosureReport}\n";
		$file .= "\include{FinalReport}\n\n";

		// Scope
		$file .= "\chapter{Project Scope Management}\n";
		$file .= "\include{RequirementsManagementPlan}\n";
		$file .= "\include{ScopeManagementPlan}\n";
		$file .= "\include{RequirementDocumentation}\n";
		$file .= "\include{ScopeSpecification}\n\n";

		// Schedule
		$file .= "\chapter{Project Schedule Management}\n";
		$file .= "\include{ScheduleManagementPlan}\n";
		$file .= "\include{EarnedValueManagement}\n";
		$file .= "\include{ScheduleNetworkDiagram}\n";
		$file .= "\include{ResourceRequirements}\n";
		$file .= "\include{ActivityDurationEstimates}\n";
		$file .= "\include{ProjectCalendars}\n\n";

		// Cost
		$file .= "\chapter{Project Cost Management}\n";
		$file .= "\include{CostManagementPlan}\n";
		$file .= "\include{CostEstimates}\n\n";

		// Quality
		$file .= "\chapter{Project Quality Management}\n";
		$file .= "\include{QualityManagementPlan}\n";


		// End Document
		$file .= "\\bibliography{Bib}\n";
		$file .= "\\end{document}\n";

		return $file;
	}
}
