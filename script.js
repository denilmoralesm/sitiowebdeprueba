const botonModo = document.querySelector("#modoOscuro");

botonModo.addEventListener("click", function () {
    document.body.classList.toggle("oscuro");

    if (document.body.classList.contains("oscuro")) {
        botonModo.textContent = "Modo Claro";
    } else {
        botonModo.textContent = "Modo Oscuro";
    }
});

const formularioPedido = document.querySelector("#form-pedido");
const avisoPedido = document.querySelector("#aviso-contacto");

function revisarPedido(event) {
    event.preventDefault();
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;

    if (nombre === "") {
        avisoPedido.textContent = "Falta tu nombre, caserito.";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else if (correo.includes("@") === false) {
        avisoPedido.textContent = "Ese correo no parece correo: le falta el @.";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else {
        avisoPedido.textContent = "Pedido recibido, caserito. Te contactamos hoy.";
        avisoPedido.classList.add("exito");
        avisoPedido.classList.remove("error");
    }
}

formularioPedido.addEventListener("submit", revisarPedido);