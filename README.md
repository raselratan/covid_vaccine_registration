# covid_vaccine_registration

#PHP version __8.2 or higher__

#NODEJS version __20 or higher__

#Step:1 clone the repo from 
__git clone https://github.com/raselratan/covid_vaccine_registration.git__

#Step:2 Then install composer
__composer install__

#Step:3 Run the command
__composer du__

#Step:4 __Create and Setup Your .env file with database and smtp mail configs and also set the QUEUE_CONNECTION as database__

#Step:5 Run the command
__php artisan migrate:fresh --seed__

#Step:6 Run the command
__php artisan serve__

#Step:7 Run the command
__npm install__

#Step:8 Run the command
__npm run dev__

#Step:9 Keep in mind
__npm run dev and php artisan serve__ commands must run simultaneously.

#Step:10 For scheduling and job queue run
__php artisan queue:work --queue=high,default and php artisan schedule:work__ commands must run simultaneously.


#NOTE: __It can be optimized by using redis queue rather than database__
