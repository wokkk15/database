<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "data_mahasiswa");

// Memeriksa apakah ada data yang dikirimkan melalui metode POST dengan aksi "insert"
if(isset($_POST["action"]) && $_POST["action"] == "insert"){
    insert();
}

// Fungsi untuk memasukkan data ke dalam database
function insert(){
    global $conn;

    // Mendapatkan data dari $_POST
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor_telpon = $_POST["nomor_telpon"];
    $alamat = $_POST["alamat"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $domisili = $_POST["domisili"];
    $jenis_kelamin = $_POST["jenis_kelamin"];

    // Validasi data
    if(empty($nama) || empty($email) || empty($nomor_telpon) || empty($alamat) || empty($tanggal_lahir) || empty($tempat_lahir) || empty($domisili) || empty($jenis_kelamin)) {
        echo "Data tidak lengkap";
        exit;
    }

    // Query SQL untuk memasukkan data ke dalam tabel daftar_mahasiswa
    $query = "INSERT INTO daftar_mahasiswa (nama, jenis_kelamin, tempat_lahir, tanggal_lahir, domisili, email, nomor_telpon, alamat) VALUES ('$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$domisili', '$email', '$nomor_telpon', '$alamat')";

    // Menjalankan query SQL
    if(mysqli_query($conn, $query)) {
        echo 1; // Memberikan respons 1 jika query berhasil dieksekusi
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn); // Menampilkan pesan error jika query gagal dieksekusi
    }
}
?>
