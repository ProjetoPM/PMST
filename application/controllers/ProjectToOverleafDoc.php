<?php
    class ProjectPerformanceReport_PDF extends CI_Controller{

			function __construct(){
				parent::__construct();

				if (!$this->session->userdata('logged_in')) {
					redirect(base_url());
				}

				//$this->load->helper('url');
				$this->lang->load('btn', 'english');
				//$this->lang->load('btn', 'portuguese-brazilian');
        $this->lang->load('project_performance_report','english');
				$this->load->model('Project_performance_report_model');
				$this->load->model('Project_model');
			}

		function exportLatex($project_id) {
			$project = $this->Project_Model->get
			//Configuring File Latex
			$file = "";

			$file .= "\documentclass[twoside,a4paper,11pt]{book}\n";
		$file .= "\usepackage[utf8]{inputenc}\n";
		$file .= "\usepackage{graphicx}\n";
		$file .= "\usepackage{booktabs}\n";
		$file .= "\usepackage{float}\n";
		$file .= "\usepackage[alf]{abntex2cite}\n";
		$file .= "\usepackage[brazilian,hyperpageref]{backref}\n";


		$file .= "\renewcommand{\backrefpagesname}{Citado na(s) página(s):~}";
		$file .= "\renewcommand{\backref}{}";
		$file .= "\\renewcommand*{\backrefalt}[4]{\n";
		$file .= "\ifcase #1 %\n";
		$file .= "Nenhuma citação no texto.%\n";
		$file .= "\or\n";
		$file .= "Citado na página #2.%\n";
		$file .= "\\else\n";
		$file .= "Citado #1 vezes nas páginas #2.%\n";
		$file .= "\\fi}%\n";
		$file .= "\n";

		$file .= "\\title {." . $project->getTitleById() ."}\n";

		






		}
}
    ?>
