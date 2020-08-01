cd /var/www/html/snappmarket
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
