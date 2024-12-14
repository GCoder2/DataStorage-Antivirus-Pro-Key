Mehrhaba Kullanıcılar. Bu Şu Program İçin Bir Key Sistemi Eklentisidir : github.com/GCoder2/DataStorage-AntiVirus/blob/main/README.md
NOT : Bu Dosyalar XAMPP İçin Hazırlanmıştır. Eğer XAMPP Nasıl Kurulur Bilmiyorsanız Youtube'dan Bir Video İzlemeniz Önerilir.
Eğer Sisteminizde XAMPP Kurulu Ve Nasıl Kullanacağınızı Biliyorsanız Sunucuyu Başlatıp SQL Kısmından Şu Kodu Giriniz : 


CREATE DATABASE pro_keys;

USE pro_keys;

CREATE TABLE pro_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    key_value VARCHAR(50) NOT NULL UNIQUE,
    expiration_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
