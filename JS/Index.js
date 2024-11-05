
// Función para iniciar el recorrido de Intro.js
function iniciarTour() {
  introJs()
      .oncomplete(function() {

      })
      .start();
}

// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
  // Seleccionar el botón de inicio del tour
  const startTourButton = document.getElementById("startTour");
 
  // Verificar si el botón existe y agregar el evento de clic
  if (startTourButton) {
      startTourButton.onclick = function() {
          iniciarTour();
      };
  }
});

// Función de validación del formulario
function validarForm() {
  const email_test = new RegExp("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$");
  let u = document.getElementById("email").value;
  let p = document.getElementById("pass").value;

  if (u == "") {
      document.getElementById("email").classList.add("red-input");
      document.getElementById("msjEmail").innerHTML = "Este campo es obligatorio.";
      return false;
  }

  if (p == "") {
      document.getElementById("pass").classList.add("red-input");
      document.getElementById("msjPass").innerHTML = "Este campo es obligatorio.";
      return false;
  }

  if (!email_test.test(u)) {
      document.getElementById("email").classList.add("red-input");
      document.getElementById("msjEmail").innerHTML = "El Email no es válido.";
      return false;
  }

  for (let i in p) {
      if (p[i] == " ") {
          document.getElementById("pass").classList.add("red-input");
          document.getElementById("msjPass").innerHTML = "La contraseña no puede tener espacios.";
          return false;
      }
  }
  return true;
}

// Función para corregir mensajes y colores de error en el formulario
function Corregir(n1, n2) {
  document.getElementById(n1).style.color = 'black';
  document.getElementById(n2).style.backgroundColor = 'white';
  document.getElementById(n2).innerHTML = '';
}
// Funciónes para el boton de agregar ejercicio
function openModal() {
    const dialog = document.getElementById('exerciseDialog');
    const overlay = document.getElementById('modal-overlay');
    dialog.style.display = 'block'; // Muestra el diálogo
    overlay.style.display = 'block'; // Muestra el overlay
}

function closeModal() {
    const dialog = document.getElementById('exerciseDialog');
    const overlay = document.getElementById('modal-overlay');
    dialog.style.display = 'none'; // Oculta el diálogo
    overlay.style.display = 'none'; // Oculta el overlay
}



