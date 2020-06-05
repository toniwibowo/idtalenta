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
|	http://codeigniter.com/user_guide/general/routing.html
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
//$route['default_controller']   = 'sketsanet';
$route['default_controller']   = 'home';
$route['404_override']         = 'sketsanet/page_404';
$route['translate_uri_dashes'] = FALSE;

/*
| sketsanet Route
*/
$route['page/(:any)']            = 'sketsanet/page/$1';
$route['table/(:any)']           = 'sketsanet/table/$1';
$route['login']                  = 'sketsanet/login';
$route['activate/(:num)/(:any)'] = 'sketsanet/activate/$1/$2';
$route['logout']                 = 'sketsanet/logout';
$route['register']               = 'sketsanet/register';


$route['member-register']        = 'member/register';
$route['forgot-password']        = 'sketsanet/forgot_password';
$route['reset-password/(:any)']  = 'sketsanet/reset_password/$1';
$route['signout']                = 'member/logout';

$route['tentang-kami']           = 'pages/view/1/tentang-kami';
$route['faq']           		     = 'pages/view/3/faq';
$route['syarat-ketentuan']       = 'pages/view/4/syarat';
$route['kebijakan-privasi']      = 'pages/view/5/kebijakan';

$route['classroom/(:any)']       = 'course/view/$1';
$route['course/(:num)/(:any)']   = 'course/detail/$1/$2';


$route['blog/view'] = "articles/view";
$route['payment/(:any)'] = "checkout/payment/$1";



$route['artikel/view'] = "articles/view";
$route['artikel/view/(:num)'] = "articles/view";
$route['artikel/detail/(:num)/(:any)'] = "articles/detail/$1/tes";



$route['teaching'] = "mentor/register";
$route['rekanan/detail/(:num)/(:any)'] = "partners/detail/$1/tes";


$route['about-us'] = "pages/view/1/$1";

$route['contact-us'] = "contactus";
