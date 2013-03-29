<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//front store routes
$route['default_controller'] 			= "front_store/controller_front_store/index";
$route['dashboard']						= "front_store/controller_front_store/my_account";
$route['dashboard/logout']	 			= "front_store/controller_front_store/logout";

//back store
$route['admin']  						= 'back_store/controller_back_store_main/index';

$route['admin/order']					= 'back_store/controller_back_store_order/index';
$route['admin/order/(:any)']			= 'back_store/controller_back_store_order/view_order/$1';
$route['admin/order/new']				= 'back_store/controller_back_store_order/add_order';
$route['admin/order/modify']			= 'back_store/controller_back_store_order/modify_order/$1';
$route['admin/order/delete/(:any)']		= 'back_store/controller_back_store_order/delete_order/$1';

$route['admin/customer'] 				= 'back_store/controller_back_store_customer/index';
$route['admin/customer/(:num)'] 		= 'back_store/controller_back_store_customer/index/$1';
$route['admin/customer/info/(:num)']	= 'back_store/controller_back_store_customer/customer_info/$1';
$route['admin/customer/new']			= 'back_store/controller_back_store_customer/add_customer';
$route['admin/customer/delete/(:any)']	= 'back_store/controller_back_store_customer/delete_customer/$1';
$route['admin/customer/user-profile/modify'] = 'back_store/controller_back_store_customer/modify_customer_profile';
$route['admin/customer/user-account/modify'] = 'back_store/controller_back_store_customer/modify_customer_account';


$route['admin/report']					= 'back_store/controller_back_store_report/index';

$route['admin/category']				= 'back_store/controller_back_store_category/index';
$route['admin/category/(:num)']			= 'back_store/controller_back_store_category/index/$1';
$route['admin/category/info/(:num)']	= 'back_store/controller_back_store_category/category_info/$1';
$route['admin/category/add-new-category']= 'back_store/controller_back_store_category/add_new_category_page';
$route['admin/category/new']			= 'back_store/controller_back_store_category/add_category';
$route['admin/category/modify']			= 'back_store/controller_back_store_category/modify_category';
$route['admin/category/delete/(:num)']	= 'back_store/controller_back_store_category/delete_category/$1';

$route['admin/product']					= 'back_store/controller_back_store_product/index';
$route['admin/product/(:num)']			= 'back_store/controller_back_store_product/index/$1';
$route['admin/product/info/(:num)']		= 'back_store/controller_back_store_product/product_info/$1';
$route['admin/product/add-new-product']	= 'back_store/controller_back_store_product/add_new_product_page';
$route['admin/product/new']				= 'back_store/controller_back_store_product/add_product';
$route['admin/product/modify']			= 'back_store/controller_back_store_product/modify_product';
$route['admin/product/delete/(:num)']	= 'back_store/controller_back_store_product/delete_product/$1';

$route['admin/blog']					= 'back_store/controller_back_store_blog/index';
$route['admin/blog/(:num)']				= 'back_store/controller_back_store_blog/index/$1';
$route['admin/blog/info/(:any)']		= 'back_store/controller_back_store_blog/blog_info/$1';
$route['admin/blog/add-new-blog']		= 'back_store/controller_back_store_blog/add_new_blog_page';
$route['admin/blog/new']				= 'back_store/controller_back_store_blog/add_blog';
$route['admin/blog/modify']				= 'back_store/controller_back_store_blog/modify_blog';
$route['admin/blog/delete/(:num)']		= 'back_store/controller_back_store_blog/delete_blog/$1';

$route['admin/logout']					= 'back_store/controller_back_store_main/logout';

//login routes
$route['auth'] 		 	 				= 'front_store/controller_front_store_login/index';
$route['auth/login']    				= 'front_store/controller_front_store_login/login';

//registration routes
$route['auth/register'] 				= 'front_store/controller_front_store_registration/index'; 
$route['auth/register/new'] 			= 'front_store/controller_front_store_registration/register'; 
//etc
$route['404_override'] 			= '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */