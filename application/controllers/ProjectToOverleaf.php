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
		$this->load->model('Scope_mp_model');
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
			$file["task"]  .= "\subsection{Business Deals}\n";
			$file["task"]  .= $dataBusinessCase[0]->business_deals . "\n";

			$file["task"]  .= "\subsection{Situation Analysis}\n";
			$file["task"]  .= $dataBusinessCase[0]->situation_analysis . "\n";

			$file["task"]  .= "\subsection{Recommendation}\n";
			$file["task"]  .= $dataBusinessCase[0]->recommendation . "\n";

			$file["task"]  .= "\subsection{Evaluation}\n";
			$file["task"]  .= $dataBusinessCase[0]->evaluation . "\n";

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
		$file["task"]  .= "\begin{itemize}\n";
		if ($dataACL != null) {
			foreach ($dataACL as $data) {


				$file["task"] .= "\begin{itemize}\n";

				$file["task"] .= "\item \\textbf{Type}: ";

				$temp = $this->verificaDados($data->type);
				if ($temp == "A") {
					$file["task"] .= "Assumption";
				} else if ($temp == "C") {
					$file["task"] .= "Constraint";
				}

				$file["task"] .= "\item \\textbf{Description Log}: ";
				$file["task"] .= $this->verificaDados($data->description_log) . ";\n";

				$file["task"] .= "\\end{itemize}\n";
			}
			$file["task"]  .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	// public function PMP_Overleaf($project_id)
	// {
	// 	$dataPMP = $this->Project_management_model->get($project_id);
	// 	if ($dataPMP != null) {
	// 		$file["name_task"] = "ProjectManagementPlan.tex";
	// 		$file["task"] = "\n";
	// 		$file["task"] .= "\section{Project Management Plan}\n";

	// 		// Subsidiary Management Plans
	// 		$file["task"] .= "\subsection{Subsidiary Management Plans}\n";

	// 		$file["task"] .= "\subsubsection{Scope Management Plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->project_guidelines) . "\n";

	// 		$file["task"] .= "\subsubsection{Requirements management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->requirements_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Schedule management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->schedule_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Cost management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->cost_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Quality management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->quality_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Resource management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->resource_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Communications management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->stakeholders_communication) . "\n";

	// 		$file["task"] .= "\subsubsection{Risk management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->risk_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Procurement management plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->procurement_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Stakeholder engagement plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->stakeholder_mp) . "\n";

	// 		// Baselines
	// 		$file["task"] .= "\subsection{Baselines}\n";

	// 		$file["task"] .= "\subsubsection{Scope Baseline}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->scope_baseline) . "\n";

	// 		$file["task"] .= "\subsubsection{Schedule Baseline}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->baseline_maintenance) . "\n";

	// 		$file["task"] .= "\subsubsection{Cost Baseline}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->cost_baseline) . "\n";

	// 		// Additional Components
	// 		$file["task"] .= "\subsection{Additional Components}\n";

	// 		$file["task"] .= "\subsubsection{Change Management Plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->change_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Configuration Management Plan}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->configuration_mp) . "\n";

	// 		$file["task"] .= "\subsubsection{Performance Measurement Baseline}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->performance) . "\n";

	// 		$file["task"] .= "\subsubsection{Project Life Cycle}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->project_lifecycle) . "\n";

	// 		$file["task"] .= "\subsubsection{Development Approach}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->development) . "\n";

	// 		$file["task"] .= "\subsubsection{Management Reviews}\n";
	// 		$file["task"] .= $this->verificaDados($dataPMP[0]->key_review) . "\n";

	// 		return $file;
	// 	} else {
	// 		return null;
	// 	}
	// }
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
				$file["task"] .= "\item \\textbf{Main activities in execution (with %)}: " . $this->verificaDados($data->main_activities) . "\n";

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
			}
			$file["task"] .= "\\end{itemize}\n";
			$file["task"] .= "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function verificaDados($dado)
	{
		if ($dado == null)
			return "Not Defined";
		else
			return  $dado;
	}


	// Scope
	public function SCOMP_Overleaf($project_id) // 1 1
	{
		$dataSCOMP = $this->Scope_mp_model->get($project_id);
		if ($dataSCOMP  != null) {
			$file["name_task"] = "ScopeManagementPlan.tex";
			$file["task"] = "\n";
			$file["task"]  .= "\section{Scope Management Plan}\n";
			$file["task"]  .= "\subsection{Project Scope Specification Process}\n";
			$file["task"]  .= $this->verificaDados($dataSCOMP[0]->scope_specification) . "\n";

			$file["task"]  .= "\subsection{Delivery acceptance process}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->deliveries_acceptance) . "\n";

			$file["task"]  .= "\subsection{Processes for creating, Approving, and Maintaining WBS }\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->eap_process) . "\n";

			$file["task"]  .= "\subsection{Scope Change Management Plan}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->scope_change_mp) . "\n";

			$file["task"]  .= "\subsection{Process that establishes how the scope baseline will be approved and maintained}\n";
			$file["task"]  .=  $this->verificaDados($dataSCOMP[0]->baseline) . "\n";

			return $file;
		} else {
			return null;
		}
	}

	public function exportLatex($project_id)
	{

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $project_id);
		$project['dados'] = $this->db->get('project_user')->result();


		if (count($project['dados']) > 0) {

			// todos os documentos
			$PCH = $this->PCH_Overleaf($project_id);
			$BC = $this->BC_Overleaf($project_id);
			$BMP = $this->BMP_Overleaf($project_id);
			$ACL = $this->ACL_Overleaf($project_id);
			// $PMP = $this->PMP_Overleaf($project_id);
			$PPR = $this->PPR_Overleaf($project_id);
			$WP = $this->WP_Overleaf($project_id);

			$DS = $this->DS_Overleaf($project_id);
			$SCOMP = $this->SCOMP_Overleaf($project_id);

			// template + array dos documentos
			$files["template"] = $this->templateOverleaf($project_id);
			$files["knowledge_areas"] = array("integration" => array($PCH, $BC, $BMP, $ACL, $PPR, $DS, $WP), "scope" => array($SCOMP));
			$files["knowledge_areas"] =array("name" => array("integration" => array($BC, $DS), "scope" => array($SCOMP)));
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
		$file .= "\usepackage{titlesec}\n";
		$file .= "\usepackage{graphicx}\n";
		$file .= "\usepackage{booktabs}\n";
		$file .= "\usepackage{float}\n";
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

		//Title
		$data['title'] = $this->Project_model->getProjectName($project_id);
		$file .= "\\title {" . $data['title'] . "}\n";

		// Authors
		$file .= "\author{Lucas Abner}\n";
		$file .= "hspace{.45\textwidth}\n";
		$file .= "Generated By: Silver Bullet 2021\n";
		$file .= "end{minipage}\n";

		// Document
		$file .= "\begin{document}\n";
		$file .= "maketitle\n";

		$file .= "\\tableofcontents\n";
		$file .= "\listoffigures\n";
		$file .= "\listoftables\n";
		$file .= "\n";

		// chapter, and includes +++
		$file .= "\chapter{Project Integration Management}\n";


		// Integration
		$file .= "\include{ProjectCharter}\n";
		$file .= "\include{BusinessCase}\n"; //mesmo do name_task
		$file .= "\include{BenefitsManagementPlan}\n";
		$file .= "\include{AssumptionLog}\n";
		// $file .= "\include{ProjectManagementPlan}\n";
		$file .= "\include{ProjectPerformaceMonitoringReport}\n";
		$file .= "\include{DeliverableStatus}\n";
		$file .= "\include{WorkPerformanceReport}\n";


		$file .= "\chapter{Project Scope Management}\n";

		$file .= "\include{ScopeManagementPlan}\n";

		// End Document
		$file .= "\\bibliography{Bib}\n";
		$file .= "\\end{document}\n";

		return $file;
	}
}
