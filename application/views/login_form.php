<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICA - Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            max-width: 450px; /* Max width for the card */
            width: 100%;
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            overflow: hidden; /* Ensures border-radius applies to header */
        }
        .login-header {
            background-color: #4CAF50; /* Green from your original */
            color: white;
            padding: 20px;
            text-align: center;
        }
        .login-header h1 {
            font-size: 1.8rem; /* Responsive font size */
            font-weight: bold;
            font-family: 'Times New Roman', serif; /* Keep original font style */
            margin-bottom: 0;
            text-transform: small-caps;
        }
        .login-body {
            padding: 30px;
            background-color: white;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-custom {
            background-color: #4CAF50;
            border: none;
            border-radius: 8px; /* Slightly more rounded */
            padding: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            width: 100%; /* Full width button */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }
        .btn-custom:hover {
            background-color: #45a049; /* Darker green on hover */
            color: white; /* Ensure text remains white */
        }
        .error-msg {
            color: #dc3545; /* Bootstrap's danger color */
            font-size: 0.875em;
            margin-top: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
        .form-check-input {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card login-card">
        <header class="login-header">
            <h1>CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN</h1>
        </header>
        <div class="card-body login-body">
            <?php
            // PHP messages for logout and general display
            if (isset($logout_message)) {
                echo "<div class='alert alert-info text-center' role='alert'>";
                echo $logout_message;
                echo "</div>";
            }
            if (isset($message_display)) {
                echo "<div class='alert alert-success text-center' role='alert'>";
                echo $message_display;
                echo "</div>";
            }
            ?>

            <?php echo form_open('login/user_login_process', ['class' => 'needs-validation', 'novalidate' => '']); ?>
            <?php
            // Error messages from validation or backend
            echo "<div class='error-msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors(); // Assuming this outputs HTML
            echo "</div>";
            ?>

            <div class="mb-3">
                <label for="email" class="form-label">Usuario (correo):</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                <div class="invalid-feedback">
                    Por favor, introduce tu correo.
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback">
                    Por favor, introduce tu contraseña.
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="showPassword" onclick="showpassword()">
                <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
            </div>

            <div class="d-grid gap-2 mt-4">
                <?php
                $data = array(
                    'type'  => 'submit',
                    'value' => 'Ingresar',
                    'name'  => 'submit',
                    'class' => 'btn btn-custom' // Use custom class for styling
                );
                echo form_submit($data);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <footer class="card-footer text-center bg-light py-3">
            </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    // JavaScript for "Mostrar contraseña" functionality
    function showpassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    // You can keep your get_evento() function if it's used elsewhere,
    // but it seems unrelated to the login form's direct functionality.
    /*
    async function get_evento() {
        var correo = $('select[name=correo]').val(); // Note: This uses jQuery, ensure it's loaded
        var password = $('select[name=password]').val();
        $.ajax({
            url: "<?php echo site_url('password/get_evento'); ?>",
            data: {correo:correo, password:password},
            method: 'POST',
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                html += '<option value='+'0'+'>'+'Nada seleccionado'+'</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].idevento+'>'+data[i].titulo+'</option>';
                }
                $('#idevento').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
    */
</script>
</body>
</html>
