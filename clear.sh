#! /bin/sh
#! /bin/sh
# echo "start pull git"
# git pull
# echo "---------done------------"

echo "start config:clear"
php artisan config:clear
echo "---------done------------"

echo "start route:clear"
php artisan route:clear
echo "---------done------------"

echo "start view:clear"
php artisan view:clear
echo "---------done------------"