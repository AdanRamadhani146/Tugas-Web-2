<?php
Class C_login extends CI_Controller{
    function index(){
        $this->load->model('M_login');
        $this->load->view('login');
        if($_POST){
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            $user = $this->M_login->ceklogin(['email' => $email]);
            //jika user ada
            if($user){
                if($user->password == md5($pass)){
                    $sessi = [
                        'nama' =>$user->first_name,
                        'level' => $user->level,
                        'id_user' => $user->id_user
                    ];
                    $this->session->set_userdata($sessi);
                    redirect(base_url().'C_beranda');
                }else{
                    echo "<script>alert('password tidak sesuai sesuai');</script>";
                }
            }else{
                echo "<script>alert('email tidak terdaftar');</script>";
            }
        }
    }

    function keluar(){
         session_destroy();
         redirect('./');
    }
}
?>