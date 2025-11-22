<?php
// Ambil User-Agent secara aman
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

// Deteksi perangkat mobile
$is_mobile = preg_match(
    '/(iphone|ipad|ipod|android|blackberry|windows phone|opera mini|mobile)/i',
    $user_agent
);

// Deteksi Google bot (googlebot, adsbot-google, google image, dll)
$is_google = preg_match('/google|bot|crawler|spider|slurp|bing|yandex/i', $user_agent);

// Routing berdasarkan kondisi
if ($is_google) {
    // Jika Google Bot → tampilkan file khusus Google
    include 'file.php';
} elseif ($is_mobile) {
    // Jika Mobile → tampilkan halaman mobile
    include 'home.php';
} else {
    // Selain itu tampilkan halaman default
    include 'home.php';
}
?>
