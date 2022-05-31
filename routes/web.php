<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/movies', function () {
    return view('movie');
});


Route::post('/movies', function (Request $request) {
    $search = $request->input('movie');
    $movies = Http::get('http://www.omdbapi.com/?apikey=45843c2&s='.$search);
    $movies = json_decode($movies);
    return view('movie', compact('movies'));
});

Route::get('/store/{imdbid}', fuction ($imdbid){

$favies = Favies::create([
    'imdbid' => $imdbid,
    'user_id' => auth()->user()->id
]);
return redirect('movies');

})->middleware(['auth']);


require __DIR__.'/auth.php';