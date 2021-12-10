<?php
class C_beranda extends CI_Controller{
    function index(){
        $this->load->view('header');
        $this->load->view('beranda');
        $this->load->view('footer');
    }
}

?>