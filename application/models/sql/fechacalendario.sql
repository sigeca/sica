-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc41.remi
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2025 a las 02:04:23
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educayso_facae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechacalendario`
--

CREATE TABLE `fechacalendario` (
  `idfechacalendario` int(11) NOT NULL,
  `fechacalendario` date DEFAULT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `idcalendarioacademico` int(11) DEFAULT NULL,
  `hito` tinyint(4) DEFAULT 0,
  `idestadoactividad` int(11) DEFAULT 1,
  `resultados` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `fechacalendario`
--

INSERT INTO `fechacalendario` (`idfechacalendario`, `fechacalendario`, `actividad`, `detalle`, `idcalendarioacademico`, `hito`, `idestadoactividad`, `resultados`) VALUES
(1, '2022-08-08', 'Inauguracion del ciclo', 'Inauguracion del ciclo', 1, 0, 1, NULL),
(2, '2022-08-09', 'Clases ', 'Clases', 1, 0, 1, NULL),
(3, '2022-08-10', 'Clases', 'Clases academicas', 1, 0, 1, NULL),
(4, '2022-08-11', 'Clases', 'Clases', 1, 0, 1, NULL),
(5, '2022-08-12', 'Clases', 'Clases academicas', 1, 0, 1, NULL),
(6, '2023-01-02', 'Clase', 'Clase', 1, 0, 1, NULL),
(7, '2023-01-03', 'Clase', 'Clase', 1, 0, 1, NULL),
(8, '2023-01-16', 'Inauguracion del ciclo', 'inauguracion del ciclo', 2, 0, 1, NULL),
(9, '2023-01-17', 'Clases actividades formativas', 'Clases actividades formativas', 2, 0, 1, NULL),
(10, '2023-01-06', 'Prueba del sistema', 'Prueba del sistema', 1, 0, 1, NULL),
(11, '2023-01-18', 'Clases actividades formativas', 'Clases actividades formativas', 2, 0, 1, NULL),
(12, '2023-01-20', 'Luto por la muerte de Nelson Castillo', 'Luto por la muerte de Nelson Castillo', 2, 0, 1, NULL),
(13, '2023-01-07', 'NOTA DEL EXAMEN DE INGRESO', 'NOTA DEL EXAMEN DE INGRESO', 3, 1, 1, NULL),
(14, '2023-01-08', 'ACCIÓN AFIRMATIVA', 'ACCIÓN AFIRMATIVA', 3, 0, 1, NULL),
(15, '2022-10-04', 'SEMANA DE EXAMEN', 'SEMANA DE EXAMEN', 1, 1, 1, NULL),
(16, '2022-11-30', 'EXAMEN 2DO PARCIAL', 'EXAMEN 2DO PARCIAL', 1, 1, 1, NULL),
(17, '2023-01-06', 'Inscripcion', 'Incripcion', 3, 0, 1, NULL),
(18, '2023-01-09', 'Nota del Bachillerato', 'Nota del Bachillerato', 3, 1, 1, NULL),
(19, '2023-01-19', 'Inscripción', 'Inscripción', 3, 0, 1, NULL),
(20, '2023-01-20', 'Inscripción', 'Inscripción', 3, 0, 1, NULL),
(21, '2023-01-19', 'Luto por la muerto de Nelson Castillo', 'Luto por la muerto de Nelson Castillo el miercoles 18 de enero del 2023  a la 17:00 horas', 2, 0, 1, NULL),
(22, '2023-03-20', 'toma perimer parcial', 'toma perimer parcial', 2, 1, 1, NULL),
(23, '2023-05-19', 'Asentaminto 2do parcial', 'Asentaminto 2so parcial', 2, 0, 1, NULL),
(24, '2024-01-01', 'Asentaminto 2do parcial', 'Asentaminto 2do parcial', 3, 1, 1, NULL),
(25, '2023-05-15', 'Examen 2do parcial', 'Examen 2do parcial', 2, 1, 1, NULL),
(26, '2023-09-27', 'Fin de la evaluación primer parcial', 'Fin de la evaluación primer parcial', 5, 1, 1, NULL),
(27, '2023-11-27', 'Fin de evaluacion 2do parcial', 'Fin de evaluacion 2do parcial', 5, 1, 1, NULL),
(28, '2023-11-30', 'Fin de los examen de recuperacion', 'Fin de los examen de recuperacion', 5, 1, 1, NULL),
(29, '2024-08-01', 'Inauguración periodo lectivo 2024-1S', 'se le realiza en la explanada de la facultad asistieron decano, direcotries de escuela docente', 10, 1, 5, NULL),
(30, '2024-09-02', 'Toma exeman complexivo componente práctico', 'Toma exeman complexivo componente práctico  cohorte 2023-1S', 9, 1, 1, NULL),
(31, '2024-08-20', 'Ejecución del trabajo de integración curricular [art 33 RFUIC]', 'Los estudiantes que tomaron la modalidad de trabajo de integración curricular deberán iniciar el proceso desde el 20 de agosto del 2024  y deberan terminar su trabajo de integración curricular máximo hasta del 20 septiembre del 2024, junto con la aprobaci', 10, 0, 3, ''),
(32, '2024-09-23', 'Informe favorable del tutor trabajos cohorte 2023-2s', 'Desde este fecha los docente tutores comenzaran a entregar los informes favorables sobre los trabajore revisados  este proceso dura hasta el 25 de septiembre del 2024', 10, 0, 1, ''),
(33, '2024-09-26', 'Solicitud de fecha y hora para la sutentación (Art 39 no 1 RFUIC)', 'entre el 26 y 27 de septiembre se solicita la fecha de sustentación ante el consejo de facultad', 10, 0, 1, NULL),
(34, '2024-08-27', 'Reunión para entrega de matrices de ajustes curriculares no sustantivos.', 'Lugar: Oficina Dirección General Académica, hora: 10:00 a.m :: con la finalidad de que puedan realizar el llenado\r\ncorrecto y la entrega respectiva de las matrices de ajustes curriculares no sustantivos de la\r\nFacultad de Ingeniería, convoca a ustedes a una reunión de trabajo a efectuar', 10, 0, 5, 'Se trabajo con Alejandro Macias y se corrigieron los 3 archivos en word que Felix envio para ser llenado, al siguiente día se envio los 3 archivo por quipux a Felix Preciado'),
(35, '2024-08-19', 'Reporte de las fuentes de información al repositorio digital.', 'Esta actividad consiste en llenar el repositorio digital compartido por el departamente de Aseguramiento de la Calidad hasta el 30 del agosto 2024\r\nhttps://drive.google.com/drive/folders/1NBDto08wtkFhcJavmudRs-QhAhiIZ2PP?usp=sharing ', 10, 0, 3, ''),
(36, '2024-09-23', 'Recepción de examen de carácter complexivo: componente teórico cohorte 2023-IIS', 'Segun el Artículo 17 y 18 RFUIC, se recetar el examen compleximo componente teórico  para la cohoerte 2023-2S', 10, 0, 1, NULL),
(37, '2024-09-02', 'Desarrollo de las tutorias para examen complexivo cohorte 2023-2S', 'Desarrollo de las tutorias de preparación y trabajo autónomo para el examen de caracter complexivo que deberan tomar los estudiantes de la cohorte 2023-2S, lo docente probables son \r\nJonathan Cardenas --> Programación\r\nJose Argandoña--> Auditoria Informática\r\nViviana Aparicio--> Redes\r\nGuillermo Cedeño --> Inteligencia Artificial\r\nJimmy Ramieres --> Ingenieria de Software', 10, 0, 1, ''),
(38, '2024-09-02', 'Recepción de examen complexivo componente práctico cohorte 2023-1S', 'Recepción de examen complexivo componente práctico cohorte 2023-1S', 10, 0, 1, NULL),
(39, '2024-08-27', 'Convocatoria a reunión de trabajo investigación', 'Lugar:  Sala de profesores de la FACI \r\nFecha:  Martes 27 de agosto de 2024 \r\nHora:  10:30 am \r\n  Orden del día\r\n Cálculo para la distribución de horas de investigación y vinculación en el\r\ndistributivo individual docente', 10, 0, 5, 'Manuel Quiñonez explicó como debe llenarse en distributivo individual enfatizando que al final del ciclo debe presentar la evidencias de la horas programadas.'),
(40, '2024-08-06', 'Entrega de reactivos para examen complexivo cohorte 2023-2S', 'Entrega de los reactivos para el examen de carácter complexivo, componente teórico y Componente práctico Arti 16 RFUIC', 10, 0, 6, ''),
(41, '2024-09-30', 'Inicio de asentamiento de calificaciones del 1er parcial', 'Inicio de asentamiento de calificaciones del 1er parcial', 10, 0, 5, 'Se asento las calificaciones sin ningun inconveniente y en la fecha reglamentaria'),
(42, '2024-10-02', 'final de asentamiento de calificaciones del 1er parcial', 'final de asentamiento de calificaciones del 1er parcial', 10, 0, 1, ''),
(43, '2024-09-18', 'Inicio Evaluación integral de desempeño docente RCE Art. 92,93,94,95 y 96', 'Evaluación integral de desempeño docente RCE Art. 92,93,94,95 y 96', 10, 0, 1, ''),
(44, '2024-10-02', 'Final Evaluación integral de desempeño docente RCE Art. 92,93,94,95 y 96', 'Final Evaluación integral de desempeño docente RCE Art. 92,93,94,95 y 96', 10, 0, 1, ''),
(45, '2024-11-05', 'SESIÓN ORDINARIA del H. Consejo de la FACI', 'ORDEN DEL DIA\r\n1.- FIJAR FECHA DE SUSTENTACIÓN, DE LOS TRABAJOS DE INTEGRACIÓN CURRICULAR  CARRERA QUIMICA, ELECTRICA Y TECNOLOGÍA DE LA INFORMACIÓN.\r\n2.- CONOCIMIENTO DE LOS INFORMES DE LA COMISIÓN ACADEMICAFORMATIVA.', 10, 0, 5, 'SE EJECUTO CON NORMALIDAD'),
(46, '2024-12-06', 'Sesión Ordinaria  de Consejo de Facultad', 'Sesión Ordinaria  de Consejo de Facultad (10:00)', 10, 0, 5, 'se aprobo sustentación para estudiantes de quimica y electri no presenta la documentación completa los tutories no presentarion informes '),
(47, '2024-11-12', 'Feria cientifica Faci 2024', 'Feria cientifica Faci 2024', 10, 0, 5, ''),
(48, '2024-11-11', 'Jornada de conferencia \"Mirada sobre la ciencia de ingenieras e ingenieros\"', 'Jornada de conferencia \"Mirada sobre la ciencia de ingenieras e ingenieros\"', 10, 0, 5, ''),
(49, '2024-10-30', 'Casa abierta Unidad Educatica Pedro Cornelio Drouet', 'Casa abierta Unidad Educatica Pedro Cornelio Drouet', 10, 0, 5, ''),
(50, '2024-12-12', 'Incorporación de Ingenieros en Tecnología de la Información cohorte 2023-1S', 'Incorporación de Ingenieros en Tecnología de la Información cohorte 2023-1S', 10, 0, 5, ''),
(51, '2025-02-20', 'Elaboración de los reactivos para el examen de carácter complexivo', 'Elaboración de los reactivos para el examen de carácter complexivo, componente teorico(20\r\ncomplejidad media, 30 complejidad alta. unidad profesional) y componente práctico (20\r\ncomplejidad media, 30 complejidad alta. unidad profesional) Art. 16 RFUIC', 12, 0, 1, ''),
(52, '2025-01-27', 'Inscripción a la unidad de integracion curricular (Art. 12 RFUIC)', 'Inscripción a la unidad de integracion curricular (Art. 12 RFUIC)', 12, 0, 1, ''),
(53, '2025-01-22', 'Matrículas carrera en Tecnología de la Información', 'Matrículas Matrículas carrera en Tecnología de la Información', 12, 0, 5, 'AL 2 de febrero 2025<br>\r\n\r\nPrimero : 72<br>\r\nSegundo: 46<br>\r\nTercero: 52<br>\r\nCuarto: 41<br>\r\nQuinto: 63<br>\r\nSexo: 46<br>\r\nSeptimo: 50<br>\r\nOctavo: 52<br>\r\nNoveno: 65<br>\r\n<b>Total: 487</b><br>\r\nSNNA: 80<br>'),
(54, '2025-01-22', 'Entrega de silabos y planes semestrales y distributivo individual CTI', 'Entrega de silabos y planes semestrales y distributivo individual CTI', 12, 0, 2, ''),
(55, '2025-01-21', 'Recepción de solicitudes: el estudiante presenta la solicitud al Decano con la documentación justificativa ', 'Recepción de solicitudes: el estudiante presenta la solicitud al Decano con la documentación justificativa, inicia el 21-enero-2025  termina 27-enero-2025', 12, 0, 5, 'Se firmo y  entrego las solicitudes para el consejo de facultad'),
(56, '2025-01-29', 'Primera reunión del consejo de faculta 2024-2S', 'Primera reunión del consejo de faculta 2024-2S  a las 10:am\r\n', 12, 0, 5, 'Conocimiento y analisis de aprobados y movilidad estudiantil de las carrera de fal facultad de ingenieriias periodos 2024-2s'),
(57, '2025-02-05', 'Inauguracion ciclo academico 2024-2s', 'Inauguracion ciclo academico 2024-2s', 12, 0, 1, ''),
(58, '2025-02-03', 'Reunión de trabajo con Secretaria Genera', 'Reunión de trabajo con Secretaria Genera <br>\r\nFECHA:  Lunes, 03 de febrero de 2025 <br>\r\nHORA:  15:30 <br>\r\nFACULTAD:  FACI <br>\r\nPARTICIPANTES:  Directores de las carreras, secretarias/os de todas las carreras y\r\nSecretario/a Abogado/a<br>', 12, 0, 1, ''),
(59, '2025-02-03', 'Convocatoria a Reunión de trabajo Virtual Vicerrectorado', 'Convocatoria a Reunión de trabajo Virtual\r\nFecha:  Lunes 03 de febrero de 2025 <br>\r\nHora:    19:00 <br>\r\nEnlace: https://meet.google.com/qdj-cucs-gid <br>', 12, 0, 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fechacalendario`
--
ALTER TABLE `fechacalendario`
  ADD PRIMARY KEY (`idfechacalendario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fechacalendario`
--
ALTER TABLE `fechacalendario`
  MODIFY `idfechacalendario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
