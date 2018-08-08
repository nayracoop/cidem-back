php artisan make:migration create_services_table --create=services

php artisan make:seeder ServicesTableSeeder

php artisan make:factory ServicesFactory

php artisan make:model Service

cambiar  'faker_locale' => 'es_AR'

php artisan migrate

**limpar - correr de nuevo las migrations y plantar semillas**
php artisan migrate:refresh --seed

**controladores y rutas**
php artisan make:controller ServiceController --resource
routes/api.php

**crear resources**
php artisan make:resource Service

**limpiar data en *Http/Resources/Service* **
