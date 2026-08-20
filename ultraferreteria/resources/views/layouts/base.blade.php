<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Ferretería - @yield('titulo', 'Catálogo')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f0f0;
            line-height: 1.5;
            color: #333;
            transition: background 0.3s, color 0.3s;
        }

        header {
            background: #c62828;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 42px;
            letter-spacing: 2px;
        }

        header p {
            margin-top: 10px;
            font-size: 18px;
            opacity: 0.9;
        }

        nav {
            background: #b71c1c;
            padding: 15px 20px;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            padding: 5px 10px;
            transition: background 0.3s;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .btn-modo {
            background: #212121;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-modo:hover {
            background: #000;
            transform: scale(1.05);
        }

        .btn-login {
            background: #ffd700;
            color: #222;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-login:hover {
            background: #ffed4a;
            transform: scale(1.05);
        }

        .btn-salir {
            background: #c62828;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-salir:hover {
            background: #8e0000;
            transform: scale(1.05);
        }

        main {
            background: white;
            margin: 25px auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, color 0.3s;
            min-height: 400px;
        }

        section {
            margin-bottom: 30px;
            padding: 5px 0;
        }

        section h2 {
            color: #c62828;
            margin-top: 0;
            margin-bottom: 15px;
        }

        hr {
            margin: 30px 0;
            border: 0;
            border-top: 2px solid #eee;
        }

        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .producto-card {
            background: #fafafa;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #eee;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .producto-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .producto-card h3 {
            color: #c62828;
            margin-bottom: 5px;
        }

        .producto-card .categoria {
            font-size: 14px;
            color: #666;
        }

        .producto-card .precio {
            font-size: 20px;
            font-weight: bold;
            color: #2e7d32;
            margin: 8px 0;
        }

        .producto-card .descripcion {
            font-size: 14px;
            color: #555;
            margin-top: 8px;
        }

        .badge-destacado {
            background: #ffd700;
            color: #333;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 8px;
        }

        .btn-agregar {
            display: inline-block;
            background: #c62828;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-agregar:hover {
            background: #8e0000;
        }

        .btn-volver {
            display: inline-block;
            background: #555;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-volver:hover {
            background: #333;
        }

        .btn-editar {
            display: inline-block;
            background: #1976d2;
            color: white;
            padding: 6px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-editar:hover {
            background: #0d47a1;
        }

        .btn-eliminar {
            display: inline-block;
            background: #c62828;
            color: white;
            padding: 6px 15px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-eliminar:hover {
            background: #8e0000;
        }

        .formulario-producto {
            background: #fafafa;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            font-family: inherit;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #c62828;
            outline: none;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .btn-guardar {
            background: #c62828;
            color: white;
            border: none;
            padding: 14px 40px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-guardar:hover {
            background: #8e0000;
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
            border: none;
            padding: 15px 35px;
            font-size: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .btn-whatsapp:hover {
            transform: scale(1.05);
        }

        .errores {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #c62828;
            margin-bottom: 20px;
        }

        .errores ul {
            margin-left: 20px;
        }

        .mensaje-exito {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #2e7d32;
            margin-bottom: 20px;
        }

        .aviso {
            display: none;
            margin-top: 14px;
            padding: 10px;
            border-radius: 6px;
        }

        .aviso.error {
            display: block;
            color: #63261e;
            background: #ffcdd2;
            border: 1px solid #c62828;
        }

        .aviso.exito {
            display: block;
            color: #1a7f4f;
            background: #c8e6c9;
            border: 1px solid #2e7d32;
        }

        .contacto-info {
            background: #e3f2fd;
            padding: 25px;
            border-radius: 10px;
            border-left: 5px solid #1565c0;
        }

        .contacto-info h2 {
            color: #1565c0;
            margin-top: 0;
        }

        .formulario-contacto {
            background: #fafafa;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .formulario-contacto h2 {
            color: #c62828;
        }

        .tabla-admin {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabla-admin th {
            background: #c62828;
            color: white;
            padding: 12px;
            text-align: left;
        }

        .tabla-admin td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .tabla-admin tr:hover {
            background: #f5f5f5;
        }

        .tabla-admin .acciones {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        footer {
            background: #212121;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 15px;
            margin-top: 20px;
        }

        footer span {
            opacity: 0.7;
        }

        body.oscuro {
            background: #121212;
            color: #f5f5f5;
        }

        body.oscuro header {
            background: #7b1e1e;
        }

        body.oscuro nav {
            background: #4b0000;
        }

        body.oscuro main {
            background: #1f1f1f;
            color: white;
        }

        body.oscuro section h2 {
            color: #ff8a80;
        }

        body.oscuro .contacto-info {
            background: #263238;
            border-left: 5px solid #64b5f6;
        }

        body.oscuro .contacto-info h2 {
            color: #64b5f6;
        }

        body.oscuro .formulario-contacto,
        body.oscuro .formulario-producto {
            background: #2b2b2b;
            border: 1px solid #555;
        }

        body.oscuro .form-group label {
            color: #ddd;
        }

        body.oscuro .form-group input,
        body.oscuro .form-group textarea,
        body.oscuro .form-group select {
            background: #3a3a3a;
            color: white;
            border: 2px solid #666;
        }

        body.oscuro .form-group input::placeholder,
        body.oscuro .form-group textarea::placeholder {
            color: #aaa;
        }

        body.oscuro hr {
            border-top: 2px solid #555;
        }

        body.oscuro footer {
            background: #000;
        }

        body.oscuro .btn-modo {
            background: #ffd54f;
            color: #222;
        }

        body.oscuro .btn-modo:hover {
            background: #ffca28;
        }

        body.oscuro .producto-card {
            background: #2a2a2a;
            border-color: #444;
        }

        body.oscuro .producto-card h3 {
            color: #ff8a80;
        }

        body.oscuro .producto-card .categoria {
            color: #aaa;
        }

        body.oscuro .producto-card .descripcion {
            color: #ccc;
        }

        body.oscuro .errores {
            background: #3a1a1a;
            color: #ff8a80;
            border-left-color: #ff8a80;
        }

        body.oscuro .mensaje-exito {
            background: #1a3a1a;
            color: #81c784;
            border-left-color: #81c784;
        }

        body.oscuro .tabla-admin td {
            border-bottom-color: #444;
        }

        body.oscuro .tabla-admin tr:hover {
            background: #2a2a2a;
        }

        body.oscuro .btn-login {
            background: #ffd54f;
            color: #222;
        }

        body.oscuro .btn-login:hover {
            background: #ffca28;
        }

        body.oscuro .btn-salir {
            background: #c62828;
            color: white;
        }

        body.oscuro .btn-salir:hover {
            background: #8e0000;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 10px;
                padding: 15px;
            }

            main {
                padding: 15px;
                width: 95%;
                margin: 15px auto;
            }

            header h1 {
                font-size: 28px;
            }

            .grid-productos {
                grid-template-columns: 1fr;
            }

            .tabla-admin {
                font-size: 14px;
            }

            .tabla-admin .acciones {
                flex-direction: column;
            }

            .btn-guardar,
            .btn-enviar {
                width: 100%;
            }

            .admin-header {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>ULTRA FERRETERÍA</h1>
        <p>Todo para la construcción, remodelación y el hogar.</p>
    </header>

    <nav>
        <a href="/">Inicio</a>
        @auth
            <a href="/admin/productos">Administrar</a>
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-salir">Salir</button>
            </form>
        @else
            <a href="/login" class="btn-login">Ingresar</a>
        @endauth
        <button id="modoOscuro" class="btn-modo">🌙 Modo Oscuro</button>
    </nav>

    <main>
        @if(session('exito'))
            <div class="mensaje-exito">
                ✅ {{ session('exito') }}
            </div>
        @endif
        @yield('contenido')
    </main>

    <footer>
        © 2026 Ultra Ferretería | Todos los derechos reservados.<br>
        <span>Oruro - Bolivia | Tel: 60406000</span>
    </footer>

    <script>
        const botonModo = document.querySelector("#modoOscuro");

        botonModo.addEventListener("click", function () {
            document.body.classList.toggle("oscuro");

            if (document.body.classList.contains("oscuro")) {
                botonModo.textContent = "☀️ Modo Claro";
            } else {
                botonModo.textContent = "🌙 Modo Oscuro";
            }
        });

        const formularioPedido = document.querySelector("#form-pedido");
        const avisoPedido = document.querySelector("#aviso-contacto");

        if (formularioPedido) {
            formularioPedido.addEventListener("submit", function (event) {
                event.preventDefault();
                const nombre = document.querySelector("#nombre").value;
                const correo = document.querySelector("#correo").value;

                if (nombre === "") {
                    avisoPedido.textContent = "❌ Falta tu nombre, caserito.";
                    avisoPedido.className = "aviso error";
                } else if (!correo.includes("@")) {
                    avisoPedido.textContent = "❌ Ese correo no parece correo: le falta el @.";
                    avisoPedido.className = "aviso error";
                } else {
                    avisoPedido.textContent = "✅ Pedido recibido, caserito. Te contactamos hoy.";
                    avisoPedido.className = "aviso exito";
                    this.reset();
                }
            });
        }

        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('¿Estás seguro de eliminar este producto?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>