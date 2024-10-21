function validarForm(){
  const email_test = new RegExp("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$");
  u=document.getElementById("email").value;
  p=document.getElementById("pass").value;
  if(u=="")
    {
    document.getElementById("email").classList.add("red-input");
    document.getElementById("msjEmail").innerHTML="Este campo es obligatorio.";
    return false;
    }
    if(p=="")
      {
      document.getElementById("pass").classList.add("red-input");
      document.getElementById("msjPass").innerHTML="Este campo es obligatorio.";
      return false;
      }
      if(!email_test.test(u)){
        document.getElementById("email").classList.add("red-input");
        document.getElementById("msjEmail").innerHTML="El Email no es válido.";
        return false;
        }
        for(i in p){
        if(p[i]==" ")
        {
        document.getElementById("pass").classList.add("red-input");
        document.getElementById("msjPass").innerHTML="La contraseña no puede tener espacios.";
        return false;
        }
      }
    }    
function Corregir(n1,n2){
          document.getElementById(n1).style.color='black';
          document.getElementById(n2).style.backgroundColor='white';
          document.getElementById(n2).innerHTML='';
}