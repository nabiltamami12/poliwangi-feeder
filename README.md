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

### Migrasi data program_studi mahasiswa lama
```sh
$php artisan code3:migrasi
```

### Permision server
sudo chown -R $USER:www-data storage
or
sudo chown -R www-data:www-data storage

### Require
Enable extension php pada file /etc/php/php.ini
1. ext-iconv
2. ext-gd

### sync folder public
rsync -a --exclude 'index.php' ../folder_laravel/public/* ../folder_html/;

### php pull
```php
<?php
$output_including_status = shell_exec("cd /home/patch_project; git pull 2>&1; echo $?");
echo '<pre>';
echo $output_including_status;
echo '</pre>';
echo '</hr>';
echo '</hr>';
echo '<pre>';
$git_status = shell_exec("cd /home/patch_project; git status; echo $?");
echo $git_status;
echo '</pre>';
?>
```