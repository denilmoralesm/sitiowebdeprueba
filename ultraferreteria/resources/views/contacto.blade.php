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

                <button type="submit" class="btn-enviar">Enviar mensaje</button>

                <p id="aviso-contacto" class="aviso"></p>
            </form>
        </section>
    </main>

    <footer>
        © 2026 Ultra Ferretería | Todos los derechos reservados.<br>
        <span>Oruro - Bolivia | Tel: 60406000</span>
    </footer>
</body>
</html>