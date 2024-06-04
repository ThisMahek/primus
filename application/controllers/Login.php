<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel", "UM");

    }
    public function index()
	{
		$data['countries']=$this->UM->get_country();
		$this->load->view('index',$data);
	}

    public function ProcessLoginUser()
    {
        
        $email=$this->input->post("email");
        $result = $this->UM->check_useremail($email)->num_rows();
        //print_r($result);exit;
        if ($result == 1) {
            $password = md5($this->input->post("password"));
            $res = $this->UM->check_useremail($email)->row();
            if ($res->password == $password) {
                $data = array(
                    'user_id' => $res->id,
                    'user_email' => $res->email_id,
                    'user_name'=>$res->first_name.$res->last_name,
                );
                $this->session->set_userdata($data);
                echo 1;
            } else {
            echo 2;
            }
        } else {
            echo 3;
        }
    }
    public function LogoutUser()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        redirect(base_url());
    }
}