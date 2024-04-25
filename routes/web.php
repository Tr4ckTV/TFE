<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RapportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/membres', [UserController::class, 'membres'])->name('users.membres');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/nouveautes', [HomeController::class, 'nouveautes'])->name('nouveautes');
Route::get('/promotions', [HomeController::class, 'promotions'])->name('promotions');
Route::get('/produits', [HomeController::class, 'produits'])->name('produits');
Route::get('/products', [ProductController::class, 'indexForCustomers'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/avis', [HomeController::class, 'avis'])->name('avis');
Route::get('/avis/create', [AvisController::class, 'create'])->name('avis.create')->middleware('auth');
Route::post('/avis', [AvisController::class, 'store'])->name('avis.store');

Route::get('/profil', [HomeController::class, 'profil'])->name('profil')->middleware('auth');

Route::get('/panier', [HomeController::class, 'panier'])->name('panier')->middleware('auth');
Route::get('/recherche', [HomeController::class, 'recherche'])->name('recherche');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/admin/commandes', [AdminDashboardController::class, 'commandeIndex'])->name('admin.commandes');
    Route::post('/admin/commandes/{commande}/validate', [CommandeController::class, 'approve'])->name('commandes.validate');
    Route::post('/admin/commandes/{commande}/reject', [CommandeController::class, 'refuse'])->name('commandes.reject');
});

Route::post('/panier/{productId}/add', [PanierController::class, 'addProductToPanier'])->name('panier.add')->middleware('auth');
Route::put('/panier/{id}', [PanierController::class, 'update'])->name('panier.update')->middleware('auth');
Route::delete('/panier/{id}', [PanierController::class, 'remove'])->name('panier.remove')->middleware('auth');

Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes')->middleware('auth');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store')->middleware('auth');
Route::get('/commandes/{commande}', [CommandeController::class, 'show'])->name('commandes.show')->middleware('auth');

Route::get('/mentions', function () {
    return view('infos.mentions');
})->name('mentions');
