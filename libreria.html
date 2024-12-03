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

 <!-- Hipervínculo centrado -->
 <div style="text-align: center;">
    <a href="#" id="show-more" onclick="toggleMoreBooks()">Más/Cerar</a>
</div>
<!-- Nueva sección oculta -->
<section id="more-books" class="book-section" style="display:none;">
    <h2>Mangas</h2>
    <div class="book-container">
        <!-- HONOR Z V1 -->
        <div class="book-item" onclick="document.getElementById('modal13').style.display='block'">
            <img src="imagenes/uzumaki.jpg" alt="Portada del libro 13">
            <h3>UZUMAKI</h3>
            <button>Ver más</button>
        </div>
        <div id="modal13" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('modal13').style.display='none'">&times;</span>
                <h2>UZUMAKI</h2>
                <h4>Autor: Junji Ito</h4>
                <p>Sinopsis: La historia se desarrolla en el pueblo de Kurouzu-cho, 
                    donde los habitantes se obsesionan con una espiral que parece tener 
                    una influencia siniestra sobre la ciudad. La espiral se convierte en una 
                    maldición que consume todo a su paso, provocando deformaciones físicas y 
                    mentales en los habitantes.</p>
                <p>Géneros: Terror</p>
                <p>Precio: $175.00</p>
                <p>Idioma: Español</p>
                <p>Número de páginas: 656</p>
                <p>Fecha de lanzamiento: 1998-09-28</p>
                <button class="add-to-cart" data-title="Uzimaki" data-price="175" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
            </div>
        </div>

        <!-- HONOR Z V2 -->
        <div class="book-item" onclick="document.getElementById('modal14').style.display='block'">
            <img src="imagenes/jujutso.jpg" alt="Portada del libro 10">
            <h3>JUJUTSO KAISEN</h3>
            <button>Ver más</button>
        </div>
        <div id="modal14" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('modal14').style.display='none'">&times;</span>
                <h2>Jujutso Kaisen<h2>
                <h4>Autor: Gege Akutami</h4>
                <p>Sinopsis: Yuji Itadori, un estudiante de secundaria común y 
                    corriente con una fuerza sobrenatural impresionante. Después de un encuentro con maledictos, s
                    eres malvados que se alimentan de energía negativa, Yuji se ve 
                    involucrado en el mundo de la maldición.</p>
                <p>Géneros: Fantasía Oscura</p>
                <p>Precio: $172.04</p>
                <p>Idioma: Español</p>
                <p>Número de páginas: 192</p>
                <p>Fecha de lanzamiento: 2018/03/05</p>
                <button class="add-to-cart" data-title="Jujutso Kaisen" data-price="172.04" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
            </div>
        </div>

        <!-- HONOR Z V3 -->
        <div class="book-item" onclick="document.getElementById('modal15').style.display='block'">
            <img src="imagenes/eminence.jpg" alt="Portada del libro 15">
            <h3>THE EMINENCE IN SHADOW Volumen 1</h3>
            <button>Ver más</button>
        </div>
        <div id="modal15" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('modal15').style.display='none'">&times;</span>
                <h2>The Eminence In Shadow Volumen 1</h2>
                <h4>Autor: Daisuke Aizawa</h4>
                <p>Sinopsis: Desde que era un niño, quería convertirse en la 
                    eminencia en la sombra, una persona que opera en las sombras. 
                    Entrenó su cuerpo, haciendo prácticamente todo lo posible en el mundo, 
                    hasta que un día en una de sus sesiones de entrenamiento, se encontró con la magia.</p>
                <p>Géneros: Literatura Fantastica</p>
                <p>Precio: $346.27</p>
                <p>Idioma: Español</p>
                <p>Número de páginas: 164</p>
                <p>Fecha de lanzamiento: 2021/11/23</p>
                <button class="add-to-cart" data-title="The Eminence In Shadow Volumen 1" data-price="346.27" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
            </div>
        </div>

<div class="book-item" style="display:none;" onclick="document.getElementById('modal16').style.display='block'">
    <img src="imagenes/tonikaku.jpg" alt="Portada del libro 12">
    <h3>TONIKAKU KAWAII</h3>
    <button>Ver más</button>
</div>
<div id="modal16" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('modal16').style.display='none'">&times;</span>
        <h2>Tonikaku Kawaii Volumen 30</h2>
        <h4>Autor: Kenjiro Hata</h4>
        <p>Sinopsis: Un joven prodigio acepta una propuesta repentina de una misteriosa mujer de la que se enamora después de que ella lo salva de una experiencia cercana a la muerte.</p>
        <p>Géneros: Comedia romántica, recuentos de la vida</p>
        <p>Precio: $349.00</p>
        <p>Idioma: Español</p>
        <p>Número de páginas: 250</p>
        <p>Fecha de lanzamiento: 2024/12/18</p>
        <button class="add-to-cart" data-title="Tonikaku Kawaii Volumen 30" data-price="349" onclick="addToCart(this.getAttribute('data-title'), parseFloat(this.getAttribute('data-price')), this)">Agregar al carrito</button>
    </div>
</div>

    </div>
</section>

<style>
    .book-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .book-item {
        width: 200px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        background: #f9f9f9;
        transition: transform 0.3s;
    }
    .book-item img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }
    .book-item h3 {
        font-size: 1rem;
        margin: 10px 0;
    }
    .book-item button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .book-item:hover {
        transform: scale(1.05);
    }
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
        text-align: left;
    }
    .close {
        float: right;
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>


<script>
    function toggleMoreBooks() {
        const moreBooksSection = document.getElementById('more-books');
        moreBooksSection.style.display = moreBooksSection.style.display === 'none' ? 'block' : 'none';
    }

    function searchBooks() {
    let searchQuery = document.getElementById("search-input").value.toLowerCase();
    let books = document.querySelectorAll(".book-item");
    
    books.forEach(book => {
        let title = book.querySelector("h3").textContent.toLowerCase();
        
        // Si el título coincide con la búsqueda, muestra el libro
        if (title.includes(searchQuery)) {
            book.style.display = "block";
        } else {
            book.style.display = "none";
        }
    });
}

</script>
 <footer>
    <img src="imagenes/face.jpg" alt="Logo de Facebook" class="logo" width="50">
    <img src="imagenes/ins.jpg" alt="Logo de Instagram" class="logo" width="100">
    <img src="imagenes/x.jpg" alt="Logo de Twitter" class="logo" width="60">
    
    <p>&copy; 2024 Librería Yamato.</p>
    
    <!-- Agregar enlaces para privacidad, seguridad y cookies -->
    <ul class="footer-links">
        <li><a href="privacidad.html">Política de Privacidad</a></li>
        <li><a href="seguridad.html">Seguridad</a></li>
    </ul>
</footer>



</body>
</html>