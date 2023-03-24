<?php

use App\Models\Commande;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/{id}', function ($id) {

//     // $Users= User::find($id);
//     // foreach ($Users->Produit as $User  ) {
//     //     echo $User.'<br>';
//     // }
//     $Users = DB::table('commandes')
//     ->join('produits', 'produits.id', '=', 'commandes.produit_id')
//     // ->join('followers', 'followers.user_id', '=', 'users.id')
//     ->where('commandes.user_id', '=', (Auth::user()->id))
//     ->get();
//     echo $Users.'<br>';

// });

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/ajouter', [HomeController::class,'ajouter']);

Route::post('/ajouterproduit', [HomeController::class,'ajouterProduit'])->name('ajouterProduit');

Route::get('/edit/{id}', [HomeController::class,'edit'])->name('edit');


Route::get('/destroy/{id}', [HomeController::class,'destroy'])->name('destroy');


