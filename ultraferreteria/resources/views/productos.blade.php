@extends('layouts.base')

@section('titulo', 'Administrar Productos')

@section('contenido')
    <section>
        <div class="admin-header">
            <div>
                <h2>📦 Administrar Productos</h2>
                <p>Gestiona todos los productos de tu catálogo.</p>
            </div>
            <div>
                <a href="/admin/categorias" class="btn-agregar" style="background: #1976d2;">📂 Categorías</a>
                <a href="/admin/productos/nuevo" class="btn-agregar">+ Nuevo Producto</a>
            </div>
        </div>

        @if(count($productos) > 0)
            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Destacado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td>Bs {{ number_format($producto->precio, 0, ',', '.') }}</td>
                            <td>{{ $producto->destacado ? '★ Sí' : '-' }}</td>
                            <td>
                                <div class="acciones">
                                    <a href="/admin/productos/editar/{{ $producto->id }}" class="btn-editar">Editar</a>
                                    <form action="/admin/productos/eliminar/{{ $producto->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-eliminar">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay productos registrados.</p>
        @endif
    </section>
@endsection