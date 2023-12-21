<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

## About 
<p align="center">
<p>To run the project please use ./vendor/bin/sail up</p>
<p>After that you must go into container laravel.test with command docker compose exec laravel.test bash</p>
<p>Run the command for migration php artisan migrate</p>
<p>Run the import of the csv files with php artisan import:csv</p>
<p>The csv are stored in the folder storage/app/, and the files must be named as the tables [apointments.csv, patients.csv, users.csv]</p>
<p>The route for the report is http://localhost/reports</p>
</p>