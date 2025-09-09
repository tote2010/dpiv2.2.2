<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\PrecioController;
use App\Http\Controllers\Admin\ValorDolarController;
use App\Models\ValorDolar;

Route::get('/', function () {
    //return view('welcome');
    //return view('auth.login');
    return view('site');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    //Route::resource('admin', HomeController::class)->name('admin');
    //Route::get('admin', ['Admin/' . HomeController::class, 'index']);

    Route::prefix('admin')->group(function () {
        //Route::resource('admin', HomeController::class);
        //Route::resource('usuarios', App\Http\Controllers\Admin\UsuarioController::class); //->withoutMiddleware([EnsureTokenIsValid::class]);
        //Route::resource('roles', RoleController::class);
        //Route::resource('menus', MenuController::class);

        //Rutas de usuarios
        Route::prefix('usuarios')->group(function () {
            Route::get('/', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
            Route::get('/crear', [UsuarioController::class, 'create'])->name('admin.usuarios.create');
            Route::post('/', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
            Route::get('/{user}/editar', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit');
            Route::put('/{user}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
            Route::post('/{user}/toggle-active', [UsuarioController::class, 'toggleActive'])->name('admin.usuarios.toggle-active');
        });

        // Rutas de clientes
        Route::prefix('clientes')->group(function () {
            Route::get('/', [ClienteController::class, 'index'])->name('admin.clientes.index');
            Route::get('/crear', [ClienteController::class, 'create'])->name('admin.clientes.create');
            Route::post('/', [ClienteController::class, 'store'])->name('admin.clientes.store');
            Route::get('/{cliente}/editar', [ClienteController::class, 'edit'])->name('admin.clientes.edit');
            Route::put('/{cliente}', [ClienteController::class, 'update'])->name('admin.clientes.update');
            Route::post('/{cliente}/toggle-active', [ClienteController::class, 'toggleActive'])->name('admin.clientes.toggle-active');
        });

        // Rutas de Categorías
        Route::prefix('categorias')->group(function () {
            Route::get('/', [CategoriaController::class, 'index'])->name('admin.categorias.index');
            Route::get('/crear', [CategoriaController::class, 'create'])->name('admin.categorias.create');
            Route::post('/', [CategoriaController::class, 'store'])->name('admin.categorias.store');
            Route::get('/{categoria}/editar', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
            Route::put('/{categoria}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
            Route::post('/{categoria}/toggle-active', [CategoriaController::class, 'toggleActive'])->name('admin.categorias.toggle-active');
        });

        // Rutas de Productos
        Route::prefix('productos')->group(function () {
            Route::get('/', [ProductoController::class, 'index'])->name('admin.productos.index');
            Route::get('/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
            Route::post('/', [ProductoController::class, 'store'])->name('admin.productos.store');
            Route::get('/{producto}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
            Route::put('/{producto}', [ProductoController::class, 'update'])->name('admin.productos.update');
            Route::post('/{producto}/toggle-active', [ProductoController::class, 'toggleActive'])->name('admin.productos.toggle-active');
        });

        // Rutas de Precios
        Route::prefix('precios')->group(function () {
            Route::get('/', [PrecioController::class, 'index'])->name('admin.precios.index');
            Route::get('/crear', [PrecioController::class, 'create'])->name('admin.precios.create');
            Route::post('/', [PrecioController::class, 'store'])->name('admin.precios.store');
            Route::get('/{precio}/editar', [PrecioController::class, 'edit'])->name('admin.precios.edit');
            Route::put('/{precio}', [PrecioController::class, 'update'])->name('admin.precios.update');
            Route::post('/{precio}/toggle-active', [PrecioController::class, 'toggleActive'])->name('admin.precios.toggle-active');
            Route::put('/', [PrecioController::class, 'storeDollarValue'])->name('admin.precios.storeDollarValue');

        });
        
        Route::prefix('valorDolar')->group(function() {
            Route::get('/', [ValorDolarController::class, 'index'])->name('admin.valorDolar.index');
            Route::post('/', [ValorDolarController::class, 'store'])->name('admin.valorDolar.store');
        });
        //Route::post('/storeDollarValue', [ValorDolar::class, 'storeDollarValue']); //->name('admin.valor-dolar.storeDollarValue');
        //Valor del Dolar
        // Route::post('/valorDolar', [ValorDolar::class, 'store'])->name('admin.valor_dolar');
        //Route::resource('dollar-rates', DollarRateController::class)->only(['index', 'store']);
    });
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth']);

// //Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');
// Route::get('/admin/usuarios', function () {
//     return view('admin.usuarios.index');
// })->middleware(['auth']);
// Route::get('/admin/usuarios', function () {
//     return view('admin.usuarios.create');
// })->middleware(['auth']);
// Route::get('/admin/usuarios', function () {
//     return view('admin.usuarios.store');
// })->middleware(['auth']);