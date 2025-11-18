<?php
$hasil = "";
$jam_input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jam_input = trim($_POST["jam"]);

    if ($jam_input === "" || !is_numeric($jam_input) || $jam_input < 0) {
        $hasil = "Input tidak valid! Masukkan jumlah jam kerja yang benar.";
    } else {
        $jam = (int)$jam_input;

        $upah_normal = 2000;
        $upah_lembur = 3000;
        $batas_jam_normal = 48;

        if ($jam <= $batas_jam_normal) {
            // Tidak ada lembur
            $total_upah = $jam * $upah_normal;
        } else {
            // Hitung lembur
            $jam_lembur = $jam - $batas_jam_normal;
            $total_upah = ($batas_jam_normal * $upah_normal) + ($jam_lembur * $upah_lembur);
        }

        // Format rupiah
        $hasil = "Total upah yang diterima: <b>Rp. " . number_format($total_upah, 0, ',', '.') . ",-</b>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hitung Upah Karyawan</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .card { width: 350px; padding: 15px; border: 1px solid #ccc; border-radius: 8px; }
    input[type=number] { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 10px; padding: 8px 12px; }
    .result { margin-top: 15px; font-size: 16px; }
</style>
</head>
<body>

<div class="card">
    <h3>Hitung Upah Karyawan Honorer</h3>

    <form method="POST" action="">
        <label>Masukkan jumlah jam kerja per minggu:</label>
        <input type="number" name="jam" min="0" value="<?php echo htmlspecialchars($jam_input); ?>" required>
        <button type="submit">Hitung</button>
    </form>

    <div class="result"><?php echo $hasil; ?></div>
</div>

</body>
</html>
