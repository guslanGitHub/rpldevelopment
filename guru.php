<?php 
$dataPiket = "data_piket.txt";

if(file_exists($dataPiket)){
    $fp = fopen($dataPiket, "a");
}else{
    $fp = fopen($dataPiket, "w");
}

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $catatan = $_POST['catatan'];
    $keterangan = $_POST['keterangan'];
    $data = "<td>". date('d-M-Y H:i:s') . "</td><td>$nama</td>" . "<td>$catatan</td>" . "<td>$keterangan</td> \n";
    fputs($fp, $data);
    fclose($fp);
}

$fp = fopen($dataPiket, "r");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>ApkPiket</title>
  </head>
  <body>
  <script>
    var zonaWaktuKlien = Intl.DateTimeFormat().resolvedOptions().timeZone;
    console.log("Zona Waktu Klien: " + zonaWaktuKlien);
</script>
    <nav class="navbar navbar-dark bg-info">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">BUKU PIKET</span>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-secondary">
                <ul class="nav flex-column">
                    <li class="nav-item pt-3">
                        <a class="nav-link text-white fs-5" aria-current="page" href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="bukutamu.php"><i class="bi bi-journal-text"></i> Buku Tamu</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="walisiswa.php"><i class="bi bi-journal-text"></i> Wali Siswa</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="keadaankelas.php"><i class="bi bi-journal-text"></i> Keadaan Kelas</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="siswa.php"><i class="bi bi-journal-text"></i> Keterangan Siswa</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="guru.php"><i class="bi bi-journal-text"></i> Keterangan Piket</a>
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" aria-current="page" href="index.php"><i class="bi bi-door-open"></i> Keluar</a>
                        <hr class="text-white">
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="title-main mt-3">
                    <h3 class="fs-3"><i class="bi bi-people-fill"></i> DATA PETUGAS PIKET</h3>
                    <hr class="secondary">
                </div>
                <div class="body-main">
                    <!-- Button trigger modal -->
                    <button type="button" class="fw-bold btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-person-fill-add"></i> Tambah Data Guru
                    </button>
                    <table class="table">
                        <thead>
                            <th>NO.</th>
                            <th>Nama Petugas</th>
                            <th>Catatan Kejadian</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <?php while(!feof($fp)): ?>
                                <tr>
                                <td>1</td>
                                <?php $baris = fgets($fp); ?>
                                <?php echo $baris; ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Petugas</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Petugas">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan Kejadian</label>
            <input type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan Kejadian">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select class="form-select" name="keterangan" aria-label="Default select example">
                <option selected>--Pilih Keterangan--</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Tanpah Keterangan">Tanpah Keterangan</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
