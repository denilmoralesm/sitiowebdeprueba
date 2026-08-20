@extends('layouts.base')

@section('titulo', 'Nueva Categoría')

@section('contenido')
    <section>
        <h2>📂 Agregar Nueva Categoría</h2>

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

        <form action="/admin/categorias/nuevo" method="POST" class="formulario-producto">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre de la categoría:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="activa" value="1" {{ old('activa', true) ? 'checked' : '' }}>
                    Categoría activa
                </label>
            </div>

            <button type="submit" class="btn-guardar">Guardar Categoría</button>
            <a href="/admin/categorias" class="btn-volver" style="margin-left: 10px;">Cancelar</a>
        </form>
    </section>
@endsection