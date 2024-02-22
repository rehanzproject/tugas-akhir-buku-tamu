

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas Akhir</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="container d-flex justify-content-center center-blue">
      <aside class="">
        <h3>Dinas Perhubungan</h3>
        <p>
          Dinas Perhubungan merupakan unsur pelaksana otonomi daerah di bidang
          perhubungan yang berkedudukan di bawah dan bertanggung jawab kepada
          Gubernur melalui SEKDA.
        </p>
        <p>Terimakasih telah mengunjungi kami</p>
        <img src="logo.png" />
      </aside>
      <div class="center-white">
        <h3>Buku Tamu</h3>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input
              type="text"
              class="form-control"
              id="nama"
              name="nama"
              aria-describedby="textHelp"
              required
            />
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input
              type="text"
              class="form-control"
              id="alamat"
              name="alamat"
              aria-describedby="textHelp"
              required
            />
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">tanggal</label>
            <input
              type="date"
              class="form-control"
              id="tanggal"
              name="tanggal"
              aria-describedby="textHelp"
              required
            />
          </div>
          <div class="mb-3">
            <label for="keperluan" class="form-label"
              >Keperluan</label
            >
            <input
              type="text"
              class="form-control"
              name="keperluan"
              id="keperluan"
              required
            />
          </div>
          <div class="mb-3">
            <label for="nomor_hp" class="form-label"
              >Nomor HP</label
            >
            <input
              type="number"
              class="form-control"
              name="nomor_hp"
              id="nomor_hp"
              required
            />
          </div>
          <div>
            <label for="exampleInputPassword1" class="form-label"
              >Tanda Tangan</label
            >

            <canvas
              id="can"
              width="400"
              height="400"
              style="border: 2px solid; cursor: crosshair"
            ></canvas>
          </div>
          <input type="hidden" id="signatureData" name="signatureData" />
          <!-- <button type="button" id="saveBtn" class="btn btn-primary">Simpan TTD</button> -->

          <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </body>
  
  <script>
  const canvas = document.getElementById('can');
const ctx = canvas.getContext('2d');
let isDrawing = false;
let prevX = 0;
let prevY = 0;

canvas.addEventListener('mousedown', (e) => {
  isDrawing = true;
  [prevX, prevY] = [e.offsetX, e.offsetY];
});

canvas.addEventListener('mousemove', (e) => {
  if (isDrawing) {
    drawLine(prevX, prevY, e.offsetX, e.offsetY);
    prevX = e.offsetX;
    prevY = e.offsetY;
  }
});

canvas.addEventListener('mouseup', () => {
  isDrawing = false;
});

function drawLine(x1, y1, x2, y2) {
  ctx.beginPath();
  ctx.moveTo(x1, y1);
  ctx.lineTo(x2, y2);
  ctx.strokeStyle = '#000';
  ctx.lineWidth = 2;
  ctx.stroke();
  ctx.closePath();
}
document.getElementById('saveBtn').addEventListener('click', () => {
  const signatureData = canvas.toDataURL(); // Get base64-encoded image data
  document.getElementById('signatureData').value = signatureData; // Set the value of hidden input
  document.querySelector('form').submit();
});
  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
  ></script>
</html>

<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['tanggal'];
  $keperluan = $_POST['keperluan'];
  $nomor_hp = $_POST['nomor_hp'];
  $signatureData = $_POST['signatureData'];

  // SQL query to insert data into the database
  $sql = "INSERT INTO tabel_tamu (nama, alamat, tanggal, keperluan, nomor_hp , ttd) VALUES ('$nama', '$alamat', '$tanggal', '$keperluan', '$nomor_hp', '$signatureData')";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>