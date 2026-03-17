<?php
//session_start();
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

echo '<?xml version="1.0" encoding="UTF-8"?>';

//Tomamos los valores se los check  
//$autoriza = $_POST['chAutoriza'];
//$terminos = $_POST['chTerminos'];
////validamos que los check no esten vacios
//if($autoriza == null && $terminos == null){
////    echo utf8_decode("chAutoriza: ".$autoriza."<br>");
//    header('Location: index.php?checks=no');
//}
//tomamos el nombre del paciente que viene en el campo txtNombre y concatenamos el apellido que viene en el campo txtApellido
$nombre_paciente = ucwords(strtolower($_POST['txtNombre'].' '.$_POST['txtApellido']));
//echo utf8_decode("Nombre paciente: ".$nombre_paciente."<br>");
//tomamos el tipo de documento del paciente que viene en el campo tipoDocumento
$tipoDocumento = ucwords(strtolower($_POST["tipoDocumento"])); 
//echo utf8_decode("tipo documento paciente: ".$tipoDocumento."<br>");
//tomamos el numero del documento del paciente que vienen en el campo numDocumento
$numDocumento = strtolower($_POST["numDocumento"]);
//echo utf8_decode("numero documento paciente: ".$numDocumento."<br>");
//tomamos el correo del paciente que viene en el campo email
$email_paciente = ucwords(strtolower($_POST["email"]));
//echo utf8_decode("correo paciente: ".$email_paciente."<br>");
//tomamos el telefono del paciente que viene en el campo 
$numTelefono = ucfirst(strtolower($_POST["numTelefono"]));
//echo utf8_decode("numero telefono paciente: ".$numTelefono."<br>");
//tomamos la ciudad del paciente con el campo ciudad
$ciudad = ucwords(strtolower($_POST["ciudad"]));
//echo utf8_decode("CIUDAD DE PACIENTE: ".$ciudad."<br>");
//tomamos el mensaje que envia el paciente con el campo txtMensaje
$txtMensaje = ucfirst(strtolower($_POST["txtMensaje"]));
//echo utf8_decode("Mensaje: ".$txtMensaje."<br>");
//tomamos si autoriza elk tratamiento de datos con el campo chAutoriza
$chAutoriza = ucfirst(strtolower($_POST["chAutoriza"]));
//echo utf8_decode("Autorisa tratamiento de datos: ".$chAutoriza."<br>");
//tomamos si acepta terminos y condiciones con el campo chTerminos
$chTerminos= ucwords(strtolower($_POST["chTerminos"]));
//echo utf8_decode("Discapacidad: ".$chTerminos."<br>");

if($chAutoriza == null || $chTerminos == null){
    echo utf8_decode("<script>alert('No realizo el ingreso de los datos')</script>");
    header('Location: index.php?s=no');
}else{
//declaramos el contenido del mensaje de correo que se va a enviar
$contenido = 
'<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang = "es" lang = "es">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
      <table style="padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin: 0px; width: 100% ! important;" cellspacing="0" cellpadding="8" border="0">
         <tbody>
            <!--tr style="line- height: 0px;">
               <td style="font- size: 0px;" width="100%" height="2" align="left"> 
               <img style="max- height: 143px;" dfsrc="https://www.entregaresultados.net/img/idimeTitulo_1.png" 
               src="https://www.entregaresultados.net/img/idimeTitulo_1.png" width="160px"/> 
               </td>
            </tr-->
            <tr>
               <td valign="top">
			   
El paciente <b>'.$nombre_paciente.'</b> ha solicitado el registro desde landingPage de   
<strong style="color: rgb(0, 172, 169);">Instituto de Diagnóstico Médico S.A.</strong>
<br><br>
<strong style="color: rgb(0, 172, 169);">DATOS DEL PACIENTE:</strong>
<br><br>
 <strong style="color: rgb(0, 172, 169);">NOMBRE: </strong>'.$nombre_paciente.'<br>
 <strong style="color: rgb(0, 172, 169);">NÚMERO DE DOCUMENTO: </strong>'.$numDocumento.'<br>
 <strong style="color: rgb(0, 172, 169);">TIPO DE DOCUMENTO: </strong>'.$tipoDocumento.'<br>
 <strong style="color: rgb(0, 172, 169);">CIUDAD: </strong>'.$ciudad.'<br>
 <strong style="color: rgb(0, 172, 169);">CORREO ELECTRÓNICO: </strong>'.$email_paciente.'<br>
 <strong style="color: rgb(0, 172, 169);">TELÉFONO: </strong>'.$numTelefono.'<br><br>
 <strong style="color: rgb(0, 172, 169);">AUTORIZA TRATAMIENTO DE DATOS: </strong>'.$chAutoriza.'<br>
 <strong style="color: rgb(0, 172, 169);">ACEPTA TERMINOS Y CONDICIONES: </strong>'.$chTerminos.'<br>
 <br><br>
Si tiene algún inconveniente, escribanos al correo electrónico: call.center@idime.com.co, donde con gusto lo atenderemos.
<br><br>
<strong style="color: rgb(0, 172, 169);"> PORQUE TU SALUD Y LA DE TU FAMILIA MERECEN TODA NUESTRA ATENCIÓN.</strong>
<br><br>
<strong style="color: rgb(0, 172, 169);"> INSTITUTO DE DIAGNÓSTICO MÉDICO</strong>
<br><br>
<strong style="color: rgb(0, 172, 169);">AVISO LEGAL:</strong>				  
                <p style="color: rgb(0, 0, 0);font-size:12px !Important;">
                Este correo electrónico es del Instituto de Diagnostico Medico S.A., y está destinado exclusivamente a 
                su destinatario quien deberá mantener reserva sobre el contenido, los datos o información de contacto del 
                remitente y en general sobre la información de este documento y/o archivos adjuntos a no ser que exista 
                una autorización explícita. Si cree que recibió este correo electrónico por error, le informamos que no 
                podrá usar, retener, imprimir, copiar, distribuir o hacer público su contenido,y deberá notificar a seguridad.
                informatica@idime.com.co de inmediato, elimínelo de su computadora y no lo copie ni lo divulgue a nadie más, 
                de lo contrario podría tener consecuencias legales, como las contenidas en la Ley 1273 de 2009 y las demás 
                que apliquen.El Instituto de Diagnóstico Médico S.A. le informa que sus datos personales serán tratados 
                conforme a la Ley 1581 de 2012 y reflejada en nuestra política de datos que podrá ser consultada en la página web.
                <br>Por último, el INSTITUTO DE DIAGNÓSTICO MÉDICO S.A. será el responsable del tratamiento de sus datos 
                personales conforme a la Ley 1581 de 2012 y reflejada en su Política de tratamiento de Datos la cual podrá 
                ser consultada en la página web.
                </p> 
<br><br>
<strong style="color: rgb(0, 172, 169);">LEGAL NOTICE: </strong>
                <p style="color: rgb(0, 0, 0);font-size:12px !Important;">
                This email is from Instituto de Diagnostico Medico S.A., and is exclusively for its recipient who must
                maintain the reservation on the content, data or contact information of the sender and in general on the
                information in this document and/or attachments, unless there is an explicit authorization. If you believe
                you received this email in error, we inform you cannot use, retain, print, copy, distribute or make your 
                content public, and you must notify to seguridad.informatica@idime.com.co immediately, remove it from your 
                computer and do not copy or disclose it to anyone else, otherwise it could have legal consequences, such 
                as those contained in Law 1273 of 2009 and the others that apply.The Institute of Diagnostic Medical S.A.  
                informs you that your personal data will be treated in accordance with Law 1581 of 2012 and reflected in 
                our data policy that can be consulted on the website. <br>Finally, the INSTITUTO DE DIAGNÓSTICO MÉDICO S.A 
                will be responsible for the processing of your personal data in accordance with Law 1581 of 2012 and 
                reflected in its Data Processing Policy which can be consulted on the website. 
                </p>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: '.$email_paciente . "\r\n" .
                      'Reply-To:  call.center@idime.com.co' . "\r\n";
	
        mail("janluy.moreno@idime.com.co", "Registro landing page de:".$nombre_paciente, $contenido, $cabeceras);
	header('Location: index.php?s=si');
				
    }                
?>
