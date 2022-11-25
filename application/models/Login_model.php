<?php
class Login_model extends CI_Model {


    public function list_admin($table){

        return $this->db->select('*')
                  ->from($table)
                  ->get()->result();
         
    }
    public function check_user($data,$table){

        return $this->db->select("*")
             ->from($table)
             ->where('username',$data['username'])
             ->where('password',$data['password'])
             ->get();
    }
    public function update_list($table,$id){

        return $this->db->select('*')
                  ->from($table)
                  ->where('id',$id)
                  ->get()->row();
         
    }
    public function update($table,$data){
// print_r($data); exit;
        $id=$data['id'];
        
        $this->db->where('id',$id)->update($table,$data);
         
    }
     
}
?>