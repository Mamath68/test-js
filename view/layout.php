<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Content-Type" content="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/smartphone.css">
    <link rel="stylesheet" href="public/css/tablette.css">
    <script src="script.js"></script>
    <title>
        <?= $title ?>
    </title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ctrl=home&action=index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ctrl=home&action=yugioh">Yu-Gi-Oh!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ctrl=home&action=magic">Magic</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?= $contenu ?>
        <a href="#" class="go_top">
            <i class="fa-solid fa-arrow-up"></i>
        </a>
    </main>


    <footer class="text-center text-lg-start" style="background-color: #db6930;">
        <!-- Copyright -->
        <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="public/js/script.js"></script>
    <script src="public/js/tarteaucitron.js"></script>
    <script src="public/tarteaucitron/advertising.js"></script>
    <script src="public/tarteaucitron/tarteaucitron.services.js"></script>
    <script src="public/tarteaucitron/lang/tarteaucitron.de.js"></script>
</body>

</html>