/*
Program Assignment:  functions                                   
Developer            Giovani Flores                                                                      
Date:                21-03-2022                                                                              
Description:         Manage the functions of the view page
*/


$(document).ready(function () {
    getTutors();
});

function addRecord(){
    $('#formAdd').on("submit", (function (e){
        e.preventDefault();
        let formValues = $(this).serializeArray();
        
        //validation
        let studentName = formValues[0].value;
        let tutorName = formValues[1].value;
        if(studentName.length<4){
            alert("Nombre demasiado corto")
            return;
        }
        if(tutorName.length<4){
            alert("Nombre demasiado corto")
            return;
        }

        axios.post("php/addStudent.php", formValues, {
        })
        .then((response) => {
            alert(response.data);
             // close the popup
            $("#add_new_record_modal").modal("hide");
            // read records again
            getTutors();
            
            // clean fields
            $(this)[0].reset();

        }).catch((error) => {
            alert(error);
        })
    }));
}
function getMessages(id){
    json = [{name: "id",
            value: id}]
    axios.post("php/getMessages.php", json, {
        })
        .then((response) => {
             $("#tutorMessages").html(response.data);
        }).catch((error) => {
            alert(error);
        })
}

function showMessage(id){
    json = [{name: "id",
            value: id}];
     axios.post("php/getMessage.php", json)
        .then((completeMessage) => {
            let message = completeMessage.data[0];
            console.log(message)
            $('#messageModal').modal('show');
            $('#type').text(message.type);
            $('#date').text(message.date_created);
            $('#message').text(message.content);
            
        }).catch((error) => {
            alert(error);
        })
}


function getTutors() {
    axios.get('php/getTutors.php')
    .then(response => {
        $("#records_content").html(response.data);
    })
   .catch(error => {
        alert("Hubo un error al leer a los estudiantes " + e)
   })
}

function sendMessage(id){
    $("#sendMessageModal").modal("show");

    $("#sendMessageButton").click(function() {
        console.log("hola");
        type = $("#cause").val();
        description = $("#description").val();
        json = {
            id: id,
            type: type,
            description: description
        };
        axios.post('php/sendMessage.php',json).then(response => {
            alert(response.data)
            getMessages(id);
        })
       .catch(error => {
            alert("Error al enviar el mensaje " + error);
       });
    });
}


function deleteMessage(id,id_user){
    json = {
        id:id
    }
    axios.post('php/deleteMessage.php',json).then(response => {
	    alert(response.data);
	    getMessages(id_user);
    })
   .catch(error => {
        alert("Hubo un error al leer a los estudiantes " + error);
   });
}