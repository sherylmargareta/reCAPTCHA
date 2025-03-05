<?php
session_start();

// Konfigurasi rate limiting
$rateLimit = 10; // Jumlah maksimal permintaan
$timeFrame = 300; // Waktu dalam detik (5 menit)
$ipAddress = $_SERVER['REMOTE_ADDR'];
$rateLimitFile = 'rate_limit_' . md5($ipAddress) . '.txt';

function getGeolocation($ip, $token) {
    $url = "https://ipinfo.io/103.243.177.50?token=bd6dfdb0789e72";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_hash";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

// Memeriksa apakah file rate limit ada
if (file_exists($rateLimitFile)) {
    $data = json_decode(file_get_contents($rateLimitFile), true);
    $requests = $data['requests'];
    $firstRequestTime = $data['firstRequestTime'];
} else {
    $requests = 0;
    $firstRequestTime = time();
}

// Memeriksa apakah permintaan berada di dalam batas
if (time() - $firstRequestTime < $timeFrame) {
    if ($requests >= $rateLimit) {
        header('HTTP/1.1 429 Too Many Requests');
        echo 'You have exceeded the number of allowed login attempts. Please try again later.';
        exit();
    }
} else {
    // Reset rate limit setelah time frame berlalu
    $requests = 0;
    $firstRequestTime = time();
}

// Fungsi untuk memeriksa login
function loginUser($username, $password, $conn) {
    $sql = "SELECT id, password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            return true;
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['g-recaptcha-response'];
    $ip = '103.243.177.50';
    $token = 'bd6dfdb0789e72'; //ipinfo token

    // Meningkatkan jumlah permintaan
    $requests++;
    $data = [
        'requests' => $requests,
        'firstRequestTime' => $firstRequestTime,
    ];
    file_put_contents($rateLimitFile, json_encode($data));
                
    // Verify the recaptcha response
    $secretKey = "6Le6NOopAAAAAGaO53TopIarLQTNL1vtmfg6GQ_V";
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        $location = getGeolocation($ip, $token);
        
        if ($location) {
            echo 'IP: ' . $location['ip'] . "<br>";
            echo 'Country: ' . $location['country'] . "<br>";
            echo 'Region: ' . $location['region'] . "<br>";
            echo 'City: ' . $location['city'] . "<br>";
            echo 'Latitude, Longitude: ' . $location['loc'] . "<br>";
            
            if ($location['region'] == 'Central Java') {
                
                
                // Memeriksa login
                if (loginUser($username, $password, $conn)) {
                    echo 'Login successful!';
                    $_SESSION['username'] = $username;
                } else {
                    echo 'Invalid username or password';
                }
            } else {
                echo "Invalid username or password";
            }
        }
    } else {
        $message = 'Captcha verification failed. Please try again.';
        echo $message;
    }
}

$conn->close();
?>
