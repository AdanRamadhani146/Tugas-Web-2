<div class="kanan">
    <h2>Produk</h2>
    <table>
        <tr>
            <td>no</td>
            <td>Nama Produk</td>
            <td>Harga Satuan</td>
            <td>Stok</td>
            <td>Action</td>
        </tr>
        <?php $no=1; foreach($produk as $dproduk): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $dproduk->nama_produk; ?></td>
            <td>Rp.<?php echo number_format($dproduk->harga_satuan); ?></td>
            <td><?php echo $dproduk->stok; ?></td>
            <td> <a href="<?php echo base_url().'C_penjualan/beli/'.$dproduk->id_produk; ?>">Beli</a> </td>
        </tr>
        <?php $no++; endforeach; ?>
    </table>
</div>
<div class="kiri">
    <h2>Keranjang Belanjaan</h2>
    <h3>Kode Penjualan <?php echo $kode_jual; ?></h3>
    <table>
        <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Harga Satuan</td>
            <td>Jumlah Beli</td>
            <td>Total</td>
            <td>Action</td>
        </tr>
        <?php $no=1; foreach($detail_beli as $beli): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $beli->nama_produk; ?></td>
            <td>Rp.<?php echo number_format($beli->harga_satuan); ?></td>
            <td><?php echo $beli->jumlah_beli; ?></td>
            <td>Rp.<?php echo number_format($beli->total_harga); ?></td>
            <td> <a href="<?php echo base_url().'C_penjualan/hapus/'.$kode_jual.'-'.$beli->id_produk; ?>">Hapus</a> </td>
        </tr>
        <?php $no++; endforeach; ?>
        <tr>
            <td colspan="4">Sub Total</td>
            <td colspan="2"><strong>Rp.<?php echo number_format($sub_total->total); ?></strong></td>
        </tr>
    </table>
    <a href="<?php echo base_url().'C_penjualan/cekout/'.$sub_total->total; ?>">Cekout</a>
</div>