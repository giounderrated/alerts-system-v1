/*
Program Assignment:  functions                                   
Developer            Giovani Flores                                                                      
Date:                21-03-2022                                                                              
Description:         Manage the functions of the view page
*/


function addRecord(){
    $('#formAdd').on("submit", (function (e){
        e.preventDefault();
        let formValues = $(this).serializeArray();
        
        //validation
        let name = formValues[0].value;
        if(name.length-4){
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
            readRecords();
            
            // clean fields
            $(this)[0].reset();

        }).catch((error) => {
            alert(error);
        })
    }));
}


function readRecords() {
    axios.get('php/getStudents.php')
    .then(response => {
        $("#records_content").html(response.data);
    })
   .catch(error => {
        alert("Hubo un error al leer a los estudiantes " + e)
   })
}

function MostrarProfesores(){
    axios.get('php/getProfesores.php')
        .then((respuestaMensajes) => {
             $("#tablas").html(respuestaMensajes.data);
            

        }).catch((error) => {
            alert(error);
        })
}

function MostrarReportes(){
    axios.get('php/getReportes.php')
        .then((respuestaMensajes) => {
             $("#tablas").html(respuestaMensajes.data);
            

        }).catch((error) => {
            alert(error);
        })
}

function MostrarTutores(){
    axios.get('php/getTutores.php')
        .then((respuestaMensajes) => {
             $("#tablas").html(respuestaMensajes.data);
            

        }).catch((error) => {
            alert(error);
        })
}




function showReport(id,id_message){
    json = [{name: "id",
            value: id},
		{name:"id_message",
		value:id_message}];
     axios.post("php/getCompleteMessage.php", json)
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

$(document).ready(function () {
    // READ records on page load
    readRecords();

});

function suspend(id){
	axios.post("php/banUser.php", id, {
        })
        .then((response) => {
             alert(response.data)
        }).catch((error) => {
            alert(error);
        })
}