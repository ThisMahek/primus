<?php
defined('BASEPATH') or exit('No direct script access allowed');
// session_start(); 
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel", "UM");
    }
    public function index()
	{
        if (!$this->session->userdata('user_id')) {
            // If session does not exist, redirect to the login page
            $data['countries'] = $this->UM->get_country();
            $this->load->view('index', $data);
        } else {
            redirect(base_url().$this->session->userdata('user_name').$this->session->userdata('user_id').'/'.'dashboard');
        }
	}

    public function ProcessLoginUser()
    {
        $this->load->library('session');
        $email=$this->input->post("email");
        $result = $this->UM->check_useremail($email)->num_rows();
    
        if ($result == 1) {
            $password = md5($this->input->post("password"));
            $res = $this->UM->check_useremail($email)->row();
            if ($res->password == $password) {
                $data = array(
                    'user_id' => $res->id,
                    'user_email' => $res->email_id,
                    'user_name'=>$res->first_name.' '.$res->last_name,
                    'slug'=>$res->slug,
                    'first_name'=>$res->first_name,
                    'last_name'=>$res->last_name
                );
                $this->session->set_userdata($data);
               echo json_encode(['status'=>1,'user_name'=>$this->session->userdata('slug')]);
            } 
            else 
            {
            echo json_encode(['status'=>2]);
            }
            // echo 4;
        } else {
            echo json_encode(['status'=>3]);
        }
    }
    public function LogoutUser()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        redirect(base_url());
    }
}