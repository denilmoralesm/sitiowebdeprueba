@extends('layouts.base')

@section('titulo', 'Nuevo Producto')

@section('contenido')
    <section>
        <h2>Agregar Producto</h2>

        @if($errors->any())
            <div class="errores">
                <strong>Por favor corrige lo siguiente:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/productos/nuevo" method="POST" class="formulario-producto">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría:</label>
                <select id="categoria_id" name="categoria_id">
                    <option value="">Seleccionar categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <small style="color: #666; display: block; margin-top: 5px;">
                    ¿No encuentras la categoría? <a href="/admin/categorias/nuevo">Crea una nueva aquí</a>
                </small>
            </div>

            <div class="form-group">
                <label for="precio">Precio en Bs:</label>
                <input type="number" id="precio" name="precio" value="{{ old('precio') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="destacado" value="1" {{ old('destacado') ? 'checked' : '' }}>
                    Marcar como destacado
                </label>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0">
            </div>

            <button type="submit" class="btn-guardar">Guardar Producto</button>
            <a href="/admin/productos" class="btn-volver" style="margin-left: 10px;">Cancelar</a>
        </form>
    </section>
@endsection