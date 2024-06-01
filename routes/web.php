<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/ideas',[IdeaController::class,'index'])->name('idea.index');//Cuando entres a la ruta ideas, te manda al controlador IdeaController y ejecuta su funcion index, esa funcion ejecuta la view ideas.index

Route::get('/ideas/crear',[IdeaController::class,'create'])->name('idea.create');//Te lleva a la vista para escribir la informacion
Route::post('/ideas/crear',[IdeaController::class,'store'])->name('idea.store');//store es para asubir la informacion a la bd. Se crea la funcion en IdeaController

Route::get('/ideas/editar/{idea}',[IdeaController::class,'edit'])->name('idea.edit');//edit es para mostrar la vista para luego editar. Se crea la funcion en IdeaController//Esta es la ruta que te lleva a la vista de editar
Route::put('/ideas/actualizar/{idea}',[IdeaController::class,'update'])->name('idea.update');//Esta es para editar la informacion en la bd con los datos asignados en la vista idea.edit. el /ideas/actualizar/{idea} no se va a ver en la url porque pasa por detras

Route::get('/ideas/{idea}',[IdeaController::class,'show'])->name('idea.show');//Muestra la vista de la idea especifica

Route::delete('/ideas/{idea}',[IdeaController::class,'delete'])->name('idea.delete');//manda el DELETE


Route::put('/ideas/{idea}',[IdeaController::class,'synchronizeLikes'])->name('idea.synchronizeLikes');//Aumenta el like de una idea

