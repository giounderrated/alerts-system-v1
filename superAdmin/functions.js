/*
Program Assignment:  functions                                   
Developer            Fernanda Reyes                                                                      
Date:                30-04-2022                                                                              
Description:         Manage the functions of the view page superadmi
*/


function addRecord(){
console.log("Hola");
    $('#add_moderator_form').on("submit", (function (e){
        e.preventDefault();
        let formValues = $(this).serializeArray();
        
        //validation
        let email_moderator = formValues[0].value;
        if(email_moderator.length<10){
            alert("DEBES ESCRIBIR UN CORREO ELECTRONICO")
            return;
        }
        let password_moderator = formValues[1].value;
        if(password_moderator.length<8){
            alert("DEBES ESCRIBIR UNA CONTRASEÑA")
            return;
        }
        let name_moderator = formValues[2].value;
        if(name_moderator.length<10){
            alert("DEBES ESCRIBIR UN NOMBRE")
            return;
        }
        axios.post("php/addModerator.php", formValues, {
        })
        .then((response) => {
            alert(response.data);

             // CLOSE MODAL
            $("#add_moderator_modal").modal("hide");
            
            // RECORDS UPDATED
            readRecords();
            
            // CLEAN FIELDS
            $(this)[0].reset();

        }).catch((error) => {
            alert(error);
        })
    }));
}


function readRecords() {
    axios.get('php/getModerators.php')
    .then(response => {
        $("#records_content").html(response.data);
    })
   .catch(error => {
        alert("HUBO UN ERROR AL LEER LOS MODERADORES" )
   })
}



$(document).ready(function () {
    // READ records on page load
    readRecords();

});

function deleteModerator(id){
    json = {
        id:id
    }
    axios.post('php/deleteModerator.php',json).then(response => {
        alert(response.data);
    })
   .catch(error => {
        alert("HUBO UN ERROR: ");
   });
}


