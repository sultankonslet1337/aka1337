<?php
$url = "https://landing-page.tirtakahuripan.co.id/";

$context = stream_context_create([
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
    ],
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ]
]);

$content = file_get_contents($url, false, $context);

if ($content === FALSE) {
    echo "Gagal mengambil konten dari $url";
} else {
    echo $content;
}
?>
