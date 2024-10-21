function validarForm() {
  const email_test = new RegExp("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$");
  let u = document.getElementById("mail").value;
  let p = document.getElementById("c").value;
  let n = document.getElementById("n").value;
  let a = document.getElementById("a").value;
  let p2 = document.getElementById("c2").value;
  let valid = true;
  if (n === "") {
    document.getElementById("n").classList.add("red-input");
    document.getElementById("nom-error").innerHTML = "Este campo es obligatorio.";
    valid = false;
  }
  if (a === "") {
    document.getElementById("a").classList.add("red-input");
    document.getElementById("ape-error").innerHTML = "Este campo es obligatorio.";
    valid = false;
  }
  if (u === "") {
    document.getElementById("mail").classList.add("red-input");
    document.getElementById("mail-error").innerHTML = "Este campo es obligatorio.";
    valid = false;
  } else if (!email_test.test(u)) {
    document.getElementById("mail").classList.add("red-input");
    document.getElementById("mail-error").innerHTML = "El Email no es válido.";
    valid = false;
  }
  if (p === "") {
    document.getElementById("c").classList.add("red-input");
    document.getElementById("con-error").innerHTML = "Este campo es obligatorio.";
    valid = false;
  } else if (p.includes(" ")) {
    document.getElementById("c").classList.add("red-input");
    document.getElementById("con-error").innerHTML = "La contraseña no puede tener espacios.";
    valid = false;
  }
  if (p2 === "") {
    document.getElementById("c2").classList.add("red-input");
    document.getElementById("con2-error").innerHTML = "Este campo es obligatorio.";
    valid = false;
  } else if (p !== p2) {
    document.getElementById("c2").classList.add("red-input");
    document.getElementById("con2-error").innerHTML = "Las contraseñas no coinciden.";
    valid = false;
  }
  return valid;
}

function Corregir(n1, n2) {
  document.getElementById(n1).classList.remove('red-input');
  document.getElementById(n2).innerHTML = '';
}