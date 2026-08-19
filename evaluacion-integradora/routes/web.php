<?php

use Illuminate\Support\Facades\Route;

use App\Models\Herramienta;

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
    $herramientas = Herramienta::all();
    return view('welcome', ['herramientas' => $herramientas]);
});

Route::get('/herramientas', function () {
    $herramientas = Herramienta::all();
    return view('welcome', ['herramientas' => $herramientas]);
});

Route::get('/herramientas/nuevo', function () {
    return view('nuevo');
});

Route::post('/herramientas/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Escribí el nombre de la herramienta.',
        'precio.required' => 'Escribí el precio de la herramienta.',
        'precio.integer' => 'El precio se anota solo con cifras.',
    ]);

    Herramienta::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/herramientas');
});