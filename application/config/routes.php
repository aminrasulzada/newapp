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
$route['default_controller'] = 'Common';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| custom routes
*/

//public user
$route['login'] = 'Common';
$route['logout'] = 'Common/logout';
$route['dashboard'] = 'Common/dashboard';
$route['question-paper'] = 'Common/questionPaper';
$route['save-answer'] = 'Common/saveAnswer';
$route['quiz'] = 'Common/startQuiz';
$route['quiz-complete'] = 'Common/quizComplete';
$route['dashboard']='Common/dashboard';
$route['answer_details/(:num)']='Common/answer_details/$1';
/*
$route['my-profile'] = 'Common/my-profile';
$route['my-profile'] = 'Common/my-profile';
$route['my-profile'] = 'Common/my-profile';
$route['my-profile'] = 'Common/my-profile';
*/

//admin user
$route['admin'] = 'admin/User';
$route['admin/User'] = 'admin/User/user_Dashboard';
$route['admin/logout'] = 'admin/User/logout';
$route['admin/dashboard'] = 'admin/User/user_Dashboard';
$route['admin/add-user'] = 'admin/Employee/add_Update_Employee';
$route['admin/manage-employee'] = 'admin/Employee';
$route['admin/edit-employee/(:num)'] = 'admin/Employee/Update_Employee/$1';
$route['admin/act-employee'] = 'admin/Employee/act';
$route['admin/del-employee'] = 'admin/EmpDesig/del_Employee';
$route['admin/admin-user'] = 'admin/Admin_user/add_admin_user';
$route['admin/manage-admin-user'] = 'admin/Admin_user/show_admin_user';
$route['admin/del-admin-user'] = 'admin/AdminUserDesig/del_admin_user';
$route['admin/edit-admin-user/(:num)'] = 'admin/Update_AdminUser/updateAdminUser/$1';
$route['admin/add-quiz-question'] = 'admin/Add_Quiz/add_question';
$route['admin/add-quiz'] = 'admin/Add_Quiz';
$route['admin/manage-quiz'] = 'admin/Add_Quiz/show_quiz';
$route['admin/manage-quiz-question'] = 'admin/Add_Quiz/show_quiz_question';
$route['admin/check-quiz/(:num)'] = 'admin/Update_quiz/update_grade/$1';
$route['admin/quiz-del'] = 'admin/QuizDel/del_quiz';
$route['admin/quest-del'] = 'admin/QuizDel/del_quest';
$route['admin/edit-quiz/(:num)'] = 'admin/Update_quiz/update_quiz/$1';
$route['admin/edit-question/(:num)'] = 'admin/Update_quiz/update_question/$1';
$route['admin/quiz-result'] = 'admin/Misc/quizResult';
