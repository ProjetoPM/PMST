Helper: application/helpers/log_activity_helper.php

function insertLogActivity($action_type, $view_name)
{
date_default_timezone_set('America/Sao_paulo');
$log['action_type'] = $action_type;
$log['date'] = date('Y-m-d');
$log['time'] = date('H:i:s');
$log['project_id'] = $_SESSION['project_id'];
$log['view_id'] = $this->view_model->GetIDByName($view_name);;
$log['user_id'] = $this->session->userdata('user_id');
$log['ip_adress'] = $this->input->ip_address();

switch ($action_type) {
case "insert":
$midName = ' inserted a new register on ';
break;
case "update":
$midName = ' changed some information on ';
break;
case "delete":
$midName = ' deleted a register on ';
break;
case "send message":
$midName = ' sent a message on ';
break;
}
$log['action'] = '['.$this->session->userdata('name').']'.$midName
.'<'.$view_name.'>';


    $this->Log_model->insert($log);
    }