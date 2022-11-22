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

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('overleaf', 'english');
			$this->lang->load('btn', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('overleaf', 'english');
			$this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}


		// $this->load->helper('url', 'english');

		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('overleaf', 'english');
		$this->lang->load('quality_plan', 'english');
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
		$this->load->model('Project_management_model');
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
		$this->load->model('Resource_requirements_model');
		$this->load->model('ProjectCalendars_model');

		// Cost
		$this->load->model("Cost_model");

		// Quality
		$this->load->model("Quality_model");
		$this->load->model("Quality_reports_model");
		$this->load->model("QualityChecklist_model");

		// Resources
		$this->load->model("Human_resource_model");
		$this->load->model("Team_Performance_Evaluation_model");

		// Communication
		$this->load->model("communications_mp_model");

		// Risk
		$this->load->model("Risk_mp_model");
		$this->load->model("Risk_model");

		// Procurement
		$this->load->model("Procurement_mp_model");
		$this->load->model("Procurement_cpd_model");
		$this->load->model("Procurement_statement_of_work_model");

		// Stakeholder
		$this->load->model("Stakeholder_model");
		$this->load->model("Stakeholder_mp_model");
	}

	public function PCH_Overleaf($project_id)
	{
		$dataProjectCharter = $this->Project_Charter_model->get($project_id);
		$file["name_task"] = "ProjectCharter.tex";
		if ($dataProjectCharter != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Charter}\n";

			$file["task"] .= "\subsubsection{High-Level Project Description}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_description) . "\n";

			$file["task"] .= "\subsubsection{Start Date}";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataProjectCharter[0]->start_date))) . "\n";

			$file["task"] .= "\subsubsection{End Date}\n";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataProjectCharter[0]->end_date))) . "\n";

			$file["task"] .= "\subsubsection{Project Purpose}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_purpose) . "\n";

			$file["task"] .= "\subsubsection{Measurable Project Objectives}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_objective) . "\n";

			$file["task"] .= "\subsubsection{Key Benefits}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->benefits) . "\n";

			$file["task"] .= "\subsubsection{High-Level Requirements}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->high_level_requirements) . "\n";

			$file["task"] .= "\subsubsection{Boundaries}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->boundaries) . "\n";

			$file["task"] .= "\subsubsection{Overall Project Risk}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->high_level_risks) . "\n";

			$file["task"] .= "\subsubsection{Summary Milestone Schedule}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->summary_schedule) . "\n";

			$file["task"] .= "\subsubsection{Preapproved Financial Resources}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->budge_summary) . "\n";

			$file["task"] .= "\subsubsection{Project Approval Requirements}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->project_approval_requirements) . "\n";

			$file["task"] .= "\subsubsection{Success Criteria}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->success_criteria) . "\n";

			$file["task"] .= "\subsubsection{Project Exit Criteria}\n";
			$file["task"] .= $this->verificaDados($dataProjectCharter[0]->exit_criteria) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"] .= "% \section{Project Charter}\n";
			$file["task"] .= "% No record found";

			return $file;
		}
	}

	public function BC_Overleaf($project_id)
	{
		$dataBusinessCase = $this->Business_case_model->get($project_id);
		$file["name_task"] = "BusinessCase.tex";
		if ($dataBusinessCase != null) {
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
			$file["task"] = "\n";
			$file["task"] .= "% \section{Business Case}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function BMP_Overleaf($project_id)
	{
		$dataBMP = $this->Benefits_plan_model->get($project_id);
		$file["name_task"] = "BenefitsManagementPlan.tex";
		if ($dataBMP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Benefits Management Plan}\n";

			$file["task"] .= "\subsubsection{Target Benefits}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->target_benefits) . "\n";

			$file["task"] .= "\subsubsection{Strategic Alignment}";
			$file["task"] .= $this->verificaDados($dataBMP[0]->strategic_alignment) . "\n";

			$file["task"] .= "\subsubsection{Schedule for Benefits}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->schedule_benefit) . "\n";

			$file["task"] .= "\subsubsection{Benefits Owner}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->benefits_owner) . "\n";

			$file["task"] .= "\subsubsection{Indicators}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->indicators) . "\n";

			$file["task"] .= "\subsubsection{Premises}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->premises) . "\n";

			$file["task"] .= "\subsubsection{Risks}\n";
			$file["task"] .= $this->verificaDados($dataBMP[0]->risks) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"] .= "% \section{Benefits Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function ACL_Overleaf($project_id)
	{
		$dataACL = $this->Assumption_log_model->getAll($project_id);
		$file["name_task"] = "AssumptionLog.tex";

		if ($dataACL != null) {
			$file["task"] = "\n";
			$file["task"]  .= "\section{Assumption Log}\n";
			$file["task"]  .= "\begin{longtable}{ p{.15\\textwidth} | p{.85\\textwidth}}\n";
			$file["task"] .= "\bottomrule \n";
			$file["task"] .= "\\rowcolor{gray}\n";
			$file["task"] .= "\\textbf{Type} & \\textbf{Description} \\\ \n";
			$file["task"] .= "\hline \n";
			$count = 0;
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Assumption Log}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function PMP_Overleaf($project_id)
	{
		$dataPMP = $this->Project_management_model->get($project_id);
		$file["name_task"] = "ProjectManagementPlan.tex";
		if ($dataPMP != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Project Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function PPR_Overleaf($project_id)
	{
		$dataPPR = $this->Project_performance_report_model->getAll($project_id);
		$file["name_task"] = "ProjectPerformaceMonitoringReport.tex";
		if ($dataPPR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Performance and Monitoring Report}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataPPR as $data) {
				$file["task"] .= "\item \\textbf{Date of report}: " . $this->verificaDados(date("d/m/Y", strtotime($data->date))) . "\n";


				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Current Performance Analysis}: ";
				$file["task"] .= $this->verificaDados($data->current_performance_analysis) . "\n";

				$file["task"] .= "\item \\textbf{Forecasts as planned}: ";
				$file["task"] .= $this->verificaDados($data->planned_forecasts) . "\n";

				$file["task"] .= "\item \\textbf{Work Completed During the Period}: ";
				$file["task"] .= $this->verificaDados($data->work_completed_during_the_period) . "\n";

				$file["task"] .= "\item \\textbf{Forecasts Considering Currently Performance}: ";
				$file["task"] .= $this->verificaDados($data->forecasts_considering_current_performance) . "\n";

				$file["task"] .= "\item \\textbf{Current Risk Situation}: ";
				$file["task"] .= $this->verificaDados($data->current_risk_situation) . "\n";

				$file["task"] .= "\item \\textbf{Current Status of Issues}: ";
				$file["task"] .= $this->verificaDados($data->current_status_of_issues) . "\n";

				$file["task"] .= "\item \\textbf{Work to be Completed in the Next Period}: ";
				$file["task"] .= $this->verificaDados($data->work_to_be_completed_in_the_next_period) . "\n";

				$file["task"] .= "\item \\textbf{Summary of changes approved in the period}: ";
				$file["task"] .= $this->verificaDados($data->summary_of_changes) . "\n";

				$file["task"] .= "\item \\textbf{Earned Value Management}: ";
				$file["task"] .= $this->verificaDados($data->earned_value_management) . "\n";

				$file["task"] .= "\item \\textbf{Other relevant information}: ";
				$file["task"] .= $this->verificaDados($data->other_relevant_information) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Project Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function DS_Overleaf($project_id)
	{
		$dataDS = $this->Delivery_acceptance_term_model->getAll($project_id);
		$file["name_task"] = "DeliverableStatus.tex";
		if ($dataDS != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Deliverable Status}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataDS as $data) {

				$file["task"] .= "\item \\textbf{Validator Name}: " .  $this->verificaDados($data->validator_name) . " | \\textbf{Validation Date}: " . date("d/m/Y", strtotime($data->validation_date)) .  "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Role}: ";
				$file["task"] .=  $this->verificaDados($data->role) . "\n";

				$file["task"] .= "\item \\textbf{Function in the Project}: ";
				$file["task"] .= $this->verificaDados($data->function) . "\n";

				$file["task"] .= "\item \\textbf{Comments}: ";
				$file["task"] .= $this->verificaDados($data->comments) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"] .= "% \section{Deliverable Status}\n";
			$file["task"] .= "\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function WP_Overleaf($project_id)
	{
		$dataWP = $this->Work_performance_report_model->getAll($project_id);
		$stakeholder = $this->Stakeholder_model->getAll($project_id);
		$file["name_task"] = "WorkPerformanceReport.tex";

		if ($dataWP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Work Performance Reports}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataWP as $data) {
				foreach ($stakeholder as $s) {
					if ($s->stakeholder_id == $data->responsible) {
					}
					$file["task"] .= "\item \\textbf{Date}: " . $this->verificaDados(date("d/m/Y", strtotime($data->date))) . "\n";

					$file["task"] .= "\begin{itemize}\n";
					if ($s->stakeholder_id == $data->responsible) {
						$file["task"] .= "\item \\textbf{Responsible}: ";
						$file["task"] .= $this->verificaDados(getStakeholderName($data->responsible)) . "\n";
					}

					$file["task"] .= "\item \\textbf{Main activities in execution}: ";
					$file["task"] .= $this->verificaDados($data->main_activities) . "\n";

					$file["task"] .= "\item \\textbf{Upcoming activities to perform}: ";
					$file["task"] .= $this->verificaDados($data->next_activities) . "\n";

					$file["task"] .= "\item \\textbf{General Comments}: ";
					$file["task"] .= $this->verificaDados($data->comments) . "\n";

					$file["task"] .= "\item \\textbf{Issues}: ";
					$file["task"] .= $this->verificaDados($data->issues) . "\n";

					$file["task"] .= "\item \\textbf{Changes}: ";
					$file["task"] .= $this->verificaDados($data->changes) . "\n";

					$file["task"] .= "\item \\textbf{Risks}: ";
					$file["task"] .= $this->verificaDados($data->risks) . "\n";

					$file["task"] .= "\item \\textbf{Attention Points}: ";
					$file["task"] .= $this->verificaDados($data->attention_points) . "\n";

					$file["task"] .= "\\end{itemize}\n";
				}
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Work Performance Reports}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function IR_Overleaf($project_id)
	{
		$dataIR = $this->Issues_record_model->getAll($project_id);
		$file["name_task"] = "IssueRecord.tex";

		if ($dataIR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Issue Record}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataIR as $data) {
				$file["task"] .= "\item \\textbf{Identification Date}: " . $this->verificaDados(date("d/m/Y", strtotime($data->identification_date))) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Responsible for the Identifying}: ";
				$file["task"] .= $this->verificaDados($data->identification) . "\n";

				$file["task"] .= "\item \\textbf{Description of the Issue}: ";
				$file["task"] .= $this->verificaDados($data->question_description) . "\n";

				$file["task"] .= "\item \\textbf{Issue Type}: ";
				$file["task"] .= $this->verificaDados($data->type) . "\n";

				$file["task"] .= "\item \\textbf{Issue Responsible}: ";
				$file["task"] .= $this->verificaDados($data->responsable) . "\n";

				$file["task"] .= "\item \\textbf{Situation}: ";
				$file["task"] .= $this->verificaDados($data->situation) . "\n";

				$file["task"] .= "\item \\textbf{Required Action}: ";
				$file["task"] .= $this->verificaDados($data->action) . "\n";

				$file["task"] .= "\item \\textbf{Planned Resolution Date}: ";
				$file["task"] .= $this->verificaDados(date('d/m/Y', strtotime($data->resolution_date))) . "\n";

				$file["task"] .= "\item \\textbf{Reorganized Resolution Date}: ";
				$file["task"] .= $this->verificaDados(date('d/m/Y', strtotime($data->replan_date))) . "\n";

				$file["task"] .= "\item \\textbf{Comments}: ";
				$file["task"] .= $this->verificaDados($data->observations) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Issue Record}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function LLR_Overleaf($project_id)
	{
		$dataLLR = $this->Lesson_learned_register_model->getAll($project_id);
		$file["name_task"] = "LessonLearnedRegister.tex";
		if ($dataLLR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Lesson Learned Register}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataLLR as $data) {

				$file["task"] .= "\item \\textbf{Identification Date}: " . date("d/m/Y", strtotime($data->date)) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Stakeholder Who Identified}: ";
				$file["task"] .=  $this->verificaDados($data->stakeholder) . "\n";

				$file["task"] .= "\item \\textbf{Situation Description}: ";
				$file["task"] .=  $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\item \\textbf{Category}: ";
				$file["task"] .=  $this->verificaDados($data->category) . "\n";

				$file["task"] .= "\item \\textbf{Who Could Be Interested}: ";
				$file["task"] .= $this->verificaDados($data->interested) . "\n";

				$file["task"] .= "\item \\textbf{Status}: ";
				$file["task"] .= $this->verificaDados($data->status) . "\n";

				$file["task"] .= "\item \\textbf{Impact}: ";
				$file["task"] .= $this->verificaDados($data->impact) . "\n";

				$file["task"] .= "\item \\textbf{Recommendations}: ";
				$file["task"] .= $this->verificaDados($data->recommendations) . "\n";

				$file["task"] .= "\item \\textbf{Associated Life Cycle Stage}: ";
				$file["task"] .= $this->verificaDados($data->life_cycle) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Lesson Learned Register}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function CR_Overleaf($project_id)
	{
		$dataIR = $this->Change_request_model->getAll($project_id);
		$stakeholder = $this->Stakeholder_model->getAll($project_id);
		$file["name_task"] = "ChangeRequest.tex";

		if ($dataIR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Change Request}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataIR as $data) {
				foreach ($stakeholder as $s) {


					$file["task"] .= "\item \\textbf{Request Date}: " . $this->verificaDados(date("d/m/Y", strtotime($data->request_date))) . "\n";

					$file["task"] .= "\begin{itemize}\n";

					if ($s->stakeholder_id == $data->requester) {

						$file["task"] .= "\item \\textbf{Requester}: ";
						$file["task"] .= $this->verificaDados(getStakeholderName($data->requester)) . "\n";
					}

					$file["task"] .= "\item \\textbf{Id}: ";
					$file["task"] .= $this->verificaDados($data->number_id) . "\n";

					$file["task"] .= "\item \\textbf{Type of change}: ";
					$file["task"] .= $this->verificaDados($data->type) . "\n";

					$file["task"] .= "\item \\textbf{Status/Situation}: ";
					$file["task"] .= $this->verificaDados($data->status) . "\n";

					$file["task"] .= "\item \\textbf{Date of Opinion of the CCB}: ";
					$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($data->committee_date))) . "\n";

					$file["task"] .= "\item \\textbf{Description of Change}: ";
					$file["task"] .= $this->verificaDados($data->description) . "\n";

					$file["task"] .= "\item \\textbf{Impacted Knowledge Areas}: ";
					$file["task"] .= $this->verificaDados($data->impacted_areas) . "\n";

					$file["task"] .= "\item \\textbf{Impacted Deliveries/Documents}: ";
					$file["task"] .= $this->verificaDados($data->impacted_docs) . "\n";

					$file["task"] .= "\item \\textbf{Justification}: ";
					$file["task"] .= $this->verificaDados($data->justification) . "\n";

					$file["task"] .= "\item \\textbf{Additional Comments}: ";
					$file["task"] .= $this->verificaDados($data->comments) . "\n";

					$file["task"] .= "\item \\textbf{Opinion of the CCB}: ";
					$file["task"] .= $this->verificaDados($data->committee_opinion) . "\n";

					$file["task"] .= "\item \\textbf{Opinion of Project Manager}: ";
					$file["task"] .= $this->verificaDados($data->manager_opinion) . "\n";

					$file["task"] .= "\\end{itemize}\n";
				}
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Change Request}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function CL_Overleaf($project_id)
	{
		$dataCL = $this->Change_request_model->getAll($project_id);
		$file["name_task"] = "ChangeLog.tex";
		if ($dataCL != null) {

			$file["task"] = "\n";
			$file["task"] .= "\section{Change Log}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataCL as $data) {
				if ($data->log != 0) {
					$file["task"] .= "\item \\textbf{Request Date}: " .  $this->verificaDados(date("d/m/Y", strtotime($data->request_date))) . "\n";

					$file["task"] .= "\begin{itemize}\n";


					$file["task"] .= "\item \\textbf{Id}: " .  $this->verificaDados($data->number_id) . " | \\textbf{Requester}: " .  $this->verificaDados($data->requester) . "\n";
					$file["task"] .= "\item \\textbf{Type of change}: " . $this->verificaDados($data->type) . "\n";
					$file["task"] .= "\item \\textbf{Status/Situation}: " .  $this->verificaDados($data->status) . "\n";
					$file["task"] .= "\\end{itemize}\n";
				}
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Change Log}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function TEP_Overleaf($project_id)
	{
		$dataTEP = $this->Project_Closure_model->get($project_id);
		$file["name_task"] = "ProjectClosureReport.tex";
		if ($dataTEP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Project Closure Report}\n";

			$file["task"] .= "\subsubsection{Client}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->client) . "\n";

			$file["task"] .= "\subsubsection{Date of project closure}\n";
			$file["task"] .= $this->verificaDados(date("d/m/Y", strtotime($dataTEP[0]->project_closure_date))) . "\n";

			$file["task"] .= "\subsubsection{Main changes approved}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_changes_approved) . "\n";

			$file["task"] .= "\subsubsection{Main lessons learned}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_lessons_learned) . "\n";

			$file["task"] .= "\subsubsection{Main deviations}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->main_deviations) . "\n";

			$file["task"] .= "\subsubsection{Customer comments}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->client_comments) . "\n";

			$file["task"] .= "\subsubsection{Sponsor's comments}\n";
			$file["task"] .= $this->verificaDados($dataTEP[0]->sponsor_comments) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Project Closure Report}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function FR_Overleaf($project_id)
	{
		$data['final_report'] = $this->Final_report_model->get($project_id);
		$file["name_task"] = "FinalReport.tex";
		if ($data['final_report'] != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Final Report}\n";

			$file["task"] .= "\subsubsection{Summary Level Description of the Project or Phase}\n";

			$file["task"] .= $this->verificaDados($data['final_report']['description']) . "\n";

			$file["task"] .= "\subsubsection{Scope Objectives, Scope Criteria, and Evidences}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['scope_objectives']) . "\n";

			$file["task"] .= "\subsubsection{Quality Objectives}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['quality_objectives']) . "\n";

			$file["task"] .= "\subsubsection{Cost Objectives}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['cost_objectives']) . "\n";

			$file["task"] .= "\subsubsection{Schedule Objectives}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['schedule_objectives']) . "\n";

			$file["task"] .= "\subsubsection{Summary of the Validation Information for the Results}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['summary_validation']) . "\n";

			$file["task"] .= "\subsubsection{Summary of Results Achieved the Business Needs}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['summary_results']) . "\n";

			$file["task"] .= "\subsubsection{Summary Risks or Issues}\n";
			$file["task"] .= $this->verificaDados($data['final_report']['summary_risks']) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Final Report}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Scope
	public function RMP_Overleaf($project_id) // 1 1
	{
		$dataRMP = $this->Requirements_mp_model->get($project_id);
		$file["name_task"] = "RequirementsManagementPlan.tex";
		if ($dataRMP  != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Requirements Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function SCOMP_Overleaf($project_id) // 1 1
	{
		$dataSCOMP = $this->Scope_mp_model->get($project_id);
		$file["name_task"] = "ScopeManagementPlan.tex";
		if ($dataSCOMP  != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Scope Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function RD_Overleaf($project_id)
	{
		$dataRD = $this->Requirement_registration_model->getAll($project_id);
		$file["name_task"] = "RequirementDocumentation.tex";
		if ($dataRD != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Requirement Documentation}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataRD as $data) {

				$file["task"] .= "\item \\textbf{Requirement Description}: " .  $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Associated Id}:\n";
				$file["task"] .= $this->verificaDados($data->associated_id) . "\n";

				$file["task"] .= "\item \\textbf{Business needs, opportunities, goals and objectives}:\n";
				$file["task"] .= $this->verificaDados($data->business_strategy) . "\n";

				$file["task"] .= "\item \\textbf{Version}:\n";
				$file["task"] .= $this->verificaDados($data->version) . "\n";

				$file["task"] .= "\item \\textbf{Phase}:\n";
				$file["task"] .= $this->verificaDados($data->phase) . "\n";

				$file["task"] .= "\item \\textbf{Associated Delivery}:\n";
				$file["task"] .= $this->verificaDados($data->associated_delivery) . "\n";

				$file["task"] .= "\item \\textbf{Type}:\n";
				$file["task"] .= $this->verificaDados($data->type) . "\n";

				$file["task"] .= "\item \\textbf{Requester}:\n";
				$file["task"] .= $this->verificaDados($data->requester) . "\n";

				$file["task"] .= "\item \\textbf{Complexity}:\n";
				$file["task"] .= $this->verificaDados($data->complexity) . "\n";

				$file["task"] .= "\item \\textbf{Responsible}:\n";
				$file["task"] .= $this->verificaDados($data->responsible) . "\n";

				$file["task"] .= "\item \\textbf{Validity}:\n";
				$file["task"] .= $this->verificaDados($data->validity) . "\n";

				$file["task"] .= "\item \\textbf{Priority}:\n";
				$file["task"] .= $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\item \\textbf{Acceptance Criteria}:\n";
				$file["task"] .= $this->verificaDados($data->acceptance_criteria) . "\n";

				$file["task"] .= "\item \\textbf{Supporting Documentation}:\n";
				$file["task"] .= $this->verificaDados($data->supporting_documentation) . "\n";

				$file["task"] .= "\item \\textbf{Requirement Situation}:\n";
				$file["task"] .= $this->verificaDados($data->requirement_situation) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Requirement Documentation}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function SSP_Overleaf($project_id) // 1 1
	{
		$dataSSP = $this->Scope_specification_model->get($project_id);
		$file["name_task"] = "ScopeSpecification.tex";
		if ($dataSSP  != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Project Scope Statement}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Schedule
	public function SMP_Overleaf($project_id) // 1 1
	{
		$dataSMP = $this->Schedule_model->get($project_id);
		$file["name_task"] = "ScheduleManagementPlan.tex";
		if ($dataSMP  != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Schedule Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function AL_Overleaf($project_id)
	{
		$dataAL = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ActivityList.tex";
		if ($dataAL != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Activity List}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataAL as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Project Phase}:\n";
				$file["task"] .= $this->verificaDados($data->project_phase) . "\n";

				$file["task"] .= "\item \\textbf{Description}:\n";
				$file["task"] .= $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\item \\textbf{Milestone}:\n";
				$file["task"] .= $this->verificaDados($data->milestone) . "\n";

				$file["task"] .= "\item \\textbf{Activity Label}:\n";
				$file["task"] .= $this->verificaDados($data->associated_id) . "\n";

				$file["task"] .= "\item \\textbf{WBS Id}:\n";
				$file["task"] .= $this->verificaDados($data->wbs_id) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Earned Value Management}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function EVM_Overleaf($project_id)
	{
		$dataEVM = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "EarnedValueManagement.tex";
		if ($dataEVM != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Earned Value Management}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataEVM as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{EV-Earned Value}:\n";
				$file["task"] .= $this->verificaDados($data->agregate_value) . "\n";

				$file["task"] .= "\item \\textbf{PV-Planned Value}:\n";
				$file["task"] .= $this->verificaDados($data->planned_value) . "\n";

				$file["task"] .= "\item \\textbf{SV-Schedule Variance}:\n";
				$file["task"] .= $this->verificaDados($data->variation_of_terms) . "\n";

				$file["task"] .= "\item \\textbf{CV-Cost Variance}:\n";
				$file["task"] .= $this->verificaDados($data->variation_of_costs) . "\n";

				$file["task"] .= "\item \\textbf{Variation at the end}:\n";
				$file["task"] .= $this->verificaDados($data->variation_at_the_end) . "\n";

				$file["task"] .= "\item \\textbf{ETC-Estimate To Complete}:\n";
				$file["task"] .= $this->verificaDados($data->estimate_for_completion) . "\n";

				$file["task"] .= "\item \\textbf{AC-Actual Cost}:\n";
				$file["task"] .= $this->verificaDados($data->real_agregate_cost) . "\n";

				$file["task"] .= "\item \\textbf{Budget at Cumulative Cost}:\n";
				$file["task"] .= $this->verificaDados($data->budget_at_cumulative_end) . "\n";

				$file["task"] .= "\item \\textbf{SPI-Schedule Performance Index}:\n";
				$file["task"] .= $this->verificaDados($data->deadline_performance_index) . "\n";

				$file["task"] .= "\item \\textbf{Costs Performance Index }:\n";
				$file["task"] .= $this->verificaDados($data->costs_performance_index) . "\n";

				$file["task"] .= "\item \\textbf{EAC-Estimate At Completion}:\n";
				$file["task"] .= $this->verificaDados($data->estimated_of_completation) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Earned Value Management}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function SND_Overleaf($project_id)
	{
		$dataSND = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ScheduleNetworkDiagram.tex";
		if ($dataSND != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Schedule Network Diagram}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataSND as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " | \\textbf{Predecessor Activity}: " .  $this->verificaDados($data->predecessor_activity) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Predecessor Activity}:\n";
				$file["task"] .= $this->verificaDados($data->predecessor_activity) . "\n";

				$file["task"] .= "\item \\textbf{Dependence Type}:\n";
				$file["task"] .= $this->verificaDados($data->dependence_type) . "\n";

				$file["task"] .= "\item \\textbf{Antecipation}:\n";
				$file["task"] .= $this->verificaDados($data->anticipation) . "\n";

				$file["task"] .= "\item \\textbf{Wait}:\n";
				$file["task"] .= $this->verificaDados($data->wait) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Schedule Network Diagram}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function RR_Overleaf($project_id)
	{
		$dataSND = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ResourceRequirements.tex";
		if ($dataSND != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Resource Requirements}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataSND as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " | \\textbf{Resource Description}: " .  $this->verificaDados($data->resource_description) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Resource Description}:\n";
				$file["task"] .= $this->verificaDados($data->resource_description) . "\n";

				$file["task"] .= "\item \\textbf{Required Amount of Resource}:\n";
				$file["task"] .= $this->verificaDados($data->required_amount_of_resource) . "\n";

				$file["task"] .= "\item \\textbf{Resource Cost per Unit}:\n";
				$file["task"] .= $this->verificaDados($data->resource_cost_per_unit) . "\n";

				$file["task"] .= "\item \\textbf{Resource Type}:\n";
				$file["task"] .= $this->verificaDados($data->resource_type) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Resource Requirements}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function ADE_Overleaf($project_id)
	{
		$dataADE = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "ActivityDurationEstimates.tex";
		if ($dataADE != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Activity Duration Estimates}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataADE as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " \n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Estimated Duration in Hours}: " .  $this->verificaDados($data->estimated_duration) . " | \\textbf{Performed Duration in Hours}: " .  $this->verificaDados($data->performed_duration) . "\n";
				$file["task"] .= "\item \\textbf{Estimated Start Date}: " . $this->verificaDados($data->estimated_start_date) . " | \\textbf{Performed Start Date}: " .  $this->verificaDados($data->performed_start_date) . "\n";
				$file["task"] .= "\item \\textbf{Estimated End Date}: " . $this->verificaDados($data->estimated_end_date) . " | \\textbf{Performed End Date}: " .  $this->verificaDados($data->performed_end_date) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Activity Duration Estimates}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function SC_Overleaf($project_id)
	{
		$activityIds = $this->Activity_model->getAllActivityIdsPerProject($project_id);
		$allCalendars = array();
		
		foreach($activityIds as $activity){
			$calendars = $this->ProjectCalendars_model->getAllByActivityId($activity->id);
			foreach ($calendars as $calendar) {
				array_push($allCalendars, $calendar);
			}
		}
		$file["name_task"] = "StakeholderCalendars.tex";
		if ($allCalendars != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Stakeholder Calendars}\n";
			$file["task"] .= "\begin{itemize}\n";

			foreach ($allCalendars as $data) {
				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . " \n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Stakeholder}: " .  $this->verificaDados($data->name) . "\n";
				$file["task"] .= "\item \\textbf{Allocation Start}: " . $this->verificaDados($data->allocation_start) . " | \\textbf{Allocation Ends}: " .  $this->verificaDados($data->allocation_ends) . "\n";


				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{ProjectCalendars}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Cost
	public function CMP_Overleaf($project_id)
	{
		$dataCostMP = $this->Cost_model->get($project_id);
		$file["name_task"] = "CostManagementPlan.tex";
		if ($dataCostMP != null) {
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Cost Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}



	public function CE_Overleaf($project_id)
	{
		$dataCE = $this->Activity_model->getAll($project_id);
		$file["name_task"] = "CostEstimates.tex";
		if ($dataCE != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Cost Estimates}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataCE as $data) {

				$file["task"] .= "\item \\textbf{Activity Name}: " .  $this->verificaDados($data->activity_name) . "\n";


				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Estimated Cost}: " .  $this->verificaDados($data->estimated_cost) . " | \\textbf{Cumulative Estimated Cost}: " .  $this->verificaDados($data->cumulative_estimated_cost) . " | \\textbf{Replanted Cost}: " . $this->verificaDados($data->replanted_cost) . "\n";
				$file["task"] .= "\item \\textbf{Contingency Reserve}: " .  $this->verificaDados($data->contingency_reserve) . " | \\textbf{Sum of Work Packages}: " .  $this->verificaDados($data->sum_of_work_packages) . " | \\textbf{Contingency Reserve of Packages}: " . $this->verificaDados($data->contingency_reserve_of_packages) . "\n";
				$file["task"] .= "\item \\textbf{Baseline}: " .  $this->verificaDados($data->baseline) . " | \\textbf{Budget}: " .  $this->verificaDados($data->budget) . " | \\textbf{Cumulative Replanted Cost}: " . $this->verificaDados($data->cumulative_replanted_cost) . "\n";
				$file["task"] .= "\item \\textbf{Real Cost}: " . $this->verificaDados($data->real_cost) . " | \\textbf{Cumulative Real Cost}: " . $this->verificaDados($data->cumulative_real_cost) . "\n";
				$file["task"] .= "\item \\textbf{Management Reserve}: " . $this->verificaDados($data->reserve) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Cost Estimates}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Quality
	public function QMP_Overleaf($project_id)
	{
		$dataQualityMP = $this->Quality_model->get($project_id);
		$file["name_task"] = "QualityManagementPlan.tex";
		if ($dataQualityMP != null) {
			$file["task"] = "\n";
			$file["task"]  .= "\section{Quality Management Plan}\n";

			$file["task"]  .= "\subsubsection{Quality Standards that will be used by the Project}\n";
			$file["task"]  .= $this->verificaDados($dataQualityMP[0]->standards) . "\n";

			$file["task"]  .= "\subsubsection{" . $this->lang->line('qmp_objectives') . "}\n";
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
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Quality Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function QC_Overleaf($project_id)
	{
		$dataQC = $this->QualityChecklist_model->getAll($project_id);
		$dataQCItems = $this->QualityChecklist_model->getAllItens($project_id);
		$file["name_task"] = "QualityChecklist.tex";
		if ($dataQC != null) {
			$file["task"] = "\n";
			$file["task"]  .= "\section{Quality Checklist}\n";
			foreach ($dataQC as $data) {


				$file .= "\subsection{Quality Checklist " . $this->verificaDados($data->date) . "}\n";

				$file .= "\subsubsection{Verified Product, Process or Activity}\n";
				$file .= $this->verificaDados($data->verified) . "\n";

				$file .= "\subsubsection{Responsible for Verification}\n";
				$file .= $this->verificaDados($data->responsible) . "\n";

				$file .= "\subsubsection{Associated Documents}\n";
				$file .= $this->verificaDados($data->documents) . "\n";

				$file .= "\subsubsection{Guidelines/Comments}\n";
				$file .= $this->verificaDados($data->guidelines) . "n";


				$file["task"]  .= "\begin{longtable}{ p{.20\textwidth} | p{.50\textwidth} | p{.20\textwidth}}\n";
				$file["task"] .= "\bottomrule \n";
				$file["task"] .= "\\rowcolor{gray}\n";
				$file["task"] .= "\\textbf{Items to Check} & \\textbf{Comments} & \\textbf{Status} \\\ \n";
				$file["task"] .= "\hline \n";
				$count = 0;
				foreach ($dataQCItems as $items) {
					if ($count % 2 != 0) {
						$file["task"] .= "\\rowcolor{white}\n";
					} else {
						$file["task"] .= "\\rowcolor{lightgray}\n";
					}
					$count++;
					$tempStatus = $this->verificaDados($data->status);
					if ($tempStatus == 0) {
						$tempStatus = "No Ok";
					} else if ($tempStatus == 1) {
						$tempStatus = "Partially Ok";
					} else if ($tempStatus == 2) {
						$tempStatus = "Ok";
					} else {
						$tempStatus;
					}

					$file["task"] .= $this->verificaDados($items->item_check) . " & " . $this->verificaDados($items->comments) . " & " . $tempStatus . "\\\ \n";

					$file["task"] .= "\hline \n";
				}
				$file["task"]  .= "\\toprule \n";
				$file["task"] .= "\caption{Assumption Log} \n";
				$file["task"] .= "\label{tab:AssumptionLog} \n";
				$file["task"] .= "\\end{longtable} \n";

				return $file;
			}
		} else {
			return null;
		}
		$file["task"] = "\n";
		$file["task"]  .= "% \section{Quality Checklist}\n";
		$file["task"] .= "% No record found";
		return $file;
	}


	public function QR_Overleaf($project_id)
	{
		$dataQR = $this->Quality_reports_model->getAll($project_id);
		$file["name_task"] = "QualityReports.tex";
		if ($dataQR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{QualityReports}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataQR as $data) {

				$file["task"] .= "\item  \\textbf{Date}: " . $this->verificaDados(date('d/m/Y', strtotime($data->date))) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Responsible}:\n";
				$file["task"] .= $this->verificaDados($data->responsible) . "\n";

				$file["task"] .= "\item \\textbf{Type of Report}:\n";
				$file["task"] .= $this->verificaDados($data->type) . "\n";

				$file["task"] .= "\item \\textbf{Description of what was Identified}:\n";
				$file["task"] .= $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\item \\textbf{Identifier}:\n";
				$file["task"] .= $this->verificaDados($data->identifier) . "\n";

				$file["task"] .= "\item \\textbf{Impacted Areas}:\n";
				$file["task"] .= $this->verificaDados($data->areas) . "\n";

				$file["task"] .= "\item \\textbf{Deliveries / Documents Impacted}:\n";
				$file["task"] .= $this->verificaDados($data->deliveries) . "\n";

				$file["task"] .= "\item \\textbf{Recommendations for Improvement}:\n";
				$file["task"] .= $this->verificaDados($data->recommendations) . "\n";

				$file["task"] .= "\item \\textbf{Corrective Actions Recommendations}:\n";
				$file["task"] .= $this->verificaDados($data->corrective_actions) . "\n";

				$file["task"] .= "\item \\textbf{Project Manager's Opinion}:\n";
				$file["task"] .= $this->verificaDados($data->manager_opinion) . "\n";

				$file["task"] .= "\item \\textbf{Conclusions}:\n";
				$file["task"] .= $this->verificaDados($data->conclusions) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{QualityReports}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	//Resources 
	public function REMP_Overleaf($project_id) // 1 1
	{
		$dataREMP = $this->Human_resource_model->get($project_id);
		$file["name_task"] = "ResourcesManagementPlan.tex";
		if ($dataREMP  != null) {
			$file["task"] = "\n";
			$file["task"]  .= "\section{Resources Management Plan}\n";

			$file["task"]  .= "\subsubsection{Roles and Responsibilities}\n";
			$file["task"]  .= $this->verificaDados($dataREMP[0]->roles_responsibilities) . "\n";

			$file["task"]  .= "\subsubsection{Project Organization Charts}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->organizational_chart) . "\n";

			$file["task"]  .= "\subsubsection{Team Development}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->staff_mp) . "\n";

			$file["task"]  .= "\subsubsection{Identification of Resources}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->Identification_resources) . "\n";

			$file["task"]  .= "\subsubsection{Acquiring Resources}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->acquiring_resources) . "\n";

			$file["task"]  .= "\subsubsection{Project Team Resource Management}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->team_development) . "\n";

			$file["task"]  .= "\subsubsection{Training}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->training) . "\n";

			$file["task"]  .= "\subsubsection{Resource Control}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->control) . "\n";

			$file["task"]  .= "\subsubsection{Recognition Plan}\n";
			$file["task"]  .=  $this->verificaDados($dataREMP[0]->recognition_plan) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Resources Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function EVAL_Overleaf($project_id)
	{
		$dataEVAL = $this->Team_Performance_Evaluation_model->getAll($project_id);
		$file["name_task"] = "TeamPerformanceEvaluation.tex";
		if ($dataEVAL != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Team Performance Evaluation}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataEVAL as $data) {

				$file["task"] .= "\item \\textbf{Team Member Name}: " .  $this->verificaDados($data->team_member_name) . " | \\textbf{Evaluation Date}: " . $this->verificaDados(date('d/m/Y', strtotime($data->report_date))) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Function in the Project}:\n";
				$file["task"] .= $this->verificaDados($data->project_function) . "\n";

				$file["task"] .= "\item \\textbf{Job Role}:\n";
				$file["task"] .= $this->verificaDados($data->role) . "\n";

				$file["task"] .= "\item \\textbf{Review Evaluation}:\n";
				$file["task"] .= $this->verificaDados($data->team_member_comments) . "\n";

				$file["task"] .= "\item \\textbf{Strong points }:\n";
				$file["task"] .= $this->verificaDados($data->strong_points) . "\n";

				$file["task"] .= "\item \\textbf{Opportunities for improvement}:\n";
				$file["task"] .= $this->verificaDados($data->improvement) . "\n";

				$file["task"] .= "\item \\textbf{Development plan}:\n";
				$file["task"] .= $this->verificaDados($data->development_plan) . "\n";

				$file["task"] .= "\item \\textbf{Already developed}:\n";
				$file["task"] .= $this->verificaDados($data->already_developed) . "\n";

				$file["task"] .= "\item \\textbf{Comments external to the project tea}:\n";
				$file["task"] .= $this->verificaDados($data->external_comments) . "\n";

				$file["task"] .= "\item \\textbf{Team mates comments}:\n";
				$file["task"] .= $this->verificaDados($data->team_mates_comments) . "\n";

				$file["task"] .= "\item \\textbf{Evaluator Comments}:\n";
				$file["task"] .= $this->verificaDados($data->team_performance_evaluationcol) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Team Performance Evaluation}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Communications
	public function COMP_Overleaf($project_id)
	{

		$dataCOMP = $this->communications_mp_model->getAll($project_id);
		$file["name_task"] = "CommunicationsManagementPlan.tex";
		if ($dataCOMP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Communications Management Plan}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataCOMP as $data) {

				$file["task"] .= "\item \\textbf{Name}: " . $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Type}:\n";
				$file["task"] .= $this->verificaDados($data->type) . "\n";

				$file["task"] .= "\item \\textbf{Content}:\n";
				$file["task"] .= $this->verificaDados($data->content) . "\n";

				$file["task"] .= "\item \\textbf{Distribution Reason}:\n";
				$file["task"] .= $this->verificaDados($data->distribution_reason) . "\n";

				$file["task"] .= "\item \\textbf{Language}:\n";
				$file["task"] .= $this->verificaDados($data->language) . "\n";

				$file["task"] .= "\item \\textbf{Channel}:\n";
				$file["task"] .= $this->verificaDados($data->channel) . "\n";

				$file["task"] .= "\item \\textbf{Document Format}:\n";
				$file["task"] .= $this->verificaDados($data->document_format) . "\n";

				$file["task"] .= "\item \\textbf{Method}:\n";
				$file["task"] .= $this->verificaDados($data->method) . "\n";

				$file["task"] .= "\item \\textbf{Frequency}:\n";
				$file["task"] .= $this->verificaDados($data->frequency) . "\n";

				$file["task"] .= "\item \\textbf{Allocated Resources}:\n";
				$file["task"] .= $this->verificaDados($data->allocated_resources) . "\n";

				$file["task"] .= "\item \\textbf{Format}:\n";
				$file["task"] .= $this->verificaDados($data->format) . "\n";

				$file["task"] .= "\item \\textbf{Local}:\n";
				$file["task"] .= $this->verificaDados($data->local) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Communications Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}

		// Stakeholder Responsabilities
		// $dataACL = $this->Assumption_log_model->getAll($project_id);
		// $file2["name_task"] = "AssumptionLog.tex";

		// if ($dataACL != null) {
		// 	$file2["task"] = "\n";
		// 	$file2["task"]  .= "\section{Stakeholders Responsabilities}\n";
		// 	$file2["task"]  .= "\begin{longtable}{ p{.15\\textwidth} | p{.85\\textwidth}}\n";
		// 	$file2["task"] .= "\bottomrule \n";
		// 	$file2["task"] .= "\\rowcolor{gray}\n";
		// 	$file2["task"] .= "\\textbf{Type} & \\textbf{Description} \\\ \n";
		// 	$file2["task"] .= "\hline \n";
		// 	$count = 0;


		// 	foreach ($dataACL as $data2) {
		// 		if ($count % 2 != 0) {
		// 			$file2["task"] .= "\\rowcolor{white}\n";
		// 		} else {
		// 			$file2["task"] .= "\\rowcolor{lightgray}\n";
		// 		}
		// 		$count++;
		// 		$temp = $this->verificaDados($data2->type);
		// 		if ($temp == "A") {
		// 			$temp = "Assumption";
		// 		} else if ($temp == "C") {
		// 			$temp = "Constraint";
		// 		}

		// 		$file2["task"] .= $temp . " & " . $this->verificaDados($data2->description_log) . " \\\ \n";

		// 		$file["task"] .= "\hline \n";
		// 	}
		// 	$file2["task"]  .= "\\toprule \n";
		// 	$file2["task"] .= "\caption{Stakeholders Responsabilities} \n";
		// 	$file2["task"] .= "\label{tab:Stakeholders Responsabilities} \n";
		// 	$file2["task"] .= "\\end{longtable} \n";

		// 	return $file2;
		// } else {
		// 	$file2["task"] = "\n";
		// 	$file2["task"]  .= "% \section{Stakeholders Responsabilities}\n";
		// 	$file2["task"] .= "% No record found";
		// 	return $file2;
		// }
	}


	// Risk
	public function RIMP_Overleaf($project_id)
	{
		$dataRIMP = $this->Risk_mp_model->get($project_id);
		$file["name_task"] = "RiskManagementPlan.tex";
		if ($dataRIMP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Risk Management Plan}\n";

			$file["task"] .= "\subsubsection{Methodology}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->methodology) . "\n";

			$file["task"] .= "\subsubsection{Roles and Responsibilities}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->roles_responsibilities) . "\n";

			$file["task"] .= "\subsubsection{Probability and Impact Matrix}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->probability_impact_matrix) . "\n";

			$file["task"] .= "\subsubsection{Risks Categories}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->risks_categories) . "\n";

			$file["task"] .= "\subsubsection{Risk Strategy}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->reviewed_tolerances) . "\n";

			$file["task"] .= "\subsubsection{Tracking}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->traceability) . "\n";

			$file["task"] .= "\subsubsection{Funding}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->funding) . "\n";

			$file["task"] .= "\subsubsection{Timing}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->timing) . "\n";

			$file["task"] .= "\subsubsection{Stakeholder Risk Appetite}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->stakeholder_risk) . "\n";

			$file["task"] .= "\subsubsection{Definitions of Risk Probability and Impacts}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->definitions_risk) . "\n";

			$file["task"] .= "\subsubsection{Reporting Formats}\n";
			$file["task"] .= $this->verificaDados($dataRIMP[0]->format_report) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Risk Management Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function RIR_Overleaf($project_id)
	{
		$dataRIR = $this->Risk_model->getAll($project_id);
		$file["name_task"] = "RiskRegister.tex";
		if ($dataRIR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Risk Register}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataRIR as $data) {
				$temp = $data->priority;

				if (strcmp($temp, '0') === 0) {
					$temp = "Low";
				} else if (strcmp($temp, '1') === 0) {
					$temp = "Medium";
				} else if (strcmp($temp, '2') === 0) {
					$temp = "High";
				} else {
					$temp;
				}

				$file["task"] .= "\item \\textbf{Identification Date}: " . $this->verificaDados(date('d/m/Y', strtotime($data->event))) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Impacted Objective}:\n";
				$file["task"] .= $this->verificaDados($data->impacted_objective) . "\n";

				$file["task"] .= "\item \\textbf{Priority}:\n";
				$file["task"] .= $this->verificaDados($temp) . "\n";

				$file["task"] .= "\item \\textbf{Event}:\n";
				$file["task"] .= $this->verificaDados($data->event) . "\n";

				$file["task"] .= "\item \\textbf{Current Risk Status}:\n";
				$file["task"] .= $this->verificaDados($data->risk_status) . "\n";

				$file["task"] .= "\item \\textbf{Identifier}:\n";
				$file["task"] .= $this->verificaDados($data->identifier) . "\n";

				$file["task"] .= "\item \\textbf{Risk Type}:\n";
				$file["task"] .= $this->verificaDados($data->type) . "\n";

				$file["task"] .= "\item \\textbf{Lessons Learned}:\n";
				$file["task"] .= $this->verificaDados($data->lessons) . "\n";

				$file["task"] .= "\item \\textbf{Risk Category}:\n";
				$file["task"] .= $this->verificaDados($data->category) . "\n";

				$file["task"] .= "\item \\textbf{Fallback Plans}:\n";
				$file["task"] .= $this->verificaDados($data->fallback) . "\n";

				$file["task"] .= "\item \\textbf{Contingency Plans Owner}:\n";
				$file["task"] .= $this->verificaDados($data->contingency_owner) . "\n";

				$file["task"] .= "\item \\textbf{Contingency Plans}:\n";
				$file["task"] .= $this->verificaDados($data->contingency) . "\n";

				$file["task"] .= "\item \\textbf{Secondary Risks}:\n";
				$file["task"] .= $this->verificaDados($data->secondary) . "\n";

				$file["task"] .= "\item \\textbf{Residual Risks}:\n";
				$file["task"] .= $this->verificaDados($data->residual) . "\n";

				$file["task"] .= "\item \\textbf{Timing Information}:\n";
				$file["task"] .= $this->verificaDados($data->timing) . "\n";

				$file["task"] .= "\item \\textbf{Potential risk owners}:\n";
				$file["task"] .= $this->verificaDados($data->responses_owner) . "\n";

				$file["task"] .= "\item \\textbf{List of Potential Risk Responses}:\n";
				$file["task"] .= $this->verificaDados($data->responses) . "\n";

				$file["task"] .= "\item \\textbf{Risk Triggers}:\n";
				$file["task"] .= $this->verificaDados($data->triggers) . "\n";

				$file["task"] .= "\item \\textbf{One or More Causes}:\n";
				$file["task"] .= $this->verificaDados($data->causes) . "\n";

				$file["task"] .= "\item \\textbf{Risk Strategy}:\n";
				$file["task"] .= $this->verificaDados($data->strategy) . "\n";

				$file["task"] .= "\item \\textbf{One or More Effects on Objectives}:\n";
				$file["task"] .= $this->verificaDados($data->effects) . "\n";

				$file["task"] .= "\item \\textbf{Risk Score}:\n";
				$file["task"] .= $this->verificaDados($data->score) . "\n";

				$file["task"] .= "\item \\textbf{Impact}:\n";
				$file["task"] .= $this->verificaDados($data->impact) . "\n";

				$file["task"] .= "\item \\textbf{Probability}:\n";
				$file["task"] .= $this->verificaDados($data->probability) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Risk Register}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Procurement
	public function PCMP_Overleaf($project_id)
	{
		$dataPCMP = $this->Procurement_mp_model->get($project_id);
		$file["name_task"] = "ProcurementManagementPlan.tex";
		if ($dataPCMP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Procurement Management Plan}\n";

			$file["task"] .= "\subsubsection{Products or Services Will be Obtained}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->products_services_obtained) . "\n";

			$file["task"] .= "\subsubsection{How Procurement will be Coordinated}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->procurement_management) . "\n";

			$file["task"] .= "\subsubsection{Timetable of Key Procurement Activities}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->schedule_procurement_activities) . "\n";

			$file["task"] .= "\subsubsection{Procurement metrics}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->performance_metrics) . "\n";

			$file["task"] .= "\subsubsection{Constraints and Assumptions}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->constraint_assumption) . "\n";

			$file["task"] .= "\subsubsection{Stakeholder Roles and Responsibilities}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->roles) . "\n";

			$file["task"] .= "\subsubsection{The Legal Jurisdiction}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->legal_jurisdiction) . "\n";

			$file["task"] .= "\subsubsection{Independent Estimates}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->estimates) . "\n";

			$file["task"] .= "\subsubsection{Risk Management Issues}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->issues) . "\n";

			$file["task"] .= "\subsubsection{Prequalified Sellers}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->sellers) . "\n";

			$file["task"] .= "\subsubsection{Procurement Strategy}\n";
			$file["task"] .= $this->verificaDados($dataPCMP[0]->strategy) . "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Risk Register}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function PSW_Overleaf($project_id)
	{
		$dataPSW = $this->Procurement_statement_of_work_model->getAll($project_id);
		$file["name_task"] = "ProcurementStatementOfWork.tex";
		if ($dataPSW != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Procurement Statement Of Work}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataPSW as $data) {

				$file["task"] .= "\item \\textbf{Description of item to be purchased}: " .  $this->verificaDados($data->description) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Additional information}:\n";
				$file["task"] .= $this->verificaDados($data->informations) . "\n";

				$file["task"] .= "\item \\textbf{Procurement Management}:\n";
				$file["task"] .= $this->verificaDados($data->procurement_management) . "\n";

				$file["task"] .= "\item \\textbf{Vendor Selection Criteria}:\n";
				$file["task"] .= $this->verificaDados($data->selection_criterias) . "\n";

				$file["task"] .= "\item \\textbf{Associated Contract Types}:\n";
				$file["task"] .= $this->verificaDados($data->types) . "\n";

				$file["task"] .= "\item \\textbf{Restrictions}:\n";
				$file["task"] .= $this->verificaDados($data->restrictions) . "\n";

				$file["task"] .= "\item \\textbf{Premises}:\n";
				$file["task"] .= $this->verificaDados($data->premises) . "\n";

				$file["task"] .= "\item \\textbf{Main deliveries schedule}:\n";
				$file["task"] .= $this->verificaDados($data->schedule) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Procurement Statement Of Work}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function CPD_Overleaf($project_id)
	{
		$dataCPD = $this->Procurement_cpd_model->getAll($project_id);
		$file["name_task"] = "ClosedProcurementDocumentation.tex";
		if ($dataCPD != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Closed Procurement Documentation}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataCPD as $data) {

				$file["task"] .= "\item \\textbf{Closing Date}:" . $this->verificaDados(date('d/m/Y', strtotime($data->closing_date))) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Provider's Name}:\n";
				$file["task"] .= $this->verificaDados($data->provider) . "\n";

				$file["task"] .= "\item \\textbf{Supplier Representative }:\n";
				$file["task"] .= $this->verificaDados($data->supplier_representative) . "\n";

				$file["task"] .= "\item \\textbf{Main Deliveries of this Project }:\n";
				$file["task"] .= $this->verificaDados($data->main_deliveries) . "\n";

				$file["task"] .= "\item \\textbf{Validator Comments}:\n";
				$file["task"] .= $this->verificaDados($data->comments) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Closed Procurement Documentation}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	// Stakeholder
	public function SHR_Overleaf($project_id)
	{

		$dataSHR = $this->Stakeholder_model->getAll($project_id);
		$file["name_task"] = "StakeholderRegistration.tex";
		if ($dataSHR != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Stakeholder Registration}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataSHR as $data) {

				$tempt = $this->verificaDados($data->type);
				// if($tempr ) 
				if ($tempt == '0') {
					$tempt == "External";
				} else if ($tempt == '1') {
					$tempt = "Internal";
				} else {
					$tempt;
				}

				$tempr = $this->verificaDados($data->role);
				if ($tempr == 0) {
					$tempr = "Client";
				} else if ($tempr == 1) {
					$tempr = "Team";
				} else if ($tempr == 2) {
					$tempr = "Provider";
				} else if ($tempr == 3) {
					$tempr = "Project Manager";
				} else if ($tempr == 4) {
					$tempr = "Sponsor";
				} else if ($tempr == 5) {
					$tempr = "Others";
				} else {
					$tempr;
				}

				$file["task"] .= "\item \\textbf{Name}: " .  $this->verificaDados($data->name) . "| \\textbf{Position}: " . $this->verificaDados($data->position) . "\n";

				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Email}:\n";
				$file["task"] .= $this->verificaDados($data->email) . "\n";

				$file["task"] .= "\item \\textbf{Organization}:\n";
				$file["task"] .= $this->verificaDados($data->organization) . "\n";

				$file["task"] .= "\item \\textbf{Type}:\n";
				$file["task"] .= $this->verificaDados($tempt) . "\n";

				$file["task"] .= "\item \\textbf{Main Role in the Project}:\n";
				$file["task"] .= $this->verificaDados($tempr) . "\n";

				$file["task"] .= "\item \\textbf{Main Project Responsibility}:\n";
				$file["task"] .= $this->verificaDados($data->responsibility) . "\n";

				$file["task"] .= "\item \\textbf{Phone}:\n";
				$file["task"] .= $this->verificaDados($data->phone_number) . "\n";

				$file["task"] .= "\item \\textbf{Workplace}:\n";
				$file["task"] .= $this->verificaDados($data->work_place) . "\n";

				$file["task"] .= "\item \\textbf{Essential Requirements}:\n";
				$file["task"] .= $this->verificaDados($data->essential_requirements) . "\n";

				$file["task"] .= "\item \\textbf{Main Expectations}:\n";
				$file["task"] .= $this->verificaDados($data->main_expectations) . "\n";

				$file["task"] .= "\item \\textbf{Phase of Greater Interest}:\n";
				$file["task"] .= $this->verificaDados($data->interest_phase) . "\n";

				$file["task"] .= "\item \\textbf{Observations}:\n";
				$file["task"] .= $this->verificaDados($data->observations) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{StakeholderRegistration}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}

	public function SHEP_Overleaf($project_id)
	{
		$dataSHEP = $this->Stakeholder_model->getAll($project_id);
		$file["name_task"] = "StakeholderEngagementPlan.tex";
		if ($dataSHEP != null) {
			$file["task"] = "\n";
			$file["task"] .= "\section{Stakeholder Engagement Plan}\n";
			$file["task"] .= "\begin{itemize}\n";
			foreach ($dataSHEP as $data) {
				$file["task"] .= "\item \\textbf{Stakeholder name}:\n";
				$file["task"] .= $this->verificaDados($data->name) . "\n";


				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Interest}:\n";
				$file["task"] .= $this->verificaDados($data->interest) . "\n";

				$file["task"] .= "\item \\textbf{Influence}:\n";
				$file["task"] .= $this->verificaDados($data->influence) . "\n";

				$file["task"] .= "\item \\textbf{Impact}:\n";
				$file["task"] .= $this->verificaDados($data->impact) . "\n";

				$file["task"] .= "\item \\textbf{Power}:\n";
				$file["task"] .= $this->verificaDados($data->power) . "\n";


				$tempCurrent = $this->verificaDados($data->current_engagement);

				if ($tempCurrent == "unaware") {
					$tempCurrent = "Unaware";
				} else if ($tempCurrent == 1) {
					$tempCurrent = "Team";
				} else if ($tempCurrent == "supportive") {
					$tempCurrent = "Provider";
				} else if ($tempCurrent == "leading") {
					$tempCurrent = "Leading";
				} else if ($tempCurrent == "neutral") {
					$tempCurrent = "Leading";
				} else if ($tempCurrent == "resistant") {
					$tempCurrent = "Resistant";
				} else {
					$tempCurrent;
				}
				$file["task"] .= "\item \\textbf{Current Engagement}:\n";
				$file["task"] .= $this->verificaDados($tempCurrent) . "\n";

				$tempExpected = $this->verificaDados($data->current_engagement);

				if ($tempExpected == "unaware") {
					$tempExpected = "Unaware";
				} else if ($tempExpected == 1) {
					$tempExpected = "Team";
				} else if ($tempExpected == "supportive") {
					$tempExpected = "Provider";
				} else if ($tempCurrent == "leading") {
					$tempExpected = "Leading";
				} else if ($tempCurrent == "neutral") {
					$tempExpected = "Leading";
				} else if ($tempExpected == "resistant") {
					$tempExpected = "Resistant";
				} else {
					$tempExpected;
				}

				$file["task"] .= "\item \\textbf{Desired Engagement}:\n";
				$file["task"] .= $this->verificaDados($tempExpected) . "\n";

				$file["task"] .= "\item \\textbf{Average Importance}:\n";
				$file["task"] .= $this->verificaDados($data->average) . "\n";

				$file["task"] .= "\item \\textbf{Engagement / Management Strategy}:\n";
				$file["task"] .= $this->verificaDados($data->strategy) . "\n";

				$file["task"] .= "\item \\textbf{Workplace}:\n";
				$file["task"] .= $this->verificaDados($data->work_place) . "\n";

				$file["task"] .= "\item \\textbf{Scope and Impact of Changes to Stakeholder}:\n";
				$file["task"] .= $this->verificaDados($data->scope) . "\n";

				$file["task"] .= "\item \\textbf{Observations with other Stakeholders}:\n";
				$file["task"] .= $this->verificaDados($data->observation) . "\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			$file["task"] = "\n";
			$file["task"]  .= "% \section{Stakeholder Engagement Plan}\n";
			$file["task"] .= "% No record found";
			return $file;
		}
	}



	public function verificaDados($dado)
	{
		$newString = trim($dado);
		if ($dado == null || empty($newString))
			return "Not Defined";
		else {
			$dado = str_replace("\\", "", $dado);
			$dado = str_replace("$", "\$", $dado);
			$dado = str_replace("R$", "R\\$", $dado);
			$dado = str_replace("#", "", $dado);
			$dado = str_replace("JPEG", "jpeg", $dado);
			$dado = str_replace("%", "\\%", $dado);
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
			$AL = $this->AL_Overleaf($project_id);
			$EVM = $this->EVM_Overleaf($project_id);
			$SND = $this->SND_Overleaf($project_id);
			$RR = $this->RR_Overleaf($project_id);
			$ADE = $this->ADE_Overleaf($project_id);
			$SC = $this->SC_Overleaf($project_id);

			// Cost
			$CMP = $this->CMP_Overleaf($project_id);
			$CE = $this->CE_Overleaf($project_id);

			// Quality
			$QMP = $this->QMP_Overleaf($project_id);
			// $QC = $this->QC_Overleaf($project_id);
			$QR = $this->QR_Overleaf($project_id);

			// Resources
			$REMP = $this->REMP_Overleaf($project_id);
			$EVAL = $this->EVAL_Overleaf($project_id);

			// Communication
			$COMP = $this->COMP_Overleaf($project_id);

			// Risk
			$RIMP = $this->RIMP_Overleaf($project_id);
			$RIR = $this->RIR_Overleaf($project_id);

			// Procurement
			$PCMP = $this->PCMP_Overleaf($project_id);
			$PSW = $this->PSW_Overleaf($project_id);
			$CPD = $this->CPD_Overleaf($project_id);

			// Stakeholder
			$SHR = $this->SHR_Overleaf($project_id);
			$SHEP = $this->SHEP_Overleaf($project_id);


			// template + array dos documentos
			$files["template"] = $this->templateOverleaf($project_id);
			$files["knowledge_areas"] = array("integration" => array($PCH, $BC, $BMP, $ACL, $PMP, $PPR, $DS, $WP, $IR, $LLR, $CR, $CL, $TEP, $FR), "scope" => array($RMP, $SCOMP, $RD, $SSP), "schedule" => array($SMP, $AL, $EVM, $SND, $RR, $ADE, $SC), "cost" => array($CMP, $CE), "quality" => array($QMP, $QR), "resources" => array($REMP, $EVAL), "communications" => ($COMP), "risk" => array($RIMP, $RIR), "procurement" => array($PCMP, $PSW, $CPD), "stakeholder" => array($SHR, $SHEP));
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
		$file .= "\author{Nome dos Autores}\n";
		$file .= "\hspace{.45\\textwidth}\n";
		$file .= "\begin{minipage}{.5\\textwidth}\n";
		$file .= "Generated By: Silver Bullet 2021\n";
		$file .= "\\end{minipage}\n";

		// Document

		$file .= "\maketitle\n";

		$file .= "\\tableofcontents\n";
		$file .= "%\listoffigures\n";
		$file .= "%\listoftables\n";
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
		$file .= "\include{ActivityList}\n";
		$file .= "\include{EarnedValueManagement}\n";
		$file .= "\include{ScheduleNetworkDiagram}\n";
		$file .= "\include{ResourceRequirements}\n";
		$file .= "\include{ActivityDurationEstimates}\n";
		$file .= "\include{StakeholderCalendars}\n\n";

		// Cost
		$file .= "\chapter{Project Cost Management}\n";
		$file .= "\include{CostManagementPlan}\n";
		$file .= "\include{CostEstimates}\n\n";

		// Quality
		$file .= "\chapter{Project Quality Management}\n";
		$file .= "\include{QualityChecklist}\n";
		$file .= "\include{QualityManagementPlan}\n";
		$file .= "\include{QualityReports}\n";

		// Resources
		$file .= "\chapter{Project Resource Management}\n";
		$file .= "\include{ResourcesManagementPlan}\n";
		$file .= "\include{TeamPerformanceEvaluation}\n";

		// Communication
		$file .= "\chapter{Project Communications Management}\n";
		$file .= "\include{CommunicationsManagementPlan}\n";

		// Risk
		$file .= "\chapter{Project Risk Management}\n";
		$file .= "\include{RiskManagementPlan}\n";
		$file .= "\include{RiskRegister}\n";

		// Procurement
		$file .= "\chapter{Project Procurement Management}\n";
		$file .= "\include{ProcurementManagementPlan}\n";
		$file .= "\include{ProcurementStatementOfWork}\n";
		$file .= "\include{ClosedProcurementDocumentation}\n";

		// Stakeholder
		$file .= "\chapter{Project Stakeholder Management}\n";
		$file .= "\include{StakeholderRegistration}\n";
		$file .= "\include{StakeholderEngagementPlan}\n";

		// End Document
		$file .= "\\bibliography{Bib}\n";
		$file .= "\\end{document}\n";

		return $file;
	}
}
