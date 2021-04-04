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


   ## vonage/nexcom

   ## Mail and Motification
   php artisan make:mail AccountConfirmationMail
   php artisan make:notification AccountConfirmationNotification

## Mail server configaration
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=service.hash21@gmail.com
MAIL_PASSWORD=serVice@has21
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=service.hash21@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

## Mailtrap
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=e5e35313bb715a
MAIL_PASSWORD=b814f038270f7c
MAIL_ENCRYPTION=tls

## php artisan config:cache


## login with Email and phonenumber
public function username()
    {
        $input_type = request()->input('input_field');

        if(filter_var($input_type,FILTER_VALIDATE_EMAIL)){
            $type='email';
        }
        else{
            $type='phone_number';
        }

        request()->merge([$type =>$input_type]);
        return $type;
    }

 