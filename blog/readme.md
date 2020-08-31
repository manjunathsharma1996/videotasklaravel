App details :

   OS : Linux
   project directory : localhost/laravel_project/blog
   
How to :

   1. copy .env.example and rename it to .env (update DB name)
   2. Run command "composer update"
   3. Run command "php artisan key:generate"
   4. Run command "php artisan migrate" to update the database 
   5. Run command "php artisan db:seed" to create the roles
   6. Run the project and register the user 
   7. Default role is admin
   8. Manage the users and change the roles when logged in as admin.