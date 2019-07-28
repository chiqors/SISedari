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

$route['manager'] = 'entities/manager/beranda/index';

$route['manager/menu'] = 'entities/manager/menu/index';
$route['manager/menu/create'] = 'entities/manager/menu/create';
$route['manager/menu/store'] = 'entities/manager/menu/store';
$route['manager/menu/show/(:any)'] = 'entities/manager/menu/show/$1';
$route['manager/menu/edit/(:any)'] = 'entities/manager/menu/edit/$1';
$route['manager/menu/update/(:any)'] = 'entities/manager/menu/update/$1';
$route['manager/menu/destroy/(:any)'] = 'entities/manager/menu/destroy/$1';

$route['manager/kupon'] = 'entities/manager/kupon/index';
$route['manager/kupon/create'] = 'entities/manager/kupon/create';
$route['manager/kupon/store'] = 'entities/manager/kupon/store';
$route['manager/kupon/edit/(:any)'] = 'entities/manager/kupon/edit/$1';
$route['manager/kupon/update/(:any)'] = 'entities/manager/kupon/update/$1';
$route['manager/kupon/destroy/(:any)'] = 'entities/manager/kupon/destroy/$1';

$route['manager/planning'] = 'entities/manager/planning/index';
$route['manager/planning/create'] = 'entities/manager/planning/create';
$route['manager/planning/store'] = 'entities/manager/planning/store';
$route['manager/planning/show/(:any)'] = 'entities/manager/planning/show/$1';
$route['manager/planning/edit/(:any)'] = 'entities/manager/planning/edit/$1';
$route['manager/planning/update/(:any)'] = 'entities/manager/planning/update/$1';
$route['manager/planning/destroy/(:any)'] = 'entities/manager/planning/destroy/$1';

$route['manager/pengguna'] = 'entities/manager/pengguna/index';
$route['manager/pengguna/create'] = 'entities/manager/pengguna/create';
$route['manager/pengguna/store'] = 'entities/manager/pengguna/store';
$route['manager/pengguna/show/(:any)'] = 'entities/manager/pengguna/show/$1';
$route['manager/pengguna/edit/(:any)'] = 'entities/manager/pengguna/edit/$1';
$route['manager/pengguna/update/(:any)'] = 'entities/manager/pengguna/update/$1';
$route['manager/pengguna/destroy/(:any)'] = 'entities/manager/pengguna/destroy/$1';

$route['manager/transaksi'] = 'entities/manager/transaksi/index';
$route['manager/transaksi/show/(:any)'] = 'entities/manager/transaksi/show/$1';

// -------------------------------------
// Kasir
// -------------------------------------

$route['kasir'] = 'entities/kasir/transaksi/index';

$route['kasir/alur/transaksi/start'] = 'entities/kasir/alur/start';
$route['kasir/alur/transaksi/detail_transaksi'] = 'entities/kasir/alur/detail_transaksi';
$route['kasir/alur/transaksi/store_detail_transaksi'] = 'entities/kasir/alur/store_detail_transaksi';
$route['kasir/alur/transaksi/transaksi'] = 'entities/kasir/alur/transaksi';
$route['kasir/alur/transaksi/store_transaksi/(:any)'] = 'entities/kasir/alur/store_transaksi/$1';

$route['kasir/transaksi'] = 'entities/kasir/transaksi/index';
$route['kasir/transaksi/create'] = 'entities/kasir/transaksi/create';
$route['kasir/transaksi/store'] = 'entities/kasir/transaksi/store';
$route['kasir/transaksi/show/(:any)'] = 'entities/kasir/transaksi/show/$1';
$route['kasir/transaksi/edit/(:any)'] = 'entities/kasir/transaksi/edit/$1';
$route['kasir/transaksi/update/(:any)'] = 'entities/kasir/transaksi/update/$1';
$route['kasir/transaksi/destroy/(:any)'] = 'entities/kasir/transaksi/destroy/$1';
$route['kasir/transaksi/detail_create'] = 'entities/kasir/transaksi/detail_create/$1';
$route['kasir/transaksi/detail_store'] = 'entities/kasir/transaksi/detail_store/$1';
$route['kasir/transaksi/detail_edit/(:any)'] = 'entities/kasir/transaksi/detail_edit/$1';
$route['kasir/transaksi/detail_update/(:any)'] = 'entities/kasir/transaksi/detail_update/$1';
$route['kasir/transaksi/detail_destroy/(:any)'] = 'entities/kasir/transaksi/detail_destroy/$1';

// -------------------------------------
// CEO
// -------------------------------------

$route['ceo'] = 'entities/ceo/planning/index';

$route['ceo/planning'] = 'entities/ceo/planning/index';
$route['ceo/planning/show/(:any)'] = 'entities/ceo/planning/show/$1';
$route['ceo/planning/edit/(:any)'] = 'entities/ceo/planning/edit/$1';
$route['ceo/planning/update/(:any)'] = 'entities/ceo/planning/update/$1';
$route['ceo/planning/destroy/(:any)'] = 'entities/ceo/planning/destroy/$1';

$route['ceo/pengguna'] = 'entities/ceo/pengguna/index';
$route['ceo/pengguna/create'] = 'entities/ceo/pengguna/create';
$route['ceo/pengguna/store'] = 'entities/ceo/pengguna/store';
$route['ceo/pengguna/show/(:any)'] = 'entities/ceo/pengguna/show/$1';
$route['ceo/pengguna/edit/(:any)'] = 'entities/ceo/pengguna/edit/$1';
$route['ceo/pengguna/update/(:any)'] = 'entities/ceo/pengguna/update/$1';
$route['ceo/pengguna/destroy/(:any)'] = 'entities/ceo/pengguna/destroy/$1';

/*
$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/
