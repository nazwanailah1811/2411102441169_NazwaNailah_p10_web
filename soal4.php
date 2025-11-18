<?php
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bulan = $_POST["bulan"];
    $nama_bulan = "";
    $hari = 0;

    switch ($bulan) {
        case 1:
            $nama_bulan = "Januari";  $hari = 31; break;
        case 2:
            $nama_bulan = "Februari";
            // cek tahun kabisat
            $tahun = date("Y");
            if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
                $hari = 29;
            } else {
                $hari = 28;
            }
            break;
        case 3:
            $nama_bulan = "Maret"; $hari = 31; break;
        case 4:
            $nama_bulan = "April"; $hari = 30; break;
        case 5:
            $nama_bulan = "Mei"; $hari = 31; break;
        case 6:
            $nama_bulan = "Juni"; $hari = 30; break;
        case 7:
            $nama_bulan = "Juli"; $hari = 31; break;
        case 8:
            $nama_bulan = "Agustus"; $hari = 31; break;
        case 9:
            $nama_bulan = "September"; $hari = 30; break;
        case 10:
            $nama_bulan = "Oktober"; $hari = 31; break;
        case 11:
            $nama_bulan = "November"; $hari = 30; break;
        case 12:
            $nama_bulan = "Desember"; $hari = 31; break;
        default:
            $nama_bulan = "Tidak valid"; $hari = 0;
    }

    $hasil = "Bulan <b>$nama_bulan</b> memiliki <b>$hari hari</b>.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Jumlah Hari dalam Bulan</title>
<style>
    body { font-family: Arial; padding: 20px; }
    .card { width: 350px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; }
    select, button { width: 100%; padding: 8px; margin-top: 10px; }
    .result { margin-top: 15px; font-size: 16px; }
</style>
</head>
<body>

<div class="card">
    <h3>Cek Jumlah Hari dalam Bulan</h3>

    <form method="POST" action="">
        <label>Pilih Bulan:</label>
        <select name="bulan" required>
            <option value="">-- Pilih Bulan --</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

        <button type="submit">Tampilkan Jumlah Hari</button>
    </form>

    <div class="result"><?php echo $hasil; ?></div>
</div>

</body>
</html>
