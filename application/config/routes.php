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

$route['manager'] = 'Manager_Beranda/index';

$route['manager/menu'] = 'Manager_Menu/index';
$route['manager/menu/create'] = 'Manager_Menu/create';
$route['manager/menu/store'] = 'Manager_Menu/store';
$route['manager/menu/show/(:any)'] = 'Manager_Menu/show/$1';
$route['manager/menu/edit/(:any)'] = 'Manager_Menu/edit/$1';
$route['manager/menu/update/(:any)'] = 'Manager_Menu/update/$1';
$route['manager/menu/destroy/(:any)'] = 'Manager_Menu/destroy/$1';

$route['manager/kupon'] = 'Manager_Kupon/index';
$route['manager/kupon/create'] = 'Manager_Kupon/create';
$route['manager/kupon/store'] = 'Manager_Kupon/store';
$route['manager/kupon/edit/(:any)'] = 'Manager_Kupon/edit/$1';
$route['manager/kupon/update/(:any)'] = 'Manager_Kupon/update/$1';
$route['manager/kupon/destroy/(:any)'] = 'Manager_Kupon/destroy/$1';

$route['manager/planning'] = 'Manager_Planning/index';
$route['manager/planning/create'] = 'Manager_Planning/create';
$route['manager/planning/store'] = 'Manager_Planning/store';
$route['manager/planning/show/(:any)'] = 'Manager_Planning/show/$1';
$route['manager/planning/edit/(:any)'] = 'Manager_Planning/edit/$1';
$route['manager/planning/update/(:any)'] = 'Manager_Planning/update/$1';
$route['manager/planning/destroy/(:any)'] = 'Manager_Planning/destroy/$1';

$route['manager/pengguna'] = 'Manager_Pengguna/index';
$route['manager/pengguna/create'] = 'Manager_Pengguna/create';
$route['manager/pengguna/store'] = 'Manager_Pengguna/store';
$route['manager/pengguna/show/(:any)'] = 'Manager_Pengguna/show/$1';
$route['manager/pengguna/edit/(:any)'] = 'Manager_Pengguna/edit/$1';
$route['manager/pengguna/update/(:any)'] = 'Manager_Pengguna/update/$1';
$route['manager/pengguna/destroy/(:any)'] = 'Manager_Pengguna/destroy/$1';

$route['manager/transaksi'] = 'Manager_Transaksi/index';
$route['manager/transaksi/show/(:any)'] = 'Manager_Transaksi/show/$1';

// -------------------------------------
// Kasir
// -------------------------------------

$route['kasir'] = 'Kasir_Transaksi/index';

$route['kasir/alur/transaksi/start'] = 'Kasir_Alur/start';
$route['kasir/alur/transaksi/detail_transaksi'] = 'Kasir_Alur/detail_transaksi';
$route['kasir/alur/transaksi/store_detail_transaksi'] = 'Kasir_Alur/store_detail_transaksi';
$route['kasir/alur/transaksi/transaksi'] = 'Kasir_Alur/transaksi';
$route['kasir/alur/transaksi/store_transaksi/(:any)'] = 'Kasir_Alur/store_transaksi/$1';

$route['kasir/transaksi'] = 'Kasir_Transaksi/index';
$route['kasir/transaksi/create'] = 'Kasir_Transaksi/create';
$route['kasir/transaksi/store'] = 'Kasir_Transaksi/store';
$route['kasir/transaksi/show/(:any)'] = 'Kasir_Transaksi/show/$1';
$route['kasir/transaksi/edit/(:any)'] = 'Kasir_Transaksi/edit/$1';
$route['kasir/transaksi/update/(:any)'] = 'Kasir_Transaksi/update/$1';
$route['kasir/transaksi/destroy/(:any)'] = 'Kasir_Transaksi/destroy/$1';
$route['kasir/transaksi/detail_create'] = 'Kasir_Transaksi/detail_create/$1';
$route['kasir/transaksi/detail_store'] = 'Kasir_Transaksi/detail_store/$1';
$route['kasir/transaksi/detail_edit/(:any)'] = 'Kasir_Transaksi/detail_edit/$1';
$route['kasir/transaksi/detail_update/(:any)'] = 'Kasir_Transaksi/detail_update/$1';
$route['kasir/transaksi/detail_destroy/(:any)'] = 'Kasir_Transaksi/detail_destroy/$1';

// -------------------------------------
// CEO
// -------------------------------------

$route['ceo'] = 'ceo_planning/index';

$route['ceo/planning'] = 'CEO_Planning/index';
$route['ceo/planning/show/(:any)'] = 'CEO_Planning/show/$1';
$route['ceo/planning/edit/(:any)'] = 'CEO_Planning/edit/$1';
$route['ceo/planning/update/(:any)'] = 'CEO_Planning/update/$1';
$route['ceo/planning/destroy/(:any)'] = 'CEO_Planning/destroy/$1';

$route['ceo/pengguna'] = 'CEO_Pengguna/index';
$route['ceo/pengguna/create'] = 'CEO_Pengguna/create';
$route['ceo/pengguna/store'] = 'CEO_Pengguna/store';
$route['ceo/pengguna/show/(:any)'] = 'CEO_Pengguna/show/$1';
$route['ceo/pengguna/edit/(:any)'] = 'CEO_Pengguna/edit/$1';
$route['ceo/pengguna/update/(:any)'] = 'CEO_Pengguna/update/$1';
$route['ceo/pengguna/destroy/(:any)'] = 'CEO_Pengguna/destroy/$1';