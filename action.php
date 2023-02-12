<?php session_start();
include'koneksi.php';
include'func/fungsi.php';


switch($_GET['act']){
  case 'login':
  $ip = session_id();
  	$password = MD5($password);
	$data = query("SELECT * from tb_user where username='$username'	 AND password='$password'");
	$cek=numrows($data);
	$a=fetch($data);
	if($cek==0){
		$_SESSION['pesan']="password";
		echo"<script languange='javascript'>
		document.location='login.php';
		</script>";
	} else{
		if(!empty($a['Ip'])) {
			$_SESSION['pesan']="ip";
				echo"<script languange='javascript'>
				document.location='login.php';
			</script>";
		} else {
			query("UPDATE tb_user SET ip ='$ip' WHERE username ='$username'");
			$_SESSION['Username']=$a['Username'];
			$_SESSION['Hak_akses']=$a['Hak_akses'];
      $_SESSION['Foto']=$a['Foto'];
			if($_SESSION['Hak_akses'] == "admin"){header('location:dashboard/index.php');}
		}
	}
  break;

  case'absen':
      $data = query("SELECT * from tb_pegawai where NIP='$nip'");
      $cek=numrows($data);
      $a=fetch($data);
      if ($cek == 0) {
        $_SESSION['pesan']="Maaf NIP yang anda cari tidak di temukan !";
        echo"<script languange='javascript'>
        document.location='index.php';
        </script>";
      } else{
        $sql = query("SELECT *FROM tb_absensi WHERE NIP='$nip' and Tanggal='$tglnow'");
        $b=fetch($sql);
        if($b['Jam_Pulang'] == "00:00:00"){
          echo"<script languange='javascript'>
                document.location='index.php?page=profile&nip=$nip';
              </script>";
        }else{
            $_SESSION['pesan']="Maaf anda sudah absen hari ini!";
            echo"<script languange='javascript'>
            document.location='index.php';
            </script>";
        }
      }
  break;

  case 'add_absensi':
    $day = date('D', strtotime($tglnow));
    $dayList = array(
      'Sun' => 'Minggu',
      'Mon' => 'Senin',
      'Tue' => 'Selasa',
      'Wed' => 'Rabu',
      'Thu' => 'Kamis',
      'Fri' => 'Jumat',
      'Sat' => 'Sabtu'
    );
      $sql = query("SELECT *FROM tb_pegawai");
      while ($data = fetch($sql)) {
        query("INSERT INTO tb_absensi (NIP,Tanggal,Hari) values('$data[NIP]','$tglnow','$dayList[$day]')");
      }
      header('location:dashboard/index.php?page=absensi');
  break;

  case 'update_absensi':
    $sql = query("UPDATE tb_absensi SET Jam_masuk='00:00:00' , Jam_Pulang='00:00:00', Status='Tidak hadir' WHERE Id_absensi = '$id'");
      ubah($sql,'absensi');
  break;

  case'add_masuk':
    $jam = date("H:i:s");
    $sql = query("UPDATE tb_absensi SET Jam_masuk ='$jam' WHERE NIP = '$nip' AND Tanggal='$tglnow'");
    header('location:index.php'); 
  break;

  case 'add_izin':
   $jam     = date("H:i:s");
   $sintax  = query("SELECT * FROM tb_absensi where Tanggal='$tglnow' AND NIP='$nip'");
   $datanya = fetch($sintax);
   $sql     = query("UPDATE tb_absensi SET Status='izin keperluan', Jam_Pulang='$jam' WHERE NIP ='$nip' AND Tanggal='$tglnow'");
   $sql1    = query("INSERT INTO tb_izin values('','$datanya[Id_absensi]','$nip','$keterangan','$jam','$tglnow')");
   header('location:index.php'); 
  break;

  case 'add_pengajuan_izin':
      $jam     = date("H:i:s");
      $sql = query("SELECT * FROM tb_absensi WHERE Id_absensi = '$id_absensi'");
      $data = fetch($sql);
      query("UPDATE tb_absensi SET Status='izin' WHERE Id_absensi ='$id_absensi'");
      $values = "' ','$id_absensi','$data[NIP]','$keterangan','$jam','$tglnow'";
      insert('tb_izin',($values),'izin');
  break;

  case 'add_keluar':
    $jam = date("H:i:s");
    $sql = query("UPDATE tb_absensi SET Jam_Pulang ='$jam', Status='Hadir' WHERE NIP = '$nip' AND Tanggal='$tglnow'");
    header('location:index.php'); 
  break;


  case'logout':
   	query("UPDATE tb_user set Ip='' WHERE Username='$_SESSION[Username]'");
	logout();
  break;


  case'add_bagian':
   $values = "'$id','$nama_bagian','$keterangan'";
   insert('tb_bagian',($values),'bagian');
  break;

  case'del_bagian':
   	hapus('tb_bagian', 'Id_bagian="' . $id . '"','bagian');
  break;

  case 'update_bagian':
   $sql = query("UPDATE tb_bagian SET Nama_bagian ='$nama_bagian' , Keterangan ='$keterangan' WHERE Id_bagian = '$id'");
  	ubah($sql,'bagian');
  break;

  case 'add_pegawai':
  	 $path    = $_FILES['foto']['name'];
        $extensi = pathinfo($path, PATHINFO_EXTENSION);
        if ($extensi == 'jpg' OR $extensi == 'jpeg' OR $extensi == 'png' OR $extensi == 'gif') {
            $img = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
            $values="'$nip','$bagian','40500','$nama_pegawai','$tgl_lahir','$tgl_gabung','$jk','$agama','$alamat','$no_tlp','$status','$img'";  
          	insert('tb_pegawai',($values),'pegawai');
     } else {
        $_SESSION['pesan']=
          '<div class="alert alert-denger">
            <strong>Gagal!</strong> Data gagal di simpan !
           </div>';
        header('location:dashboard/index.php?page=add_pegawai'); 
     }
  break;

  case'del_pegawai':
    hapus('tb_pegawai', 'nip="' . $id . '"','pegawai');
  break;

  case 'update_pegawai':
   $path = $_FILES['foto']['name'];
      $extensi = pathinfo($path, PATHINFO_EXTENSION);
  if (!empty($extensi)) { 
      if ($extensi == 'jpg' OR $extensi == 'jpeg' OR $extensi == 'png' OR $extensi == 'gif') {
            $img = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));	
            $sql = query("UPDATE tb_pegawai SET Id_bagian='$bagian', Nama_pegawai='$nama_pegawai', Tanggal_lahir='$tgl_lahir', Tanggal_bergabung='$tgl_gabung', Jenis_kelamin='$jk', Agama='$agama', Alamat='$alamat', No_tlp='$no_tlp', Status='$status',Foto='$img' WHERE NIP ='$nip'");
            header('location:dashboard/index.php?page=pegawai'); 
      }else {
        $_SESSION['pesan']=
          '<div class="alert alert-denger">
            <strong>Gagal!</strong> Data gagal di ubah !
           </div>';
        header('location:dashboard/index.php?page=update_pegawai&id='.$id.''); 
     }
    }else{
        $sql = query("UPDATE tb_pegawai SET Id_bagian='$bagian', Nama_pegawai='$nama_pegawai', Tanggal_lahir='$tgl_lahir', Tanggal_bergabung='$tgl_gabung', Jenis_kelamin='$jk', Agama='$agama', Alamat='$alamat', No_tlp='$no_tlp', Status='$status' WHERE NIP ='$nip'");
        header('location:dashboard/index.php?page=pegawai'); 
    }       

  break;
}
