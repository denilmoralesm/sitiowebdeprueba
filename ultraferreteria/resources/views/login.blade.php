@extends('layouts.base')

@section('titulo', 'Login')

@section('contenido')
    <section>
        <h2>Ingresar al Panel de Administración</h2>

        @if(session('error'))
            <div class="errores">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        <form action="/login" method="POST" class="formulario-producto">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-guardar">Ingresar</button>
        </form>
    </section>
@endsection