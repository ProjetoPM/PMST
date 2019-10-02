<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		$this->load->helper('url');
		$this->load->model('Activity_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
    $this->lang->load('activity','english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/schedule/activity_list/new',$dado);
    } else {
        redirect(base_url());
    }
	}

    public function deleteActivity($id){
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Activity_model->deleteActivity($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Activity/listp/' . $project_id['project_id']);
        }
    }

    public function listp($project_id){
        $dado['project_id'] = $project_id;
        $dado['activity'] = $this->Activity_model->getAllActivity($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/schedule/activity_list/list',$dado);
    }


    public function editActivity($id) {
        $query['activity'] = $this->Activity_model->getActivity($id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/schedule/activity_list/edit', $query);
    }



    public function updateActivity($id) {
        $activity['associated_id'] = $this->input->post('associated_id');
        $activity['project_phase'] = $this->input->post('project_phase');
        $activity['milestone'] = $this->input->post('milestone');
				$activity['activity_name'] = $this->input->post('activity_name');

        $activity['project_id'] = $this->input->post('project_id');

				$data['activity'] = $activity;
				$query = $this->Activity_model->updateActivity($data['activity'], $id);

        if ($query) {
            redirect('Activity/listp/' . $activity['project_id']);
        }
    }

	public function insertActivity($id){
		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');

		$activity['project_id'] = $this->input->post('project_id');

		$query = $this->Activity_model->insert($activity);

		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('Activity/listp/' . $activity['project_id']);
		}
	}

	//SCHEDULE NETWORK
			public function listScheduleNetwork($project_id){
	        $dado['project_id'] = $project_id;
	        $dado['activity'] = $this->Activity_model->getAllActivity($project_id);
	        $this->load->view('frame/header_view');
	        $this->load->view('frame/sidebar_nav_view');
	        $this->load->view('project/schedule/schedule_network/list',$dado);
	    }

			public function editScheduleNetwork($id) {
					$query['activity'] = $this->Activity_model->getActivity($id);

					$this->load->view('frame/header_view.php');
					$this->load->view('frame/sidebar_nav_view.php');
					$this->load->view('project/schedule/schedule_network/edit', $query);
			}

			public function updateScheduleNetwork($id) {
					$activity['predecessor_activity'] = $this->input->post('predecessor_activity');
					$activity['dependence_type'] = $this->input->post('dependence_type');
					$activity['anticipation'] = $this->input->post('anticipation');
					$activity['wait'] = $this->input->post('wait');

	        $activity['project_id'] = $this->input->post('project_id');

					$data['activity'] = $activity;
					$query = $this->Activity_model->updateActivity($data['activity'], $id);

	        if ($query) {
	            redirect('Activity/listScheduleNetwork/' . $activity['project_id']);
	        }
	    }

			//DURATION ESTIMATES
					public function listDurationEstimates($project_id){
							$dado['project_id'] = $project_id;
							$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
							$this->load->view('frame/header_view');
							$this->load->view('frame/sidebar_nav_view');
							$this->load->view('project/schedule/duration_estimates/list',$dado);
					}

					public function editDurationEstimates($id) {
							$query['activity'] = $this->Activity_model->getActivity($id);

							$this->load->view('frame/header_view.php');
							$this->load->view('frame/sidebar_nav_view.php');
							$this->load->view('project/schedule/duration_estimates/edit', $query);
					}

					public function updateDurationEstimates($id) {
							$activity['estimated_duration'] = $this->input->post('estimated_duration');
							$activity['replanted_duration'] = $this->input->post('replanted_duration');
							$activity['performed_duration'] = $this->input->post('performed_duration');
							$activity['estimated_start_date'] = $this->input->post('estimated_start_date');
							$activity['replanted_start_date'] = $this->input->post('replanted_start_date');
							$activity['performed_start_date'] = $this->input->post('performed_start_date');
							$activity['estimated_end_date'] = $this->input->post('estimated_end_date');
							$activity['replanted_end_date'] = $this->input->post('replanted_end_date');
							$activity['performed_end_date'] = $this->input->post('performed_end_date');

							$activity['project_id'] = $this->input->post('project_id');

							$data['activity'] = $activity;
							$query = $this->Activity_model->updateActivity($data['activity'], $id);

							if ($query) {
									redirect('Activity/listDurationEstimates/' . $activity['project_id']);
							}
					}

					//RESOURCE REQUIREMENT
							public function listResourceRequirement($project_id){
									$dado['project_id'] = $project_id;
									$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
									$this->load->view('frame/header_view');
									$this->load->view('frame/sidebar_nav_view');
									$this->load->view('project/schedule/resource_requirement/list',$dado);
							}

							public function editResourceRequirement($id) {
									$query['activity'] = $this->Activity_model->getActivity($id);

									$this->load->view('frame/header_view.php');
									$this->load->view('frame/sidebar_nav_view.php');
									$this->load->view('project/schedule/resource_requirement/edit', $query);
							}

							public function updateResourceRequirement($id) {
									$activity['resource_description'] = $this->input->post('resource_description');
									$activity['required_amount_of_resource'] = $this->input->post('required_amount_of_resource');
									$activity['resource_cost_per_unit'] = $this->input->post('resource_cost_per_unit');
									$activity['resource_type'] = $this->input->post('resource_type');

									$activity['project_id'] = $this->input->post('project_id');

									$data['activity'] = $activity;
									$query = $this->Activity_model->updateActivity($data['activity'], $id);

									if ($query) {
											redirect('Activity/listResourceRequirement/' . $activity['project_id']);
									}
							}

							//RESOURCE CALENDAR
									public function listResourceCalendar($project_id){
											$dado['project_id'] = $project_id;
											$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
											$this->load->view('frame/header_view');
											$this->load->view('frame/sidebar_nav_view');
											$this->load->view('project/schedule/resource_calendar/list',$dado);
									}

									public function editResourceCalendar($id) {
											$query['activity'] = $this->Activity_model->getActivity($id);

											$this->load->view('frame/header_view.php');
											$this->load->view('frame/sidebar_nav_view.php');
											$this->load->view('project/schedule/resource_calendar/edit', $query);
									}

									public function updateResourceCalendar($id) {
											$activity['resource_name'] = $this->input->post('resource_name');
											$activity['function'] = $this->input->post('function');
											$activity['availability_start'] = $this->input->post('availability_start');
											$activity['availability_ends'] = $this->input->post('availability_ends');
											$activity['allocation_start'] = $this->input->post('allocation_start');
											$activity['allocation_ends'] = $this->input->post('allocation_ends');

											$activity['project_id'] = $this->input->post('project_id');

											$data['activity'] = $activity;
											$query = $this->Activity_model->updateActivity($data['activity'], $id);

											if ($query) {
													redirect('Activity/listResourceCalendar/' . $activity['project_id']);
											}
									}

									//COST ESTIMATION
											public function listCostEstimation($project_id){
													$dado['project_id'] = $project_id;
													$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
													$this->load->view('frame/header_view');
													$this->load->view('frame/sidebar_nav_view');
													$this->load->view('project/schedule/cost_estimation/list',$dado);
											}

											public function editCostEstimation($id) {
													$query['activity'] = $this->Activity_model->getActivity($id);

													$this->load->view('frame/header_view.php');
													$this->load->view('frame/sidebar_nav_view.php');
													$this->load->view('project/schedule/cost_estimation/edit', $query);
											}

											public function updateCostEstimation($id) {
													$activity['estimated_cost'] = $this->input->post('estimated_cost');
													$activity['cumulative_estimated_cost'] = $this->input->post('cumulative_estimated_cost');
													$activity['replanted_cost'] = $this->input->post('replanted_cost');
													$activity['contingency_reserve'] = $this->input->post('contingency_reserve');
													$activity['sum_of_work_packages'] = $this->input->post('sum_of_work_packages');
													$activity['contingency_reserve_of_packages'] = $this->input->post('contingency_reserve_of_packages');
													$activity['baseline'] = $this->input->post('baseline');
													$activity['budget'] = $this->input->post('budget');
													$activity['cumulative_replanted_cost'] = $this->input->post('cumulative_replanted_cost');
													$activity['real_cost'] = $this->input->post('real_cost');
													$activity['cumulative_real_cost'] = $this->input->post('cumulative_real_cost');

													$activity['project_id'] = $this->input->post('project_id');

													$data['activity'] = $activity;
													$query = $this->Activity_model->updateActivity($data['activity'], $id);

													if ($query) {
															redirect('Activity/listCostEstimation/' . $activity['project_id']);
													}
											}

											//AGREGATE VALUE
													public function listAgregateValue($project_id){
															$dado['project_id'] = $project_id;
															$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
															$this->load->view('frame/header_view');
															$this->load->view('frame/sidebar_nav_view');
															$this->load->view('project/schedule/agregate_value/list',$dado);
													}

													public function editAgregateValue($id) {
															$query['activity'] = $this->Activity_model->getActivity($id);

															$this->load->view('frame/header_view.php');
															$this->load->view('frame/sidebar_nav_view.php');
															$this->load->view('project/schedule/agregate_value/edit', $query);
													}

													public function updateAgregateValue($id) {
															$activity['agregate_value'] = $this->input->post('agregate_value');
															$activity['planned_value'] = $this->input->post('planned_value');
															$activity['real_agregate_cost'] = $this->input->post('real_agregate_cost');
															$activity['budget_at_cumulative_end'] = $this->input->post('budget_at_cumulative_end');
															$activity['variation_of_terms'] = $this->input->post('variation_of_terms');
															$activity['variation_of_costs'] = $this->input->post('variation_of_costs');
															$activity['variation_at_the_end'] = $this->input->post('variation_at_the_end');
															$activity['deadline_performance_index'] = $this->input->post('deadline_performance_index');
															$activity['costs_performance_index'] = $this->input->post('costs_performance_index');
															$activity['estimated_of_completation'] = $this->input->post('estimated_of_completation');
															$activity['estimate_for_completion'] = $this->input->post('estimate_for_completion');


															$activity['project_id'] = $this->input->post('project_id');

															$data['activity'] = $activity;
															$query = $this->Activity_model->updateActivity($data['activity'], $id);

															if ($query) {
																	redirect('Activity/listAgregateValue/' . $activity['project_id']);
															}
													}

													//QUANTITATIVE RISK ANALYSIS
															public function listQuantitative($project_id){
																	$dado['project_id'] = $project_id;
																	$dado['activity'] = $this->Activity_model->getAllActivity($project_id);
																	$this->load->view('frame/header_view');
																	$this->load->view('frame/sidebar_nav_view');
																	$this->load->view('project/schedule/quantitative_risk_analysis/list',$dado);
															}

															public function editQuantitative($id) {
																	$query['activity'] = $this->Activity_model->getActivity($id);

																	$this->load->view('frame/header_view.php');
																	$this->load->view('frame/sidebar_nav_view.php');
																	$this->load->view('project/schedule/quantitative_risk_analysis/edit', $query);
															}

															public function updateQuantitative($id) {
																	$activity['duration_pessimistic'] = $this->input->post('duration_pessimistic');
																	$activity['duration_probable'] = $this->input->post('duration_probable');
																	$activity['duration_otimistic'] = $this->input->post('duration_otimistic');
																	$activity['duration_beta'] = $this->input->post('duration_beta');
																	$activity['duration_triangular'] = $this->input->post('duration_triangular');
																	$activity['cost_pessimistic'] = $this->input->post('cost_pessimistic');
																	$activity['cost_probable'] = $this->input->post('cost_probable');
																	$activity['cost_otimistic'] = $this->input->post('cost_otimistic');
																	$activity['cost_beta'] = $this->input->post('cost_beta');
																	$activity['cost_triangular'] = $this->input->post('cost_triangular');


																	$activity['project_id'] = $this->input->post('project_id');

																	$data['activity'] = $activity;
																	$query = $this->Activity_model->updateActivity($data['activity'], $id);

																	if ($query) {
																			redirect('Activity/listQuantitative/' . $activity['project_id']);
																	}
															}


}
?>
