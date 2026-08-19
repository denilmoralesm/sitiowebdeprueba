@extends('layouts.base')

@section('contenido')

  <form action="/nuevo" method="POST">
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

  <p><a href="/">Volver a la lista</a></p>
@endsection