php version used = 8.1.12
laravel version = 10.0

commands to be initiated for proper running of the project
a)composer install
b)npm install
c)npm run dev

set up a database in mysql and name as mentiond in the .env file 
DB_DATABASE=referral
DB_USERNAME=root
DB_PASSWORD=

after the above step run the command:  php artisan migrate
then the command: php artisan db:seed 
which will create a default admin login with credentials as follows
email: admin@gmail.com
password: admin@gmail.com

