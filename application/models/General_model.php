<?php
class General_model extends CI_Model {

    public function list($table){

       return $this->db->select('*')
        ->from($table)
        ->where('status',1)
        ->get()->result();
    }

    public function add($data,$table){

        $this->db->insert($table,$data);

    }

    public function edit($table,$id){

        return $this->db->select('*')
        ->from($table)
        ->where('id',$id)
        ->where('status',1)
        ->get()->row();

    }

    public function update($data,$table,$id){

        $this->db->where('id',$id)
                  ->update($table,$data);
    }

    public function delete($id,$table){

        $this->db->where('id',$id)->delete($table);
                
    }

}
?>