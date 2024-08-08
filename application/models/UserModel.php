<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  public function get_country(){
    return $this->db->get('tbl_country')->result();
  }
  public function get_state($country_id){
    return $this->db->where('country_id',$country_id)->get('tbl_state')->result();
  }
  public function get_city($state_id){
    return $this->db->where(['state_id'=>$state_id])->get('tbl_city')->result();
  }
  public function check_useremail($email){
    return $this->db->where(['email_id'=>$email,'status'=>1])->get('tbl_users');
  }
 
  public function save_user_image($data) 
  {
    return $this->db->insert('tbl_user_image',$data);
  }
 
   public function get_count($table,$user_id) 
  {
    return $this->db->where(['status'=>1,'user_id'=>$user_id])->get($table)->num_rows();
  }
//start home data
public function show_user_data($user_id){
  return $this->db->select('tbl_user_image.image,tbl_about.introduction,tbl_about.cv,tbl_about.designation,tbl_about.carrier_objective')->join('tbl_user_image','tbl_about.user_id=tbl_user_image.user_id','left')->where(['tbl_user_image.status'=>1,'tbl_about.status'=>1,'tbl_about.user_id'=>$user_id])->get('tbl_about')->row();
}
public function get_data($table,$status,$user_id){
 return $this->db->where(['status'=>$status,'user_id'=>$user_id])->get($table)->result();
}
public function get_single_data($table,$status,$user_id){
  return $this->db->where(['status'=>$status,'user_id'=>$user_id])->get($table)->row();
 }
 public function get_contactus_data($user_id){
  $result = $this->db->select('CONCAT(tbl_country.name, ", ", tbl_state.name, ", ", tbl_city.name) AS address,CONCAT(tbl_users.mobile_no) as mobile,tbl_users.email_id')
                  ->join('tbl_country','tbl_country.id=tbl_users.country','left')
                  ->join('tbl_state','tbl_state.id=tbl_users.state','left')
                  ->join('tbl_city','tbl_city.id=tbl_users.city','left')
                  ->where(['tbl_users.status'=>1,'tbl_users.id'=>$user_id])
                  ->get('tbl_users')
                  ->row();
  return $result;
}
public function get_user_data(){
  $user_id=$this->session->userdata('user_id');
   $response= $this->db->where(['id'=>$user_id,'status'=>1])->get('tbl_users')->row();
   return   $response;
}
public function get_next_user_id() {
  // Assuming user_id is auto-incrementing
  $this->db->select_max('id');
  $query = $this->db->get('tbl_users');
  $row = $query->row();
  return $row->id + 1;
}

}