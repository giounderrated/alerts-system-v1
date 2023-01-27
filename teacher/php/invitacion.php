<?php    
    $email="ernzturm.97@gmail.com";
    $subject="Reporte Escolar";
    $message="
    Usted tutor/a esta siendo notificada sobre un nuevo reporte de su hijo(a) favor de ingresar al siguiente link de invitacion.

        TERMINOS Y CONDICIONES 
        
        En la medida máxima permitida por la ley aplicable, excluimos todas las representaciones, garantías y condiciones relacionadas con nuestro sitio web y el uso de este sitio web (incluyendo, sin limitación, cualquier garantía implícita por la ley con respecto a la calidad satisfactoria, idoneidad para el propósito y/o el uso de cuidado y habilidad razonables).
    Al hacer click! al siguiente link usted hacepta el usos de nuestros terminos y condciones  link";
    if(mail($email,$subject,$message)){
        echo "correo Enviado!";
    }else{
        echo "Error al enviar el correo!";
    }
?>