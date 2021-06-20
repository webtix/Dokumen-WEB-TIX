<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">List Film</h1>
            <p style="text-align: center; color: red;"><?php echo $this->session->flashdata('statusfilm'); ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('film/add') ?>" class="btn btn-primary float-right">Tambah Film</a>
        </div>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">No. </th>
                        <th>Nama Film</th>
                        <th>Durasi</th>
                        <th>Rating</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($films as $key => $film){ ?>
                        <tr>
                            <td><?php echo $key?></td>
                            <td><?php echo $film['NamaFilm'] ?></td>
                            <td><?php echo $film['Durasi'] ?></td>
                            <td><?php echo $film['RatingUmur'] ?></td>
                            <td>
                                <a href="<?php echo base_url('film/edit/'.$film['IDFilm']) ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo base_url('film/delete/'.$film['IDFilm']) ?>" class="btn btn-danger" onClick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>