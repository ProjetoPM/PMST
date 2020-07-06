<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/






//rota definida para que a definição do idioma seja o primeiro nó da URL
// $route['(:any)'] = 'Welcome/index';
// $route['(:any)'] = 'Authentication/login';

//para rotas adicionas, você pode utilizar algo como
//$route['(:any)/minha-rota'] = 'Welcome/meu_metodo';
// $route['default_controller'] = 'welcome';

// Inicio Teste
// $route['(:any)/default_controller'] = 'authentication';
// $route['(:any)/authentication/register'] = 'authentication/register';
// $route['(:any)/register'] = 'register/addUser';
// $route['(:any)/projects'] = 'project/show_projects';
// $route['(:any)/new'] = 'project/project_form';
// $route['(:any)/project/(:num)'] = 'project/initial/$1';
// $route['(:any)/edit/(:num)'] = 'project/update/$1';
// $route['(:any)/researcher/(:num)'] = 'project/add_researcher_page/$1';
// $route['(:any)/delete/(:num)'] = 'project/delete/$1';
// Fim Teste



$route['default_controller'] = 'authentication';
$route['authentication/register'] = 'authentication/register';
$route['register'] = 'register/addUser';
$route['projects'] = 'project/show_projects';
$route['new'] = 'project/project_form';
$route['chat'] = 'chatcontroller/index';
$route['project/(:num)'] = 'project/initial/$1';
$route['edit/(:num)'] = 'project/update/$1';
$route['researcher/(:num)'] = 'project/add_researcher_page/$1';
$route['delete/(:num)'] = 'project/delete/$1';

$route['send-message'] = 'chatcontroller/send_text_message';
$route['chat-attachment/upload'] = 'chatcontroller/send_text_message';
$route['get-chat-history-vendor'] = 'chatcontroller/get_chat_history_by_vendor';
$route['chat-clear'] = 'chatcontroller/chat_clear_client_cs';

$route['myaccount'] = 'register/show_Edit_User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
