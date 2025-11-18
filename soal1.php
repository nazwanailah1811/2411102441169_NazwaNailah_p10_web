<?php
$result = '';
$input = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = isset($_POST['year']) ? trim($_POST['year']) : '';

    if ($input === '') {
        $result = 'Silakan masukkan sebuah tahun.';
    } elseif (!ctype_digit($input)) {
        $result = 'Masukkan tidak valid — gunakan angka positif (contoh: 2024).';
    } else {
        $year = (int)$input;

        if ($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0)) {
            $result = "Tahun {$year} adalah TAHUN KABISAT.";
        } else {
            $result = "Tahun {$year} BUKAN tahun kabisat.";
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Pengecek Tahun Kabisat</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; padding: 24px; }
    .card { max-width:420px; margin:0 auto; padding:18px; border:1px solid #ddd; border-radius:8px; box-shadow: 0 2px 6px rgba(0,0,0,0.04); }
    input[type="number"]{ width:100%; padding:8px; font-size:16px; margin-top:8px; box-sizing:border-box; }
    button { margin-top:10px; padding:8px 12px; font-size:16px; }
    .result { margin-top:14px; font-weight:700; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Pengecek Tahun Kabisat</h2>
    <form method="post" action="">
      <label>Masukkan tahun:</label>
      <input type="number" name="year" value="<?php echo htmlspecialchars($input); ?>" placeholder="contoh: 2024" min="0" />
      <button type="submit">Cek</button>
    </form>

    <?php if ($result !== ''): ?>
      <p class="result"><?php echo htmlspecialchars($result); ?></p>
    <?php endif; ?>

    <p style="font-size:13px;color:#555;margin-top:12px">
      Aturan: tahun kabisat jika kelipatan 4, kecuali tahun kelipatan 100 (bukan kabisat), kecuali jika juga kelipatan 400 (kabisat).
    </p>
  </div>
</body>
</html>
