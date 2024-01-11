var pass = document.getElementById('pass');
var pass2 = document.getElementById('pass2');
var registrarse_btn = document.getElementById('registrarse_btn');
var registrarse_form = document.getElementById('registrarse_form');

registrarse_btn.onclick = function(){
    if (pass.value != pass2.value){
        alert("Las contraseñas no coinciden");
    }else{
        registrarse_form.action = "revisionRegistrarse.php";
        registrarse_form.submit();
    }
}