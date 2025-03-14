<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="introduction.css">
    <title>Accueil</title>
</head>
<style>
    /* introduction.css */
:root {
    --primary-color: #0984e3;
    --secondary-color: #74b9ff;
    --text-color: #2d3436;
    --light-bg: #f8f9fa;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', system-ui, sans-serif;
}

body {
    background-color: var(--light-bg);
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Navigation améliorée */
/* nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    padding: 1rem 2rem;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    max-width: 150px;
    transition: transform 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
}

.logo img {
    width: 100%;
    height: auto;
    object-fit: contain;
} */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    padding: 1rem 2rem;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.logo {
    max-width: 150px;
}

.logo img {
    max-width: 100%;
    height: auto;
}

.nav-links {
    display: flex;
    gap: 2.5rem;
    list-style: none;
}

.nav-links a {
    text-decoration: none;
    color: #2d3436;
    font-size: 1.05rem;
    transition: all 0.3s ease;
    font-weight: 500;
    letter-spacing: 0.5px;
    position: relative;
    opacity: 0.9;
}

.nav-links a:hover {
    color: #0984e3;
    opacity: 1;
}

/* Underline animation for regular links */
.nav-links li:not(:last-child) a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: #0984e3;
    transition: width 0.3s ease;
}

.nav-links li:not(:last-child) a:hover::after {
    width: 100%;
}

.login {
    background: linear-gradient(135deg, #0984e3, #74b9ff);
    color: white !important;
    padding: 0.6rem 1.4rem;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 8px rgba(9, 132, 227, 0.2);
    border: none;
    cursor: pointer;
}

.login:hover {
    transform: translateY(-1.5px);
    box-shadow: 0 4px 12px rgba(9, 132, 227, 0.3);
}

.hamburger {
    display: none;
    cursor: pointer;
    padding: 8px;
}

.hamburger .line {
    width: 28px;
    height: 3px;
    background-color: #2d3436;
    margin: 5px 0;
    transition: all 0.3s ease;
    border-radius: 2px;
}

@media screen and (max-width: 768px) {
    nav {
        padding: 1rem 1.5rem;
    }

    .hamburger {
        display: block;
    }

    .nav-links {
        right: -100%;
        top: 65px;
        gap: 0;
        padding: 1.5rem 0;
    }

    .nav-links a {
        font-size: 1.1rem;
        padding: 1.2rem 0;
    }

    .login {
        margin-top: 1rem;
        padding: 0.8rem 1.5rem;
        font-size: 1rem;
        background: #0984e3;
        box-shadow: none;
    }

    .nav-links li:not(:last-child) a::after {
        bottom: 0;
    }
}

/* Section améliorations */
.section {
    display: flex;
    flex-direction: column;
    margin: 100px 0;
    padding: 40px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.section.visible {
    opacity: 1;
    transform: translateY(0);
}

.section-content {
    position: relative;
    padding: 20px;
}

.section-content h2 {
    font-size: 2.4rem;
    color: var(--text-color);
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 10px;
}

.section-content h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary-color);
}

.custom-list {
    list-style: none;
    margin: 25px 0;
}

.custom-list li {
    padding: 15px 0;
    padding-left: 35px;
    position: relative;
    font-size: 1.1rem;
}

.custom-list li::before {
    content: '✔️';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary-color);
    margin-right: 15px;
}

/* Responsive Design amélioré */
@media (max-width: 768px) {
    nav {
        padding: 1rem;
    }

    .section {
        margin: 60px 0;
        padding: 25px;
    }

    .section-content h2 {
        font-size: 1.8rem;
    }

    .custom-list li {
        font-size: 1rem;
    }
}

/* Reste du CSS précédent pour la navigation... */
</style>

<body>
    <nav>
        <a href="#" class="logo"><img src="PIE-removebg-preview.png" alt="Logo"></a>
        <ul class="nav-links">
            <a
                    href="https://um6p.ma/fr/lum6p-et-lofppt-joignent-leurs-forces-pour-le-developpement-de-la-formation-professinelle-dans-la">Association</a>
            </li>
            <li><a href="signup.php" class="login">Login</a></li>
        </ul>
        <div class="hamburger" onclick="toggleMenu()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <div class="container">
        <section class="section">
            <div class="section-content">
                <h2>L'engagement concret</h2>
                <p>Être engagé, ce ne sont pas des paroles, ce sont des actions concrètes sur le terrain. Nous nous
                    engageons quand :</p>
                <ul class="custom-list">
                    <li>Nous quittons la zone de la parole (donner son point de vue)</li>
                    <li>Nous commençons à lire et à nous documenter sérieusement sur un sujet</li>
                    <li>Nous changeons notre comportement personnel</li>
                    <li>Nous rejoignons des collectifs actifs dans divers domaines</li>
                </ul>
            </div>
        </section>

        <section class="section">
            <div class="section-content">
                <h2>Ce que nous apprenons</h2>
                <p>
                    Nos valeurs nous batissent , nous construisent et déterminent qui nous sommes. Nos valeurs sont ce
                    qui reste constant quelque soit les circonstances.
                </p>
                <p>
                    Si je dis que ma valeur c'est l'honneteté et que face à une situation compliquée et difficile, je
                    donne un pourboire , je mens, je fais une mauvaise action car"je n'avais pas le choix", alors
                    l'honneteté n'est pas une de mes valeurs .
                </p>
                <p>
                    Votre valeur c'est ce qui reste quand vous etes face à des choix difficiles et que vous n'avez pas
                    d'autres choix que d'assumer votre valeur ou d'y renoncer.
                    C'est dans ces cas, que nous reconnaissons les leaders.
                </p>

            </div>
        </section>
    </div>

    <script>
        // scripts.js
        document.addEventListener('DOMContentLoaded', () => {
            // Animation des sections
            const sections = document.querySelectorAll('.section');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            });

            sections.forEach(section => observer.observe(section));

            // Gestion du menu responsive
            const toggleMenu = () => {
                const navLinks = document.querySelector('.nav-links');
                navLinks.classList.toggle('active');
            }

            document.querySelector('.hamburger').addEventListener('click', toggleMenu);

            // Fermer le menu au clic sur un lien
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('active');
                });
            });
        });
    </script>
</body>

</html>