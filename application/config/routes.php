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
$route['view-all-notifications'] = 'LogActivity/index';
$route['send-message'] = 'chat/send_text_message';
$route['get-chat-history'] = 'chat/get_chat_history';
$route['chat-clear'] = 'chatcontroller/chat_clear_client_cs';

$route['myaccount'] = 'register/show_Edit_User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['integration/project-charter/new/(:num)'] = "ProjectCharter/new/$1";
$route['integration/project-charter/edit/(:num)'] = "ProjectCharter/edit/$1";
$route['integration/project-charter/insert'] = "ProjectCharter/insert";
$route['integration/project-charter/update'] = "ProjectCharter/update";

$route['integration/business-case/new/(:num)'] = "BusinessCase/new/$1";
$route['integration/business-case/edit/(:num)'] = "BusinessCase/edit/$1";
$route['integration/business-case/insert'] = "BusinessCase/insert";
$route['integration/business-case/update'] = "BusinessCase/update";

$route['integration/benefits-mp/new/(:num)'] = "BenefitsManagementPlan/new/$1";
$route['integration/benefits-mp/edit/(:num)'] = "BenefitsManagementPlan/edit/$1";
$route['integration/benefits-mp/insert'] = "BenefitsManagementPlan/insert";
$route['integration/benefits-mp/update'] = "BenefitsManagementPlan/update";

$route['integration/project-mp/new/(:num)'] = "ProjectManagementPlan/new/$1";
$route['integration/project-mp/edit/(:num)'] = "ProjectManagementPlan/edit/$1";
$route['integration/project-mp/insert'] = "ProjectManagementPlan/insert";
$route['integration/project-mp/update'] = "ProjectManagementPlan/update";

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

$route['integration/lesson-learned-register/new/(:num)'] = "LessonLearnedRegister/new/$1";
$route['integration/lesson-learned-register/edit/(:num)'] = "LessonLearnedRegister/edit/$1";
$route['integration/lesson-learned-register/list/(:num)'] = "LessonLearnedRegister/list/$1";
$route['integration/lesson-learned-register/insert/(:num)'] = "LessonLearnedRegister/insert/$1";
$route['integration/lesson-learned-register/update/(:num)'] = "LessonLearnedRegister/update/$1";
$route['integration/lesson-learned-register/delete/(:num)'] = "LessonLearnedRegister/delete/$1";

$route['integration/final-report/new/(:num)'] = "FinalReport/new/$1";
$route['integration/final-report/edit/(:num)'] = "FinalReport/edit/$1";
$route['integration/final-report/insert'] = "FinalReport/insert";
$route['integration/final-report/update'] = "FinalReport/update";

$route['scope/requirements-mp/new/(:num)'] = "RequirementsManagementPlan/new/$1";
$route['scope/requirements-mp/edit/(:num)'] = "RequirementsManagementPlan/edit/$1";
$route['scope/requirements-mp/insert'] = "RequirementsManagementPlan/insert";
$route['scope/requirements-mp/update'] = "RequirementsManagementPlan/update";

$route['scope/scope-mp/new/(:num)'] = "ScopeManagementPlan/new/$1";
$route['scope/scope-mp/edit/(:num)'] = "ScopeManagementPlan/edit/$1";
$route['scope/scope-mp/insert'] = "ScopeManagementPlan/insert";
$route['scope/scope-mp/update'] = "ScopeManagementPlan/update";

$route['scope/requirement-documentation/new/(:num)'] = "RequirementDocumentation/new/$1";
$route['scope/requirement-documentation/edit/(:num)'] = "RequirementDocumentation/edit/$1";
$route['scope/requirement-documentation/list/(:num)'] = "RequirementDocumentation/list/$1";
$route['scope/requirement-documentation/insert'] = "RequirementDocumentation/insert";
$route['scope/requirement-documentation/update/(:num)'] = "RequirementDocumentation/update/$1";
$route['scope/requirement-documentation/delete/(:num)'] = "RequirementDocumentation/delete/$1";

$route['scope/project-scope-statement/new/(:num)'] = "ProjectScopeStatement/new/$1";
$route['scope/project-scope-statement/edit/(:num)'] = "ProjectScopeStatement/edit/$1";
$route['scope/project-scope-statement/insert'] = "ProjectScopeStatement/insert";
$route['scope/project-scope-statement/update'] = "ProjectScopeStatement/update";

$route['scope/work-breakdown-structure/new/(:num)'] = "Wbs/new/$1";
$route['scope/work-breakdown-structure/edit/(:num)'] = "Wbs/edit/$1";
$route['scope/work-breakdown-structure/insert/(:num)'] = "Wbs/insert/$1";
$route['scope/work-breakdown-structure/udpate/(:num)'] = "Wbs/update/$1";

$route['schedule/schedule-mp/new/(:num)'] = "ScheduleManagementPlan/new/$1";
$route['schedule/schedule-mp/edit/(:num)'] = "ScheduleManagementPlan/edit/$1";
$route['schedule/schedule-mp/insert'] = "ScheduleManagementPlan/insert";
$route['schedule/schedule-mp/update'] = "ScheduleManagementPlan/update";

$route['schedule/activity-list/new/(:num)'] = "ActivityList/new/$1";
$route['schedule/activity-list/edit/(:num)'] = "ActivityList/edit/$1";
$route['schedule/activity-list/list/(:num)'] = "ActivityList/list/$1";
$route['schedule/activity-list/insert/(:num)'] = "ActivityList/insert/$1";
$route['schedule/activity-list/update/(:num)'] = "ActivityList/update/$1";
$route['schedule/activity-list/delete/(:num)'] = "ActivityList/delete/$1";

$route['procurement/closed-procurement-documentation/new/(:num)'] = "ClosedProcurementDocumentation/new/$1";
$route['procurement/closed-procurement-documentation/edit/(:num)'] = "ClosedProcurementDocumentation/edit/$1";
$route['procurement/closed-procurement-documentation/list/(:num)'] = "ClosedProcurementDocumentation/list/$1";
$route['procurement/closed-procurement-documentation/insert/(:num)'] = "ClosedProcurementDocumentation/insert/$1";
$route['procurement/closed-procurement-documentation/update/(:num)'] = "ClosedProcurementDocumentation/update/$1";
$route['procurement/closed-procurement-documentation/delete/(:num)'] = "ClosedProcurementDocumentation/delete/$1";

$route['schedule/earned-value-management/new/(:num)'] = "EVM/new/$1";
$route['schedule/earned-value-management/edit/(:num)'] = "EVM/edit/$1";
$route['schedule/earned-value-management/list/(:num)'] = "EVM/list/$1";
$route['schedule/earned-value-management/insert/(:num)'] = "EVM/insert/$1";
$route['schedule/earned-value-management/update/(:num)'] = "EVM/update/$1";
$route['schedule/earned-value-management/delete/(:num)'] = "EVM/delete/$1";

$route['schedule/project-schedule-network-diagram/new/(:num)'] = "ProjectScheduleNetworkDiagram/new/$1";
$route['schedule/project-schedule-network-diagram/edit/(:num)'] = "ProjectScheduleNetworkDiagram/edit/$1";
$route['schedule/project-schedule-network-diagram/list/(:num)'] = "ProjectScheduleNetworkDiagram/list/$1";
$route['schedule/project-schedule-network-diagram/insert/(:num)'] = "ProjectScheduleNetworkDiagram/insert/$1";
$route['schedule/project-schedule-network-diagram/update/(:num)'] = "ProjectScheduleNetworkDiagram/update/$1";
$route['schedule/project-schedule-network-diagram/delete/(:num)'] = "ProjectScheduleNetworkDiagram/delete/$1";

$route['schedule/resource-requirements/new/(:num)'] = "ResourceRequirements/new/$1";
$route['schedule/resource-requirements/edit/(:num)'] = "ResourceRequirements/edit/$1";
$route['schedule/resource-requirements/list/(:num)'] = "ResourceRequirements/list/$1";
$route['schedule/resource-requirements/insert/(:num)'] = "ResourceRequirements/insert/$1";
$route['schedule/resource-requirements/update/(:num)'] = "ResourceRequirements/update/$1";
$route['schedule/resource-requirements/delete/(:num)'] = "ResourceRequirements/delete/$1";

$route['schedule/duration-estimates/new/(:num)'] = "DurationEstimates/new/$1";
$route['schedule/duration-estimates/edit/(:num)'] = "DurationEstimates/edit/$1";
$route['schedule/duration-estimates/list/(:num)'] = "DurationEstimates/list/$1";
$route['schedule/duration-estimates/insert/(:num)'] = "DurationEstimates/insert/$1";
$route['schedule/duration-estimates/update/(:num)'] = "DurationEstimates/update/$1";
$route['schedule/duration-estimates/delete/(:num)'] = "DurationEstimates/delete/$1";

$route['schedule/project-calendars/new/(:num)'] = "ProjectCalendars/new/$1";
$route['schedule/project-calendars/edit/(:num)'] = "ProjectCalendars/edit/$1";
$route['schedule/project-calendars/list/(:num)'] = "ProjectCalendars/list/$1";
$route['schedule/project-calendars/insert/(:num)'] = "ProjectCalendars/insert/$1";
$route['schedule/project-calendars/update/(:num)'] = "ProjectCalendars/update/$1";
$route['schedule/project-calendars/delete/(:num)'] = "ProjectCalendars/delete/$1";



$route['cost/cost-mp/new/(:num)'] = "CostManagementPlan/new/$1";
$route['cost/cost-mp/edit/(:num)'] = "CostManagementPlan/edit/$1";
$route['cost/cost-mp/insert'] = "CostManagementPlan/insert";
$route['cost/cost-mp/update'] = "CostManagementPlan/update";

$route['cost/cost-estimates/new/(:num)'] = "CostEstimates/new/$1";
$route['cost/cost-estimates/edit/(:num)'] = "CostEstimates/edit/$1";
$route['cost/cost-estimates/list/(:num)'] = "CostEstimates/list/$1";
$route['cost/cost-estimates/insert/(:num)'] = "CostEstimates/insert/$1";
$route['cost/cost-estimates/update/(:num)'] = "CostEstimates/update/$1";
$route['cost/cost-estimates/delete/(:num)'] = "CostEstimates/delete/$1";



$route['quality/quality-mp/new/(:num)'] = "QualityManagementPlan/new/$1";
$route['quality/quality-mp/edit/(:num)'] = "QualityManagementPlan/edit/$1";
$route['quality/quality-mp/insert'] = "QualityManagementPlan/insert";
$route['quality/quality-mp/update'] = "QualityManagementPlan/update";



$route['resources/resource-mp/new/(:num)'] = "ResourceManagementPlan/new/$1";
$route['resources/resource-mp/edit/(:num)'] = "ResourceManagementPlan/edit/$1";
$route['resources/resource-mp/insert'] = "ResourceManagementPlan/insert";
$route['resources/resource-mp/update'] = "ResourceManagementPlan/update";

$route['resources/resource-breakdown-structure/new/(:num)'] = "ResourceBreakdownStructure/new/$1";
$route['resources/resource-breakdown-structure/edit/(:num)'] = "ResourceBreakdownStructure/edit/$1";
$route['resources/resource-breakdown-structure/insert/(:num)'] = "ResourceBreakdownStructure/insert/$1";
$route['resources/resource-breakdown-structure/update/(:num)'] = "ResourceBreakdownStructure/update/$1";

$route['resources/team-performance-assessments/new/(:num)'] = "teamperformanceassessments/new/$1";
$route['resources/team-performance-assessments/edit/(:num)'] = "teamperformanceassessments/edit/$1";
$route['resources/team-performance-assessments/list/(:num)'] = "teamperformanceassessments/list/$1";
$route['resources/team-performance-assessments/insert/(:num)'] = "teamperformanceassessments/insert/$1";
$route['resources/team-performance-assessments/udpate/(:num)'] = "teamperformanceassessments/update/$1";
$route['resources/team-performance-assessments/delete/(:num)'] = "teamperformanceassessments/delete/$1";



$route['communication/communications-mp/new/(:num)'] = "CommunicationsManagementPlan/new/$1";
$route['communication/communications-mp/edit/(:num)'] = "CommunicationsManagementPlan/edit/$1";
$route['communication/communications-mp/list/(:num)'] = "CommunicationsManagementPlan/list/$1";
$route['communication/communications-mp/insert/(:num)'] = "CommunicationsManagementPlan/insert/$1";
$route['communication/communications-mp/update/(:num)'] = "CommunicationsManagementPlan/update/$1";
$route['communication/communications-mp/delete/(:num)'] = "CommunicationsManagementPlan/delete/$1";
$route['communication/communications-mp/update-responsability'] = "CommunicationsManagementPlan/updateResponsability";


$route['risk/risk-mp/new/(:num)'] = "RiskManagementPlan/new/$1";
$route['risk/risk-mp/edit/(:num)'] = "RiskManagementPlan/edit/$1";
$route['risk/risk-mp/insert'] = "RiskManagementPlan/insert";
$route['risk/risk-mp/update'] = "RiskManagementPlan/update";

$route['risk/risk-register/new/(:num)'] = "RiskRegister/new/$1";
$route['risk/risk-register/edit/(:num)'] = "RiskRegister/edit/$1";
$route['risk/risk-register/list/(:num)'] = "RiskRegister/list/$1";
$route['risk/risk-register/insert/(:num)'] = "RiskRegister/insert/$1";
$route['risk/risk-register/update/(:num)'] = "RiskRegister/update/$1";
$route['risk/risk-register/delete/(:num)'] = "RiskRegister/delete/$1";

// $route['risk/risk-checklist/new/(:num)'] = "riskchecklist/new/$1";
$route['risk/risk-checklist/edit/(:num)'] = "riskchecklist/edit/$1";
$route['risk/risk-checklist/insert/(:num)'] = "riskchecklist/insert/$1";


$route['procurement/procurement-mp/new/(:num)'] = "ProcurementManagementPlan/new/$1";
$route['procurement/procurement-mp/edit/(:num)'] = "ProcurementManagementPlan/edit/$1";
$route['procurement/procurement-mp/insert'] = "ProcurementManagementPlan/insert";
$route['procurement/procurement-mp/update'] = "ProcurementManagementPlan/update";

$route['procurement/procurement-statement-of-work/new/(:num)'] = "ProcurementStatementOfWork/new/$1";
$route['procurement/procurement-statement-of-work/edit/(:num)'] = "ProcurementStatementOfWork/edit/$1";
$route['procurement/procurement-statement-of-work/list/(:num)'] = "ProcurementStatementOfWork/list/$1";
$route['procurement/procurement-statement-of-work/insert/(:num)'] = "ProcurementStatementOfWork/insert/$1";
$route['procurement/procurement-statement-of-work/update/(:num)'] = "ProcurementStatementOfWork/update/$1";
$route['procurement/procurement-statement-of-work/delete/(:num)'] = "ProcurementStatementOfWork/delete/$1";


$route['procurement/lesson-learned-register/new/(:num)'] = "LessonLearnedRegister/new/$1";
$route['procurement/lesson-learned-register/edit/(:num)'] = "LessonLearnedRegister/edit/$1";
$route['procurement/lesson-learned-register/list/(:num)'] = "LessonLearnedRegister/list/$1";
$route['procurement/lesson-learned-register/insert/(:num)'] = "LessonLearnedRegister/insert/$1";
$route['procurement/lesson-learned-register/update/(:num)'] = "LessonLearnedRegister/update/$1";
$route['procurement/lesson-learned-register/delete/(:num)'] = "LessonLearnedRegister/delete/$1";


$route['integration/assumption-log/new-assumption/(:num)'] = "AssumptionLog/new_assumption/$1";
$route['integration/assumption-log/new-constraint/(:num)'] = "AssumptionLog/new_constraint/$1";
$route['integration/assumption-log/edit/(:num)'] = "AssumptionLog/edit/$1";
$route['integration/assumption-log/list/(:num)'] = "AssumptionLog/list/$1";
$route['integration/assumption-log/insert/(:num)'] = "AssumptionLog/insert/$1";
$route['integration/assumption-log/update/(:num)'] = "AssumptionLog/update/$1";
$route['integration/assumption-log/delete/(:num)'] = "AssumptionLog/delete/$1";

$route['stakeholder/stakeholder-register/new/(:num)'] = "StakeholderRegister/new/$1";
$route['stakeholder/stakeholder-register/edit/(:num)'] = "StakeholderRegister/edit/$1";
$route['stakeholder/stakeholder-register/list/(:num)'] = "StakeholderRegister/list/$1";
$route['stakeholder/stakeholder-register/insert/(:num)'] = "StakeholderRegister/insert/$1";
$route['stakeholder/stakeholder-register/update/(:num)'] = "StakeholderRegister/update/$1";
$route['stakeholder/stakeholder-register/delete/(:num)'] = "StakeholderRegister/delete/$1";

$route['stakeholder/stakeholder-engagement-plan/new/(:num)'] = "StakeholderEngagementPlan/new/$1";
$route['stakeholder/stakeholder-engagement-plan/edit/(:num)'] = "StakeholderEngagementPlan/edit/$1";
$route['stakeholder/stakeholder-engagement-plan/list/(:num)'] = "StakeholderEngagementPlan/list/$1";
$route['stakeholder/stakeholder-engagement-plan/insert/(:num)'] = "StakeholderEngagementPlan/insert/$1";
$route['stakeholder/stakeholder-engagement-plan/update/(:num)'] = "StakeholderEngagementPlan/update/$1";
$route['stakeholder/stakeholder-engagement-plan/delete/(:num)'] = "StakeholderEngagementPlan/delete/$1";


$route['notification-board/new/(:num)'] = "notificationboard/new/$1";
$route['notification-board/edit/(:num)'] = "notificationboard/edit/$1";
$route['notification-board/list/(:num)'] = "notificationboard/list/$1";
$route['notification-board/insert'] = "notificationboard/insert";
$route['notification-board/update'] = "notificationboard/update";
$route['notification-board/delete/(:num)'] = "notificationboard/delete/$1";
