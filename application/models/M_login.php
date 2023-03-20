<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    // session_start();

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
        
        public function get_last_juri($logged_at) {
            $this->db->select('identifier');
            $this->db->from('log_juri');
            $this->db->where('logged_at', $logged_at);
            $this->db->order_by('identifier', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row();
        }
        
        public function add_logjuri($identifier, $logged_at) {
            $data = array(
                'identifier' => $identifier,
                'logged_at' => $logged_at
            );
            $this->db->insert('log_juri', $data);
        }
        
    }
?>