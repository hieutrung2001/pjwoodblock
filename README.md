## Command list

[git@github.com:hieutrung2001/pjwoodblock.git](git@github.com:hieutrung2001/pjwoodblock.git)

cd pjwoodblock

composer install

cp .env.example .env

php artisan key:generate
### Đặt đúng thông tin kết nối cơ sở dữ liệu trước khi chạy các lệnh dưới đây
php artisan migrate

php artisan db:seed

php artisan serve
