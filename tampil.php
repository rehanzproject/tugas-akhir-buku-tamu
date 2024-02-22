<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div
            class="d-flex flex-column align-items-ceter align-items-sm-strt px-3 pt-2 text-white min-vh-100"
          >
            <a
              href="/"
              class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"
            >
              <span class="fs-5 d-none d-sm-inline">Admin</span>
            </a>
            
          </div>
        </div>
        <div class="col py-3">
          <h1>Tabel</h1>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Alamat</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Tanda Tangan</th>
              </tr>
            </thead>
            <tbody>
            <?php

            include "koneksi.php";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bulan'])) {
                // Get the selected month from the POST data
                $selected_month = $_POST['bulan'];
            
                // Query to filter data by the selected month
                $tampil = $conn->query("SELECT * FROM tabel_tamu WHERE MONTH(tmt_pensiun) = '$selected_month' LIMIT 0 OFFSET 10");
            } else {
                // Default query without filtering
                $tampil = $conn->query("SELECT * FROM tabel_tamu");
            }
   
while ($r = mysqli_fetch_array($tampil)) {
  echo "<tr>
          <td>$r[no]</td>
          <td>$r[nama]</td>
          <td>$r[tanggal]</td>
          <td>$r[alamat]</td>
          <td>$r[keperluan]</td>
          <td>Rp $r[nomor_hp]</td>
        <td> 
        <a href='$r[ttd]' target='_blank'>Download</a>
        
        </td>
      </tr>";
        
  // // Check if the BLOB data is not empty
  // if (!empty($r['ttd'])) {
  //     // Output the image data with appropriate content type
  //     echo '<img src="data:image/jpeg;base64,'.base64_encode($r['ttd']).'" />';
  // }

  // echo "</td>
} 
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
