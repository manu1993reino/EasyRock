function validarNueva(){
    var clave1, clave2;
    clave1= document.getElementById("clave1").value;
    clave2= document.getElementById("clave2").value;
    contrasenia= (clave1==clave2);

    if(clave1 === ""){
        texto = document.getElementById("posicion")
        texto.innerHTML = "Debe rellenar el campo 'Contraseña'";
        return false;
    }else if(clave2 === ""){
        texto = document.getElementById("posicion")
        texto.innerHTML = "Debe rellenar el campo 'Confirmar contraseña'";
        return false;
    }else if(!contrasenia){
        texto = document.getElementById("posicion")
        texto.innerHTML = "Las contraseñas deben coincidir";
        return false;
    }
}