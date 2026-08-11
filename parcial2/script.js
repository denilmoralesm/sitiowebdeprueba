const formularioCita = document.querySelector("#form-cita");
const avisoCita = document.querySelector("#aviso-cita");

function revisarCita(event) {
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;

    if (nombre === "" || correo === "") {
        avisoCita.textContent = "Completa tu nombre y tu correo para reservar la cita.";
        avisoCita.classList.add("error");
        avisoCita.classList.remove("exito");
        event.preventDefault();
    } else if (!correo.includes("@")) {
        avisoCita.textContent = "Ese correo está mal escrito: le falta el arroba.";
        avisoCita.classList.add("error");
        avisoCita.classList.remove("exito");
        event.preventDefault();
    } else {
        avisoCita.textContent = "Cita reservada - te atiende Denilson Morales";
        avisoCita.classList.add("exito");
        avisoCita.classList.remove("error");
    }
}

formularioCita.addEventListener("submit", revisarCita);