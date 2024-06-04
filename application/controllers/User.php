<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'UM');
    }

    public function get_state()
    {
        $country_id = $this->input->post('country_id');
        $states = $this->UM->get_state($country_id);
        if (!empty($states)) {
            echo '<option value="">Select State</option>';
            foreach ($states as $state) {
                echo '<option value="' . $state->id . '">' . $state->name . '</option>';
            }
        } else {
            echo '<option value="">State not available</option>';
        }
    }
    public function get_city()
    {
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $cities = $this->UM->get_city($state_id, $country_id);
        if (!empty($cities)) {
            echo '<option value="">Select City</option>';
            foreach ($cities as $city) {
                echo '<option value="' . $city->id . '">' . $city->name . '</option>';
            }
        } else {
            echo '<option value="">City not available</option>';
        }
    }
    public function user_register()
    {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email_id', 'Email ID', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Run the form validation
        if ($this->form_validation->run() == FALSE) {
            //  echo validation_errors();
            echo 5;
        } else {
            $email = $this->input->post('email_id');
            $mobile = $this->input->post('mobile_no');
            $check_email_data = $this->db->where('email_id', $email)->get('tbl_users')->num_rows();
            $check_phone_data = $this->db->where('mobile_no', $mobile)->get('tbl_users')->num_rows();
            if ($check_email_data > 0 && $check_phone_data > 0) {
                echo 4;
            } else if ($check_email_data > 0) {
                echo 2;
            } else if ($check_phone_data > 0) {
                echo 3;
            } else {
                $insert_array = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'mobile_no' => $mobile,
                    'email_id' => $email,
                    'country' => $this->input->post('country'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'designation' => $this->input->post('designation'),
                    'password' => md5($this->input->post('password')),
                    'status'=>1
                );
                $result = $this->db->insert('tbl_users', $insert_array);
                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }
    
    public function check_pdf_availability()
    {
        $result = $this->UM->get_data('tbl_about','1',$this->session->userdata('user_id'));
        $pdfCount = $result->cv;
        if (!empty($pdfCount)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function save_user_img(){

        //to start image validation
        $file = $_FILES["image"];
        $MyFileName="";
        if(strlen($file['name'])>0)
        {
        $image=$file["name"];
        $config['upload_path'] = './assets/upload/User_Images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
     
        $config['file_name']=$image;
        $this->load->library("upload",$config);
        $filestatus=$this->upload->do_upload('image');
        if($filestatus==true) 
        {
        // $data = array('upload_data' => $this->upload->data());
        $MyFileName=$this->upload->data('file_name');
        $array['image']="/assets/upload/User_Images/".$MyFileName;
        }
        else
        {
        $error = array('error' => $this->upload->display_errors());
        $result=$error;
        }
        }
        //End: File upload code


    }
    public function demo(){
        $this->load->view('image');
    }
   
    public function upload_cropped_image() {
        // Check if form is submitted
        if ($this->input->post()) {
            $cropped_image_data = $this->input->post('cropped_image');
            $cropped_image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $cropped_image_data));
            $upload_path = './assets/upload/User_Images/';
            $filename = uniqid() . '.png'; 
            if (file_put_contents($upload_path . $filename, $cropped_image_data)) {
                $user_id=$this->session->userdata('user_id');
                // Image uploaded successfully
                $array['image']=$filename;
                $array['user_id']=$user_id;
               $check_user_data=  $this->UM->get_data('tbl_user_image','1',$user_id);
               if(empty($check_user_data)){
                $this->UM->save_user_image($array);
               }else{
                $this->db->where(['status'=>1,'user_id'=>$user_id])->update('tbl_user_image',$array);
               }
                $this->session->set_flashdata('success', '<script>
                $(document).ready(function(){
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Image uploaded successfully!",
                });
            });
            </script>');
            redirect(base_url() . "User/about-us");
            } else {
                // Failed to upload image
                $this->session->set_flashdata('success', '<script>
                $(document).ready(function(){
                Swal.fire({
                    icon: "erroe",
                    title: "Error",
                    text: "Failed to upload image!",
                });
            });
            </script>');
            redirect(base_url() . "User/about-us");
               // echo "Failed to upload image!";
            }
        } else {
            $this->session->set_flashdata('success', '<script>
            $(document).ready(function(){
            Swal.fire({
                icon: "erroe",
                title: "Error",
                text: "Form not submitted!",
            });
        });
        </script>');
        redirect(base_url() . "UserDashboard");
        
        }
    }
    public function ChangeStatus(){
        $status=$this->input->post('status');
        $key=$this->input->post('key');
        $user_id=$this->session->userdata('user_id');          
        $response = $this->db->where(['id'=>$user_id])->update('tbl_users', array($key=>$status));
        echo $response ? 1 : 0;
            }
            public function change_UserPassword()
            {
            $user_id= $this->session->userdata('user_id');                                                       
            $user = $this->UM->user_profile($user_id);
            if($this->input->post('update')) 
            {     
            $current = $user->user_password;
            $password= md5($this->input->post('password'));
            if($password == $current)
            {
            $newpassword= $this->input->post('password1');
            if($this->UM->change_password($newpassword))
            {
                $this->session->set_flashdata('success','<script>
                swal({
                    title: "Password!",
                    text: "updated successfull!",
                    icon: "success",
                    button: "ok",
                    });
                </script>');
            }
        }
            else
            {
                $this->session->set_flashdata('error','<script>
                swal({
                    title: "Password   !",
                    text: " and current password does not match update!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    });
                </script>');
               
            }
            redirect(base_url()."user/change_password");
           }
            redirect(base_url()."User/myprofile");
            
            }
        
        
    }
   

     
   

