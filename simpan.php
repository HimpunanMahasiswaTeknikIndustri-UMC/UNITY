<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'registrasi_hmti');
    
    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari form
    $nama_lengkap = $conn->real_escape_string($_POST['nama_lengkap']);
    $nim = $conn->real_escape_string($_POST['nim']);
    $kelas = $conn->real_escape_string($_POST['kelas']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $motivasi = $conn->real_escape_string($_POST['motivasi']);

    // Query untuk menyimpan data
    $sql = "INSERT INTO pendaftaran (nama_lengkap, nim, kelas, jenis_kelamin, motivasi) 
            VALUES ('$nama_lengkap', '$nim', '$kelas', '$jenis_kelamin', '$motivasi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registrasi Berhasil!'); window.location.href='pendaftaran.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>