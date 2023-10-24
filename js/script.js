function asignarEventos(){
    document.getElementById('loginButton').addEventListener('click', setLoginData)
}
// function prueba(){
//     document.getElementById('ipTextField').value = 'Prueba seteada';
// }
// function pruebaAlert(){
//     alert("Evento asignado");
// }

function setLoginData(){
    // let userValue = ""
    // let passwordValue = ""
    // userValue = document.getElementById('userTextField').value
    // passwordValue = document.getElementById('passwordField').value
    // //Opc 1: Hacer un POJO
    // loginData = {
    //     user: userValue,
    //     password: passwordValue
    // }
    // //Convirtiendo mi objeto JS en JSON para poder almacenarlo en el localStorage
    // console.log("POJO de login: " + JSON.stringify(loginData))
    // localStorage.setItem('loginData', JSON.stringify(loginData))
    document.location = "./monitoring/monitor.php"
    //Opc 2: Setear ambos valores individualmente (lo mas facil xd)
    // localStorage.setItem('userValue', userValue)
    // localStorage.setItem('passwordValue', passwordValue)
}

asignarEventos();