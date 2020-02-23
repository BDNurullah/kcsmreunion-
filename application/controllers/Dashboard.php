<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends EXT_Controller
{

    public function __construct() {
        parent::__construct();
        $this->user_session = $this->session->userdata('logged_in');
        if (!$this->user_session) {
            redirect('auth/index');
        }
    }

    public function index()
    {

        $data['metaTitle'] = 'Dashboard';
        $data['breadcrumbs'] = array(
            'Dashboard' => '#'
        );
        $guest = 0;
        $totalAmount = 0;
        $totalCollection = 0;
        $data['applicants'] = $applicants = $this->utilities->findAllByAttribute('applicantmst', array(''));
        foreach ($applicants as $key => $value) {
            $data['guest'] = $guest += $value->TOTALGUEST;
            $data['totalAmount'] = $totalAmount += $value->AMOUNT;
            $data['totalCollection'] = $totalCollection += $value->STATUS == 2 ? $value->AMOUNT : 0;
        }
        $data['pageTitle'] = 'Welcome to Admin Dashboard';
        $data['content_view_page'] = 'dashboard/index';
        $this->template->display($data);
    }

//    public function notifications() {
//        $data['pageTitle'] = 'Notifications';
//        $this->load->view("notifications/supplier_notification.php",$data);
//    }
//    public function notificationsTender() {
//        $data['pageTitle'] = 'Notifications';
//        $this->load->view("notifications/tender.php",$data);
//    }
//    public function notificationsMessage() {
//        $data['pageTitle'] = 'Notifications';
//        $this->load->view("notifications/message.php",$data);
//    }
//    public function notificationsdWarning() {
//        $data['pageTitle'] = 'Notifications';
//        $this->load->view("notifications/warning.php",$data);
//    }

}