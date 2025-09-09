# 2024/09/17

laravel new dpi_v2 --jet
npm install && npm run dev

USUARIOS - ROLES - PERMISOS

# Creación de sistema de Roles y Permisos
# Instalación de Spatie Laravel
# https://spatie.be/docs/laravel-permission/v6/introduction
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
	 	# or
php artisan config:clear


-> database/DatabaseSeeder.php
# Uncoment & add "user test@test.com"
# Create RoleSeeder.php & PermissionSeeder.php
php artisan migrate:fresh --seed

# Modified & added code to 
    1 TeamSeeder => //TODO Ver esto... (line 63)
    2 UserFactory
    3 2020_05_21_200000_create_team_user_table

# Install AdmiLTE
# Config:

# Crear archivo admin.php en /routes - simil web.php
# Configurar-Agregar código-Asignar admin.php en  RouteServerProvider.php (app/providers/RouteServiceProvider.php)

<!-- Route::middleware(['web', 'auth'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });

        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
            'show' => 'detalles',
        ]); -->




# 2024/09/20

# Creación de la carpeta/módulo "Admin" y del controlador Home
php artisan make:controller Admin/HomeController

# Creación de carpeta admin y archivo index para la vista (resources/views)

# Instalación de AdminLTE
term$ composer require jeroennoten/laravel-adminlte
term$ php artisan adminlte:install

# Creación de carpeta admin y archivo index para la vista (resources/views)

# Instalación de AdminLTE
term$ composer require jeroennoten/laravel-adminlte
term$ php artisan adminlte:install

