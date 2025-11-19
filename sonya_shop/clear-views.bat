@echo off
echo Clearing views cache...
rmdir /s /q storage\framework\views
mkdir storage\framework\views
php artisan view:clear
php artisan cache:clear
echo Done! Views cache cleared.
pause