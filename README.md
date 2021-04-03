*** Commet Multipurpose website Development ***
Working flow
-------------------
## laravel Instalation:
 using below command:
 composer create-project --prefer-dist laravel/laravel commet

 --- set up is complete ----

 ## .env file setup
 provide app name, database name , APP_URL=http://localhost:8000
  
## config->app.php
  provide 
  name' => env('APP_NAME', 'Commet'),
  'url' => env('APP_URL', 'http://localhost:8000'),
  'timezone' => 'Asia/Dhaka',

  ## create a mysql database
  provide database name "commet"

  ## then laravel Default Authentication system setup
  composer require laravel/ui
  php artisan ui vue --auth
  npm install
  npm run dev

  //if any error found -
  Execute:
   npm cache clean --force 
   npm install
   npm install laravel-mix@latest --save-dev


 