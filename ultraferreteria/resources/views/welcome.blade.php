@extends('layouts.base')

@section('titulo', 'Inicio')

@section('contenido')
    <section>
        <h2>Bienvenido</h2>
        <p>Aquí podrás encontrar todos nuestros productos disponibles para construcción, electricidad, plomería,
        herramientas y mucho más. Escoge los productos que necesitas y contáctanos para recibir una cotización
        personalizada con los mejores precios.</p>
    </section>

    <hr>

    <section>
        <h2>⭐ Productos Destacados</h2>
        @if(count($destacados) > 0)
            <div class="grid-productos">
                @foreach($destacados as $producto)
                    <div class="producto-card">
                        <span class="badge-destacado">★ Destacado</span>
                        <h3>{{ $producto->nombre }}</h3>
                        <p class="categoria">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                        <p class="precio">Bs {{ number_format($producto->precio, 0, ',', '.') }}</p>
                        @if($producto->descripcion)
                            <p class="descripcion">{{ Str::limit($producto->descripcion, 60) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay productos destacados aún.</p>
        @endif
    </section>

    <hr>

    <section>
        <h2>Todos Nuestros Productos</h2>
        <p>Hay <strong>{{ count($productos) }}</strong> productos disponibles.</p>

        @if(count($productos) > 0)
            <div class="grid-productos">
                @foreach($productos as $producto)
                    <div class="producto-card">
                        <h3>{{ $producto->nombre }}</h3>
                        <p class="categoria">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                        <p class="precio">Bs {{ number_format($producto->precio, 0, ',', '.') }}</p>
                        @if($producto->descripcion)
                            <p class="descripcion">{{ Str::limit($producto->descripcion, 60) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p>Todavía no hay productos registrados.</p>
        @endif
    </section>

    <hr>

    <section class="contacto-info">
        <h2>Contáctanos</h2>
        <p>
            WhatsApp: <strong>60406000</strong><br>
            Dirección: <strong>Oruro, Mercado</strong><br>
            Horario:<br>Lunes a Viernes: 08:00 - 18:30<br>Sábado: 08:00 - 15:00
        </p>
    </section>

    <hr>

    <section class="formulario-contacto">
        <h2>Envíanos un mensaje</h2>
        <form id="form-pedido" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
            </div>

            <button type="submit" class="btn-guardar">Enviar mensaje</button>

            <p id="aviso-contacto" class="aviso"></p>
        </form>
    </section>
@endsection