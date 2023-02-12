<?php session_start(); 
include'../koneksi.php';
include'../func/fungsi.php';
if(empty($_SESSION['Hak_akses']))
    header('location:../action.php?act=logout')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
       <!-- <link rel="icon" type="image/png" href="assets/images/logo-pos.png"> -->
        <link rel="shortcut icon" href="assets/images/Logo1.png">

        <title>Pos Indonesia</title>
        <!-- DataTables -->
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/select2/select2.css" rel="stylesheet" type="text/css">

       <!--  <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" /> -->
        <link href="../assets/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <!-- <link href="../assets/css/themify-icons.css" rel="stylesheet" type="text/css"> -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>
    </head>

    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php include'view/topbar.php';?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include'view/left-sidebar.php';?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
             <?php
                $page = isset($_GET['page']) ? $_GET['page'] : null;
                switch($page){

                  default:
                   require'view/content_dashboard.php';
                  break;

                  case'pegawai';
                    require'view/content_pegawai.php';
                  break;
                    case'add_pegawai';
                        require'view/add_pegawai.php';
                    break;
                    case'update_pegawai';
                        require'view/update_pegawai.php';
                    break;

                  case'bagian';
                    require'view/content_bagian.php';
                  break;
                    case'add_bagian';
                        require'view/add_bagian.php';
                    break;
                    case'update_bagian';
                        require'view/update_bagian.php';
                    break;

                  case 'izin':
                        require'view/content_ijin.php';
                  break;
                    case 'add_izin':
                        require'view/add_ijin.php';
                    break; 

                  case'absensi';
                    require'view/content_absensi.php';
                  break;

                  case'laporan';
                    require'view/content_laporan.php';
                  break;

                }
             ?>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <?php include'view/right-sidebar.php';?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
         <script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>
     <!--    <script src="../assets/plugins/switchery/switchery.min.js"></script> -->

        <!-- Counter Up  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- circliful Chart -->
        <script src="../assets/plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
         <script src="http://coderthemes.com/minton/plugins/select2/select2.min.js" type="text/javascript"></script>

        <!-- skycons -->
       

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>

        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

          <!-- Required datatable js -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $('.circliful-chart').circliful();
            });

            // BEGIN SVG WEATHER ICON
            if (typeof Skycons !== 'undefined'){
                var icons = new Skycons(
                        {"color": "#3bafda"},
                        {"resizeClear": true}
                        ),
                        list  = [
                            "clear-day", "clear-night", "partly-cloudy-day",
                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                            "fog"
                        ],
                        i;

                for(i = list.length; i--; )
                    icons.set(list[i], list[i]);
                icons.play();
            };

             $(document).ready(function() {
                  $('.select2').select2();
                  $('.select2').select2({
                      placeholder: "Pilih Kategori"
                  });
              });

        </script>

        <script type="text/javascript">
         window.setTimeout(function() {
            $(".alert").slideDown(500, 0).slideUp(500, function(){
                $(this).remove(); 
              });
          }, 4000);

            $(document).ready(function() {
                // $('#datatable').DataTable();
                var table = $('#datatable').DataTable({
                   'aoColumnDefs': [{
                        'bSortable': false,
                        'aTargets': [-1] /* 1st one, start by the right */
                    }]
                });
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf'],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 }
                      ]

                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
            $(document).ready(function() {
                $('a[data-confirm]').click(function(ev) {
                    var href = $(this).attr('href');
                    if (!$('#dataConfirmModal').length) {
                        $('body').append('<div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog mdl-del"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">Konfimasi Hapus</h4></div><div class="modal-body"></div><div class="modal-footer"><a class="btn btn-primary" id="dataConfirmOK">Hapus</a><button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button></div></div> </div></div>');
                    } 
                    $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                    $('#dataConfirmOK').attr('href', href);
                    $('#dataConfirmModal').modal({show:true});
                    return false;
                });
            });

        </script>


    </body>
</html>