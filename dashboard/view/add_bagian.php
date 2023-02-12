<?php $kode_bagian = AutoCode("Id_bagian","tb_bagian","BGN0")?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Data Bagian</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="index.php?page=bagian">Bagian</a></li>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                            <form class="form-horizontal" action="../action.php?act=add_bagian" method="POST">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">ID Bagian</label>
                                                        <div class="col-10">
                                <input type="text" class="form-control" name="id" value="<?php echo $kode_bagian;?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama Bagian</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="nama_bagian" placeholder="Nama Bagian" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Keterangan</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" name="keterangan" placeholder="Keterangan Bagian" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label"></label>
                                                        <div class="col-10">
                                                           <button type="submit" class="btn btn-success btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-plus"></i> Simpan</button>
                                                           <button type="reset" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5"><i class="ti-close"></i> Batal</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
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