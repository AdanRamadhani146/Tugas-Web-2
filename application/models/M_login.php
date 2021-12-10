<?php 
class M_login extends CI_Model{
    function ceklogin($data){
        return $this->db->get_where('users',$data)->row();
    }
}

?>