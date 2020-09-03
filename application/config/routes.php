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
$route['default_controller'] = 'auth';
$route['404_override'] = 'pages/page_404';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['login']['GET'] = 'auth';
$route['login']['POST'] = 'auth/signin_post';
$route['signup']['GET'] = 'auth/signup';
$route['signup']['POST'] = 'auth/signup_post';
$route['logout']['GET'] = 'auth/logout';
$route['settings']['GET'] = 'settings';
$route['settings/edit']['POST'] = 'settings/update_post';

// Dashboard
$route['dashboard'] = 'dashboard';

// Item Category
$route = baseRoute($route, "item_category", "ItemCategory");

// Item Subcategory
$route = baseRoute($route, "item_subcategory", "ItemSubcategory");

// Maps
$route = baseRoute($route, "maps", "Maps");

// Servers
$route = baseRoute($route, "servers", "Servers");

// Wiki
$route = baseRoute($route, "wiki", "Wikis");

// Items
$route = baseRoute($route, "items", "Items");

// Item Prices
$route = baseRoute($route, "item_prices", "ItemPrices");

// Recipes
$route = baseRoute($route, "recipes", "Recipes");


// Base CRUD
function baseRoute($route, $path, $controller) {	
	$route[$path]['GET'] = $controller;
	$route[$path.'/(:num)']['GET'] = $controller.'/show/$1';

	$route[$path.'/add']['GET'] = $controller.'/add_get';
	$route[$path.'/add']['POST'] = $controller.'/add_post';

	$route[$path.'/(:num)/edit']['GET'] = $controller.'/edit_get/$1';
	$route[$path.'/(:num)/edit']['POST'] = $controller.'/edit_post/$1';

	$route[$path.'/(:num)/delete']['GET'] = $controller.'/delete/$1';

	$route[$path.'/(:num)/enable']['GET'] = $controller.'/enable/$1';
	$route[$path.'/(:num)/disable']['GET'] = $controller.'/disable/$1';
	
	$route[$path.'/(:num)/status/(:num)']['GET'] = $controller.'/status/$1/$2';
	
	return $route;
}