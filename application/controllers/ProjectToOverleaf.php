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

	public function verificaDados($dado)
	{
		if ($dado == null)
			return "Not Defined";
		else
			return  $dado;
	}

	public function DS_Overleaf($project_id)
	{
		$dataDS = $this->Delivery_acceptance_term_model->getAll($project_id);
		$file["name_task"] = "DeliverableStatus.tex";
		$file["task"] = "\n";
		$file["task"]  .= "\section{Deliverable Status}\n";
		$file["task"]  .= "\begin{itemize}\n";
		if ($dataDS != null) {
			foreach ($dataDS as $data) {

				$file["task"]  .= "\item \\textbf{Validator Name}: " .  $this->verificaDados($data->validator_name) . " | \\textbf{Validation Date}: " . date("d/m/Y", strtotime($data->validation_date)) .  "\n";

				$file["task"]  .= "\begin{itemize}\n";

				$file["task"]  .= "\item \\textbf{Role}: ";
				$file["task"]  .=  $this->verificaDados($data->role) . ";\n";

				$file["task"]  .= "\item \\textbf{Function in the Project}: ";
				$file["task"]  .= $this->verificaDados($data->function) . ";\n";

				$file["task"]  .= "\item \\textbf{Comments}: ";
				$file["task"]  .= $this->verificaDados($data->comments) . ";\n";

				$file["task"]  .= "\\end{itemize}\n";
			}
			$file["task"]  .= "\\end{itemize}\n";
			$file["task"] .= "\n";

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
			$BC = $this->BC_Overleaf($project_id);
			$DS = $this->DS_Overleaf($project_id);

			// template + array dos documentos
			$files["template"] = $this->templateOverleaf($project_id);
			$files["knowledge_areas"] = array("integration" => array($BC, $DS));
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

		$file .= "\include{BusinessCase}\n"; //mesmo do name_task
		$file .= "\include{DeliverableStatus}\n";

		// End Document
		$file .= "\\bibliography{Bib}\n";
		$file .= "\\end{document}\n";

		return $file;
	}
}
