<?php
// koneksi ke database
$con = mysqli_connect("localhost", "root", "", "alhasan_db");
function query($query)
{
  global $con;
  $result = mysqli_query($con, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function registrasi($data)
{
  global $con;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($con, $data["password"]);
  $password2 = mysqli_real_escape_string($con, $data["password2"]);
  $status = ($data["status"]);
  $nama = ($data["nama"]);
  $id_resto = ($data["id_resto"]);
  if ($password !== $password2) {
    echo "
  <script>
  alert('password tidak sesuai');  
  </script>
  ";

    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($con, "INSERT INTO login VALUES ('','$username', '$password', '$status', '$nama', '$id_resto')");
  return mysqli_affected_rows($con);
}



// ubah data profil
function ubah($data)
{
  global $con;
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $hp =  htmlspecialchars($data['hp']);;
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $tagline = htmlspecialchars($data['tagline']);
  $link_video =  htmlspecialchars($data['link_video']);
  $google_map =  htmlspecialchars($data['google_map']);
  $bg_lama = htmlspecialchars($data['bg_lama']);
  $profil_lama =  htmlspecialchars($data['profil_lama']);

  // cek gambar apakah upload atau tidak
  if ($_FILES['foto_bg']['error'] === 4) {
    $foto_bg = $bg_lama;
  } else {
    $foto_bg = upload()['foto_bg'];
  }
  // cek gambar apakah upload atau tidak
  if ($_FILES['foto_profil']['error'] === 4) {
    $foto_profil = $profil_lama;
  } else {
    $foto_profil = upload()['foto_profil'];
  }

  // update data di database
  $query = "UPDATE resto SET 
  nama =' $nama',
  alamat = '$alamat',
  hp = '$hp',
  deskripsi = '$deskripsi',
  tagline = '$tagline',
  foto_bg = '$foto_bg',
  foto_profil = '$foto_profil',
  link_video = '$link_video',
  google_map = '$google_map'
  WHERE id = $id
  ";

  mysqli_query($con, $query);
  return mysqli_affected_rows($con);
}


//upload data gambar profil
function upload()
{
  $nama_bg = $_FILES['foto_bg']['name'];
  $error_bg = $_FILES['foto_bg']['error'];
  $tmp_bg = $_FILES['foto_bg']['tmp_name'];
  $nama_profil = $_FILES['foto_profil']['name'];
  $error_profil = $_FILES['foto_profil']['error'];
  $tmp_profil = $_FILES['foto_profil']['tmp_name'];

  //cek ektensi
  $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ektensiGambar = explode('.', 'nama_bg');
  $ektensiGambar = explode('.', 'nama_profil');
  $ektensiGambar = strtolower(end($ektensiGambar));

  if (in_array($ektensiGambar, $ektensiGambarValid)) {
    echo "
    <script>
    alert('yang upload gambar tidak sesuai');  
    </script>
    ";
  };

  // move file gambar
  move_uploaded_file($tmp_bg, '../public/assets/images/background/' . $nama_bg);
  move_uploaded_file($tmp_profil, '../public/assets/images/profil/' . $nama_profil);

  return ['foto_bg' => $nama_bg, 'foto_profil' => $nama_profil];
}


// tambah data promo/pengumuman
function tambah_promo()
{
  global $con;
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal_mulai = $_POST['tanggal_mulai'];
  $tanggal_selesai = $_POST['tanggal_selesai'];
  $id_tipe = $_POST['id_tipe'];


  $foto = upload_foto();
  if (!$foto) {
    return false;
  }

  // insert data ke database
  mysqli_query($con, "INSERT INTO promo_pengumuman VALUES ('','$foto', '$judul', '$deskripsi', '$tanggal_mulai','$tanggal_selesai','$id_tipe')");
  return mysqli_affected_rows($con);
}

// utuk upload foto
function upload_foto()
{
  $namaFoto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpFoto = $_FILES['foto']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
    alert('upload gambar terlebih dahulu');  
      </script>
    ";
    return false;
  }

  $ekteksiValid = ['jpg', 'png', 'jpeg'];
  $ektensiGambar = explode('.', $namaFoto);
  $ektensiGambar = strtolower(end($ektensiGambar));

  // cek ekstensi
  if (!in_array($ektensiGambar, $ekteksiValid)) {
    echo "
    <script>
    alert('gambar yang diupload tidak sesuai'); 
    document.location.href = 'promo.php';  
    </script>
    ";
    return false;
  }
  // cek ukuran file
  if ($ukuranFoto > 1000000) {
    echo " <script>
    alert('gambar yang diupload terlalu besar'); 
    document.location.href = 'promo.php';  
    </script>
    ";
    return false;
  }

  // membuat nama baru jika ada nama foto yang sama
  $namaFotoBaru = uniqid();
  $namaFotoBaru .= '.';
  $namaFotoBaru .= $ektensiGambar;

  move_uploaded_file($tmpFoto, '../public/assets/img/promo/' . $namaFotoBaru);
  return $namaFotoBaru;
}

// hapus data promo
function hapus_promo()
{
  global $con;
  mysqli_query($con, "DELETE FROM promo_pengumuman WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}


// edit data promo
function edit_promo($dataPromo)
{
  global $con;
  $id = $_POST['id'];
  $id_tipe = $_POST['tipe'];
  $foto_lama = $dataPromo['foto_lama'];
  $judul = htmlspecialchars($dataPromo['judul']);
  $deskripsi = htmlspecialchars($dataPromo['deskripsi']);
  $tanggal_mulai = htmlspecialchars($dataPromo['tanggal_mulai']);
  $tanggal_selesai = htmlspecialchars($dataPromo['tanggal_selesai']);


  // cek gambar apakah upload atau tidak
  if ($_FILES['foto']['error'] === 4) {
    $foto = $foto_lama;
  } else {
    $foto = upload_foto();
  }
  mysqli_query($con, "UPDATE promo_pengumuman 
  SET foto='$foto', judul ='$judul',deskripsi='$deskripsi', tanggal_mulai='$tanggal_mulai',tanggal_selesai='$tanggal_selesai',id_tipe='$id_tipe'
   WHERE id='$id'");
  return mysqli_affected_rows($con);
}

// fungsi tambah jenis menu
function tambah_jenis_menu()
{

  global $con;
  $jenis_menu = $_POST['jenis_menu'];

  mysqli_query($con, "INSERT INTO jenis_menu VALUES ('','$jenis_menu')");
  return mysqli_affected_rows($con);
}

function hapusJenisMenu()
{
  global $con;
  mysqli_query($con, "DELETE FROM jenis_menu WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}


// edit data jenis menu 
function edit_jenisMenu()
{
  global $con;
  $id = $_POST['id'];
  $jenis_menu = htmlspecialchars($_POST["jenis_menu"]);


  mysqli_query($con, "UPDATE jenis_menu SET jenis='$jenis_menu' WHERE id='$id'");
  return mysqli_affected_rows($con);
}
function tambah_kegiatan()
{

  global $con;

  $nama = $_POST['nama'];
  $lokasi = $_POST['lokasi'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];


  $foto_kegiatan = upload_foto_kegiatan();
  if (!$foto_kegiatan) {
    return false;
  }

  mysqli_query($con, "INSERT INTO kegiatan VALUES ('','$nama','$deskripsi','$lokasi','$foto_kegiatan','$tanggal')");
  return mysqli_affected_rows($con);
}


// fungsi utuk upload foto
function upload_foto_kegiatan()
{
  $namaFoto = $_FILES['foto_kegiatan']['name'];
  $ukuranFoto = $_FILES['foto_kegiatan']['size'];
  $error = $_FILES['foto_kegiatan']['error'];
  $tmpFoto = $_FILES['foto_kegiatan']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
    alert('upload gambar terlebih dahulu');  
      </script>
    ";
    return false;
  }

  $ekteksiValid = ['jpg', 'png', 'jpeg'];
  $ektensiGambar = explode('.', $namaFoto);
  $ektensiGambar = strtolower(end($ektensiGambar));

  // cek ekstensi
  if (!in_array($ektensiGambar, $ekteksiValid)) {
    echo "
    <script>
    alert('gambar yang diupload tidak sesuai'); 
    document.location.href = 'menu.php';  
    </script>
    ";
    return false;
  }
  // cek ukuran file
  if ($ukuranFoto > 1000000) {
    echo " <script>
    alert('gambar yang diupload terlalu besar'); 
    document.location.href = 'menu.php';  
    </script>
    ";
    return false;
  }

  // membuat nama baru jika ada nama foto yang sama
  $namaFotoBaru = uniqid();
  $namaFotoBaru .= '.';
  $namaFotoBaru .= $ektensiGambar;

  move_uploaded_file($tmpFoto, '../public/assets/img/menu/' . $namaFotoBaru);
  return $namaFotoBaru;
}


// hapus data menu

function hapus_kegiatan()
{
  global $con;
  mysqli_query($con, "DELETE FROM kegiatan WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}

// edit data menu
function edit_kegiatan($dataKegiatan)
{
  global $con;
  $id = $_POST['id'];

  $nama = htmlspecialchars($dataKegiatan['nama']);
  $deskripsi = htmlspecialchars($dataKegiatan['deskripsi']);
  $lokasi = $dataKegiatan['lokasi'];
  $tanggal = $dataKegiatan['tanggal'];
  $foto_lama = $dataKegiatan['foto_lama'];


  // cek gambar apakah upload atau tidak
  if ($_FILES['foto_kegiatan']['error'] === 4) {
    $foto_kegiatan = $foto_lama;
  } else {
    $foto_kegiatan = upload_foto_kegiatan();
  }

  mysqli_query($con, "UPDATE kegiatan SET nama='$nama', deskripsi ='$deskripsi',  
  lokasi='$lokasi',foto ='$foto_kegiatan',tanggal='$tanggal'  WHERE id='$id'");
  return mysqli_affected_rows($con);
}

// edit data top 5
function edit_toplima($data)
{
  global $con;
  $id = $_POST['id'];
  $id_menu = htmlspecialchars($data["id_menu"]);
  mysqli_query($con, "UPDATE top_lima SET id_menu='$id_menu' WHERE id='$id'");
  return mysqli_affected_rows($con);
}


// tambah data galery
function tambah_galery()
{

  global $con;
  $foto_galery = upload_foto_galery();
  if (!$foto_galery) {
    return false;
  }

  mysqli_query($con, "INSERT INTO gallery VALUES ('','$foto_galery')");
  return mysqli_affected_rows($con);
}

// fungsi utuk upload foto
function upload_foto_galery()
{
  $namaFoto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpFoto = $_FILES['foto']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
    alert('upload gambar terlebih dahulu');  
      </script>
    ";
    return false;
  }

  $ekteksiValid = ['jpg', 'png', 'jpeg'];
  $ektensiGambar = explode('.', $namaFoto);
  $ektensiGambar = strtolower(end($ektensiGambar));

  // cek ekstensi
  if (!in_array($ektensiGambar, $ekteksiValid)) {
    echo "
    <script>
    alert('gambar yang diupload tidak sesuai'); 
    document.location.href = 'gallery.php';  
    </script>
    ";
    return false;
  }
  // cek ukuran file
  if ($ukuranFoto > 1000000) {
    echo " <script>
    alert('gambar yang diupload terlalu besar'); 
    document.location.href = 'gallery.php';  
    </script>
    ";
    return false;
  }

  // membuat nama baru jika ada nama foto yang sama
  $namaFotoBaru = uniqid();
  $namaFotoBaru .= '.';
  $namaFotoBaru .= $ektensiGambar;

  move_uploaded_file($tmpFoto, '../public/assets/img/gallery/' . $namaFotoBaru);
  return $namaFotoBaru;
}

// edit data gallery
function edit_gallery($data)
{
  global $con;
  $id = $_POST['id'];
  $foto_lama = $data['foto_lama'];



  // cek gambar apakah upload atau tidak
  if ($_FILES['foto']['error'] === 4) {
    $foto = $foto_lama;
  } else {
    $foto = upload_foto_galery();
  }
  mysqli_query($con, "UPDATE gallery 
  SET foto='$foto'
   WHERE id='$id'");
  return mysqli_affected_rows($con);
}

//hapus data gallery
function hapus_gallery()
{
  global $con;
  mysqli_query($con, "DELETE FROM gallery WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}


//tambah data testimoni
function tambah_testimoni()
{

  global $con;
  $nama = $_POST['nama'];
  $testimoni = $_POST['testimoni'];

  mysqli_query($con, "INSERT INTO testimoni VALUES ('','$nama','$testimoni')");
  return mysqli_affected_rows($con);
}

// edit data testimoni 
function edit_testimoni($data)
{
  global $con;
  $id = $_POST['id'];
  $nama = htmlspecialchars($data["nama"]);
  $testimoni = htmlspecialchars($data["testimoni"]);
  mysqli_query($con, "UPDATE testimoni SET nama='$nama', testimoni='$testimoni' WHERE id='$id'");
  return mysqli_affected_rows($con);
}

// hapus data testimoni
function hapusTestimoni()
{
  global $con;
  mysqli_query($con, "DELETE FROM testimoni WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}

// tambah sosial media
function tambah_sosialMedia()
{

  global $con;

  $id_sm = $_POST['id_sm'];
  $link = $_POST['link'];

  mysqli_query($con, "INSERT INTO link_social_media VALUES ('','$id_sm','$link')");
  return mysqli_affected_rows($con);
}

// edit data testimoni 
function edit_sosialMedia($dataSm)
{
  global $con;
  $id = $_POST['id'];
  $id_sm = htmlspecialchars($dataSm["id_sm"]);
  $link = htmlspecialchars($dataSm["link"]);
  mysqli_query($con, "UPDATE link_social_media SET id_social_media='$id_sm', link='$link' WHERE id='$id'");
  return mysqli_affected_rows($con);
}

// hapus data testimoni
function hapus_sosialMedia()
{
  global $con;
  mysqli_query($con, "DELETE FROM link_social_media WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}

function preview()
{
  global $con;
  mysqli_query($con, "DELETE FROM link_social_media WHERE id='$_GET[id]'");
  return mysqli_affected_rows($con);
}
