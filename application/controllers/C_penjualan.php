<?php
Class C_penjualan extends CI_controller{
    function index(){
        $this->load->model('M_crud');
        $this->load->view('header');
        //mengambil ID penjualan terakhir
        $id_penjualan = $id_penjualan = $this->M_crud->tampil_order('id_penjualan','penjualan','DESC')->row();
        if(empty($id_penjualan)){
            $data['kode_jual'] = 1;
            $kode['id_penjualan'] = 1;
        }else{
            $data['kode_jual'] = $id_penjualan->id_penjualan+1;
            $kode['id_penjualan'] = $id_penjualan->id_penjualan+1;
        }
        //menambahkan sub total
        $data['sub_total'] = $this->M_crud->total('detail_penjualan','total_harga',$kode)->row();
        //menampilkan data beli
        $data['detail_beli'] = $this->M_crud->tampil_join('produk','detail_penjualan','produk.id_produk=detail_penjualan.id_produk',$kode)->result();
        $data['produk'] = $this->M_crud->tampil('produk')->result();
        $this->load->view('v_penjualan', $data);
        $this->load->view('footer');
    }

    function beli($id){
        $this->load->model('M_crud');
        //untuk menampilkan data harga satuan
        $where['id_produk'] = $id;
        $produk = $this->M_crud->tampil_id('produk',$where)->row();
        //mengambil ID penjualan terakhir
        $id_penjualan = $id_penjualan = $this->M_crud->tampil_order('id_penjualan','penjualan','DESC')->row();
        if(empty($id_penjualan)){
            $kode_jual = 1;
        }else{
            $kode_jual = $id_penjualan->id_penjualan+1;
        }
        //mengecek barang di keranjang
        $wherecek['id_produk'] = $id;
        $wherecek['id_penjualan'] = $kode_jual;
        $cekpenjualan = $this->M_crud->tampil_id('detail_penjualan',$wherecek)->row();
        if(empty($cekpenjualan)){
        $field['id_produk'] = $id;
        $field['id_penjualan'] = $kode_jual;
        $field['jumlah_beli'] = 1;
        $field['total_harga'] = $produk->harga_satuan;
        $this->M_crud->tambah('detail_penjualan',$field);
        }else{
            $field['jumlah_beli'] = $cekpenjualan->jumlah_beli+1;
            $field['total_harga'] = $field['jumlah_beli'] * $produk->harga_satuan;
            $this->M_crud->edit('detail_penjualan',$field,$wherecek); 
        }
        redirect(base_url().'C_penjualan');
    }
    function hapus($id){
        $this->load->model('M_crud');
        $pecah = explode('-',$id);
        $where['id_penjualan'] = $pecah[0];
        $where['id_produk'] = $pecah[1];
        $this->M_crud->hapus('detail_penjualan',$where);
        redirect(base_url().'C_penjualan');
    }

    function cekout($id){
        date_default_timezone_set('Asia/Makassar');
        $this->load->model('M_crud');
        $field['tanggal_jual'] = date('Y-m-d H:i:s');
        $field['sub_total'] = $id;
        $field['id_user'] = $_SESSION['id_user'];
        $this->M_crud->tambah('penjualan',$field);
        redirect(base_url().'C_penjualan');
    }
}
?>