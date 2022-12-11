<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Library Management System for SK Pengkalan Ara

Features:

- Book barcode generator/Scan book barcode/Print barcode for each book
- Generate Student's Card/print card
- Generate a report/print report of loan books
- Automatic update the student's year (cron job)
- Advanced search filtering (php carbon/date related)
- Export history column in database to excel/download (maatwebsite/excel)

## Quick start

1. clone the repo <br>
git clone https://github.com/zxn1/library-management-system <br>

2. change current directory <br>
cd library-management-system <br>

3. install dependencies <br>
composer install <br>

4. create .env file <br> 
cp (unix) or copy (Windows) .env.example .env <br>

5. generate env key <br> 
php artisan key:generate <br>
 
6. run command for init settings <br>
php artisan automateStudentYear <br>

7. start server <br>
php artisan serve <br>

## Login details
Account 1 - Full Access <br>
email : cikgu@gmail.com <br>
pass  : admin <br>
<br>
Account 2 (Pengawas) <br>
email : pengawas@gmail.com <br>
pass  : admin <br>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
