<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

/*
	custom route
*/

$route['login'] = 'Auth/Auth/login';
$route['auth/logout'] = 'Auth/Auth/logout';

// routing siswa
$route['siswa/jadwal'] = 'Siswa/Jadwal';
$route['siswa/jadwal/(:any)'] = 'Siswa/Jadwal/$1';
$route['siswa/jadwal/(:any)/(:any)'] = 'Siswa/Jadwal/$1/$2';
$route['siswa/jadwal/(:any)/(:any)/(:any)'] = 'Siswa/Jadwal/$1/$2/$3';

$route['siswa/profile'] = 'Siswa/Profile';
$route['siswa/profile/(:any)'] = 'Siswa/Profile/$1';
$route['siswa/profile/(:any)/(:any)'] = 'Siswa/Profile/$1/$2';
$route['siswa/profile/(:any)/(:any)/(:any)'] = 'Siswa/Profile/$1/$2/$3';

// routing guru
$route['guru/dashboard'] = 'Guru/Dashboard/index';

// routing wali kelas
$route['wali-kelas/dashboard'] = 'WaliKelas/Dashboard/index';

// routing admin
$route['authadmin'] = 'Admin/Login';
$route['authadmin/logout'] = 'Admin/Login/logout';

$route['master/dashboard'] = 'Admin/Dashboard';
$route['master/dashboard/(:any)'] = 'Admin/Dashboard/$1';
$route['master/dashboard/(:any)/(:any)'] = 'Admin/Dashboard/$1/$2';
$route['master/dashboard/(:any)/(:any)/(:any)'] = 'Admin/Dashboard/$1/$2/$3';

$route['master/jadwal'] = 'Admin/Jadwal';
$route['master/jadwal/(:any)'] = 'Admin/Jadwal/$1';
$route['master/jadwal/(:any)/(:any)'] = 'Admin/Jadwal/$1/$2';
$route['master/jadwal/(:any)/(:any)/(:any)'] = 'Admin/Jadwal/$1/$2/$3';
