<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Yamato</title>
    <link rel="stylesheet" href="libreria.css">
</head>
<body>
    <header>
        <div class="logo-title">
            <img src="imagenes/logo.jpg" alt="Logo de Librería Yamato" class="logo" width="100">
            <h1>Librería Yamato</h1>
        </div>
        
        <div class="search-bar">
            <input type="text" id="search" placeholder="Buscar libro..." oninput="filterBooks()">
        </div>

        <button id="cart-button" onclick="openCart()">🛒 <span id="cart-count">0</span></button>

        <a href="perfil.php?id=1" id="mi-perfil">Mi Perfil</a> 
        
    </header>
    

    <div id="cart" style="display:none;">
        <h2>Carrito de Compras</h2>
        <ul id="cart-items"></ul>
        <p>Total: $<span id="total">0.00</span></p>
        
        <button onclick="showPaymentForm()">Pagar</button>
        
        <div id="payment-form" style="display:none;">
            <h3>Ingresa tu información</h3>
            <label for="full-name">Nombre Completo:</label>
            <input type="text" id="full-name" placeholder="Nombre Completo" required><br>
            <label for="phone-number">Número de Teléfono:</label>
            <input type="text" id="phone-number" placeholder="Número de Teléfono" required><br>
            <label for="postal-code">Código Postal:</label>
            <input type="text" id="postal-code" placeholder="Código Postal" required><br>
            <label for="neighborhood">Colonia:</label>
            <input type="text" id="neighborhood" placeholder="Colonia" required><br>
            <label for="street">Calle:</label>
            <input type="text" id="street" placeholder="Calle" required><br>
            <label for="house-number">Número de Casa:</label>
            <input type="text" id="house-number" placeholder="Número de Casa" required><br>
            <label for="card-number">Número de Tarjeta:</label>
            <input type="text" id="card-number" placeholder="Número de tarjeta" required><br>
            <button onclick="processPayment()">Enviar</button>
            <button onclick="hidePaymentForm()">Cancelar</button>
        </div>
        
        <button onclick="closeCart()">Cerrar</button>
    </div>

    <script>
        let cart = [];
        let total = 0;

        function addToCart(bookTitle, price, button) {
            const existingBook = cart.find(item => item.title === bookTitle);

            if (existingBook) {
                existingBook.quantity++;
            } else {
                cart.push({ title: bookTitle, price: price, quantity: 1 });
            }

            total += price;
            updateCartUI();
            button.textContent = 'Agregado';
            button.disabled = true;
            document.getElementById('cart-count').textContent = cart.length;
        }

        function updateCartUI() {
            const cartItems = document.getElementById('cart-items');
            const totalElement = document.getElementById('total');

            cartItems.innerHTML = '';

            cart.forEach((item, index) => {
                const li = document.createElement('li');
                li.textContent = `${item.title} - $${item.price.toFixed(2)} (Cantidad: ${item.quantity})`;

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Eliminar';
                removeButton.addEventListener('click', () => removeFromCart(index));
                li.appendChild(removeButton);

                cartItems.appendChild(li);
            });

            totalElement.textContent = total.toFixed(2);
        }

        function removeFromCart(index) {
            total -= cart[index].price * cart[index].quantity;
            cart.splice(index, 1);

            updateCartUI();
            document.getElementById('cart-count').textContent = cart.length;
        }

        function openCart() {
            document.getElementById('cart').style.display = 'block';
        }

        function closeCart() {
            document.getElementById('cart').style.display = 'none';
        }

        function showPaymentForm() {
            document.getElementById('payment-form').style.display = 'block';
        }

        function hidePaymentForm() {
            document.getElementById('payment-form').style.display = 'none';
        }

        function processPayment() {
    const fullName = document.getElementById('full-name').value;
    const phoneNumber = document.getElementById('phone-number').value;
    const postalCode = document.getElementById('postal-code').value;
    const neighborhood = document.getElementById('neighborhood').value;
    const street = document.getElementById('street').value;
    const houseNumber = document.getElementById('house-number').value;
    const cardNumber = document.getElementById('card-number').value;

    if (cardNumber) {
        const cartData = JSON.stringify(cart); // Convertimos el carrito en JSON

        fetch('carrito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `cart=${encodeURIComponent(cartData)}&nombre_completo=${encodeURIComponent(fullName)}&Numero_Telefono=${encodeURIComponent(phoneNumber)}&codigo_postal=${encodeURIComponent(postalCode)}&colonia=${encodeURIComponent(neighborhood)}&Calle=${encodeURIComponent(street)}&numero_casa=${encodeURIComponent(houseNumber)}`
        })
        .then(response => response.text())
        .then(responseText => {
            alert(responseText);
            cart = [];
            total = 0;
            updateCartUI();
            hidePaymentForm();
            document.getElementById('cart-count').textContent = cart.length;
        })
        .catch(error => console.error('Error en el procesamiento de pago:', error));
    } else {
        alert('Por favor, ingresa un número de tarjeta válido.');
    }
}


        function filterBooks() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const books = document.querySelectorAll('.book-item');

            books.forEach(book => {
                const title = book.querySelector('h3').textContent.toLowerCase();
                book.style.display = title.includes(searchInput) ? 'block' : 'none';
            });
        }
    </script>
    </header>


    <main id="book-list">
        <section id="fiction" class="book-section">
            <h2>Ficción</h2>
            <!--HONOR ZV1-->
            <div class="book-item" onclick="document.getElementById('modal1').style.display='block'">
                <img src="imagenes/Volumen 1.jpg" alt="Portada del libro 1">
                <h3>HONOR Z Volumen 1</h3>
                <button>Ver más</button>
            </div>
            <div id="modal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modal1').style.display='none'">&times;</span>
        <h2>HONOR Z Volumen 1</h2>
        <h4>Autor: Alvaro Jesus Cañada Carvajal</h4>
        <p>Sinopsis: Dos años después de la primera horda, México 2025, un gran grupo de supervivientes lucha por sobrevivir en un mundo postapocalíptico devastado por una pandemia mortal.</p>
        <p>Géneros: Ficción adulto joven</p>
        <p>Precio: $250.00</p>
        <p>Idioma: Español</p>
        <p>Número de páginas: 111</p>
        <p>Fecha de lanzamiento: 2023-01-01</p>
        <button class="add-to-cart" data-title="HONOR Z Volumen 1" data-price="250" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>

    </div>
</div>


            <!--HONOR Z V2-->
            <div class="book-item" onclick="document.getElementById('modal2').style.display='block'">
                <img src="imagenes/Volumen 2.jpg" alt="Portada del libro 2">
                <h3>HONOR Z Volumen 2</h3>
                <button>Ver más</button>
            </div>
            <div id="modal2" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal2').style.display='none'">&times;</span>
                    <h2>HONOR Z Volumen 2</h2>
                    <h4>Autor: Alvaro Jesus Cañada Carvajal</h4>
                    <p>Sinopsis: EN UN FUTURO LEJANO, DONDE LOS ZOMBIS SE APODERARON DE LA TIERRA
                        Y LA NATURALEZA RECLAMA LO SUYO.</p>
                    <p>Géneros: Ficción adulto joven</p>
                    <p>Precio: $250.00</p>
                    <p>Idioma: Español</p>
                    <p>Número de páginas: 111</p>
                    <p>Fecha de lanzamiento: 26/09/2024</p>
                    <button class="add-to-cart" data-title="HONOR Z Volumen 2" data-price="250" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>

                </div>
            </div>
              <!--HONOR Z 3-->
            <div class="book-item" onclick="document.getElementById('modal3').style.display='block'">
                <img src="imagenes/Volumen 3.jpg" alt="Portada del libro 3">
                <h3>HONOR Z Volumen 3</h3>
                <button>Ver más</button>
            </div>
            <div id="modal3" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal3').style.display='none'">&times;</span>
                    <h2>HONOR Z Volumen 3</h2>
                    <h4>Autor: Alvaro Jesus Cañada Carvajal</h4>
                    <p>Sinopsis: La continuación de las aventuras del grupo de supervivientes en 
                        un mundo lleno de desafíos.</p>
                    <p>Géneros: Ficción adulto joven</p>
                    <p>Precio: $250.00</p>
                    <p>Idioma: Español</p>
                    <p>Número de páginas: 111</p> 
                    <p>Fecha de lanzamiento: 26/12/2026</p>
                    <button class="add-to-cart" data-title="HONOR Z Volumen 3" data-price="250" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>

                </div>
            </div>
             <!--MUNDIAL Z-->
<!-- MUNDIAL Z -->
<div class="book-item" style="display:none;" onclick="document.getElementById('modal4').style.display='block'">
    <img src="imagenes/GUERRA.jpg" alt="Portada del libro 4">
    <h3>GUERRA MUNDIAL Z</h3>
    <button>Ver más</button>
</div>

<!-- Modal para el Libro 4 -->
<div id="modal4" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modal4').style.display='none'">&times;</span>
        <h2>GUERRA MUNDIAL Z</h2>
        <h4>Autor: MAX BROOKS</h4>
        <p>Sinopsis: La crónica de cómo la humanidad se enfrentó a la peor amenaza jamás vista...</p>
        <p>Géneros: Ficción adulto</p>
        <p>Precio: $319.00</p>
        <p>Idioma: Español</p>
        <p>Número de páginas: 417</p>
        <p>Fecha de lanzamiento: 01/05/2019</p>
        <button class="add-to-cart" data-title="GUERRA MUNDIAL Z" data-price="319" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>

    </div>
</div> 
</section>

<!--ROMANCES-->
<section id="romance" class="book-section">
            <h2>Romances</h2>
            <!--libro 1-->
            <div class="book-item" onclick="document.getElementById('modal5').style.display='block'">
                <img src="imagenes/todo.jpg" alt="Portada del libro 5">
                <h3>¿ES CIERTO QUE EL AMOR LO CAMBIA TODO?</h3>
                <button>Ver más</button>
            </div>
            <!-- Modal para el Libro 1 -->
            <div id="modal5" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal5').style.display='none'">&times;</span>
                    <h2>¿ES CIERTO QUE EL AMOR LO CAMBIA TODO?</h2>
                    <h4>Autor: Nicola Yoon</h4>
                    <p>Sinopsis: Madeline Whittier es alérgica al mundo exterior. Tan alérgica, de hecho, 
                        que no ha salido de su casa en 17 años. Aún así, su vida transcurre feliz
                         y tranquila hasta que el chico de ojos azules como el Atlántico se muda a la casa de al lado.</p>
                    <p>Géneros: Ficción adulto joven</p>
                    <p>Precio: $369.00</p>
                    <p>Fecha de lanzamiento: 10/12/2021</p>
                    <p>Idioma: Español</p>
                    <p>Numero de  Paginas: 310</p>
                    <button class="add-to-cart" data-title="¿ES CIERTO QUE EL AMOR LO CAMBIA TODO?" data-price="369" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>

                </div>
            </div>

            <!--libro 2-->
            <div class="book-item" onclick="document.getElementById('modal6').style.display='block'">
                <img src="imagenes/Te Espero.jpg" alt="Portada del libro 6">
                <h3>Te Espero En El Fin Del Mundo</h3>
                <button>Ver más</button>
            </div>
            <!-- Modal para el Libro 2 -->
            <div id="modal6" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal6').style.display='none'">&times;</span>
                    <h2>Te Espero En El Fin Del Mundo</h2>
                    <h4>Autor: Andrea Longarela</h4>
                    <p>Sinopsis: Violet y Levi se conocen desde niños. Él sueña con crear un hogar. 
                        Ella, con escapar del suyo. Son mejores amigos, siempre están el uno para el otro y, 
                        cuando empiezan a crecer, se dan cuenta de que sus sentimientos también lo hacen.</p>
                    <p>Géneros: Ficción adulto joven</p>
                    <p>Precio: $489.00</p>
                    <p>Idioma: Español</p>
                    <p>Numero de Paginas: 560</p>
                    <p>Fecha de lanzamiento: 29/09/2021</p>
                    <button class="add-to-cart" data-title="Te Espero En El Fin Del Mundo" data-price="489" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
                </div>
            </div>
             <!--libro 7-->
            <div class="book-item" onclick="document.getElementById('modal7').style.display='block'">
                <img src="imagenes/el amor.jpg" alt="Portada del libro 7">
                <h3>EL AMOR Y OTRAS MALDICIONES</h3>
                <button>Ver más</button>
            </div>
            <!-- Modal para el Libro 7 -->
             <div id="modal7" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal7').style.display='none'">&times;</span>
                    <h2>EL AMOR Y OTRAS MALDICIONES</h2>
                    <h4>Autor: Sandhya Menon</h4>
                    <p>Sinopsis: Sinopsis del libro 4...</p>
                    <p>Géneros: Ficción adulto joven, Literatura fantástica</p>
                    <p>Precio: $310.00</p>
                    <p>Idioma: Español</p>
                    <p>Numero de Paginas: 610</p>
                    <p>Fecha de lanzamiento: 20/09/2020</p>
                    <button class="add-to-cart" data-title="EL AMOR Y OTRAS MALDICIONES" data-price="310" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
                </div>
            </div>
            <!--libro 8-->
            <div class="book-item" style="display:none;" onclick="document.getElementById('modal8').style.display='block'">
                <img src="imagenes/charlie.jpg" alt="Portada del libro 8">
                <h3>HEARTSTOPPER TOMO 1</h3>
                <button>Ver más</button>
            </div>
            <!-- Modal para el Libro 7 -->
             <div id="modal8" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal8').style.display='none'">&times;</span>
                    <h2>HEARTSTOPPER TOMO 1</h2>
                    <h4>Autor: Alice Oseman</h4>
                    <p>Sinopsis: UN CHICO CONOCE A OTOR, LOS CHICOS SE HACEN AMIGOS Y AL FINAL SE ENAMORAN</p>
                    <p>Géneros: Ficción joven</p>
                    <p>Precio: $226.00</p>
                    <p>Idioma: Español</p>
                    <p>Numero de Paginas: 288</p>
                    <p>Fecha de lanzamiento: 22/04/2022</p>
                    <button class="add-to-cart" data-title="HEARTSTOPPER TOMO 1" data-price="226" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
                </div>
            </div>
        </section>

        <section id="famous" class="book-section">
            <h2>Famosos</h2>
            <!--HONOR ZV1-->
            <div class="book-item" onclick="document.getElementById('modal9').style.display='block'">
                <img src="imagenes/jeannete.jpg" alt="Portada del libro 9">
                <h3>Me Alegro Que Mi Madre Haya Muerto</h3>
                <button>Ver más</button>
            </div>
            <div id="modal9" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modal9').style.display='none'">&times;</span>
        <h2>Me Alegro Que Mi Madre Haya Muerto</h2>
        <h4>Autor: Jeannete McCurdy</h4>
        <p>Sinopsis: Una Historia Divertida y Tragica sobre la vida nunca antes vista de la ex-actriz Jeannette McCurdy.</p>
        <p>Géneros: Adulto joven</p>
        <p>Precio: $399.00</p>
        <p>Idioma: Español</p>
        <p>Número de páginas: 120</p>
        <p>Fecha de lanzamiento: 2020-01-01</p>
        <button class="add-to-cart" data-title="Me Alegro Que Mi Madre Haya Muerto" data-price="339" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
    </div>
</div>
            <!--HONOR Z V2-->
            <div class="book-item" onclick="document.getElementById('modal10').style.display='block'">
                <img src="imagenes/milla.jpg" alt="Portada del libro 10">
                <h3>Milla Jovovich Biography</h3>
                <button>Ver más</button>
            </div>
            <div id="modal10" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal10').style.display='none'">&times;</span>
                    <h2>Milla Jovovich Biography</h2>
                    <h4>Autor: Harvey</h4>
                    <p>Sinopsis: Milla es una actriz estadounidense con una gran carrera.</p>
                    <p>Géneros: Adulto</p>
                    <p>Precio: $60.70.00</p>
                    <p>Idioma: Ingles</p>
                    <p>Número de páginas: 111</p>
                    <p>Fecha de lanzamiento: 25/03/2020</p>
                    <button class="add-to-cart" data-title="Molla Jovovich Biography" data-price="60.70.00" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
                </div>
            </div>
              <!--HONOR Z 3-->
            <div class="book-item" onclick="document.getElementById('modal11').style.display='block'">
                <img src="imagenes/aline.jpg" alt="Portada del libro 11">
                <h3>La Gloria Por El Infierno</h3>
                <button>Ver más</button>
            </div>
            <div id="modal11" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('modal11').style.display='none'">&times;</span>
                    <h2>La Gloria Por El Infierno</h2>
                    <h4>Autor: Rubén Aviña</h4>
                    <p>Sinopsis: Descubre la historia detras de lo vivido por Aline Hernanez ex-corista de Gloria Trevi.</p>
                    <p>Géneros: Adulto</p>
                    <p>Precio: $657.00</p>
                    <p>Idioma: Español</p>
                    <p>Número de páginas: 200</p> 
                    <p>Fecha de lanzamiento: 26/12/1996</p>
                    <button class="add-to-cart" data-title="La Gloria Por EL Infierno" data-price="657" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
                </div>
            </div>
             <!--MUNDIAL Z-->
             <div class="book-item" style="display:none;" onclick="document.getElementById('modal12').style.display='block'">
    <img src="imagenes/selena.jpg" alt="Portada del libro 12">
    <h3>Para Selena Con Amor</h3>
    <button>Ver más</button>
</div>
<!-- Modal para el Libro 4 -->
<div id="modal12" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modal12').style.display='none'">&times;</span>
        <h2>Para Selena Con Amor</h2>
        <h4>Autor: Chris Perez</h4>
        <p>Sinopsis: Una de las superestrellas más impresionantes y adoradas en la historia de la música latina, Selena fue un fenómemeno del espectáculo quien compartió todo lo que era con sus millones de fans.</p>
        <p>Géneros: Adulto</p>
        <p>Precio: $199.00</p>
        <p>Idioma: Español</p>
        <p>Número de páginas: 315</p>
        <p>Fecha de lanzamiento: 01/05/2004</p>
        <button class="add-to-cart" data-title="Para Selena Con Amor" data-price="199" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
    </div>
</div> 
 </section>

 <footer>
    <img src="imagenes/face.jpg" alt="Logo de Facebook" class="logo" width="50">
    <img src="imagenes/ins.jpg" alt="Logo de Instagram" class="logo" width="100">
    <img src="imagenes/x.jpg" alt="Logo de Twitter" class="logo" width="60">
    
    <p>&copy; 2024 Librería Yamato.</p>
    
    <!-- Agregar enlaces para privacidad, seguridad y cookies -->
    <ul class="footer-links">
        <li><a href="privacidad.php">Política de Privacidad</a></li>
        <li><a href="seguridad.php">Seguridad</a></li>
    </ul>
</footer>



</body>
</html>