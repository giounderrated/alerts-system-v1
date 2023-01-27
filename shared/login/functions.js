/*
Program Assignment:  Login Module                                    
Developer            Giovani Flores                                                                      
Date:                28-03-2022                                                                             
Description:         Modulo para el login de profesores y tutores.                                                               
*/


function login(){
    $('#formLogin').on("submit", (function (e){
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();

        let formValues = $(this).serializeArray();

        console.log(formValues);

        axios.post("./login.php", formValues, {
        })
        .then((response) => {
            if(response.data.status=="201"){
		if(response.data.ban==0){
                	alert("Usuario logueado correctamente");
                	window.location = "../shared.php";
		}else{
			alert('tu usuario ha sido baneado, si tienes alguna duda , porfavor comunicate con algun administrador');
		}
            }
            else{
                alert("No hay datos para ese usuario");
            }
            
        }).catch((error) => {
            if(error) alert(error);
        })
    }));
}
