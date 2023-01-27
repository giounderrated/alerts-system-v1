/*
Program Assignment:  functions                                   
Developer            Giovani Flores                                                                      
Date:                21-03-2022                                                                              
Description:         Manage the functions of the view page
*/


function MostrarStudents(){

     axios.post("php/getMensajes.php")
        .then((respuestaMensajes) => {
             $("#mensajesTutor").html(respuestaMensajes.data);
        }).catch((error) => {
            alert(error);
        })
}


function MostrarMensaje(id){
    json = [{
        name: "id",
        value: id
    }];
    axios.post("php/getMensajeCompleto.php", json, {
    })
    .then((completeMessage) => {
        let message = completeMessage.data[0];
        console.log(message)
        $('#messageModal').modal('show');
        $('#type').text(message.type);
        $('#date').text(message.date_created);
        $('#message').text(message.content);
        //$("#mensajeCompleto").html(completeMessage.data);
        

    }).catch((error) => {
        alert(error);
    })
}

function DeleteStudent(id){
    json = [{
    name: "id",
    value: id
    }]
     axios.post("php/deleteMessage.php", json, {
        })
        .then((response) => {
             alert(response.data)
        }).catch((error) => {
            alert(error);
        })
    readRecords();
}

function DeleteStudent(id){
    json = [{
    name: "id",
    value: id
    }]
     axios.post("php/deleteMessage.php", json, {
        })
        .then((response) => {
             alert(response.data)
        }).catch((error) => {
            alert(error);
        })
    readRecords();
}

function reportMessage(id){
    json = {
        id:id
    }
    axios.post('php/reportMessage.php',json).then(response => {
        alert(response.data);
    })
   .catch(error => {
        alert("HUBO UN ERROR: ");
   });
}



$(document).ready(function () {
    // READ records on page load

    MostrarStudents();//poner id
});