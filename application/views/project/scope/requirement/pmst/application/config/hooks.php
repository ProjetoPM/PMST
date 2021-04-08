<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//define o hook que será executado após a execução do método __construct
//de cada controller, para que o controle do idioma seja feito de maneira
//automática
$hook['post_controller_constructor'] = array(
    'class' => 'LanguageLoader', //define a classe
    'function' => 'initialize', //define o método a ser executado
    'filename' => 'LanguageLoader.php', //define o nome do arquivo
    'filepath' => 'hooks' //define o diretório onde o arquivo está
);