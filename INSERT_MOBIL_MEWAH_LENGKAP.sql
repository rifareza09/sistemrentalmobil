-- ============================================
-- 🚗 SQL SCRIPT LENGKAP TAMBAH MOBIL MEWAH
-- Porsche, Lamborghini, McLaren, BMW, Nissan
-- ============================================
-- Database: rental_eria
-- Tanggal: 29 Desember 2025
-- ============================================

USE rental_eria;

-- ============================================
-- STEP 1: TAMBAH MEREK MOBIL (5 Merek Baru)
-- ============================================

INSERT INTO `merek` (`id_merek`, `nama_merek`, `CreationDate`) VALUES
(NULL, 'Porsche', NOW()),
(NULL, 'Lamborghini', NOW()),
(NULL, 'McLaren', NOW()),
(NULL, 'BMW', NOW()),
(NULL, 'Nissan', NOW());

-- ============================================
-- STEP 2: CEK ID MEREK YANG BARU DIBUAT
-- ============================================
-- Jalankan query ini untuk melihat ID merek yang baru:
-- SELECT * FROM merek ORDER BY id_merek DESC LIMIT 5;
-- 
-- HASIL CONTOH (sesuaikan dengan database Anda):
-- id_merek 16 = Porsche
-- id_merek 17 = Lamborghini
-- id_merek 18 = McLaren
-- id_merek 19 = BMW
-- id_merek 20 = Nissan
-- ============================================

-- ============================================
-- STEP 3: TAMBAH DATA MOBIL MEWAH (8 Mobil)
-- ============================================
-- ⚠️ PENTING: Ganti angka 16,17,18,19,20 dengan ID merek yang sesuai dari database Anda!
-- ============================================

-- 1️⃣ PORSCHE 911 CARRERA
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Porsche 911 Carrera', 16, 'B 911 POR', 
    'Mobil sport legendaris dengan mesin boxer 6-silinder twin-turbo 3.0L menghasilkan 379 HP. Akselerasi 0-100 km/h dalam 4.0 detik dengan top speed 293 km/h. Dilengkapi teknologi Porsche Active Suspension Management dan Sport Chrono Package.', 
    5500000, 'Bensin', 2024, 4,
    'porsche-911-1.jpg', 'porsche-911-1.jpg', 'porsche-911-1.jpg', 'porsche-911-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 2️⃣ PORSCHE CAYMAN GT4 RS
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Porsche Cayman GT4 RS', 16, 'B 718 POR', 
    'Track-focused sports car dengan mesin flat-6 4.0L naturally aspirated 493 HP. Dirancang untuk performa maksimal di sirkuit dengan aerodinamika agresif. 0-100 km/h dalam 3.4 detik, top speed 315 km/h.', 
    6000000, 'Bensin', 2024, 2,
    'porsche-cayman-1.jpg', 'porsche-cayman-1.jpg', 'porsche-cayman-1.jpg', 'porsche-cayman-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 3️⃣ PORSCHE 918 SPYDER
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Porsche 918 Spyder', 16, 'B 918 POR', 
    'Hypercar hybrid plug-in dengan mesin V8 4.6L + 2 motor listrik menghasilkan total 887 HP. Salah satu mobil tercepat di dunia dengan akselerasi 0-100 km/h dalam 2.6 detik. Top speed 345 km/h. Limited production hanya 918 unit.', 
    15000000, 'Hybrid', 2023, 2,
    'porsche-918-1.jpg', 'porsche-918-1.jpg', 'porsche-918-1.jpg', 'porsche-918-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 4️⃣ LAMBORGHINI AVENTADOR SVJ ROADSTER
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Lamborghini Aventador SVJ Roadster', 17, 'B 770 LAM', 
    'V12 6.5L naturally aspirated 770 HP dengan teknologi Aerodinamika Lamborghini Attiva (ALA 2.0). Top speed 350 km/h, akselerasi 0-100 km/h dalam 2.9 detik. Mobil convertible paling ekstrem dari Lamborghini dengan performa track-ready.', 
    12000000, 'Bensin', 2024, 2,
    'lamborghini-aventador-1.jpg', 'lamborghini-aventador-1.jpg', 'lamborghini-aventador-1.jpg', 'lamborghini-aventador-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 5️⃣ LAMBORGHINI HURACAN PERFORMANTE
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Lamborghini Huracan Performante', 17, 'B 640 LAM', 
    'V10 5.2L naturally aspirated 640 HP dengan sistem ALA (Aerodinamica Lamborghini Attiva). Lightweight construction dengan extensive carbon fiber. 0-100 km/h dalam 2.9 detik, top speed 325 km/h. Pemegang rekor lap Nurburgring untuk production car.', 
    9500000, 'Bensin', 2024, 2,
    'lamborghini-huracan-1.jpg', 'lamborghini-huracan-1.jpg', 'lamborghini-huracan-1.jpg', 'lamborghini-huracan-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 6️⃣ MCLAREN SENNA
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'McLaren Senna', 18, 'B 800 MCL', 
    'Ultimate track-focused hypercar dengan mesin V8 4.0L twin-turbo 800 HP. Dinamakan untuk menghormati legenda F1 Ayrton Senna. Extreme aerodynamics dengan 800kg downforce. 0-100 km/h dalam 2.8 detik, top speed 340 km/h. Limited 500 unit.', 
    13500000, 'Bensin', 2024, 2,
    'mclaren-senna-1.jpg', 'mclaren-senna-1.jpg', 'mclaren-senna-1.jpg', 'mclaren-senna-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 7️⃣ MCLAREN 720S SPIDER
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'McLaren 720S Spider', 18, 'B 720 MCL', 
    'Convertible supercar dengan mesin V8 4.0L twin-turbo 720 HP. Retractable hardtop yang dapat terbuka dalam 11 detik. 0-100 km/h dalam 2.9 detik dengan top speed 341 km/h. Carbon fiber MonoCell II-S chassis untuk kekuatan maksimal.', 
    10000000, 'Bensin', 2024, 2,
    'mclaren-720s-1.jpg', 'mclaren-720s-2.jpg', 'mclaren-720s-1.jpg', 'mclaren-720s-2.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 8️⃣ BMW M3 COMPETITION
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'BMW M3 Competition', 19, 'B 510 BMW', 
    'High-performance sports sedan dengan mesin inline-6 twin-turbo 3.0L menghasilkan 510 HP. M xDrive all-wheel drive system untuk traksi optimal. 0-100 km/h dalam 3.8 detik, top speed 290 km/h. Perfect balance antara luxury dan performance.', 
    4500000, 'Bensin', 2024, 5,
    'bmw-m3-1.jpg', 'bmw-m3-1.jpg', 'bmw-m3-1.jpg', 'bmw-m3-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- 9️⃣ NISSAN GT-R R35 NISMO
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Nissan GT-R R35 NISMO', 20, 'B 600 GTR', 
    'Japanese supercar legend Godzilla dengan mesin VR38DETT V6 3.8L twin-turbo 600 HP. ATTESA E-TS all-wheel drive system. 0-100 km/h dalam 2.7 detik dengan top speed 330 km/h. Track-proven performance dengan harga terjangkau untuk supercar.', 
    6500000, 'Bensin', 2024, 4,
    'nissan-gtr-1.jpg', 'nissan-gtr-1.jpg', 'nissan-gtr-1.jpg', 'nissan-gtr-1.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- ============================================
-- SELESAI! 🎉
-- ============================================
-- Total yang ditambahkan:
-- ✅ 5 Merek Baru (Porsche, Lamborghini, McLaren, BMW, Nissan)
-- ✅ 9 Mobil Mewah Lengkap dengan Spesifikasi Detail
-- ============================================

-- CARA MENJALANKAN:
-- 1. Buka phpMyAdmin di browser: http://localhost/phpmyadmin
-- 2. Pilih database: rental_eria
-- 3. Klik tab "SQL"
-- 4. Copy paste SEMUA script di atas
-- 5. Klik "Go" atau "Kirim"
-- 6. Done! ✅

-- VERIFIKASI:
-- SELECT * FROM merek ORDER BY id_merek DESC;
-- SELECT * FROM mobil ORDER BY id_mobil DESC;
