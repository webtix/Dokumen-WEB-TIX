<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Edit Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('users') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <?php foreach ($users as $key => $val): ?>
                <form action="<?php echo base_url('users/update/'.$val['IDUser']) ?>" method="post" enctype="multipart/form-data" class="row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="Nama" placeholder="Masukan nama" required value="<?php echo $val['Nama'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" name="Username" placeholder="Masukan username" required value="<?php echo $val['Username'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="Password" placeholder="Masukan password" required value="<?php echo $val['Password'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" placeholder="Masukan email" required value="<?php echo $val['Email'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>No. Telpon</label>
                        <input type="text" class="form-control" name="HP" placeholder="Masukan no. telpon" required value="<?php echo $val['HP'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="Tanggal_Lahir" placeholder="Masukan no. telpon" required value="<?php echo $val['Tanggal_Lahir'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tipe User</label>
                        <select name="TipeUser" class="form-control" required>
                            <option value="staff" value="<?php echo $val['TipeUser'] == 'staff' ? 'selected' : '' ?>">Staff</option>
                            <option value="manager" value="<?php echo $val['TipeUser'] == 'manager' ? 'selected' : '' ?>">Manager</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>