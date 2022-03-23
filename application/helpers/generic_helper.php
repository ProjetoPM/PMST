<?php


function email_exists($email)
{

    $obj = &get_instance();
    $obj->load->model('Admin_model');

    $data2 = $obj->Exame_model->getUserByEmail($email);
    if ($data2 != null) {
        return true;
    }
    return false;
}

function getViewEvaluation($view_id)
{
	$obj = &get_instance();
	$obj->load->model('View_model');

	$obj2 = &get_instance();
	$obj2->load->model('ViewEvaluation_model');

	$view_id = $obj->View_model->GetIDByName($view_id);

	$view_evaluation = $obj2->ViewEvaluation_model->GetByProjectView($view_id, $_SESSION['project_id']);

	if ($view_evaluation == null) {
		$view_evaluation['average'] = null;
		$view_evaluation['evaluationTxt'] = "Not yet rated";
		return $view_evaluation;
	}
	$view_evaluation['evaluationTxt'] = "";
	foreach ($obj2->ViewEvaluation_model->getAllProfessorEvaluation($view_evaluation['view_evaluation_id']) as $pe) {
		// var_dump(getUserName($pe->user_id));exit;
		$view_evaluation['evaluationTxt'] = $view_evaluation['evaluationTxt'] . getUserName($pe->user_id) . ": " .$pe->points. ", ";
	}
	$view_evaluation['evaluationTxt'] = $view_evaluation['evaluationTxt'] . "Average: ". $view_evaluation['average'];
	return $view_evaluation;
}

function getStakeholderName($id)
{
    $obj = &get_instance();
    $obj->load->model('Stakeholder_model');

    $data1 = $obj->Stakeholder_model->get($id);
    return $data1["name"];
}



function getInstitution($id)
{
    $obj = &get_instance();
    $obj->load->model('User_Model');

    $data1 = $obj->User_Model->GetUserById($id);
    return $data1["institution"];
}

function getEmail($id)
{
    $obj = &get_instance();
    $obj->load->model('User_Model');

    $data1 = $obj->User_Model->GetUserById($id);
    return $data1["email"];
}


function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}


function getRole($id)
{
    $obj = &get_instance();
    $obj->load->model('User_Model');

    $data1 = $obj->User_Model->GetUserById($id);
    return $data1["role"];
}


function getAllFieldEvaluation($project_id, $view, $item_id)
{
	$obj = &get_instance();
	$obj->load->model('FieldEvaluation_model');

	$obj2 = &get_instance();
	$obj2->load->model('View_model');

	$view_id = $obj2->View_model->GetIDByName($view);

	$data = $obj->FieldEvaluation_model->getAll($project_id, $view_id, $item_id);
	// var_dump($data);exit;
	return $data;
}

function getAcesslevelName($project_id, $user_id)
{
	$obj = &get_instance();
	$obj->load->model('Project_model');

	$data = $obj->Project_model->getRole($project_id, $user_id);
	if ($data == 2) {
		return "Project Manager";
	} else if ($data == 1) {
		return "Professor";
	} else {
		return "Staff";
	}
}

// variavel global de avaliações
function getViewFields($view)
{
	$obj = &get_instance();
	$obj->load->model('FieldEvaluation_model');

	$obj2 = &get_instance();
	$obj2->load->model('View_model');

	$view_id = $obj2->View_model->GetIDByName($view);

	$fields = array();

	$arrayObject = $obj->FieldEvaluation_model->getAllByProject($_SESSION['project_id']);


	foreach ($arrayObject as $f) {
		if ($f->view_id == $view_id) {
			array_push($fields, $f);
		}
	}

	foreach ($fields as $f) {
		$f->user_name = getUserName($f->user_id);
		$f->status_name = $f->status == 0 ? "Visualized" : "Not viewed";
		$f->access_level = getAcesslevelName($f->project_id, $f->user_id);
		$f->permissionToDelete = $f->user_id == $_SESSION['user_id'] ? "" : "disabled";
	}

	$_SESSION['fields_view_evaluations'] = $fields;
}


// title do tooltip de cada campo
function getFieldTp($view_id, $item_id, $field)
{
	$id_desc = 0;
	$desc = "title='Checked'";

	foreach ($_SESSION['fields_view_evaluations'] as $f) {
		if ($f->view_id == $view_id && $f->item_id == $item_id && $f->field == $field && $f->status == 1 && $f->field_evaluation_id > $id_desc) {
			$desc = " title='" . $f->access_level . " | " . $f->description . "'";
		}
	}
	return $desc;
}

function getStatusFieldsList($view, $item_id)
{
	$obj = &get_instance();
	$obj->load->model('FieldEvaluation_model');

	$obj2 = &get_instance();
	$obj2->load->model('View_model');

	$view_id = $obj2->View_model->GetIDByName($view);

	$arrayObject = $obj->FieldEvaluation_model->getAllByProject($_SESSION['project_id']);


	foreach ($arrayObject as $f) {
		if ($f->view_id == $view_id && $f->item_id == $item_id && $f->status == 1) {
			return "style='border-color: orangered;
			border-width: 3px;
			border-style: solid;'"; // algum elemento n foi marcado como visto
		}
	}

	return ""; // todos elementos foram marcados como visto
}


// se o campo tiver status 0 MARCAR VERDE, SE TIVER STATUS 1 VERMELHo, se for null, branco
function fieldStatus($view, $item_id, $field)
{
	$obj2 = &get_instance();
	$obj2->load->model('View_model');

	$view_id = $obj2->View_model->GetIDByName($view);

	$fields = array();

	$desc = getFieldTp($view_id, $item_id, $field);

	foreach ($_SESSION['fields_view_evaluations'] as $f) {
		if ($f->view_id == $view_id && $f->item_id == $item_id && $f->field == $field) {
			array_push($fields, $f);
		}
	}


	if (empty($fields)) { // caso n tenha avaliacoes daquele campo
		if ($_SESSION['access_level'] == "1") { // caso seja professor
			return "class='evaluation btn-sm btn-default'" . $desc;
		} else {
			return "class='evaluation noStatus btn-sm btn-default'" . $desc;
		}
	}

	foreach ($fields as $f) {
		if ($f->status == 1) {
			return "class='evaluation alertStatus btn-sm btn-default'" . $desc; // algum elemento n foi marcado como visto
		}
	}

	return "class='evaluation okStatus btn-sm btn-default'" . $desc; // todos elementos foram marcados como visto

}

// project page (marcar a view q te itens n conferidos)
function viewStatus($view)
{
	$obj2 = &get_instance();
	$obj2->load->model('View_model');

	$view_id = $obj2->View_model->GetIDByName($view);
	getViewFields($view);

	foreach ($_SESSION['fields_view_evaluations'] as $f) {
		if ($f->view_id == $view_id && $f->status == 1) {
			return "style='border-color: orangered;
			border-width: 3px;
			border-style: solid;'"; // algum elemento n foi marcado como visto
		}
	}
	return "";
}


function getUserName($user_id)
{
	$obj = &get_instance();
	$obj->load->model('User_Model');

	$data = $obj->User_Model->GetUserNameById($user_id);

	return $data;
}


function getActivityName($id)
{
	$obj = &get_instance();
	$obj->load->model('Activity_model');

	$data1 = $obj->Activity_model->get($id);
	return $data1["activity_name"];
}


function getWeeklyEvaluationName($id)
{
	$obj = &get_instance();
	$obj->load->model('WeeklyEvaluation_model');

	$data = $obj->WeeklyEvaluation_model->get($id);
	return $data[0]->name;
	
}




