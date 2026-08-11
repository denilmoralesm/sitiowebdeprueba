<?php
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $consulta = $_POST["consulta"];

    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Correo:</strong> $correo</p>";
    echo "<p><strong>Consulta:</strong> $consulta</p>";

    echo "<h2>Nuestros servicios</h2>";
    echo "<ul>";

    $servicios = [
        "Examen de vista - Bs 50",
        "Armazón clásico - Bs 180",
        "Lentes de sol - Bs 120"
    ];

    foreach ($servicios as $servicio) {
        echo "<li>$servicio</li>";
    }

    echo "</ul>";
    echo "<p><strong>Te atiende Denilson Morales</strong></p>";
?>