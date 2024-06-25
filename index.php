<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Landing page</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <i class="fa-solid" id="nav_logo"> ClinWare</i>

            <ul id="nav_list">
                <li class="nav-item active">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Planos</a>
                </li>
                <li class="nav-item">
                    <a href="#testimonials">Avaliações</a>
                </li>
            </ul>

            <button class="btn-default">
                <a href="login.php">
                    ENTRAR
                </a>
            </button>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Planos</a>
                </li>
                <li class="nav-item">
                    <a href="#testimonials">Avaliações</a>
                </li>
            </ul>

            <button class="btn-default">
                Entrar
            </button>
        </div>
    </header>

    <main id="content">
        <section id="home">
            <div class="shape"></div>
            <div id="cta">
                <h1 class="title">
                    A transformação
                    <span>Digital</span>
                    da sua clínica
                </h1>

                <p class="description">
                    Acreditamos que a excelência é para todos! Sua consulta marcada sem estresse e sem esforço.
                    ClinWare, desde 2023 atualizando nossas vidas!
                </p>

                <div id="cta_buttons">
                    <a href="#menu" class="btn-default">
                        <p class="planos">
                            Ver 
                            planos
                        </p>
                            
                    </a>

                    <a href="tel:+55555555555" id="phone_button">
                        <button class="btn-default">
                            <i class="fa-solid fa-phone"></i>
                        </button>
                        (13) 99759-2283
                    </a>
                </div>

                <div class="social-media-buttons">
                    <a href="">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </div>
            </div>

            <div id="banner">
                <img src="src/img/medicos-broxas.png"alt="" width="400px">
            </div>
        </section>

        <section id="menu">
            <h2 class="section-title">Planos</h2>
            <h3 class="section-subtitle">Nossos planos bem cuidados para você</h3>

            <div id="dishes">
                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="src/images/logo-clinware-sem-nome.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Licença de 1 ano
                    </h3>

                    <span class="dish-description">
                       
                     Nesse plano você conta com os seguintes benefícios:
                        
                        <br>
                        ▪ Suporte 24 horas.
                        <br>
                        ▪ Backup de todos os dados por 3 anos.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        
                        <button id="read_button" class="btn-default"><a href="https://buy.stripe.com/test_8wM2aj5mP96NcBG4gh">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="src/images/logo-clinware-sem-nome.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Licença de 5 anos
                    </h3>

                    <span class="dish-description">
                        Nesse plano você conta com os seguintes benefícios:
                        <br>
                        ▪ Suporte 24 horas.
                        <br>
                        ▪ Backup de todos os dados por 8 anos.
                        <br>
                        ▪ Emissão de relatórios de usuários a cada seis meses.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                     
                        <button id="read_button" class="btn-default"><a href="https://buy.stripe.com/test_5kA2aj16z82JfNS146">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="src/images/logo-clinware-sem-nome.png" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Licença de 10 anos
                    </h3>

                    <span class="dish-description">
                       
                    Nesse plano você conta com os seguintes benefícios:
                    <br>
                    ▪ Suporte 24 horas.
                    <br>
                    ▪ Backup de todos os dados por 15 anos.
                    <br>
                     ▪ Emissão de relatórios de usuários a cada 3 meses.

                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
        
                        <button id="read_button" class="btn-default"><a href="https://buy.stripe.com/test_eVacOX7uXaaRgRWcMP">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                        </button>
                    </div>
                </div>

              
                </div>
            </div>
        </section>

        <section id="testimonials">
            <img src="src/img/medicos-5.png" id="testimonial_chef" alt="" border-radius=50%>

            <div id="testimonials_content">
                <h2 class="section-title">
                    Depoimentos
                </h2>
                <h3 class="section-subtitle">
                    O que os clientes falam sobre nós
                </h3>

                <div id="feedbacks">
                    <div class="feedback">
                        <img src="src/images/doutoura-branca.png" class="feedback-avatar" alt="">

                        <div class="feedback-content">
                            <p>
                                Seraphina
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </p>
                            <p>
                                "Intuitivo. Eficiente. Muito bom!"
                            </p>
                        </div>
                    </div>

                    <div class="feedback">
                        <img src="src/images/doutoura-branca.png" class="feedback-avatar" alt="">

                        <div class="feedback-content">
                            <p>
                                Elara                                <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </p>
                            <p>
                                "Cumprem tudo que prometem."
                            </p>
                        </div>
                    </div>
                </div>

                <button class="btn-default">
                    Ver mais avaliações
                </button>
            </div>
        </section>
    </main>

    <footer>
        <img src="src/images/wave.svg" alt="">

        <div id="footer_items">
            <span id="copyright">
                &copy 2024 ClinWare.
            </span>

            <div class="social-media-buttons">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
    <script src="src/javascript/script.js"></script>
</body>
</html>