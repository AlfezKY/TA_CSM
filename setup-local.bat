@echo off
REM Jalankan di folder proyek (double-click atau: setup-local.bat)
echo [1/3] Memeriksa ekstensi PHP zip...
php -m | findstr /i zip >nul
if errorlevel 1 (
    echo PERINGATAN: Ekstensi PHP zip tidak aktif.
    echo Buka php.ini (mis. C:\laragon\bin\php\php8.2\php.ini^)
    echo lalu hapus titik koma di depan: extension=zip
    echo.
    pause
    exit /b 1
)

echo [2/3] Composer install...
call composer install
if errorlevel 1 (
    echo Composer install gagal.
    pause
    exit /b 1
)

echo [3/3] Menjalankan migrasi...
php artisan migrate --force
if errorlevel 1 (
    echo Migrasi gagal. Cek .env dan database.
    pause
    exit /b 1
)

echo.
echo Selesai. Jalankan: php artisan serve
echo Lalu buka: http://127.0.0.1:8000/tagihan
pause
