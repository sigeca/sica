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
