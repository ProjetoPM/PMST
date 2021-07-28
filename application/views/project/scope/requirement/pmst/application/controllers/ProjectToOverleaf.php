<?php
    class ProjectToOverleaf extends CI_Controller{

			function __construct(){
				parent::__construct();

				if (!$this->session->userdata('logged_in')) {
					redirect(base_url());
				}

				//$this->load->helper('url');
				$this->lang->load('btn', 'english');
				//$this->lang->load('btn', 'portuguese-brazilian');
                $this->lang->load('project_to_overleaf','english');
				$this->load->model('Project_to_overleaf_model');
				$this->load->model('Project_model');
			}

		public function exportLatex($project_id) {

			
		$this->load->model("Project_to_overleaf_model");
		$project = $this->Project_to_overleaf_model->get_project_export_latex($project_id);
			
		$file = "";

		//Configuring File Latex
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

		//Title
		$file .= "\\title {." . $project->getTitleById() ."}\n";

		// Authors
		$file .= "\\author{Lucas Abner}";


		// Document
		$file .= "\begin{document}\n";
		$file .= "maketitle\n";

		//Abstract
		$file .= "\begin{abstract}\n"; 
		$file .= "\\end{abstract}\n";
		$file .= "\n";


		$file .= "\section{Teste}\n";
		$file .= "\n";
		
		



	}
}
    ?>