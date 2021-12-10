<div class="kiri">
    <h2>Tambah User</h2>
    <form method="post">
        <input type="text" name="fname" placeholder="Nama depan">
        <input type="text" name="lname" placeholder="Nama belakang">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="simpan" value="Simpan">
    </form>
</div>
<div class="kanan">
    <h2>Data User</h2>
    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Level</td>
            <td>Action</td>
        </tr>
        <?php $no=1; foreach($users as $dusers) : ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $dusers->first_name; ?></td>
            <td><?php echo $dusers->email; ?></td>
            <td><?php echo $dusers->level; ?></td>
            <td>
                <a href="<?php echo base_url().'C_users/edit/'.$dusers->id_user; ?>">Edit</a> | 
                <a href="<?php echo base_url().'C_users/hapus/'.$dusers->id_user; ?>" onclick="return confirm('Apakah anda yakin menghapus?')">Hapus</a></td>
        </tr>
        <?php $no++; endforeach; ?>
    </table>
</div>