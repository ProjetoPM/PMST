<?php
if (!function_exists('insertLogActivity')) {
        function insertLogActivity($action_type, $view_name)
        {

                $obj = &get_instance();
                $obj->load->model('view_model');
                $obj->load->model('Log_model');


                date_default_timezone_set('america/sao_paulo');

                $log['action_type'] = $action_type;
                $log['date'] = date('Y-m-d');
                $log['time'] = date('H:i:s');
                $log['project_id'] = $_SESSION['project_id'];
                $log['view_id'] = $obj->view_model->GetIDByName($view_name);;
                $log['user_id'] = $obj->session->userdata('user_id');
                $log['ip_address'] = $obj->input->ip_address();

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
                        case "sign":
                                $midName = ' signed a register on ';
                                break;
                        case "unsubscribe":
                                $midName = ' disinherited a register on ';
                                break;
                }
                $log['action'] = '"' . $obj->session->userdata('name') . '"' . $midName
                        . '-' . $view_name . '-';

                $obj->Log_model->insert($log);
        }
}
