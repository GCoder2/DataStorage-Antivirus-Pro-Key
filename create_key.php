<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";
$username = "root";
$password = "";
$dbname = "premium_system";

try {
    // PDO ile veritabanına bağlanma
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Rastgele key oluştur
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $key = substr(str_shuffle($characters), 0, 12);

    // Key için bir bitiş tarihi belirle (örneğin, 30 gün sonrası)
    $expiration_date = date('Y-m-d H:i:s', strtotime('+30 days'));

    // Key'i veritabanına ekle
    $stmt = $conn->prepare("INSERT INTO pro_keys (key_value, expiration_date) VALUES (:key, :expiration_date)");
    $stmt->bindParam(':key', $key);
    $stmt->bindParam(':expiration_date', $expiration_date);
    $stmt->execute();

    // JSON yanıtı döndür
    echo json_encode([
        "success" => true,
        "key" => $key,
        "expires_in" => $expiration_date
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
