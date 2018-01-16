<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes:
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class AdsProduct extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_builder');
    }
    //Ads Management
    public function ads_management()
    {
        $crud = $this->generate_multi_crud('ads_manages');
        $crud->columns('id','ads_id', 'ads_user_id', 'ads_name', 'payment_method', 'payment_number', 'balance_price', 'available_price', 'total_price', 'ads_price', 'online_status', 'ip_address', 'ads_date','ads_status');

        $crud->display_as('id','No');
        $crud->display_as('ads_id','ADS ID');
        $crud->display_as('ads_user_id','User ID');
        $crud->display_as('ads_name','Name');
        $crud->display_as('payment_method','Payment');
        $crud->display_as('payment_number','Payment NO');
        $crud->display_as('balance_price','Balance');
        $crud->display_as('available_price','Available');
        $crud->display_as('total_price','Total');
        $crud->display_as('ads_price','Price');
        $crud->display_as('online_status','Online/Offline');
        $crud->display_as('ip_address','IP');
        $crud->display_as('ads_date','Date');

        $crud->multisearch = true;

        $crud->field_property = array(
            // Help text for user
            "ads_date"=>array("help"=>"Should Be in yy-mm-dd HH:mm:ss"),
            // Intializes date and time picker with below range
            "start_date" =>array("start"=>"2015-06-22 04:00:00","end"=>"2015-06-29 05:00:00"),
            "ads_date"=>array('type'=>'date_and_time','timeFormat'=>'timestamp'),
            "Payment"=>array('type'=>'string_opts'),
            "ads_user_id"=>array('type'=>'string_opts'),
            "ads_status"=>array('type'=>'string_opts'),

            "id"=>array('type'=>'hidden_opts'),
            "ads_id"=>array('type'=>'hidden_opts'),
            "ip_address"=>array('type'=>'hidden_opts'),
            "online_status"=>array('type'=>'hidden_opts'),
            "ads_price"=>array('type'=>'hidden_opts'),
            "total_price"=>array('type'=>'hidden_opts'),
            "available_price"=>array('type'=>'hidden_opts'),
            "balance_price"=>array('type'=>'hidden_opts'),
            "payment_number"=>array('type'=>'hidden_opts'),
            "ads_name"=>array('type'=>'hidden_opts'),
        );

        $crud->order_by('id');

        $crud->unset_add();
        //$crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_columns('ads_status');

        $crud->add_action('action cancel','','','ads-cancel');
        $crud->add_action('action accept','','','ads-accept');
        $crud->add_action('Cancel','','','fa fa-remove ads-product-cancel');
        $crud->add_action('Accept','','','fa fa-check ads-product-accept');

        $this->mPageTitle = 'ads_management';
        $this->mGrocery_type = 'Ads_type';

        $this->render_crud();
    }
    public function  product_management()
    {

    }

    public function ads_accept()
    {
        $id = $_POST['ads_id'];

        $this->load->model('ads_manage_model', 'ads_manages');
        $this->ads_manages->update_field($id, 'ads_status', 'accepted');

        echo 'success';
    }
    public function ads_cancel()
    {
        $id = $_POST['ads_id'];

        $this->load->model('ads_manage_model', 'ads_manages');
        $this->ads_manages->update_field($id, 'ads_status', 'canceled');
        echo 'success';
    }

}
