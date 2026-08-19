@extends('layouts.base')

@section('contenido')
  @if ($errors->any())
    <ul style="color: #b00020;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form action="/herramientas/nuevo" method="POST">
    @csrf

    <p>
      <label for="nombre">Nombre de la herramienta:</label><br>
      <input type="text" id="nombre" name="nombre" required>
    </p>

    <p>
      <label for="precio">Precio en Bs:</label><br>
      <input type="number" id="precio" name="precio" required>
    </p>

    <p><button type="submit">Registrar herramienta</button></p>
  </form>

  <p><a href="/herramientas">Volver a la lista</a></p>
@endsection