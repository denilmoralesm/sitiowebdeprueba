const botonModo = document.querySelector("#modoOscuro");

botonModo.addEventListener("click", function () {
    document.body.classList.toggle("oscuro");

    if (document.body.classList.contains("oscuro")) {
        botonModo.textContent = "Modo Claro";
    } else {
        botonModo.textContent = "Modo Oscuro";
    }
});