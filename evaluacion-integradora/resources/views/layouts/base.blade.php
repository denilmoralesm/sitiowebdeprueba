<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ferretería El Tornillo</title>
  <style>
    header { 
      background: linear-gradient(135deg, #1a2a4a 0%, #2c3e6a 100%);
      color: #fff; 
      padding: 1.5rem 2rem; 
      border-radius: 12px; 
      margin-bottom: 2rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    header h1 { 
      font-size: 2rem; 
      margin-bottom: 0.5rem;
      letter-spacing: 1px;
    }
    nav { 
      margin-top: 0.5rem;
    }
    nav a { 
      color: #ffd; 
      margin-right: 1.5rem; 
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
      padding: 0.3rem 0.8rem;
      border-radius: 6px;
      background: rgba(255,255,255,0.1);
    }
    main {
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      min-height: 400px;
    }
    main h2 {
      color: #1a2a4a;
      border-bottom: 3px solid #e67e22;
      padding-bottom: 0.75rem;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
    }
    main p {
      margin-bottom: 1rem;
      color: #333;
    }
    main ul {
      list-style: none;
      padding: 0;
      margin: 1rem 0;
    }
    main ul li {
      padding: 0.8rem 1rem;
      border-bottom: 1px solid #eee;
      transition: background 0.2s;
    }
    main a {
      display: inline-block;
      background: #e67e22;
      color: #fff;
      padding: 0.6rem 1.5rem;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: background 0.3s;
      margin-top: 0.5rem;
    }
    main a:hover {
      background: #d35400;
    }
    main form p {
      margin-bottom: 1.2rem;
    }
    main form label {
      display: block;
      font-weight: 600;
      color: #1a2a4a;
      margin-bottom: 0.3rem;
    }
    main form input {
      width: 100%;
      padding: 0.7rem;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    main form input:focus {
      border-color: #e67e22;
      outline: none;
    }
    main form button {
      background: #27ae60;
      color: #fff;
      padding: 0.7rem 2rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }
    main form button:hover {
      background: #229954;
    }
    main ul.error-list, main ul[style] {
      background: #fee;
      color: #c0392b;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      border-left: 4px solid #c0392b;
      margin-bottom: 1.5rem;
      list-style: none;
    }
    main ul.error-list li, main ul[style] li {
      padding: 0.2rem 0;
      border: none;
    }
    footer { 
      margin-top: 2rem; 
      padding: 1.5rem;
      color: #666; 
      border-top: 2px solid #ddd; 
      text-align: center;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .btn-volver {
      background: #7f8c8d !important;
    }
    .btn-volver:hover {
      background: #5a6c6d !important;
    }
  </style>
</head>
<body>
  <header>
    <h1>Ferretería El Tornillo</h1>
    <nav>
      <a href="/herramientas">Inicio</a>
      <a href="/herramientas/nuevo">Agregar herramienta</a>
    </nav>
  </header>

  <main>
    @yield('contenido')
  </main>

  <footer>Integradora - Denilson Morales - 18 de agosto de 2026</footer>
</body>
</html>