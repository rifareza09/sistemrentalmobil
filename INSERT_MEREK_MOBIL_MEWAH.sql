-- ============================================
-- SQL Script untuk Menambah Merek & Mobil Mewah
-- Porsche, Ferrari, McLaren, BMW
-- ============================================

-- 1. TAMBAH MEREK (Brands)
INSERT INTO `merek` (`id_merek`, `nama_merek`, `CreationDate`) VALUES
(NULL, 'Porsche', NOW()),
(NULL, 'Ferrari', NOW()),
(NULL, 'McLaren', NOW()),
(NULL, 'BMW', NOW());

-- 2. TAMBAH DATA MOBIL MEWAH
-- Pastikan ganti id_merek sesuai dengan ID yang ter-generate setelah insert merek
-- Cek dulu dengan: SELECT * FROM merek;

-- Contoh Porsche 911
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Porsche 911 Carrera', 5, 'B 911 POR', 
    'Mobil sport legendaris dengan performa tinggi dan desain ikonis', 
    5000000, 'Bensin', 2023, 2,
    'porsche-911-1.jpg', 'porsche-911-2.jpg', 'porsche-911-3.jpg', 'porsche-911-4.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- Contoh Ferrari F8
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'Ferrari F8 Tributo', 6, 'B 488 FER', 
    'Supercar Italia dengan mesin V8 twin-turbo 720 HP', 
    8000000, 'Bensin', 2023, 2,
    'ferrari-f8-1.jpg', 'ferrari-f8-2.jpg', 'ferrari-f8-3.jpg', 'ferrari-f8-4.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- Contoh McLaren 720S
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'McLaren 720S', 7, 'B 720 MCL', 
    'Hypercar British dengan teknologi Formula 1 dan performa luar biasa', 
    7500000, 'Bensin', 2023, 2,
    'mclaren-720s-1.jpg', 'mclaren-720s-2.jpg', 'mclaren-720s-3.jpg', 'mclaren-720s-4.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- Contoh BMW M5
INSERT INTO `mobil` (
    `id_mobil`, `nama_mobil`, `id_merek`, `nopol`, `deskripsi`, `harga`, 
    `bb`, `tahun`, `seating`, 
    `image1`, `image2`, `image3`, `image4`, `image5`,
    `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, 
    `BrakeAssist`, `PowerSteering`, `DriverAirbag`, 
    `PassengerAirbag`, `PowerWindows`, `CDPlayer`, 
    `CentralLocking`, `CrashSensor`, `LeatherSeats`
) VALUES (
    NULL, 'BMW M5 Competition', 8, 'B 625 BMW', 
    'Sport sedan dengan mesin V8 twin-turbo 625 HP', 
    4500000, 'Bensin', 2023, 5,
    'bmw-m5-1.jpg', 'bmw-m5-2.jpg', 'bmw-m5-3.jpg', 'bmw-m5-4.jpg', NULL,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
);

-- CATATAN PENTING:
-- 1. Sesuaikan id_merek (angka 5,6,7,8) dengan ID yang benar dari database Anda
-- 2. Pastikan sudah download gambar mobil dan upload ke folder: admin/img/vehicleimages/
-- 3. Nama file gambar harus sama dengan yang ada di SQL ini
