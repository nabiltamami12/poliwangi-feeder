# Siakad Kampus Poliwangi
## Development Process (Laravel 8)
1. git clone
2. composer install
3. php artisan migrate
4. php artisan serve

## Production Process (Laravel 8)
1. setup path web root to folder /public 
2. git clone
3. install dependence
```sh
$composer install --no-dev
```
4. setup database dan file .env
5. generate key for .env
```sh
$php artisan key:generate
```
6. migrasi database
```sh
$php artisan migrate
```

### Permision server
sudo chown -R $USER:www-data storage
or
sudo chown -R www-data:www-data storage

### Require
Enable extension php pada file /etc/php/php.ini
1. ext-iconv
2. ext-gd