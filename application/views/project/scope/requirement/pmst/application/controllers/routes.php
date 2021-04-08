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

$route['project/(:num)'] = 'project/initial/$1';
$route['edit/(:num)'] = 'project/update/$1';
$route['researcher/(:num)'] = 'project/add_researcher_page/$1';
$route['delete/(:num)'] = 'project/delete/$1';


$route['chat'] = 'chat/index';
$route['view-all-notifications'] = 'Logactivity/index';
$route['send-message'] = 'chat/send_text_message';
$route['get-chat-history'] = 'chat/get_chat_history';
$route['chat-clear'] = 'chatcontroller/chat_clear_client_cs';

$route['myaccount'] = 'register/show_Edit_User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['integration/project-charter/new/(:num)'] = "projectcharter/new/$1";
$route['integration/project-charter/edit/(:num)'] = "projectcharter/edit/$1";
$route['integration/project-charter/insert'] = "projectcharter/insert";
$route['integration/project-charter/update'] = "projectcharter/update";

$route['integration/business-case/new/(:num)'] = "businesscase/new/$1";
$route['integration/business-case/edit/(:num)'] = "businesscase/edit/$1";
$route['integration/business-case/insert'] = "businesscase/insert";
$route['integration/business-case/update'] = "businesscase/update";

$route['integration/benefits-mp/new/(:num)'] = "benefitsmanagementplan/new/$1";
$route['integration/benefits-mp/edit/(:num)'] = "benefitsmanagementplan/edit/$1";
$route['integration/benefits-mp/insert'] = "benefitsmanagementplan/insert";
$route['integration/benefits-mp/update'] = "benefitsmanagementplan/update";

$route['integration/project-mp/new/(:num)'] = "projectmanagementplan/new/$1";
$route['integration/project-mp/edit/(:num)'] = "projectmanagementplan/edit/$1";
$route['integration/project-mp/insert'] = "projectmanagementplan/insert";
$route['integration/project-mp/update'] = "projectmanagementplan/update";

$route['integration/project-performance-report/new/(:num)'] = "projectperformancereport/new/$1";
$route['integration/project-performance-report/edit/(:num)'] = "projectperformancereport/edit/$1";
$route['integration/project-performance-report/list/(:num)'] = "projectperformancereport/list/$1";
$route['integration/project-performance-report/insert/(:num)'] = "projectperformancereport/insert/$1";
$route['integration/project-performance-report/update/(:num)'] = "projectperformancereport/update/$1";
$route['integration/project-performance-report/delete/(:num)'] = "projectperformancereport/delete/$1";

$route['integration/deliverable-status/new/(:num)'] = "deliverablestatus/new/$1";
$route['integration/deliverable-status/edit/(:num)'] = "deliverablestatus/edit/$1";
$route['integration/deliverable-status/list/(:num)'] = "deliverablestatus/list/$1";
$route['integration/deliverable-status/insert/(:num)'] = "deliverablestatus/insert/$1";
$route['integration/deliverable-status/update/(:num)'] = "deliverablestatus/update/$1";
$route['integration/deliverable-status/delete/(:num)'] = "deliverablestatus/delete/$1";

$route['integration/work-performance-reports/new/(:num)'] = "workperformancereports/new/$1";
$route['integration/work-performance-reports/edit/(:num)'] = "workperformancereports/edit/$1";
$route['integration/work-performance-reports/list/(:num)'] = "workperformancereports/list/$1";
$route['integration/work-performance-reports/insert/(:num)'] = "workperformancereports/insert/$1";
$route['integration/work-performance-reports/update/(:num)'] = "workperformancereports/update/$1";
$route['integration/work-performance-reports/delete/(:num)'] = "workperformancereports/delete/$1";

$route['integration/issue-log/new/(:num)'] = "issuelog/new/$1";
$route['integration/issue-log/edit/(:num)'] = "issuelog/edit/$1";
$route['integration/issue-log/list/(:num)'] = "issuelog/list/$1";
$route['integration/issue-log/insert/(:num)'] = "issuelog/insert/$1";
$route['integration/issue-log/update/(:num)'] = "issuelog/update/$1";
$route['integration/issue-log/delete/(:num)'] = "issuelog/delete/$1";

$route['integration/change-request/new/(:num)'] = "changerequest/new/$1";
$route['integration/change-request/edit/(:num)'] = "changerequest/edit/$1";
$route['integration/change-request/list/(:num)'] = "changerequest/list/$1";
$route['integration/change-request/insert/(:num)'] = "changerequest/insert/$1";
$route['integration/change-request/update/(:num)'] = "changerequest/update/$1";
$route['integration/change-request/delete/(:num)'] = "changerequest/delete/$1";

$route['integration/change-log/new/(:num)'] = "changelog/new/$1";
$route['integration/change-log/edit/(:num)'] = "changelog/edit/$1";
$route['integration/change-log/list/(:num)'] = "changelog/list/$1";
$route['integration/change-log/insert'] = "changelog/insert";
$route['integration/change-log/update'] = "changelog/update";
$route['integration/change-log/delete/(:num)'] = "changelog/delete/$1";

$route['integration/project-closure/new/(:num)'] = "projectclosure/new/$1";
$route['integration/project-closure/edit/(:num)'] = "projectclosure/edit/$1";
$route['integration/project-closure/insert/(:num)'] = "projectclosure/insert/$1";
$route['integration/project-closure/update/(:num)'] = "projectclosure/update/$1";



$route['scope/requirements-mp/new/(:num)'] = "requirementsmanagementplan/new/$1";
$route['scope/requirements-mp/edit/(:num)'] = "requirementsmanagementplan/edit/$1";
$route['scope/requirements-mp/insert/(:num)'] = "requirementsmanagementplan/insert/$1";
$route['scope/requirements-mp/update/(:num)'] = "requirementsmanagementplan/update/$1";

$route['scope/scope-mp/new/(:num)'] = "scopemanagementplan/new/$1";
$route['scope/scope-mp/edit/(:num)'] = "scopemanagementplan/edit/$1";
$route['scope/scope-mp/insert/(:num)'] = "scopemanagementplan/insert/$1";
$route['scope/scope-mp/update/(:num)'] = "scopemanagementplan/update/$1";

$route['scope/requirement-documentation/new/(:num)'] = "requirementdocumentation/new/$1";
$route['scope/requirement-documentation/edit/(:num)'] = "requirementdocumentation/edit/$1";
$route['scope/requirement-documentation/list/(:num)'] = "requirementdocumentation/list/$1";
$route['scope/requirement-documentation/insert/(:num)'] = "requirementdocumentation/insert/$1";
$route['scope/requirement-documentation/update/(:num)'] = "requirementdocumentation/update/$1";
$route['scope/requirement-documentation/delete/(:num)'] = "requirementdocumentation/delete/$1";

$route['scope/project-scope-statement/new/(:num)'] = "projectscopestatement/new/$1";
$route['scope/project-scope-statement/edit/(:num)'] = "projectscopestatement/edit/$1";
$route['scope/project-scope-statement/insert/(:num)'] = "projectscopestatement/insert/$1";
$route['scope/project-scope-statement/update/(:num)'] = "projectscopestatement/update/$1";

$route['scope/work-breakdown-structure/new/(:num)'] = "wbs/new/$1";
$route['scope/work-breakdown-structure/edit/(:num)'] = "wbs/edit/$1";
$route['scope/work-breakdown-structure/insert/(:num)'] = "wbs/insert/$1";
$route['scope/work-breakdown-structure/udpate/(:num)'] = "wbs/update/$1";



$route['schedule/schedule-mp/new/(:num)'] = "schedulemanagementplan/new/$1";
$route['schedule/schedule-mp/edit/(:num)'] = "schedulemanagementplan/edit/$1";
$route['schedule/schedule-mp/insert/(:num)'] = "schedulemanagementplan/insert/$1";
$route['schedule/schedule-mp/update/(:num)'] = "schedulemanagementplan/update/$1";

$route['schedule/activity-list/new/(:num)'] = "activitylist/new/$1";
$route['schedule/activity-list/edit/(:num)'] = "activitylist/edit/$1";
$route['schedule/activity-list/list/(:num)'] = "activitylist/list/$1";
$route['schedule/activity-list/insert/(:num)'] = "activitylist/insert/$1";
$route['schedule/activity-list/update/(:num)'] = "activitylist/update/$1";
$route['schedule/activity-list/delete/(:num)'] = "activitylist/delete/$1";

$route['schedule/earned-value-management/new/(:num)'] = "evm/new/$1";
$route['schedule/earned-value-management/edit/(:num)'] = "evm/edit/$1";
$route['schedule/earned-value-management/list/(:num)'] = "evm/list/$1";
$route['schedule/earned-value-management/insert/(:num)'] = "evm/insert/$1";
$route['schedule/earned-value-management/update/(:num)'] = "evm/update/$1";
$route['schedule/earned-value-management/delete/(:num)'] = "evm/delete/$1";

$route['schedule/project-schedule-network-diagram/new/(:num)'] = "projectschedulenetworkdiagram/new/$1";
$route['schedule/project-schedule-network-diagram/edit/(:num)'] = "projectschedulenetworkdiagram/edit/$1";
$route['schedule/project-schedule-network-diagram/list/(:num)'] = "projectschedulenetworkdiagram/list/$1";
$route['schedule/project-schedule-network-diagram/insert/(:num)'] = "projectschedulenetworkdiagram/insert/$1";
$route['schedule/project-schedule-network-diagram/update/(:num)'] = "projectschedulenetworkdiagram/update/$1";
$route['schedule/project-schedule-network-diagram/delete/(:num)'] = "projectschedulenetworkdiagram/delete/$1";

$route['schedule/resource-requirements/new/(:num)'] = "resourcerequirements/new/$1";
$route['schedule/resource-requirements/edit/(:num)'] = "resourcerequirements/edit/$1";
$route['schedule/resource-requirements/list/(:num)'] = "resourcerequirements/list/$1";
$route['schedule/resource-requirements/insert/(:num)'] = "resourcerequirements/insert/$1";
$route['schedule/resource-requirements/update/(:num)'] = "resourcerequirements/update/$1";
$route['schedule/resource-requirements/delete/(:num)'] = "resourcerequirements/delete/$1";

$route['schedule/duration-estimates/new/(:num)'] = "durationestimates/new/$1";
$route['schedule/duration-estimates/edit/(:num)'] = "durationestimates/edit/$1";
$route['schedule/duration-estimates/list/(:num)'] = "durationestimates/list/$1";
$route['schedule/duration-estimates/insert/(:num)'] = "durationestimates/insert/$1";
$route['schedule/duration-estimates/update/(:num)'] = "durationestimates/update/$1";
$route['schedule/duration-estimates/delete/(:num)'] = "durationestimates/delete/$1";

$route['schedule/project-calendars/new/(:num)'] = "projectcalendars/new/$1";
$route['schedule/project-calendars/edit/(:num)'] = "projectcalendars/edit/$1";
$route['schedule/project-calendars/list/(:num)'] = "projectcalendars/list/$1";
$route['schedule/project-calendars/insert/(:num)'] = "projectcalendars/insert/$1";
$route['schedule/project-calendars/update/(:num)'] = "projectcalendars/update/$1";
$route['schedule/project-calendars/delete/(:num)'] = "projectcalendars/delete/$1";



$route['cost/cost-mp/new/(:num)'] = "costmanagementplan/new/$1";
$route['cost/cost-mp/edit/(:num)'] = "costmanagementplan/edit/$1";
$route['cost/cost-mp/insert'] = "costmanagementplan/insert";
$route['cost/cost-mp/update'] = "costmanagementplan/update";

$route['cost/cost-estimates/new/(:num)'] = "costestimates/new/$1";
$route['cost/cost-estimates/edit/(:num)'] = "costestimates/edit/$1";
$route['cost/cost-estimates/list/(:num)'] = "costestimates/list/$1";
$route['cost/cost-estimates/insert/(:num)'] = "costestimates/insert/$1";
$route['cost/cost-estimates/update/(:num)'] = "costestimates/update/$1";
$route['cost/cost-estimates/delete/(:num)'] = "costestimates/delete/$1";



$route['quality/quality-mp/new/(:num)'] = "qualitymanagementplan/new/$1";
$route['quality/quality-mp/edit/(:num)'] = "qualitymanagementplan/edit/$1";
$route['quality/quality-mp/insert'] = "qualitymanagementplan/insert";
$route['quality/quality-mp/update'] = "qualitymanagementplan/update";



$route['resources/resource-mp/new/(:num)'] = "resourcemanagementplan/new/$1";
$route['resources/resource-mp/edit/(:num)'] = "resourcemanagementplan/edit/$1";
$route['resources/resource-mp/insert'] = "resourcemanagementplan/insert";
$route['resources/resource-mp/update'] = "resourcemanagementplan/update";

$route['resources/resource-breakdown-structure/new/(:num)'] = "resourcebreakdownstructure/new/$1";
$route['resources/resource-breakdown-structure/edit/(:num)'] = "resourcebreakdownstructure/edit/$1";
$route['resources/resource-breakdown-structure/insert/(:num)'] = "resourcebreakdownstructure/insert/$1";
$route['resources/resource-breakdown-structure/update/(:num)'] = "resourcebreakdownstructure/update/$1";

$route['resources/team-performance-assessments/new/(:num)'] = "teamperformanceassessments/new/$1";
$route['resources/team-performance-assessments/edit/(:num)'] = "teamperformanceassessments/edit/$1";
$route['resources/team-performance-assessments/list/(:num)'] = "teamperformanceassessments/list/$1";
$route['resources/team-performance-assessments/insert/(:num)'] = "teamperformanceassessments/insert/$1";
$route['resources/team-performance-assessments/udpate/(:num)'] = "teamperformanceassessments/update/$1";
$route['resources/team-performance-assessments/delete/(:num)'] = "teamperformanceassessments/delete/$1";



$route['communication/communications-mp/new/(:num)'] = "communicationsmanagementplan/new/$1";
$route['communication/communications-mp/edit/(:num)'] = "communicationsmanagementplan/edit/$1";
$route['communication/communications-mp/list/(:num)'] = "communicationsmanagementplan/list/$1";
$route['communication/communications-mp/insert/(:num)'] = "communicationsmanagementplan/insert/$1";
$route['communication/communications-mp/update/(:num)'] = "communicationsmanagementplan/update/$1";
$route['communication/communications-mp/delete/(:num)'] = "communicationsmanagementplan/delete/$1";
$route['communication/communications-mp/update-responsability'] = "communicationsmanagementplan/updateResponsability";


$route['risk/risk-mp/new/(:num)'] = "riskmanagementplan/new/$1";
$route['risk/risk-mp/edit/(:num)'] = "riskmanagementplan/edit/$1";
$route['risk/risk-mp/insert'] = "riskmanagementplan/insert";
$route['risk/risk-mp/update'] = "riskmanagementplan/update";

$route['risk/risk-register/new/(:num)'] = "riskregister/new/$1";
$route['risk/risk-register/edit/(:num)'] = "riskregister/edit/$1";
$route['risk/risk-register/list/(:num)'] = "riskregister/list/$1";
$route['risk/risk-register/insert/(:num)'] = "riskregister/insert/$1";
$route['risk/risk-register/update/(:num)'] = "riskregister/update/$1";
$route['risk/risk-register/delete/(:num)'] = "riskregister/delete/$1";

$route['risk/risk-checklist/new/(:num)'] = "riskchecklist/new/$1";
$route['risk/risk-checklist/insert/(:num)'] = "riskchecklist/insert/$1";


$route['procurement/procurement-mp/new/(:num)'] = "procurementmanagementplan/new/$1";
$route['procurement/procurement-mp/edit/(:num)'] = "procurementmanagementplan/edit/$1";
$route['procurement/procurement-mp/insert'] = "procurementmanagementplan/insert";
$route['procurement/procurement-mp/update'] = "procurementmanagementplan/update";

$route['procurement/procurement-statement-of-work/new/(:num)'] = "procurementstatementofwork/new/$1";
$route['procurement/procurement-statement-of-work/edit/(:num)'] = "procurementstatementofwork/edit/$1";
$route['procurement/procurement-statement-of-work/list/(:num)'] = "procurementstatementofwork/list/$1";
$route['procurement/procurement-statement-of-work/insert/(:num)'] = "procurementstatementofwork/insert/$1";
$route['procurement/procurement-statement-of-work/update/(:num)'] = "procurementstatementofwork/update/$1";
$route['procurement/procurement-statement-of-work/delete/(:num)'] = "procurementstatementofwork/delete/$1";



$route['stakeholder/stakeholder-register/new/(:num)'] = "stakeholderregister/new/$1";
$route['stakeholder/stakeholder-register/edit/(:num)'] = "stakeholderregister/edit/$1";
$route['stakeholder/stakeholder-register/list/(:num)'] = "stakeholderregister/list/$1";
$route['stakeholder/stakeholder-register/insert/(:num)'] = "stakeholderregister/insert/$1";
$route['stakeholder/stakeholder-register/update/(:num)'] = "stakeholderregister/update/$1";
$route['stakeholder/stakeholder-register/delete/(:num)'] = "stakeholderregister/delete/$1";

$route['stakeholder/stakeholder-engagement-plan/new/(:num)'] = "stakeholderengagementplan/new/$1";
$route['stakeholder/stakeholder-engagement-plan/edit/(:num)'] = "stakeholderengagementplan/edit/$1";
$route['stakeholder/stakeholder-engagement-plan/list/(:num)'] = "stakeholderengagementplan/list/$1";
$route['stakeholder/stakeholder-engagement-plan/insert/(:num)'] = "stakeholderengagementplan/insert/$1";
$route['stakeholder/stakeholder-engagement-plan/update/(:num)'] = "stakeholderengagementplan/update/$1";
$route['stakeholder/stakeholder-engagement-plan/delete/(:num)'] = "stakeholderengagementplan/delete/$1";


$route['notification-board/new/(:num)'] = "notificationboard/new/$1";
$route['notification-board/edit/(:num)'] = "notificationboard/edit/$1";
$route['notification-board/list/(:num)'] = "notificationboard/list/$1";
$route['notification-board/insert'] = "notificationboard/insert";
$route['notification-board/update'] = "notificationboard/update";
$route['notification-board/delete/(:num)'] = "notificationboard/delete/$1";



