<?php 
 
    class M_login extends CI_Model{	
        function cek_login($username,$password){		
            // return $this->db->get_where($table,$where);
            $query = $this->db->get_where('users', array('username' => $username, 'upass' => $password));

            if(isset($query)){
                if(count($query->result()) > 1){
                    return false;
                }else{
                    return $query->row();
                }
            }
        }	
    }
?>