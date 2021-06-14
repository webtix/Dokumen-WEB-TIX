<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">List User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('users/add') ?>" class="btn btn-primary float-right">Tambah data</a>
        </div>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">No. </th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Tipe User</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $key => $user){ ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $user['Nama'] ?></td>
                            <td><?php echo $user['Email'] ?></td>
                            <td><?php echo $user['Username'] ?></td>
                            <td><?php echo $user['TipeUser'] ?></td>
                            <td>
                                <a href="<?php echo base_url('users/edit/'.$user['IDUser']) ?>" class="btn btn-warning">Edit</a>
                                <?php if ($this->session->id != $user['IDUser']): ?>
                                    <a href="<?php echo base_url('users/delete/'.$user['IDUser']) ?>" class="btn btn-danger" onClick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>