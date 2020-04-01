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
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['beranda'] = 'auth/login';

// -------------------------------------
// Manager
// -------------------------------------

$route['manager'] = 'manager_beranda/index';

$route['manager/menu'] = 'manager_menu/index';
$route['manager/menu/create'] = 'manager_menu/create';
$route['manager/menu/store'] = 'manager_menu/store';
$route['manager/menu/show/(:any)'] = 'manager_menu/show/$1';
$route['manager/menu/edit/(:any)'] = 'manager_menu/edit/$1';
$route['manager/menu/update/(:any)'] = 'manager_menu/update/$1';
$route['manager/menu/destroy/(:any)'] = 'manager_menu/destroy/$1';

$route['manager/kupon'] = 'manager_kupon/index';
$route['manager/kupon/create'] = 'manager_kupon/create';
$route['manager/kupon/store'] = 'manager_kupon/store';
$route['manager/kupon/edit/(:any)'] = 'manager_kupon/edit/$1';
$route['manager/kupon/update/(:any)'] = 'manager_kupon/update/$1';
$route['manager/kupon/destroy/(:any)'] = 'manager_kupon/destroy/$1';

$route['manager/planning'] = 'manager_planning/index';
$route['manager/planning/create'] = 'manager_planning/create';
$route['manager/planning/store'] = 'manager_planning/store';
$route['manager/planning/show/(:any)'] = 'manager_planning/show/$1';
$route['manager/planning/edit/(:any)'] = 'manager_planning/edit/$1';
$route['manager/planning/update/(:any)'] = 'manager_planning/update/$1';
$route['manager/planning/destroy/(:any)'] = 'manager_planning/destroy/$1';

$route['manager/pengguna'] = 'manager_pengguna/index';
$route['manager/pengguna/create'] = 'manager_pengguna/create';
$route['manager/pengguna/store'] = 'manager_pengguna/store';
$route['manager/pengguna/show/(:any)'] = 'manager_pengguna/show/$1';
$route['manager/pengguna/edit/(:any)'] = 'manager_pengguna/edit/$1';
$route['manager/pengguna/update/(:any)'] = 'manager_pengguna/update/$1';
$route['manager/pengguna/destroy/(:any)'] = 'manager_pengguna/destroy/$1';

$route['manager/transaksi'] = 'manager_transaksi/index';
$route['manager/transaksi/show/(:any)'] = 'manager_transaksi/show/$1';

// -------------------------------------
// Kasir
// -------------------------------------

$route['kasir'] = 'kasir_transaksi/index';

$route['kasir/alur/transaksi/start'] = 'kasir_alur/start';
$route['kasir/alur/transaksi/detail_transaksi'] = 'kasir_alur/detail_transaksi';
$route['kasir/alur/transaksi/store_detail_transaksi'] = 'kasir_alur/store_detail_transaksi';
$route['kasir/alur/transaksi/transaksi'] = 'kasir_alur/transaksi';
$route['kasir/alur/transaksi/store_transaksi/(:any)'] = 'kasir_alur/store_transaksi/$1';

$route['kasir/transaksi'] = 'kasir_transaksi/index';
$route['kasir/transaksi/create'] = 'kasir_transaksi/create';
$route['kasir/transaksi/store'] = 'kasir_transaksi/store';
$route['kasir/transaksi/show/(:any)'] = 'kasir_transaksi/show/$1';
$route['kasir/transaksi/edit/(:any)'] = 'kasir_transaksi/edit/$1';
$route['kasir/transaksi/update/(:any)'] = 'kasir_transaksi/update/$1';
$route['kasir/transaksi/destroy/(:any)'] = 'kasir_transaksi/destroy/$1';
$route['kasir/transaksi/detail_create'] = 'kasir_transaksi/detail_create/$1';
$route['kasir/transaksi/detail_store'] = 'kasir_transaksi/detail_store/$1';
$route['kasir/transaksi/detail_edit/(:any)'] = 'kasir_transaksi/detail_edit/$1';
$route['kasir/transaksi/detail_update/(:any)'] = 'kasir_transaksi/detail_update/$1';
$route['kasir/transaksi/detail_destroy/(:any)'] = 'kasir_transaksi/detail_destroy/$1';

// -------------------------------------
// CEO
// -------------------------------------

$route['ceo'] = 'ceo_planning/index';

$route['ceo/planning'] = 'ceo_planning/index';
$route['ceo/planning/show/(:any)'] = 'ceo_planning/show/$1';
$route['ceo/planning/edit/(:any)'] = 'ceo_planning/edit/$1';
$route['ceo/planning/update/(:any)'] = 'ceo_planning/update/$1';
$route['ceo/planning/destroy/(:any)'] = 'ceo_planning/destroy/$1';

$route['ceo/pengguna'] = 'ceo_pengguna/index';
$route['ceo/pengguna/create'] = 'ceo_pengguna/create';
$route['ceo/pengguna/store'] = 'ceo_pengguna/store';
$route['ceo/pengguna/show/(:any)'] = 'ceo_pengguna/show/$1';
$route['ceo/pengguna/edit/(:any)'] = 'ceo_pengguna/edit/$1';
$route['ceo/pengguna/update/(:any)'] = 'ceo_pengguna/update/$1';
$route['ceo/pengguna/destroy/(:any)'] = 'ceo_pengguna/destroy/$1';
