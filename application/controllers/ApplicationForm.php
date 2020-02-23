<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicationForm extends EXT_Controller
{
    /**
     * reference of user data of session
     *
     * @var array should contain user data from session
     */
    //private $user_session;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        //$this->load->model('auth_model');
        //$this->load->helper('form');

        /*parent::__construct();
        $this->user_session = $this->session->userdata('logged_in');
        if (!$this->user_session) {
            redirect('auth/index');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        $this->load->model('accessControl_model');*/
    }
    

    /**
     * Action: Module Index
     *
     * Manage all modules from this panel. Tabular content is the short form of all modules.
     * Individual module can be edit or delete. Create button new record of module via ajax.
     *
     */
//    public function index()
//    {
//        $data['pageTitle']   = 'Modules';
//        $data['breadcrumbs'] = array(
//            'Modules' => '#'
//        );
//        $data['result'] = '';
//        $data['years'] = array_combine(range(date("Y"), 1990), range(date("Y"), 1990));
//        $this->load->view('applicationForm', $data);
//    }
//    
//    public function insert()
//    {
//        $mobile = $this->input->post('MOBILENUMBER');
//        $fullname = $this->input->post('FULLNAME');
//        $batch = $this->input->post('BATCHYEAR');
//        $sex = $this->input->post('SEX');
//        $blood = $this->input->post('BLOODGROUP');
//        $guest = $this->input->post('TOTALGUEST');
//        $guestname = $this->input->post('GUESTNAME');
//        $guestsex = $this->input->post('GUESTSEX');
//        $profession = $this->input->post('PROFESSION');
//        $amount = $this->input->post('AMOUNT');
//        
//        $totalamount = $guest * 500 + $amount;
//        $totalguest = count($guestname);
//        
//        $insertmst = array(
//            'MOBILENUMBER' => $mobile,
//            'FULLNAME' => $fullname,
//            'BATCHYEAR' => $batch,
//            'SEX' => $sex,
//            'BLOODGROUP' => $blood,
//            'TOTALGUEST' => $guest,
//            'PROFESSION' => $profession,
//            'AMOUNT' => $totalamount
//        );
//        
//        // for Image Upload
//        if ($_FILES['IMAGE']['error'] == 0){
//            $configImage = array(
//                'upload_path' => "uploads/reunion/",
//                'allowed_types' => "gif|jpg|png|jpeg|pdf",
//                'overwrite' => TRUE,
//                'remove_spaces' => TRUE
//                /* 'max_size' => "2048000",
//                  'max_height' => "768",
//                  'max_width' => "1024" */
//            );
//            $ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
//            $configImage['file_name'] = $batch . '_' . $fullname . '.' . $ext;
//            $this->load->library('upload');
//            $this->upload->initialize($configImage);
//            if ($this->upload->do_upload('IMAGE')) {
//                $insertmst['IMAGE'] = $this->upload->file_name;
//            }
//        }
//        $this->db->trans_start();
//        $this->db->insert('applicantmst', $insertmst);
//        $insertid = $this->db->insert_id();
//        if ($totalguest > 0) {
//            for($i=0; $i < $totalguest; $i++) {
//                $insertguest[] = array(
//                    'APPLICANTMSTID' => $insertid,
//                    'MOBILENUMBER' => $mobile,
//                    'GUESTNAME' => $guestname[$i],
//                    'SEX' => $guestsex[$i]
//                );
//            }
//            $this->db->insert_batch('applicantcsd', $insertguest);
//        }
//        $this->db->trans_complete();
//        if ($this->db->trans_status() == TRUE) {
//            //$x = $this->session->set_flashdata('success');
//            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
//            //var_dump($x);exit;
//            //redirect('setup/user');
//            redirect('ApplicationForm/index', 'refresh',$result);
//        } else {
//            redirect('ApplicationForm/insert', 'refresh');
//        }
//    }
//    
//    public function payment()
//    {
//        $data['pageTitle']   = 'Payment';
//        $data['breadcrumbs'] = array(
//            'Modules' => '#'
//        );
//        //$data['years'] = array_combine(range(date("Y"), 1990), range(date("Y"), 1990));
//        $this->load->view('application/payment', $data);
//    }
//    
//    public function receive() 
//    {
//        echo 'hi';
//    }
//    
//    public function searchPaymentStatus() 
//    {
//        $info = $this->utilities->findByAttribute("applicantmst", array("MOBILENUMBER" => $_POST['mobile']));
//        if(!empty($info)){
//            echo '<span><span style="font-size: 12px;">Name : </span>' . $info->FULLNAME . '<br> <span style="font-size: 12px;">SSC : </span>' . $info->BATCHYEAR . '<br> <span style="font-size: 12px;">Amount : </span><span style="font-size: 20px; color: red;">' . $info->AMOUNT . ' Taka</span></span>';
//        }  else {
//            echo 'N';
//        }
//    }
//    public function checkmobile() 
//    {
//        $info = $this->utilities->findByAttribute("applicantmst", array("MOBILENUMBER" => $_POST['mobile']));
//        if(!empty($info)){
//            echo 'Y';
//        }  else {
//            'N';
//        }
//    }
    
}
?>