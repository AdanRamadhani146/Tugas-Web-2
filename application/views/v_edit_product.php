<div class="kiri">
    <h2>Edit Data Barang</h2>
    <form method="post">
        <input type="text" name="nama_produk" placeholder="Nama Produk" value="<?php echo $edit->nama_produk; ?>">
        <input type="text" name="harga_satuan" placeholder="Harga Satuan" value="<?php echo $edit->harga_satuan; ?>">
        <input type="text" name="stok" placeholder="Stok" value="<?php echo $edit->stok; ?>">
        <input type="submit" name="simpan" value="Simpan">
    </form>
</div>
<div class="kanan">
    <h2>Tampil data barang</h2>
    <table>
        <tr>
            <td>No</td>
            <td>Nama Produk</td>
            <td>Harga Satuan</td>
            <td>Stok</td>
            <td>Action</td>
        </tr>
        <?php 
        if(!empty($produk)){
        $no=1; foreach($produk as $dproduk): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $dproduk->nama_produk; ?></td>
            <td>Rp.<?php echo number_format($dproduk->harga_satuan); ?></td>
            <td><?php echo $dproduk->stok; ?></td>
            <td>
                <a href="<?php echo base_url().'C_product/edit/'.$dproduk->id_produk; ?>">Edit</a>
                <a href="<?php echo base_url().'C_product/hapus/'.$dproduk->id_produk; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php $no++; endforeach; }else{ ?>
            <tr>
                <td colspan="5">Data Tidak Ditemukan</td>
            </tr>
        <?php } ?>

    </table>
</div>