<?php
$hasil = "";
$jam_input = "";
$golongan_input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jam_input = trim($_POST["jam"]);
    $golongan_input = $_POST["golongan"];

    // daftar upah per golongan
    $upah_golongan = [
        "A" => 4000,
        "B" => 5000,
        "C" => 6000,
        "D" => 7500
    ];

    $upah_lembur = 3000;
    $batas_normal = 48;

    // Validasi input
    if ($jam_input === "" || !is_numeric($jam_input) || $jam_input < 0) {
        $hasil = "Input jam tidak valid!";
    } elseif (!isset($upah_golongan[$golongan_input])) {
        $hasil = "Golongan tidak valid!";
    } else {
        $jam = (int)$jam_input;
        $upah_per_jam = $upah_golongan[$golongan_input];

        // Perhitungan
        if ($jam <= $batas_normal) {
            $total = $jam * $upah_per_jam;
        } else {
            $jam_lembur = $jam - $batas_normal;
            $total = ($batas_normal * $upah_per_jam) + ($jam_lembur * $upah_lembur);
        }

        // Format tampil
        $hasil = "Total upah golongan <b>$golongan_input</b>: <b>Rp " . 
                 number_format($total, 0, ',', '.') . ",-</b>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hitung Upah Per Golongan</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .card { width: 360px; padding: 18px; border: 1px solid #ccc; border-radius: 8px; }
    input, select { width: 100%; padding: 8px; margin-top: 5px; }
    button { padding: 8px 12px; margin-top: 10px; }
    .result { margin-top: 15px; font-size: 16px; }
</style>
</head>
<body>

<div class="card">
    <h3>Hitung Upah Karyawan Berdasarkan Golongan</h3>

    <form method="POST" action="">
        <label>Jumlah jam kerja per minggu:</label>
        <input type="number" name="jam" min="0" required 
               value="<?php echo htmlspecialchars($jam_input); ?>">

        <label>Pilih Golongan:</label>
        <select name="golongan" required>
            <option value="">-- Pilih Golongan --</option>
            <option value="A" <?php if($golongan_input=="A") echo "selected"; ?>>A</option>
            <option value="B" <?php if($golongan_input=="B") echo "selected"; ?>>B</option>
            <option value="C" <?php if($golongan_input=="C") echo "selected"; ?>>C</option>
            <option value="D" <?php if($golongan_input=="D") echo "selected"; ?>>D</option>
        </select>

        <button type="submit">Hitung Upah</button>
    </form>

    <div class="result"><?php echo $hasil; ?></div>
</div>

</body>
</html>
