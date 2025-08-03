<?php
// No longer needs to write to file, directly renders content
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Stalin Francis Quinde">
    <meta name="generator" content="Hugo 0.101.0">
    <meta property="og:site_name" content="Carrera en Tecnología de la Información" />
    <meta property="og:image" content="https://educaysoft.org/repositorioeys/logos/logocti.png" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />
    <title>Tienda de Artículos</title>
    <link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet"/>

    <style>
        .img-contenedor img {
            -webkit-transition:all .9s ease; /* Safari y Chrome */
            -moz-transition:all .9s ease; /* Firefox */
            -o-transition:all .9s ease; /* IE 9 */
            -ms-transition:all .9s ease; /* Opera */
            width:100%;
        }
        .img-contenedor:hover img {
            -webkit-transform:scale(1.25);
            -moz-transform:scale(1.25);
            -ms-transform:scale(1.25);
            -o-transform:scale(1.25);
            transform:scale(1.25);
        }
        .img-contenedor {
            overflow:hidden;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        /* Custom styles for e-commerce */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product-card .card-img-top {
            max-height: 200px;
            object-fit: contain;
            margin-bottom: 15px;
        }
        .product-card h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .product-card .price {
            font-size: 1.1rem;
            color: #28a745;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .shopping-cart {
            position: fixed;
            top: 60px;
            right: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            max-height: 80vh;
            overflow-y: auto;
            z-index: 1000;
            display: none; /* Hidden by default */
            width: 300px;
        }
        .shopping-cart h4 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px dashed #eee;
            padding-bottom: 10px;
        }
        .cart-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .cart-item-info {
            flex-grow: 1;
        }
        .cart-item-qty {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }
        .cart-total {
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.2em;
            text-align: right;
        }
        #cart-icon {
            cursor: pointer;
            font-size: 24px;
            margin-left: 20px;
            position: relative;
        }
        #cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 3px 8px;
            font-size: 0.7em;
        }
        #modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
        }
        #modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <div class="collapse bg-secondary" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white"> <a href="https://educaysoft.org/repositorioeys/eventos/2023-11-29.jpeg" class="text-white">Acerca del Proyecto de Aula de Ingenieria de Software</a></h4>
                    <p class="text-light"> El proyecto de aula en Ingeniería de Software implicó la planificación, desarrollo y evaluación colaborativa de soluciones informáticas, fomentando el trabajo en equipo, la resolución de problemas y la aplicación práctica de conceptos técnicos.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contactanos</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://educaysoft.org/sica/evento/participantes/356" class="text-white">5to-A Ingenieria de Software I</a></li>
                        <li><a href="https://educaysoft.org/sica/evento/participantes/357" class="text-white">5to-B Ingenieria de Softare I</a></li>
                        <li><a href="https://educaysoft.org/sica/evento/participantes/350" class="text-white">4to-B Base de Datos I</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-light bg-light shadow-sm" aria-label="Light offcanvas navbar">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="https://www.utelvt.edu.ec/site/" target="_blank">
                <img src="https://congresoutlvte.org/images/logoutlvte.png" alt="..." height="45">
            </a>
            <div>
                <span id="cart-icon" class="me-3" onclick="toggleCart()">
                    <i class="fas fa-shopping-cart"></i> <span id="cart-count" class="badge bg-danger">0</span>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5" style="display:flex;  align-items:center; justify-content: center;" >
            <?php if (!empty($articulos)): ?>
            <div style=" flex-basis: 40%"  >
                <img src="https://educaysoft.org/repositorioeys/qr/articulos-<?php echo $articulos[0]->idinstitucion; ?>.png" height="150px" alt="QR Code1">
            </div>
            <div>
                <h1 class="fw-light"><?php echo $articulos[0]->idinstitucion; ?></h1>
                <p class="lead text-muted">Institución: <?php echo $articulos[0]->idinstitucion; ?> :: <?php echo $articulos[0]->lainstitucion; ?>.</p>
                <p class="lead text-muted">Inventario y Precios de Artículos</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $arrcolor=array(1=>"#b4b2b2",2=>"#F5DA81",3=>"#A9F5A9",4=>"#A9F4F3",5=>"#CFCEF7",6=>"#D1A9F4",7=>"#F5A8F3",8=>"#80DBF5",9=>"#9BFE2F",10=>"#9BFE2F");
                foreach($articulos as $row):
                    $remoteFile = "https://educaysoft.org/repositorioeys/articulos/articulo" . trim($row->idarticulo) . ".jpg";
                    $file_headers = @get_headers($remoteFile);
                    $image_exists = ($file_headers && $file_headers[0] != 'HTTP/1.1 404 Not Found');
                ?>
                <div class="col">
                    <div class="card shadow-sm product-card">
                        <?php if ($image_exists): ?>
                            <img class="bd-placeholder-img card-img-top thumbnail" src="<?php echo $remoteFile; ?>" alt="<?php echo $row->elarticulo; ?>" onclick="mostrarImagen('<?php echo $remoteFile; ?>')">
                        <?php else: ?>
                            <img class="bd-placeholder-img card-img-top" src="https://educaysoft.org/repositorioeys/articulos/articulo0.jpg" alt="No image available">
                            <div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center; padding: 10px;">
                                <input type="file" id="fileInput<?php echo trim($row->idarticulo); ?>" accept="image/*" style="display:none;">
                                <button class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('fileInput<?php echo trim($row->idarticulo); ?>').click();">Seleccionar Imagen</button>
                                <button class="btn btn-sm btn-primary ms-2" onclick="uploadImage('articulo<?php echo trim($row->idarticulo); ?>.jpg','<?php echo trim($row->idarticulo); ?>')">Subir Imagen</button>
                                <p id="status<?php echo trim($row->idarticulo); ?>"></p>
                            </div>
                        <?php endif; ?>

                        <div class="card-body" style="background-color:<?php echo $arrcolor[1]; ?>"  >
                            <h5><?php echo $row->elarticulo; ?> (ID: <?php echo $row->idarticulo; ?>)</h5>
                            <p class="card-text"><strong>Detalle:</strong> <?php echo $row->detalle; ?></p>
                            <p class="card-text"><strong>Custodio:</strong> <?php echo $row->elcustodio; ?></p>

                            <?php
                            $has_price = false;
                            $current_price = 0;
                            foreach($precioarticulo as $rowj){
                                if(isset($rowj[$row->idarticulo]['idarticulo'])){
                                    $has_price = true;
                                    $current_price = $rowj[$row->idarticulo]['precio'];
                                    echo '<p class="price"><strong>Precio:</strong> $'. number_format($current_price, 2) .'<br> Desde: '. $rowj[$row->idarticulo]['fechadesde'] .' <br> Hasta: '. $rowj[$row->idarticulo]['fechahasta'] .'</p>';
                                    // Removed the direct link to pricearticulo/actual as it's not a typical e-commerce link
                                    break; // Assuming one active price per article for simplicity
                                }
                            }
                            if (!$has_price) {
                                echo '<p class="price"><strong>Precio:</strong> N/A</p>';
                            }
                            ?>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <?php if ($has_price): ?>
                                        <button type="button" class="btn btn-sm btn-success add-to-cart-btn"
                                            data-id="<?php echo $row->idarticulo; ?>"
                                            data-name="<?php echo htmlspecialchars($row->elarticulo); ?>"
                                            data-price="<?php echo $current_price; ?>">
                                            Añadir al Carrito
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<div id="shopping-cart" class="shopping-cart">
    <h4>Tu Carrito de Compras</h4>
    <div id="cart-items">
        </div>
    <div class="cart-total">
        Total: $<span id="cart-total-price">0.00</span>
    </div>
    <button class="btn btn-primary btn-block mt-3" id="checkout-btn">Proceder al Pago</button>
    <button class="btn btn-outline-secondary btn-block mt-2" onclick="toggleCart()">Cerrar Carrito</button>
</div>

<div id="modal">
    <span class="close" onclick="cerrarModal()">&times;</span>
    <img id="modal-content" src="" alt="Imagen Grande">
</div>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Este sitio web que presenta <xxxx>/<yyyy> clases, es parte del producto del <b>PROYECTO DE AULA</b> titulado <a href="https://educaysoft.org/repositorioeys/2024-01-15-FQSA-01627.pdf"> <b> "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"</b></a> </p>
        <p class="mb-0">El proyecto fue realizado con la participación de <a href="https://educaysoft.org/sica/evento/participantes/350"> 4-B Base de Datos I</a> ,<a href="https://educaysoft.org/sica/evento/participantes/356"> 5to-A</a> y <a href="https://educaysoft.org/sica/evento/participantes/357">5to-B</a> Ingenieria de Software I en el periodo 2023-1S, cuyo tutor fue el Ing. Stalin Francis Msc., Docente de las Asignaturas.</p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://congresoutlvte.org/assets/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    // Shopping Cart Logic
    let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

    function saveCart() {
        localStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    function renderCart() {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = '';
        let totalPrice = 0;

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>El carrito está vacío.</p>';
        } else {
            cart.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('cart-item');
                itemDiv.innerHTML = `
                    <div class="cart-item-info">
                        <strong>${item.name}</strong><br>
                        <span>$${item.price.toFixed(2)} x </span>
                        <input type="number" class="cart-item-qty form-control-sm" value="${item.quantity}" min="1"
                               data-id="${item.id}"
                               onchange="updateCartQuantity(this.dataset.id, this.value)">
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.id})">X</button>
                `;
                cartItemsContainer.appendChild(itemDiv);
                totalPrice += item.price * item.quantity;
            });
        }
        document.getElementById('cart-total-price').textContent = totalPrice.toFixed(2);
        document.getElementById('cart-count').textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
    }

    function addToCart(id, name, price) {
        const existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ id: id, name: name, price: price, quantity: 1 });
        }
        saveCart();
        renderCart();
        showCart(); // Show cart after adding
    }

    function updateCartQuantity(id, quantity) {
        const numQty = parseInt(quantity);
        if (isNaN(numQty) || numQty <= 0) {
            removeFromCart(id);
            return;
        }
        const item = cart.find(item => item.id == id);
        if (item) {
            item.quantity = numQty;
            saveCart();
            renderCart();
        }
    }

    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        saveCart();
        renderCart();
    }

    function toggleCart() {
        const cartElement = document.getElementById('shopping-cart');
        if (cartElement.style.display === 'block') {
            cartElement.style.display = 'none';
        } else {
            cartElement.style.display = 'block';
            renderCart(); // Re-render cart when shown
        }
    }

    function showCart() {
        document.getElementById('shopping-cart').style.display = 'block';
        renderCart();
    }

    // Event listener for "Add to Cart" buttons
    document.addEventListener('DOMContentLoaded', () => {
        renderCart(); // Initial render of the cart
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const id = parseInt(event.target.dataset.id);
                const name = event.target.dataset.name;
                const price = parseFloat(event.target.dataset.price);
                addToCart(id, name, price);
            });
        });

        // Checkout button functionality (example - would typically go to a checkout page)
        document.getElementById('checkout-btn').addEventListener('click', () => {
            if (cart.length > 0) {

                alert('<?php echo base_url(); ?>index.php/articulovendido/guardar');
                alert('Procediendo  pago para: ' + JSON.stringify(cart));
// Send the cart data to the server
        axios.post('<?php echo base_url(); ?>index.php/articulovendido/guardar', { cart: cart })
            .then(response => {
                if (response.data.success) {
                    alert('¡Gracias por tu compra! Tu pedido ha sido procesado.');
                    // Clear cart after successful checkout
                    cart = [];
                    saveCart();
                    renderCart();
                    toggleCart(); // Hide cart
                } else {
                    alert('Hubo un error al procesar tu compra. Por favor, inténtalo de nuevo.');
                    console.error('Error del servidor:', response.data.message);
                }
            })
            .catch(error => {
                console.error('Error de red o del servidor:', error);
                alert('Hubo un error de conexión. Inténtalo de nuevo más tarde.');
            });




              //  alert('Procediendo al pago para: ' + JSON.stringify(cart));
                // In a real application, you would send this data to a server-side endpoint
                // e.g., using Axios:
                /*
                axios.post('/checkout/process', { cart: cart })
                    .then(response => {
                        console.log('Order placed successfully', response.data);
                        cart = []; // Clear cart after successful checkout
                        saveCart();
                        renderCart();
                        toggleCart(); // Hide cart
                        alert('¡Gracias por tu compra!');
                    })
                    .catch(error => {
                        console.error('Error during checkout:', error);
                        alert('Hubo un error al procesar tu compra. Inténtalo de nuevo.');
                    });
                */
            } else {
                alert('Tu carrito está vacío. Agrega algunos artículos antes de proceder.');
            }
        });
    });

    // Existing image upload and modal functions (kept for completeness)
    function mostrarImagen(imagen) {
        var modalImg = document.getElementById("modal-content");
        modalImg.src = imagen;
        document.getElementById('modal').style.display = "block";
    }

    function cerrarModal() {
        document.getElementById('modal').style.display = "none";
    }

    function uploadImage(nombre, idx) {
        var fI = "fileInput" + idx;
        var st = "status" + idx;
        var filesInput = document.getElementById(fI);
        var status = document.getElementById(st);

        if (filesInput.files.length === 0) {
            status.textContent = "Por favor seleccione un archivo.";
            return;
        }

        var file = filesInput.files[0];

        if (file.size > 500 * 1024) {
            status.textContent = "El archivo es demasiado grande. Por favor seleccione un archivo de menos de 500 KB.";
            return;
        }

        var formData = new FormData();
        formData.append("files[]", file); // Only one file for now
        formData.append("nombrearchivo", nombre);

        var uploadUrl = getUploadUrl();
        // alert(uploadUrl); // For debugging
        // alert(nombre);   // For debugging

        axios.post(uploadUrl, formData)
            .then(function(response) {
                console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
                location.reload(); // Reload the page to show the new image
            })
            .catch(function(error) {
                console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
                alert("Error al subir la imagen.");
            });
    }

    function getUploadUrl() {
        // Assuming your upload script is at the root of educaysoft.org
        var url = "https://educaysoft.org";
        return url.endsWith("/") ? url + "cargaimagen.php" : url + "/cargaimagen.php";
    }
</script>

</body>
</html>
