const btnConfirmar = document.querySelector("#btn-confirmar");
const mensajeParrafo = document.querySelector("#mensaje");

function confirmarTurno() {
    mensajeParrafo.textContent = "Turno recibido - te atiende Denilson Morales";
    mensajeParrafo.classList.remove("oculto");
}

btnConfirmar.addEventListener("click", confirmarTurno);