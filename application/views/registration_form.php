<?php
/*
 * Archivo registration_form.php
 * Author: Ing. Stalin Francis Quinde.
 * Institución: Universidad Técnica Luis Vargas Torres de Esmeraldas
 * Objetivo: Registro de usuario
 */

// Assuming CodeIgniter's base_url() and site_url() are available.
// Also assuming $eventos, $sexos, and $paises are passed to this view.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - CTI-UTELVT</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #presentacion {
            padding: 20px;
        }

        #eys-registro {
            display: flex;
            flex-wrap: wrap; /* Allows items to wrap on smaller screens */
            justify-content: center; /* Center items horizontally */
            gap: 20px; /* Space between the two main columns */
            max-width: 1200px; /* Max width for the container */
            margin: auto; /* Center the container */
        }

        #eys-registro > div {
            flex: 1; /* Allows flex items to grow and shrink */
            min-width: 300px; /* Minimum width for each column before wrapping */
            box-sizing: border-box; /* Include padding in width calculation */
            padding: 10px;
        }

        /* Left Column - Event Details */
        .event-details-column {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        #titulo1 {
            font-variant: small-caps;
            font-weight: bold;
            font-family: 'Times New Roman', serif;
            font-size: 28px; /* Adjusted for better responsiveness */
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        #imagenevento {
            width: 100%;
            height: auto;
            max-height: 400px; /* Limit image height */
            object-fit: contain; /* Ensures image fits within its content box without cropping or stretching */
            border-radius: 5px;
            margin-bottom: 20px;
        }

        #detalle {
            padding: 0px 10px;
            font-size: 0.9em; /* Relative font size */
            color: #555;
        }

        #detalle ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        #detalle li {
            margin-bottom: 8px;
        }

        .red-text {
            color: red;
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Right Column - Registration Form */
        .registration-form-column {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden; /* Contains child elements with padding */
        }

        .registration-form-column header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            font-variant: small-caps;
            font-weight: bold;
            font-family: 'Times New Roman', serif;
            font-size: 22px;
        }

        .form-content {
            padding: 20px 30px; /* Adjusted padding */
            font-size: 0.85em; /* Adjusted font size */
        }

        .form-group {
            margin-bottom: 15px; /* Spacing between form groups */
        }

        .form-group label {
            display: block; /* Make labels take full width */
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            font-size: 1em;
        }

        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        textarea.form-control {
            resize: vertical; /* Allow vertical resizing for textareas */
        }

        .error_msg {
            color: red;
            font-size: 0.85em;
            margin-top: 5px;
        }

        .status-message {
            text-align: left;
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .status-open {
            color: green;
        }

        .status-closed {
            color: red;
        }

        .submit-button {
            background-color: #4CAF50;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            font-size: 18px; /* Slightly larger */
            font-weight: bold;
            line-height: 1.4;
            padding: 12px; /* Increased padding */
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .submit-button:hover:not(:disabled) {
            background-color: #45a049;
        }

        .submit-button:disabled {
            background-color: #a0a0a0;
            cursor: not-allowed;
        }

        .login-link-footer {
            font-size: 1em;
            padding-top: 15px;
            text-align: center;
        }

        .login-link-footer a {
            color: #f44336; /* Red color for emphasis */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-link-footer a:hover {
            color: #d32f2f;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            #titulo1 {
                font-size: 24px;
            }

            .registration-form-column header {
                font-size: 20px;
            }

            .form-content {
                padding: 15px 20px;
            }

            .submit-button {
                font-size: 16px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            #eys-registro > div {
                min-width: unset; /* Remove min-width to allow full flexibility */
                width: 100%; /* Take full width on very small screens */
            }

            #titulo1 {
                font-size: 20px;
            }

            .registration-form-column header {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<section id="presentacion">
    <div class="w3-container" id="eys-registro">

        <div class="event-details-column">
            <header class="w3-container">
                <p id="titulo1">Sistema de registro para eventos académicos y de gestión <br> CTI-UTELVT</p>
            </header>
            <div id="detalle">
                <?php
                $image_src = 'https://repositorioutlvte.org/Repositorio/eventos/' . $eventos[0]->idevento . '.png';
                // Check if the image exists, otherwise use a default one
                if (@getimagesize($image_src)) { // Using @ for brevity, better to use cURL or file_exists for production
                    ?>
                    <img src="<?php echo $image_src; ?>" id="imagenevento" alt="Imagen del evento">
                <?php } else { ?>
                    <img src="https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png" id="imagenevento"
                         alt="Imagen del evento por defecto">
                <?php } ?>

                <p>Para poder unirte a este evento sigue las instrucciones: </p><br>
                <ol>
                    <li> Verifica si el evento está en etapa de Inscripción.</li>
                    <li> Ingresa tus datos personales y de contacto solicitados.</li>
                    <li> <span class="red-text">Todos los datos deben ser ingresados.</span></li>
                    <li> Finalmente guarda los datos y estás listo para ingresar a nuestra plataforma.</li>
                </ol>
            </div>
        </div>

        <div class="registration-form-column w3-card-2">
            <header class="w3-container">
                <p>Regístrate Aquí</p>
            </header>
            <div class="form-content">
                <?php echo form_open('login/new_user_registration'); ?>

                <div class="form-group">
                    <?php if (sizeof($eventos) > 1) { ?>
                        <label for="idevento">Evento:</label>
                        <?php
                        $options = ['' => '--Selecciona un evento--']; // Added a default empty option
                        foreach ($eventos as $row) {
                            $options[$row->idevento] = $row->titulo;
                        }
                        echo form_dropdown('idevento', $options, set_select('idevento', ''), ['class' => 'form-control', 'id' => 'idevento', 'onchange' => 'show_detalle()']);
                        ?>
                    <?php } else { ?>
                        <div class="status-message <?php echo ($eventos[0]->idevento_estado == 2) ? 'status-open' : 'status-closed'; ?>">
                            <?php echo ($eventos[0]->idevento_estado == 2) ? 'INSCRIPCIONES ABIERTAS' : 'INSCRIPCIONES CERRADAS'; ?>
                        </div>
                        <?php
                        echo form_input(['name' => 'idevento', 'value' => $eventos[0]->idevento, 'type' => 'hidden']);
                        $textarea_options = ['class' => 'form-control', 'disabled' => 'disabled', 'style' => 'height:100px !important;', 'id' => 'titulo'];
                        echo form_textarea('titulo', $eventos[0]->titulo, $textarea_options);
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <?php
                    $cedula_attr = ['id' => 'cedula', 'name' => 'cedula', 'maxlength' => '10', 'class' => 'form-control'];
                    if ($eventos[0]->idevento_estado != 2) {
                        $cedula_attr['disabled'] = 'disabled';
                    }
                    echo form_input($cedula_attr);
                    ?>
                    <?php if (isset($message_display)) {
                        echo '<div class="error_msg">' . $message_display . '</div>';
                    } ?>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <?php
                    $apellidos_attr = ['id' => 'apellidos', 'name' => 'apellidos', 'class' => 'form-control'];
                    if ($eventos[0]->idevento_estado != 2) {
                        $apellidos_attr['disabled'] = 'disabled';
                    }
                    echo form_input($apellidos_attr);
                    ?>
                    <?php if (isset($message_display)) {
                        echo '<div class="error_msg">' . $message_display . '</div>';
                    } ?>
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <?php
                    $nombres_attr = ['id' => 'nombres', 'name' => 'nombres', 'class' => 'form-control'];
                    if ($eventos[0]->idevento_estado != 2) {
                        $nombres_attr['disabled'] = 'disabled';
                    }
                    echo form_input($nombres_attr);
                    ?>
                    <?php if (isset($message_display)) {
                        echo '<div class="error_msg">' . $message_display . '</div>';
                    } ?>
                </div>

                <div class="form-group">
                    <label for="email">Correo:</label>
                    <?php
                    $email_attr = ['id' => 'email', 'type' => 'email', 'name' => 'email', 'class' => 'form-control', 'required' => 'required'];
                    echo form_input($email_attr);
                    ?>
                </div>

                <div class="form-group">
                    <label for="idsexo">Sexo:</label>
                    <?php
                    $sexo_options = ['' => '--Selecciona tu sexo--'];
                    foreach ($sexos as $row) {
                        $sexo_options[$row->idsexo] = $row->nombre;
                    }
                    echo form_dropdown('idsexo', $sexo_options, set_select('idsexo', ''), ['class' => 'form-control', 'id' => 'idsexo', 'required' => 'required']);
                    ?>
                </div>

                <div class="form-group">
                    <label for="fechanacimiento">Fecha de nacimiento:</label>
                    <?php
                    $fecha_nac_attr = ['id' => 'fechanacimiento', 'type' => 'date', 'name' => 'fechanacimiento', 'class' => 'form-control', 'required' => 'required'];
                    echo form_input($fecha_nac_attr);
                    ?>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <?php
                    $telefono_attr = ['id' => 'telefono', 'type' => 'text', 'name' => 'telefono', 'class' => 'form-control', 'required' => 'required'];
                    echo form_input($telefono_attr);
                    ?>
                </div>

                <div class="form-group">
                    <label for="idpais">País:</label>
                    <?php
                    $pais_options = ['' => '--Selecciona tu país--'];
                    foreach ($paises as $row) {
                        $pais_options[$row->idpais] = $row->nombre;
                    }
                    echo form_dropdown('idpais', $pais_options, set_select('idpais', ''), ['class' => 'form-control', 'id' => 'idpais', 'required' => 'required']);
                    ?>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <?php
                    echo form_password(['id' => 'password', 'name' => 'password', 'class' => 'form-control', 'required' => 'required']);
                    ?>
                </div>

                <div class="form-group">
                    <label for="password2">Repita contraseña:</label>
                    <?php
                    echo form_password(['id' => 'password2', 'name' => 'password2', 'class' => 'form-control', 'required' => 'required']); // Changed name to password2 for separate validation if needed
                    ?>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="showPasswordCheckbox" onclick="togglePasswordVisibility()"> &ensp; Mostrar contraseña
                </div>

                <div class="form-group">
                    <?php
                    $submit_data = [
                        'type'  => 'submit',
                        'value' => 'Guardar datos',
                        'name'  => 'submit',
                        'class' => 'submit-button'
                    ];
                    if ($eventos[0]->idevento_estado != 2) {
                        $submit_data['disabled'] = 'disabled';
                    }
                    echo form_submit($submit_data);
                    ?>
                </div>
                <?php echo form_close(); ?>

                <footer class="login-link-footer">
                    ¿Ya creaste tu cuenta? <br>
                    <a href="<?php echo base_url(); ?>index.php/login" role="button">Ingresar al sistema</a>
                </footer>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Prevent non-numeric input for cedula
        $('#cedula').on('keydown', function(event) {
            if (isNaN(event.key) && event.key !== 'Backspace' && event.key !== 'Tab' && event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
                event.preventDefault();
            }
        });

        // Call get_datos when cedula field has 10 digits
        $('#cedula').on('keyup', function() {
            if (this.value.length === 10) {
                get_datos();
            }
        });
    });

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var password2Field = document.getElementById("password2");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            password2Field.type = "text";
        } else {
            passwordField.type = "password";
            password2Field.type = "password";
        }
    }

    // Fetches user data based on cedula
    function get_datos() {
        var cedula = $('#cedula').val();
        $.ajax({
            url: "<?php echo site_url('persona/get_datos'); ?>",
            data: { cedula: cedula },
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    $('#nombres').val(data[0].nombres);
                    $('#apellidos').val(data[0].apellidos);
                    $('#fechanacimiento').val(data[0].fechanacimiento);
                    $('#email').val(data[0].correo);
                    $('#telefono').val(data[0].telefono);
                } else {
                    // Clear fields if no data found for the cedula
                    $('#nombres').val('');
                    $('#apellidos').val('');
                    $('#fechanacimiento').val('');
                    $('#email').val('');
                    $('#telefono').val('');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error("Error fetching data:", xhr.status, thrownError);
                // Optionally show a user-friendly message
                // alert("Error al obtener datos. Por favor, intente de nuevo.");
            }
        });
    }

    // Populates event details when a different event is selected
    function show_detalle() {
        var idevento = $('#idevento').val();
        if (idevento === '' || idevento === '0') { // Handle "Select event" option
            $('#titulo').val(''); // Clear title if "select" is chosen
            $('#detalle').html('<p>Para poder unirte a este evento sigue las instrucciones: </p><br><ol><li> Verifica si el evento esta en etapa de Inscripción.  </li><li> Ingresa tus datos personales y de contacto solicitados.  </li><li> <span style="color:red; font-size:30px;">Todos los datos deben ser ingresados.</span>  </li><li> Finalmente guarda los datos y estas listo para ingresar a nuestra plaforma.  </li></ol>'); // Reset instructions
            $('#imagenevento').attr('src', 'https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png'); // Reset image
            return;
        }

        $.ajax({
            url: "<?php echo site_url('evento/get_evento2'); ?>",
            data: { idevento: idevento },
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    $('#titulo1').text("Sistema de registro para eventos académicos y de gestión \n CTI-UTELVT"); // Keep original title or adjust as needed
                    $('#detalle').html('<p>' + data[0].detalle + '</p>'); // Assuming 'detalle' is the rich text description
                    var eventImageSrc = 'https://repositorioutlvte.org/Repositorio/eventos/' + data[0].idevento + '.png';
                    // Check if image exists before setting (requires server-side check or a more robust client-side check)
                    // For now, assuming direct link is okay or will fallback
                    $('#imagenevento').attr('src', eventImageSrc);

                    // Update form fields based on event status if needed.
                    // This logic might need to be refined based on how you want the form to behave
                    // when selecting different events and their statuses.
                    var isEventOpen = (data[0].idevento_estado == 2);
                    if (isEventOpen) {
                        $('input, select, textarea, .submit-button').not('#titulo').prop('disabled', false);
                        $('.status-message').text('INSCRIPCIONES ABIERTAS').removeClass('status-closed').addClass('status-open');
                    } else {
                        $('input, select, textarea, .submit-button').not('#titulo').prop('disabled', true);
                        $('.status-message').text('INSCRIPCIONES CERRADAS').removeClass('status-open').addClass('status-closed');
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error("Error fetching event details:", xhr.status, thrownError);
                // alert("Error al obtener detalles del evento. Por favor, intente de nuevo.");
            }
        });
    }

    // Note: get_evento() function seems to be for populating event dropdown based on institution,
    // but there's no institution dropdown in the current form.
    // If it's intended to be used, you'll need to add the 'idinstitucion' field.
    /*
    async function get_evento() {
        var idinstitucion = $('select[name=idinstitucion]').val();
        $.ajax({
            url: "<?php //echo site_url('evento/get_evento'); ?>",
            data: { idinstitucion: idinstitucion },
            method: 'POST',
            async: false, // Avoid synchronous calls
            dataType: 'json',
            success: function(data) {
                var html = '<option value="">--Selecciona un evento--</option>'; // Default option
                $.each(data, function(i, item) {
                    html += '<option value="' + item.idevento + '">' + item.titulo + '</option>';
                });
                $('#idevento').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error("Error fetching events:", xhr.status, thrownError);
            }
        });
    }
    */
</script>

</body>
</html>
