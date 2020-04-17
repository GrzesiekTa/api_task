1) clone repository.
2) run command: composer install
3) create an env file based on .env.example and set up a database connection
4) generate aplication key: php artisan key:generate
5) run command: php artisan migrate --seed
6) run command: npm install
7) run command: npm run prod

If you run the project locally create a virtual host.
To get data from api, run the command: php artisan get-persons:data 50 
