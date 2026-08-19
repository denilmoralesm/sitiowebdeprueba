<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Ferretería</title>
</head>
<body>
    <header>
        <h1>ULTRA FERRETERÍA</h1>
        <p>Todo para la construcción, remodelación y el hogar.</p>
    </header>

    <nav>
        <a href="{{ route('welcome') }}">Inicio</a>
        <a href="{{ route('contacto') }}">Contacto</a>
        <button id="modoOscuro" class="btn-modo">Modo Oscuro</button>
    </nav>

    <main>
        <section>
            <h2>Bienvenido a Ultra Ferretería</h2>
            <p>Aquí podrás encontrar todos nuestros productos disponibles para construcción, electricidad, plomería, herramientas y mucho más. Escoge los productos que necesitas y contáctanos para recibir una cotización personalizada con los mejores precios.</p>
        </section>

        <hr>

        <section id="categoria">
            <h2>Categorías</h2>
            <ul>
                <li>Herramientas Manuales</li>
                <li>Material Eléctrico</li>
                <li>Hogar</li>
            </ul>
        </section>

        <hr>

        <section id="contacto" style="text-align:center;">
            <h2>Gracias por visitarnos</h2>
            <p>Estamos listos para ayudarte a encontrar exactamente lo que necesitas.</p>
            <a href="{{ route('contacto') }}" class="btn-whatsapp">Contáctanos</a>
        </section>
    </main>

    <footer>
        © 2026 Ultra Ferretería | Todos los derechos reservados.<br>
        <span>Oruro - Bolivia | Tel: 60406000</span>
    </footer>
</body>
</html>