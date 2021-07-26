# INSTALLATION:
1. locate this package in htdocs directory
2. type 'composer install'
3. edit file .env
   DB_DATABASE=mofoods-backend
   DB_USERNAME=mofoods-backend
   DB_PASSWORD=m0f00d5
4. jump into phpmyadmin, then add user account
5. type 'php artisan migrate'. make sure that you are in correct path of current project
6. type 'php artisan db:seed'

# GET MENU SERVICE
route directly into link "/menu"

# GET DETAIL MENU SERVICE
route directly into link "/menu?id=69"

# GET SNAP TOKEN:
1. use POST method with route "/api/order"
2. "meja_id" and "harga" are required