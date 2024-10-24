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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['contact-us'] = 'home/contactUs';
$route['about'] = 'home/aboutUs';
$route['change-password'] = 'home/changePassword';
$route['profile/remove_image'] = 'profile/remove_image';
$route['courses'] = 'home/courses';
$route['course-details'] = 'home/courseDetails';
$route['events'] = 'home/events';
$route['trainers'] = 'home/trainers';
$route['pricing'] = 'home/pricing';

//admin routes
$route['admin'] = 'Backend/Admin';
$route['login'] = 'Backend/Admin/logout';
$route['registered-users'] = 'Backend/User_registered_data';
$route['user/view_profile/(:num)'] = 'Backend/User_profile_data/view_profile/$1';

//admin crud routes
$route['admin/user-vehicle-data'] = "Backend/User_vehicle_data/vehicles/view"; //view is an action from function
$route['admin/user-vehicle-data/add'] = "Backend/User_vehicle_data/vehicles/add";
$route['admin/user-vehicle-data/edit/(:any)'] = "Backend/User_vehicle_data/vehicles/edit/$1";
$route['admin/user-vehicle-data/delete/(:any)'] = "Backend/User_vehicle_data/vehicles/delete/$1";
$route['add-user'] = "Backend/User_registered_data/add_user";
