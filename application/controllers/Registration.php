<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends EXT_Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['pageTitle']   = 'Registration Form';
        $data['breadcrumbs'] = array(
            'REG Form' => '#'
        );
        
        $data['years'] = array_combine(range(date("Y"), 1981), range(date("Y"), 1981));
        $data['content_view_page'] = 'application/home';
        $this->template_web->display($data);
    }
    
    public function apply()
    {
        $data['pageTitle']   = 'Registration Form';
        $data['breadcrumbs'] = array(
            'REG Form' => '#'
        );
        
        $data['years'] = array_combine(range(date("Y"), 1981), range(date("Y"), 1981));
        $data['content_view_page'] = 'application/registrationForm';
        $this->template_web->display($data);
    }
    
    public function insert()
    {
        $mobile = $this->input->post('MOBILENUMBER');
        $fullname = $this->input->post('FULLNAME');
        $batch = $this->input->post('BATCHYEAR');
        $sex = $this->input->post('SEX');
        $blood = $this->input->post('BLOODGROUP');
        $guest = $this->input->post('TOTALGUEST');
        $guestname = $this->input->post('GUESTNAME');
        $guestsex = $this->input->post('GUESTSEX');
        $profession = $this->input->post('PROFESSION');
        $amount = $this->input->post('AMOUNT');
        
        $totalguest = count($guestname);
        $totalamount = $totalguest * 500 + $amount;
        
        $sl = $this->db->query("SELECT max(SLID)SLID FROM applicantmst WHERE BATCHYEAR = $batch")->row();
        $nextid = $sl->SLID <= 9 ? 0 : '';
        $usedefineid = $batch . $nextid;
        //insert 
        $check = $this->utilities->findByAttribute('applicantmst',array('MOBILENUMBER' =>$mobile));
        if(empty($check)){
            $insertmst = array(
                'MOBILENUMBER' => $mobile,
                'FULLNAME' => $fullname,
                'BATCHYEAR' => $batch,
                'SEX' => $sex,
                'BLOODGROUP' => $blood,
                'TOTALGUEST' => $guest,
                'PROFESSION' => $profession,
                'AMOUNT' => $totalamount,
                'USEDEFINEID' => $usedefineid,
                'SLID' => $sl->SLID+1
            );
            // for Image Upload
            if ($_FILES['IMAGE']['error'] == 0){
                $configImage = array(
                    'upload_path' => "uploads/reunion/",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'remove_spaces' => TRUE
                    /* 'max_size' => "2048000",
                      'max_height' => "768",
                      'max_width' => "1024" */
                );
                $ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
                $configImage['file_name'] = $batch . '_' . $fullname . '.' . $ext;
                $this->load->library('upload');
                $this->upload->initialize($configImage);
                if ($this->upload->do_upload('IMAGE')) {
                    $insertmst['IMAGE'] = $this->upload->file_name;
                }
            }
            $data_insert = $this->security->xss_clean($insertmst);
            $this->db->trans_start();
            $this->db->insert('applicantmst', $data_insert);
            $insertid = $this->db->insert_id();
            if ($totalguest > 0) {
                for($i=0; $i < $totalguest; $i++) {
                    if($guestname[$i]!='' and $guestsex[$i]!='')
                    {
                        $insertguest[] = array(
                            'APPLICANTMSTID' => $insertid,
                            'MOBILENUMBER' => $mobile,
                            'GUESTNAME' => $guestname[$i],
                            'BATCHYEAR' => $batch,
                            'SEX' => $guestsex[$i],
                            'SLID' => 'G-0'.($i + 1)
                        );
                       
                    }
                    
                }
                
                $data_insertguest = $this->security->xss_clean($insertguest);
                $this->db->insert_batch('applicantcsd', $data_insertguest);
                
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() == TRUE) {
                $this->session->set_flashdata('success', 'You successfully Submit Your Information.');
                $this->session->set_flashdata('Bill', 'You Bill Number : '. $mobile .'<br> Your Total Fee:' . $totalamount);
                redirect('Registration/payment', 'refresh');
            } else {
                $this->session->set_flashdata('fail', 'Your Are Fail to submit information');
                redirect('Registration/index', 'refresh');
            }
        }else{
            $this->session->set_flashdata('fail', 'This Mobile Number Already in used');
            redirect('Registration/index', 'refresh');

        }
    }
    
    public function payment()
    {
        $data['pageTitle']   = 'Registration Fee';
        $data['breadcrumbs'] = array(
            'Payment' => '#'
        );
        $data['content_view_page'] = 'application/payment';
        $this->template_web->display($data);
    }
    
    public function receive() 
    {
        $mobile = $this->input->post('MOBILENUMBER');
        $trx = $this->input->post('TRXNUMBER');
        if(is_numeric($trx) and strlen($trx) == 9 ){
            $check = $this->utilities->findByAttribute('applicantmst', array('TRXNUMBER' =>$trx));
            if(empty($check)){
                $update = array(
                    'TRXNUMBER' => $trx,
                    'STATUS' => 1,
                    'UPD_DT' => date("Y-m-d h:i:s a")
                );
                $this->db->trans_start();
                $this->utilities->updateData('applicantmst', $update, array("MOBILENUMBER" => $mobile));
                $this->db->trans_complete();
                if ($this->db->trans_status() == TRUE) {
                    $this->session->set_flashdata('success', 'Your Payment is Complete.');
                    redirect('Registration/printinfo', 'refresh', $mobile);
                } else {
                    $this->session->set_flashdata('fail', 'You Are Fail to Complete Payment.');
                    redirect('Registration/payment', 'refresh');
                }
            }else {
                $this->session->set_flashdata('fail', 'This Transaction Number is Expired.');
                redirect('Registration/payment', 'refresh');
            }
        }else{
            $this->session->set_flashdata('fail', 'This Transaction Number is Wrong.');
            redirect('Registration/payment', 'refresh');
        }
    }
    
    public function printinfo(){
        $data['pageTitle']   = 'Registration Fee';
        $data['breadcrumbs'] = array(
            'Payment' => '#'
        );
        $data['content_view_page'] = 'application/print';
        $this->template_web->display($data);
    }
    public function printInvoice() {
        $data["info"] = $this->utilities->findByAttribute("applicantmst", array("MOBILENUMBER" => $_POST['mobile']));
        $this->load->view("application/invoice",$data);
    }
    
    public function searchPaymentStatus() 
    {
        $info = $this->utilities->findByAttribute("applicantmst", array("MOBILENUMBER" => $_POST['mobile']));
        if(!empty($info)){
            echo '<span><span style="font-size: 12px;">Name : </span>' . $info->FULLNAME . '<br> <span style="font-size: 12px;">Batch(SSC) : </span>' . $info->BATCHYEAR . '<br> <span style="font-size: 12px;">Amount : </span><span style="font-size: 20px; color: red;">' . $info->AMOUNT . ' Taka</span></span>';
        }  else {
            echo 'N';
        }
    }
    public function checkmobile() 
    {
        $info = $this->utilities->findByAttribute("applicantmst", array("MOBILENUMBER" => $_POST['mobile']));
        if(!empty($info)){
            echo 'Y';
        }  else {
            'N';
        }
    }
    
    public function checktrx() 
    {
        $info = $this->utilities->findByAttribute("applicantmst", array("TRXNUMBER" => $_POST['trx']));
        if(!empty($info)){
            echo 'N';
        }  else {
            'Y';
        }
    }
    
    public function applicantList()
    {
        $data['pageTitle']   = 'Registration Fee';
        $data['breadcrumbs'] = array(
            'Payment' => '#'
        );
        $data['years'] = array_combine(range(date("Y"), 1981), range(date("Y"), 1981));
        $data['applicants'] = $this->utilities->findAllByAttribute('applicantmst', array(''));
        $data['content_view_page'] = 'application/applicants';
        $this->template_web->display($data);
    }
    
    public function searchApplicants() 
    {
        $batch = $this->input->post('batch');
        $data['applicants'] = $this->utilities->findAllByAttribute('applicantmst', array('BATCHYEAR' => $batch));        
        $this->load->view("application/list",$data);
    }
    
    public function underconstruction() 
    {
        //$data['content_view_page'] = '';
        $this->template_web->display();
    }
    
    
}
?>