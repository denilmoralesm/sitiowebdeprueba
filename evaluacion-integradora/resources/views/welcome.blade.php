@extends('layouts.base')

@section('contenido')
  <p>Bienvenidos a Ferretería El Tornillo, su proveedor de confianza en herramientas de calidad.</p>

  <p>Hay <strong>{{ count($herramientas) }}</strong> herramientas en el inventario.</p>

  <ul>
    @foreach ($herramientas as $herramienta)
      <li>{{ $herramienta->nombre }} — Bs {{ $herramienta->precio }}</li>
    @endforeach
  </ul>

  <p>Inventario atendido por Denilson Morales</p>

  <p><a href="/herramientas/nuevo">+ Agregar herramienta</a></p>
@endsection