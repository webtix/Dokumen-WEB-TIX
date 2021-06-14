<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Tambah Pesanan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('pesanan') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo base_url('input_pesanan/store') ?>" method="post" enctype="multipart/form-data" class="row">
                <div class="form-group col-md-5">
                    <label>Bioskop</label>
                    <select name="IDBioskop" id="IDBioskop" class="form-control" required>
                        <?php foreach($bioskop as $bioskop){ ?>
                            <option value="<?php echo $bioskop['IDBioskop'] ?>"><?php echo $bioskop['NamaBioskop'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label>Film</label>
                    <select name="IDFilm" id="IDFilm" class="form-control" required>
                        <?php foreach($film as $film){ ?>
                            <option value="<?php echo $film['IDFilm'] ?>"><?php echo $film['NamaFilm'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-primary col-md-12" id="search_jadwal">
                        Cek Jadwal
                    </button>    
                </div>

                <div class="form-group col-md-12">
                    <label>Jadwal</label>
                    <select name="IDJadwal" id="IDJadwal" class="form-control">
                        <option value="">-- PILIH BIOSKOP DAN FILM DAHULU --</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#search_jadwal').click(function(e){
        e.preventDefault();

        var bioskop = $('#IDBioskop').val();
        var film = $('#IDFilm').val();

        $.ajax({
            url: "<?php echo base_url('api/get_jadwal/') ?>"+bioskop+'/'+film,
            dataType: "json",
            success: function(result){
                var html = '<option selected value="">-- PILIH JADWAL --</option>'

                $.each(result, function(k, v){
                    html += '<option value="'+v.IDJadwal+'">'
                    html += v.Tanggal
                    html += '</option>'
                })

                $('#IDJadwal').html(html);
            }
        })
    })
</script>