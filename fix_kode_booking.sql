-- FIX LENGKAP: Semua masalah database booking
-- Jalankan query ini di phpMyAdmin atau MySQL

USE rental_eria;

-- 1. Ubah ukuran kode_booking dari varchar(8) menjadi varchar(20)
ALTER TABLE `booking` MODIFY `kode_booking` varchar(20) NOT NULL;
ALTER TABLE `cek_booking` MODIFY `kode_booking` varchar(20) NOT NULL;

-- 2. Set default value untuk bukti_bayar (fix: doesn't have a default value)
ALTER TABLE `booking` MODIFY `bukti_bayar` varchar(100) DEFAULT '';

-- 3. Cek hasil
DESCRIBE booking;
DESCRIBE cek_booking;

SELECT 'Database Fixed!' as Status;
