<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/inicio');

Route::get('/inicio', function () {
    $destacados = Producto::where('destacado', true)->with('categoria')->get();
    $productos = Producto::with('categoria')->get();
    $categorias = Categoria::where('activa', true)->get();
    return view('welcome', [
        'destacados' => $destacados,
        'productos' => $productos,
        'categorias' => $categorias
    ]);
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credenciales = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    if (Auth::attempt($credenciales)) {
        $request->session()->regenerate();
        return redirect('/admin/productos')->with('exito', 'Bienvenido de vuelta, Denil.');
    }

    return back()->with('error', 'Correo o contraseña incorrectos.');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('exito', 'Has cerrado sesión correctamente.');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/productos', function () {
        $productos = Producto::with('categoria')->orderBy('id', 'desc')->get();
        return view('productos', ['productos' => $productos]);
    });

    Route::get('/admin/productos/nuevo', function () {
        $categorias = Categoria::where('activa', true)->orderBy('nombre')->get();
        return view('producto-nuevo', ['categorias' => $categorias]);
    });

    Route::post('/admin/productos/nuevo', function (Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'precio' => 'required|integer|min:1',
            'descripcion' => 'nullable|string|max:500',
            'destacado' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.integer' => 'El precio debe ser un número entero.',
            'precio.min' => 'El precio debe ser al menos 1 Bs.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ]);

        Producto::create([
            'nombre' => $request->input('nombre'),
            'categoria_id' => $request->input('categoria_id'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'destacado' => $request->has('destacado'),
        ]);

        return redirect('/admin/productos')->with('exito', 'Producto creado correctamente.');
    });

    Route::get('/admin/productos/editar/{id}', function ($id) {
        $producto = Producto::with('categoria')->findOrFail($id);
        $categorias = Categoria::where('activa', true)->orderBy('nombre')->get();
        return view('producto-editar', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    });

    Route::put('/admin/productos/editar/{id}', function (Request $request, $id) {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'precio' => 'required|integer|min:1',
            'descripcion' => 'nullable|string|max:500',
            'destacado' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.integer' => 'El precio debe ser un número entero.',
            'precio.min' => 'El precio debe ser al menos 1 Bs.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ]);

        $producto->update([
            'nombre' => $request->input('nombre'),
            'categoria_id' => $request->input('categoria_id'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'destacado' => $request->has('destacado'),
        ]);

        return redirect('/admin/productos')->with('exito', 'Producto actualizado correctamente.');
    });

    Route::delete('/admin/productos/eliminar/{id}', function ($id) {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect('/admin/productos')->with('exito', 'Producto eliminado correctamente.');
    });

    Route::get('/admin/categorias', function () {
        $categorias = Categoria::with('productos')->orderBy('nombre')->get();
        return view('categorias', ['categorias' => $categorias]);
    });

    Route::get('/admin/categorias/nuevo', function () {
        return view('categoria-nuevo');
    });

    Route::post('/admin/categorias/nuevo', function (Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:255',
            'activa' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
        ]);

        Categoria::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activa' => $request->has('activa'),
        ]);

        return redirect('/admin/categorias')->with('exito', 'Categoría creada correctamente.');
    });

    Route::get('/admin/categorias/editar/{id}', function ($id) {
        $categoria = Categoria::findOrFail($id);
        return view('categoria-editar', ['categoria' => $categoria]);
    });

    Route::put('/admin/categorias/editar/{id}', function (Request $request, $id) {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre,' . $id,
            'descripcion' => 'nullable|string|max:255',
            'activa' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
        ]);

        $categoria->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'activa' => $request->has('activa'),
        ]);

        return redirect('/admin/categorias')->with('exito', 'Categoría actualizada correctamente.');
    });

    Route::delete('/admin/categorias/eliminar/{id}', function ($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/admin/categorias')->with('exito', 'Categoría eliminada correctamente.');
    });
});