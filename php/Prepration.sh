cd /var/www/html/snappmarket
mv .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
