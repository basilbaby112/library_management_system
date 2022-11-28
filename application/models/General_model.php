<?php
class General_model extends CI_Model {

    public function list($table){

       return $this->db->select('*')
        ->from($table)
        ->where('status',1)
        ->get()->result();
    }

    public function list_book_hand($table){

        return $this->db->select('*')
         ->from($table)
         ->where('stock',1)
         ->where('status',1)
         ->get()->result();
     }

     public function list_issue($table1,$table2,$table3){
        return $this->db->select($table2.'.name as stname,'.$table3.'.name as bname,'.$table1.'.*')
        ->from($table1)
        ->join($table2,$table1.'.student='.$table2.'.id')
        ->join($table3,$table1.'.book='.$table3.'.id')
        ->where($table1.'.status',1)
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