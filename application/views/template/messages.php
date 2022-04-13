<?php 
$class = '';
$message = '';

foreach ($this->session->flashdata() as $key => $value) {
    switch ($key) {
        case 'flashError': 
            $class = 'info-fill alert alert-danger mb-4';
            $message = 'flashError';
            break;
        case 'flashFail':
            $class = 'alert alert-danger mb-4';
            $message = 'flashFail';
            break;
        case 'flashCreated': 
            $class = 'alert alert-success mb-4';
            $message = 'flashCreated';
            break;
        case 'flashSuccess':
            $class = 'alert alert-success mb-4';
            $message = 'flashSuccess';
            break;
    }
}
echo "<p class='$class'><strong>{$this->session->flashdata($message)}</strong></p>";
