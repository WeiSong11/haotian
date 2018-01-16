<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Admin Panel',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',
    'grocery_title'=> '',	// Added by IlChol (2017.09.13)
	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js',
            'assets/dist/admin/adsproduct.js',		// Added by IlChol (2017.09.13)
            'assets/dist/admin/bootstrap-datetimepicker.js'	// Added by IlChol (2017.09.13)
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css',
			'assets/dist/admin/adsproduct.css',	// Added by IlChol (2017.09.13)
            'assets/dist/admin/bootstrap-datetimepicker.css'	// Added by IlChol (2017.09.13)
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',

    // Multilingual settings
    'languages' => array(
        'default'		=> 'cn',
        'autoload'		=> array('general'),
        'available'		=> array(
            'cn' => array(
                'label'	=> '简体中文',
                'value'	=> 'simplified-chinese'
            ),
            'en' => array(
                'label'	=> 'English',
                'value'	=> 'english'
            )
        )
    ),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'user' => array(
			'name'		=> 'users_management',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'users_list'    => 'user',
				'create_user'	=> 'user/create',
				'user_groups'	=> 'user/group',
			)
		),
		'panel' => array(
			'name'		=> 'admin_panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'admin_users_list'		=> 'panel/admin_user',
				'create_admin_user'		=> 'panel/admin_user_create',
				'admin_user_groups'		=> 'panel/admin_user_group',
			)
		),	// Added by IlChol (2017.09.13)
        'adsproduct' => array(
            'name'		=> 'ads_product_management',
            'url'		=> 'adsproduct',
            'icon'		=> 'fa fa-buysellads',
            'children'  => array(
                'ads_management'			=> 'adsproduct/ads_management',
                'product_management'		=> 'adsproduct/product_management',
            )
        ),
		'logout' => array(
			'name'		=> 'sign_out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
        'adsproduct/ads_management'	    => array('webmaster', 'admin', 'manager'),	// Added by IlChol (2017.09.13)
        'adsproduct/product_management'  => array('webmaster', 'admin', 'manager'),	// Added by IlChol (2017.09.13)
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue'
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';