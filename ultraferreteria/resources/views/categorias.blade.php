@extends('layouts.base')

@section('titulo', 'Administrar Categorías')

@section('contenido')
    <section>
        <div class="admin-header">
            <div>
                <h2>📂 Administrar Categorías</h2>
                <p>Gestiona las categorías del catálogo.</p>
            </div>
            <a href="/admin/categorias/nuevo" class="btn-agregar">+ Nueva Categoría</a>
        </div>

        @if(count($categorias) > 0)
            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td><strong>{{ $categoria->nombre }}</strong></td>
                            <td>{{ $categoria->descripcion ?? '-' }}</td>
                            <td>{{ $categoria->productos->count() }}</td>
                            <td>
                                @if($categoria->activa)
                                    <span style="color: #2e7d32;">✅ Activa</span>
                                @else
                                    <span style="color: #c62828;">❌ Inactiva</span>
                                @endif
                            </td>
                            <td>
                                <div class="acciones">
                                    <a href="/admin/categorias/editar/{{ $categoria->id }}" class="btn-editar">Editar</a>
                                    <form action="/admin/categorias/eliminar/{{ $categoria->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar esta categoría? Se eliminarán también sus productos.')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay categorías registradas.</p>
        @endif

        <p style="margin-top: 20px;">
            <a href="/admin/productos" class="btn-volver">&larr; Volver a Productos</a>
        </p>
    </section>
@endsection