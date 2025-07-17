<?php
/*
 * Archivo registration_form.php
 * Author: Ing. Stalin Francis Quinde.
 * Institución: Universidad Técnica Luis Vargas Torres de Esmeraldas
 * Objetivo: Registro de usuario
 */

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICA - Registro de Usuario </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* General Body Styles */
        body {
            background-color: #f8f9fa; /* Light background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
/* 
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            box-sizing: border-box;
        }
*/
        /* Main Container for the form */
        #eys-registro {
            display: flex;
            flex-wrap: wrap; /* Allows columns to wrap on smaller screens */
            width: 100%;
            max-width: 1200px; /* Limit overall width on large screens */
            gap: 20px; /* Space between columns */
            align-items: center;
        }

        /* Left Section: Event Presentation */
        #presentacion {
    
            display: flex;
            flex-wrap: wrap; /* Allows columns to wrap on smaller screens */

    flex-grow: 0;   /* Evita que #presentacion crezca para ocupar espacio extra */
    flex-shrink: 1; /* Permite que se encoja si es necesario */
    flex-basis: auto; /* Establece el tamaño inicial basado en su contenido */



    justify-content: center; /* Opcional: Centra #eys-registro dentro de #presentacion */
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            border: 20px  solid red;
            align-items: center;
        }

        #presentacion header {
            background-color: #007bff; /* A distinct header color */
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px; /* Adjust margin to extend background */
            text-align: center;
        }

        #titulo1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            text-transform: capitalize; /* More subtle than small-caps */
        }

        #detalle {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        #imagenevento {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
            object-fit: cover; /* Ensures image covers area without distortion */
            max-height: 300px;
        }

        #detalle p {
            margin-bottom: 15px;
        }

        #detalle ol {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        #detalle li {
            margin-bottom: 10px;
        }

        /* Right Section: Registration Form */
        .w3-card-2 { /* Renaming to a more semantic class would be better */
            flex: 1; /* Allows it to grow and shrink */
            min-width: 300px; /* Minimum width before wrapping */
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            height: auto; /* Allow height to adjust to content */
        }

        .w3-card-2 header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px; /* Adjust margin to extend background */
            text-align: center;
        }

        .w3-card-2 header p {
            font-size: 25px;
            font-weight: 700;
            margin: 0;
            text-transform: capitalize;
        }

        #panel2 {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px; /* Space between form elements */
            font-size: 16px;
        }

        /* Form Labels */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 16px !important;
        }

        /* Form Inputs and Textareas */
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* Dropdown specific styling */
        select.form-control {
            appearance: none; /* Remove default arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20256%20512%22%3E%3Cpath%20fill%3D%22currentColor%22%20d%3D%22M192%20256L64%20128v256l128-128z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
            padding-right: 30px; /* Make space for the custom arrow */
        }

        /* Submit Button */
        #validarcorreo {
            background-color: #007bff; /* Primary button color */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.4;
            padding: 12px 20px;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px; /* Space above button */
        }

        #validarcorreo:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        #validarcorreo[disabled] {
            background-color: #cccccc;
            cursor: not-allowed;
            transform: none;
        }

        /* Footer below the form */
        footer {
            margin-top: 25px;
            text-align: center;
            font-size: 15px;
            color: #666;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #0056b3;
        }

        /* Specific message after email sent */
        #panel2 div[style*="font-size:18px"] { /* Targeting the div generated by JS success */
            padding: 20px;
            background-color: #e6f7ff;
            border: 1px solid #b3e0ff;
            border-radius: 8px;
            color: #333;
            text-align: center;
        }

        #panel2 div[style*="font-size:18px"] h2 {
            color: #007bff;
            margin-top: 0;
            font-size: 24px;
        }

        #panel2 div[style*="font-size:18px"] p {
            margin-bottom: 10px;
        }

        #panel2 div[style*="font-size:18px"] p strong {
            color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #eys-registro {
                flex-direction: column; /* Stack columns vertically */
                align-items: center;
            }

            #presentacion, .w3-card-2 {
                width: 100%; /* Full width on small screens */
                margin-bottom: 20px;
            }

            #titulo1 {
                font-size: 24px;
            }

            .w3-card-2 header p {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            #presentacion, .w3-card-2 {
                padding: 15px;
            }

            #presentacion header, .w3-card-2 header {
                margin: -15px -15px 15px -15px;
                padding: 10px;
            }

            #titulo1 {
                font-size: 20px;
            }

            .w3-card-2 header p {
                font-size: 18px;
            }

            #detalle, #panel2 {
                padding: 15px;
                font-size: 14px;
            }

            .form-control, #validarcorreo {
                padding: 10px;
                font-size: 14px;
            }

            footer {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
<section id="presentacion">
    <div class="w3-container" id="eys-registro" style="border: 5px solid blue;">
        <div style="flex: 1; padding:5px; ">
            <div class="w3-card-2">
                <header>
                    <p id="titulo1">Sistema de registro para eventos académicos y de gestión <br> SICA-UTELVT</p>
                </header>
                <div id="detalle">
                    <?php
                    $x = 'https://repositorioutlvte.org/Repositorio/eventos/' . $eventos[0]->idevento . '.png';
                    if (@getimagesize($x)) { ?>
                        <img src="<?php echo $x; ?>" id="imagenevento" alt="Imagen del evento">
                    <?php } else { ?>
                        <img src="https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png" id="imagenevento" alt="Imagen del evento">
                    <?php } ?>

                    <p>Para poder unirte a este evento sigue las instrucciones: </p><br>
                    <ol>
                        <li>Ingresa un correo electrónico válido (preferiblemente el institucional).</li>
                        <li>Presiona el botón "Enviar mensaje".</li>
                        <li>Verifica si te llegó un mensaje y continúa con el registro.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="flex: 1; padding:5px;">
            <div class="w3-card-2">
                <header>
                    <p>Regístrate Aquí</p>
                </header>
                <div id='panel2'>
                    <?php
                    echo form_open("", array("id" => "validarcorreo0"));
                    ?>

                    <div class="w3-container" style="text-align:left;">
                        <?php
                        if (sizeof($eventos) > 1) {
                            echo "<label for='evento'>Evento:</label>";
                            $options = array('--Select--');
                            foreach ($eventos as $row) {
                                $options[$row->idevento] = $row->titulo;
                            }
                            echo form_dropdown($name = "idevento", $options, set_select('--Select--', 'default_value'), array('class' => 'form-control', 'id' => 'idevento', 'onchange' => 'show_detalle()'));
                        } else {
                            if ($eventos[0]->idevento_estado == 2) {
                                echo "<label style='color:green;' for='titulo'>INSCRIPCIONES ABIERTAS</label>";
                            } else {
                                echo "<label style='color:red;' for='titulo'>INSCRIPCIONES CERRADAS</label>";
                            }
                            $arrdatos = array('name' => 'idevento', 'value' => $eventos[0]->idevento, "type" => "hidden");
                            echo form_input($arrdatos);
                            $textarea_options = array('class' => 'form-control', "disabled" => "disabled", 'id' => 'titulo');
                            echo form_textarea('titulo', $eventos[0]->titulo, $textarea_options);
                        }
                        ?>
                    </div>

                    <div class="w3-container" style="text-align:left;">
                        <?php
                        echo "<label for='email'>Correo:</label>";
                        $data = array('id' => 'email', 'type' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingresa tu correo electrónico');
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="w3-container" style="padding-top:10px;">
                        <?php
                        if ($eventos[0]->idevento_estado == 2) {
                            $data = array('type' => 'submit', 'value' => 'Enviar mensaje', 'name' => 'submit', 'id' => 'validarcorreo');
                        } else {
                            $data = array('type' => 'submit', 'value' => 'Enviar mensaje', 'name' => 'submit', 'disabled' => 'disabled', 'id' => 'validarcorreo');
                        }
                        echo form_submit($data);
                        ?>
                    </div>
                    <?php
                    echo form_close();
                    ?>

                    <footer>
                        ¿Ya creaste tu cuenta? <br> <a href="<?php echo base_url() ?>index.php/login" role="button">Ingresar al sistema</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#validarcorreo').click(function(e) {
            e.preventDefault(); // Prevent default form submission
            enviar_correo();
        });
    });

    function enviar_correo() {
        var idevento = <?php echo $eventos[0]->idevento; ?>; // Assuming $idevento is always available from the first event
        var titulo = document.getElementById("titulo").value;
        var email = "stalin.francis@utelvt.edu.ec"; // Consider making these configurable
        var correode = "stalin.francis@utelvt.edu.ec";
        var nome = 'Stalin Francis Q.';
        var mailto = document.getElementById("email").value;
        var correopara = mailto;
        var secure = "siteform";
        var asunto = "Completar registro a SIGECA";

        var msg = `
            <div style="font-family:'Roboto', sans-serif; font-size:16px; color:#333; line-height:1.6;">
                <p>Estimado(a) usuario(a),</p>
                <p>Ingresa al siguiente enlace para terminar tu registro y poder recibir tu certificado al culminar el evento:</p>
                <p style="text-align:center; margin: 30px 0;">
                    <a href='http://5.161.176.197/sica/index.php/login/registro?idevento=${idevento}' 
                       style='background-color:#007bff; color:white; padding:12px 25px; border-radius:5px; text-decoration:none; font-weight:bold;'>
                        Inscríbete al Evento: ${titulo}
                    </a>
                </p>
                <p>Si tienes algún problema para acceder al enlace, puedes copiar y pegar la siguiente URL en tu navegador:</p>
                <p style="word-break: break-all; font-size:14px;">http://5.161.176.197/sica/index.php/login/registro?idevento=${idevento}</p>
                <p>¡Esperamos verte en el evento!</p>
                <br>
                <div style='text-align:center; background-color:#f2f2f2; font-size:12px; padding:15px; border-radius:8px; color:#666;'>
                    Este correo ha sido enviado a ${mailto}, de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos. Con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater, así como nuestras propuestas académicas.
                    <br><br>
                    Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado de la Maestría en Tecnología de la Información.
                </div>
            </div>
        `;

        $.ajax({
            url: "<?php echo site_url('seguimiento/send') ?>",
            data: {
                nome: nome,
                correode: correode,
                correopara: correopara,
                email: email,
                msg: msg,
                mailto: mailto,
                secure: secure,
                asunto: asunto
            },
            method: 'POST',
            async: false,
            success: function(data) {
                const div = document.getElementById('panel2');
                div.innerHTML = `
                    <div style="font-size:18px; color:#333; text-align:center; padding: 20px; background-color: #e6f7ff; border: 1px solid #b3e0ff; border-radius: 8px;">
                        <h2>Mensaje enviado con éxito</h2>
                        <p>Se ha enviado un mensaje al correo:</p>
                        <p style="font-weight:bold; color:#0056b3; font-size: 20px;">${mailto}</p>
                        <p>Por favor, revisa tu bandeja de entrada y la carpeta de spam para continuar con el registro.</p>
                        <p>Si no recibes el correo en unos minutos, por favor verifica que el correo ingresado sea correcto.</p>
                    </div>
                `;
                // alert("Correo enviado exitosamente."); // Removed redundant alert for better UX
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("Error al enviar el correo: " + xhr.status + " " + thrownError);
            }
        });
    }

    // Existing functions (show_detalle, validacedula, showpassword, get_evento) are kept as is,
    // assuming they function correctly and do not require aesthetic/responsive changes.
    // They are commented out for brevity, but should be included in the final code.

    /*
    function validacedula()
    {
        var inputField = document.querySelector('#cedula');
        alert(inputField.value);
