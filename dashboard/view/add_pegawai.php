<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Data Pegawai</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="index.php?page=pegawai">Pegawai</a></li>
                                        <li class="breadcrumb-item active">Tambah Data</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Form Input</b></h4>
                                    <form class="form-horizontal" enctype="multipart/form-data" action="../action.php?act=add_pegawai" method="POST">
                                    <div class="row">
                                  
                                        <div class="col-8">
                                            <div class="p-20">
                                                        
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">NIP</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Nama Pegawai</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Lengkap Pegawai" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Bagian</label>
                                                        <div class="col-9">
                                                            <select class="form-control" name="bagian" required>
                                                             <option selected disabled>--Pilih Bagian--</option>
                                                                 <?php
                                                             $sql = query("SELECT * FROM tb_bagian");
                                                             while($data = fetch($sql)){
                                                                echo' <option value="'.$data['Id_bagian'].'"">
                                                                '.$data['Nama_bagian'].'</option>';
                                                               }?>   
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Gender</label>
                                                        <div class="col-9">
                                                           <select class="form-control" name="jk" required>
                                                                <option selected disabled>--Pilih Gender--</option>
                                                                <option value="L">Laki - Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-9">
                                                            <input type="date" class="form-control" name="tgl_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Tanggal Bergabung</label>
                                                        <div class="col-9">
                                                            <input type="date" class="form-control" name="tgl_gabung" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Agama</label>
                                                        <div class="col-9">
                                                           <select class="form-control" name="agama" required>
                                                                <option selected disabled>--Pilih Agama--</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Yang Lainnya">Yang lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">No Telepon</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="no_tlp" placeholder="Nomor Telepon / HP" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Status</label>
                                                        <div class="col-9">
                                                            <select class="form-control" name="status" required>
                                                                <option selected disabled>--Pilih Status--</option>
                                                                <option value="Menikah">Menikah</option>
                                                                <option value="Lajang">Lajang</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">Alamat</label>
                                                        <div class="col-9">
                                                            <textarea class="form-control" name="alamat" placeholder="Alamat Pegawai" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label"></label>
                                                        <div class="col-9">
                                                           <button type="submit" class="btn btn-success btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-plus"></i> Simpan</button>
                                                           <button type="reset" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-close"></i> Batal</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- END COL  -->
                                          <div class="col-4">
                                            <div align="center" class="col-12">
                                                 <img id="output"/ src="../assets/images/default.png" class="preview-img">
                                                 <h5 class="prev-foto">*Priview Foto Pegawai</h4>
                                                 <input type="file" accept="image/*" class="form-control" name="foto" onchange="loadFile(event)">
                                            </div>
                                               
                                        </div>
                                        
                                    </div>
                                    </form>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
            </div>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>