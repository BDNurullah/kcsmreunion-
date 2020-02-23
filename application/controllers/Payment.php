<?php
/**
 * This file is part of the DGDP\e-DP System package
 *
 * (c) ATI Limited. <info@atilimited.net>
 *
 * PHP version 5 (5.6.25)
 *
 * @package     a2i\ashokti Mukti
 * @author      ATI Limited Dev Team
 * @copyright   2017 atilimited.net
 */
/**
 * Class AccessControl
 *
 * AccessControl is the extended class of EXT_Controller.
 *
 * This class implements all methods related to Role Based
 * Access Control for User of ashokti Mukti System.
 *
 * @package     a2i\ashokti Mukti
 * @author      Nurullah <nurullah@atilimited.net>
 * @copyright   2017 atilimited.net
 * @version     GIT: $Id$ In development. 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends EXT_Controller
{
    /**
     * reference of user data of session
     *
     * @var array should contain user data from session
     */
    private $user_session;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->user_session = $this->session->userdata('logged_in');
        if (!$this->user_session) {
            redirect('auth/index');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        $this->load->model('accessControl_model');
    }
    

    /**
     * Action: Module Index
     *
     * Manage all modules from this panel. Tabular content is the short form of all modules.
     * Individual module can be edit or delete. Create button new record of module via ajax.
     *
     */
    public function index()
    {
        $data['pageTitle']   = 'Receive';
        $data['breadcrumbs'] = array(
            'Payment' => '#'
        );
        
        $data['applicants'] = $this->utilities->findAllByAttribute('applicantmst', array('STATUS' => 1));
        $data['content_view_page'] = 'application/receiveRegister';
        $this->template->display($data);
    }

    /**
     *  Method to Create  Module
     * @param none
     * @return none
     */
    public function receivePayment()
    {
        $id = $this->input->post('applicantid');
        $ac_type = $this->input->post('ac_type');
        $upby = $this->user_session["FLD_USER_ID"];
        $update = date("Y-m-d:H-i-s");
        $x = $this->utilities->updateData('applicantmst', array('STATUS' => $ac_type, 'UPD_BY' => $upby, 'UPD_DT' => $update), array('APPLICANTMSTID' => $id));
        if($x == TRUE){
            echo 'Y';
        }  else {
            echo 'N';
        }
        
    }
    
    public function applicant_list() {
        $data['pageTitle']   = 'Applicant List';
        $data['breadcrumbs'] = array(
            'Payment' => '#'
        );
        
        $data['applicants'] = $this->utilities->findAllByAttribute('applicantmst', array(''));
        $data['content_view_page'] = 'application/applicant_list';
        $this->template->display($data);
    }
}
?>