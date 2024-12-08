
# Laravel Led Control

Laravel LED Control menggunakan 3 buah LED di esp8266 

## Instalasi dan Pengaturan

Ikuti langkah-langkah berikut untuk mengatur proyek ini:

### 1. Instalasi Dependensi
Jalankan perintah berikut untuk menginstal semua dependensi PHP yang diperlukan:
```bash
composer install
```

### 2. Konfigurasi `.env`
- Salin file `.env.example` dan ubah namanya menjadi `.env`:
```bash
cp .env.example .env
```
- Jalankan perintah untuk menghasilkan aplikasi key:
```bash
php artisan key:generate
```

### 3. Pengaturan Arduino dan NodeMCU
- Buka folder `arduino-nodemcu`.
- Di dalam folder tersebut, terdapat file untuk digunakan pada Arduino Uno.
- Upload script ke NodeMCU menggunakan Arduino IDE.
- Setelah berhasil, NodeMCU akan menghasilkan sebuah IP address.

### 4. Konfigurasi IP NodeMCU
- Salin IP address dari NodeMCU.
- Buka file `led.blade.php` dan ganti placeholder IP dengan IP NodeMCU Anda.
- Lakukan hal yang sama di `LedController`.

### 5. Menjalankan Proyek
- Jalankan server Laravel:
```bash
php artisan serve --host={ipmu} --port=8080
```
- Akses proyek melalui browser menggunakan alamat yang ditampilkan.

## Catatan Penting
- Pastikan NodeMCU dan Arduino Uno terhubung dengan baik.
- Jika terdapat kendala, pastikan library Arduino telah terinstal dengan benar.

## Teknologi yang Digunakan
- Laravel
- NodeMCU Esp8266
