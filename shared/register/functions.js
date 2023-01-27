/*
Program Assignment:  Register Module                                    
Developer            Giovani Flores                                                                      
Date:                28-03-2022                                                                             
Description:         Modulo para el registro de los profesores.                                                               
*/


function register(){

    let email = $('#email').val();
    let password = $('#password').val();
    let tipo = $("input[name='tipo']:checked").val();

    if(password.length<6){
        alert("La contraseña debe ser mayor a 6 letras.");
        return;
    }

    let formValues = $("#formRegister").serializeArray();

    console.log(formValues);

    axios.post("register.php", formValues, {
    })
    .then((response) => {
        if(response.data["status"]=="201"){
            window.location.replace("./../login/index.html")
        }
        else{
            alert(response.data["data"])
        }
    }).catch((error) => {
        alert(error);
    })

}
