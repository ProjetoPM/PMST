<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class User_register extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    //recebe o email da controller, gera senha nova, salva e dispara o metodo de email
    function model_recover_password($postData) {
        $this->db->where('email', $postData['email']);
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $password = $this->generate_password();
            $data = array('password' => md5($password),);
            $email = $postData['email'];
            $this->db->where('email', $email);
            $this->db->update('user', $data);
            $message = "Your account password has been reset.<br><br>Email: " . $email . "<br>Tempolary password: " . $password . "<br>Please change your password after login.<br><br> you can login at " . base_url() . ".";
            $subject = "Password Reset";
            $this->send_email($message, $subject, $email);
            //log do banco
            $module = "User Management";
            $activity = "reset user " . $email . "`s password";
            $this->insert_log($activity, $module);
            
            //envia msg na pagina de login.php caso tenha sucesso
            $this->session->set_flashdata('flashSuccess', 'Password has been reset');
            redirect(site_url().'/authentication', 'refresh');

        } else {
            //envia msg na pagina de login.php caso falhe
            $this->session->set_flashdata('flashFail', 'We cant find your email.');
            redirect(site_url().'/authentication', 'refresh');
        }
    }
    function validate_email($postData) {
        $this->db->where('email', $postData['email']);
        $this->db->where('status', 1);
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() == 0) return true;
        else return false;
    }
    function insert_user($postData) {
        $validate = $this->validate_email($postData);
        if ($validate) {
            $password = $this->generate_password();
            $data = array('name' => $postData['name'], 'email' => $postData['email'], 'institution' => $postData['institution'], 'role' => 'user', 'password' => md5($password), 'created_at' => date('Y\-m\-d\ H:i:s A'),);
            $this->db->insert('user', $data);
            $message = "Here is your account details:<br><br>Email: " . $postData['email'] . "<br>Tempolary password: " . $password . "<br>Please change your password after login.<br><br> you can login at " . base_url() . ".";
            $subject = "New Account Creation";
            $this->send_email($message, $subject, $postData['email']);
            
            $this->session->set_flashdata('flashCreated', 'Account Created! A temporary password will be sent to your registered email address.');
            redirect(site_url(), 'refresh');
            
            $module = "User Management";
            $activity = "add new user " . $postData['email'];
            $this->insert_log($activity, $module);
            return array('status' => 'success', 'message' => '');            
        } else {
            return array('status' => 'exist', 'message' => '');
        }
    }
    function reset_user_password($email, $id) {
        $password = $this->generate_password();
        $data = array('password' => md5($password),);
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
        $message = "Your account password has been reset.<br><br>Email: " . $email . "<br>Tempolary password: " . $password . "<br>Please change your password after login.<br><br> you can login at " . base_url() . ".";
        $subject = "Password Reset";
        $this->send_email($message, $subject, $email);
        $module = "User Management";
        $activity = "reset user " . $email . "`s password";
        $this->insert_log($activity, $module);
        return array('status' => 'success', 'message' => '');
    }
    function generate_password() {
        $chars = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ023456789!@#$%^&*()_=";
        $password = substr(str_shuffle($chars), 0, 10);
        return $password;
    }
    function insert_log($activity, $module) {
        $id = $this->session->userdata('user_id');
        $data = array('fk_user_id' => $id, 'activity' => $activity, 'module' => $module, 'created_at' => date('Y\-m\-d\ H:i:s A'));
        $this->db->insert('activity_log', $data);
    }
    function send_email($message, $subject, $sendTo) {
        require_once APPPATH . 'libraries/mailer/class.phpmailer.php';
        require_once APPPATH . 'libraries/mailer/class.smtp.php';
        require_once APPPATH . 'libraries/mailer/mailer_config.php';
        include APPPATH . 'libraries/mailer/template/template.php';
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try {
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            //$mail->SMTPSecure = 'ssl';
            $mail->Host = HOST;
            $mail->Port = PORT;
            $mail->Username = GUSER;
            $mail->Password = GPWD;
            $mail->SetFrom(GUSER, 'Administrator');
            $mail->Subject = "DO NOT REPLY - " . $subject;
            $mail->IsHTML(true);
            $mail->WordWrap = 0;
            $hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:38px;letter-spacing:-1px">Hello, &#9786;</h1>';
            $thanks = "<br><br><i>This is autogenerated email please do not reply.</i><br/><br/>Thanks,<br/>Admin<br/><br/>";
            $body = $hello . $message . $thanks;
            $mail->Body = $header . $body . $footer;
            $mail->AddAddress($sendTo);
            if (!$mail->Send()) {
                $error = 'Mail error: ' . $mail->ErrorInfo;
                return array('status' => false, 'message' => $error);
            } else {
                return array('status' => true, 'message' => '');
            }
        }
        catch(phpmailerException $e) {
            $error = 'Mail error: ' . $e->errorMessage();
            return array('status' => false, 'message' => $error);
        }
        catch(Exception $e) {
            $error = 'Mail error: ' . $e->getMessage();
            return array('status' => false, 'message' => $error);
        }
    }
}
/* End of file */
