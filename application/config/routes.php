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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index.php/login']='login';
$route['tesiscti']='documento/listarxtipodocu/11';
$route['maestriati']='index.php/login/user_registration_show?idinstitucion=1&idevento=27';
$route['menu'] = 'MenuController/index';
$route['blog'] = 'blog/index';
$route['blog/view/(:num)'] = 'blog/view/$1';
$route['blog/create'] = 'blog/create';


$route['api/contabilidad/save'] = 'contabilidad/api_save_contabilidad';
$route['api/contabilidad/update'] = 'contabilidad/api_update_contabilidad';
$route['api/contabilidad/last'] = 'contabilidad/api_get_last_contabilidad';
$route['api/contabilidad/first'] = 'contabilidad/api_get_first_contabilidad';
$route['api/contabilidad/next/(:num)'] = 'contabilidad/api_get_next_contabilidad/$1';
$route['api/contabilidad/previous/(:num)'] = 'contabilidad/api_get_previous_contabilidad/$1';
$route['api/contabilidad/search'] = 'contabilidad/api_search_contabilidad';
$route['api/contabilidad/list/(:num)/(:num)'] = 'contabilidad/api_list_contabilidades/$1/$2'; // limit/offset
$route['api/beneficiarios'] = 'contabilidad/api_get_beneficiarios';
$route['api/pagadores'] = 'contabilidad/api_get_pagadores';
$route['api/reporte'] = 'contabilidad/api_get_consolidated_report';
$route['api/contabilidad/(:num)'] = 'contabilidad/api_get_contabilidad_by_id/$1'; // Mantener esta al final si hay rutas más específicas

