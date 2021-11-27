#! /bin/sh
#! /bin/sh
# echo "start pull git"
# git pull
# echo "---------done------------"

echo "start config:cache"
php artisan config:cache
echo "---------done------------"

echo "start route:cache"
php artisan route:cache
echo "---------done------------"

echo "start view:cache"
php artisan view:cache
echo "---------done------------"