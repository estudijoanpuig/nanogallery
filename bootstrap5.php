<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NANOGALLERY</title>
    <link rel="icon" href="logo.png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    
    <!-- NanoGallery CSS -->
    <link href="https://unpkg.com/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/nanogallery2/dist/css/themes/clean/nanogallery2_clean.min.css" rel="stylesheet" type="text/css">

    <style>
        :root {
            --bg-color: white;
            --text-color: black;
            --navbar-bg: white;
            --card-bg: white;
        }

        .dark-mode {
            --bg-color: rgb(12, 12, 23);
            --text-color: white;
            --navbar-bg: rgb(17, 24, 39); /* gray-900 */
            --card-bg: rgb(31, 41, 55); /* gray-800 */
            
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        /* NanoGallery dark mode styles */
        .dark-mode .nGY2 .nGY2GThumbnail {
            background-color: var(--card-bg);
            border-color: rgb(55, 65, 81); /* gray-700 */
        }

        .dark-mode .nGY2 .nGY2GThumbnail:hover {
            background-color: rgb(55, 65, 81); /* gray-700 */
        }

        .dark-mode .nGY2 .nGY2GThumbnailTitle {
            color: white;
        }

        .dark-mode .nGY2 .nGY2GThumbnailDescription {
            color: rgb(209, 213, 219); /* gray-300 */
        }

        .dark-mode .nGY2 .nGY2GHeader {
            color: white;
        }

        .dark-mode .nGY2 .nGY2GFooter {
            color: white;
        }
        
        /* Gradient text */
        .gradient-text {
            background: radial-gradient(138.06% 1036.51% at 95.25% -2.54%, #7ED4FD 14.06%, #709DF7 51.02%, #4D78EF 79.09%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Custom dark mode classes for Bootstrap */
        .dark-mode .navbar {
            background-color: var(--navbar-bg) !important;
        }
        
        .dark-mode .card {
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        .dark-mode .nav-tabs .nav-link.active {
            border-color: #4D78EF;
            color: #4D78EF;
        }
        
        .dark-mode .nav-tabs .nav-link {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .dark-mode .nav-tabs .nav-link:hover {
            color: white;
        }
        
        .dark-mode pre {
            background-color: rgb(31, 41, 55);
            color: white;
        }
        
        /* Back to Top Button styles */
        #to-top-button {
            transition: all 0.3s ease;
            background-color: #4D78EF !important;
            color: white !important;
            z-index: 999;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 20px;
            right: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
            opacity: 0;
            visibility: hidden;
        }
        
        #to-top-button.show {
            opacity: 1;
            visibility: visible;
        }
        
        #to-top-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
        }
        
        #to-top-button:active {
            transform: translateY(-1px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2) !important;
        }
        
        /* Custom styles for Bootstrap components */
        .nav-tabs .nav-link {
            color: #495057;
        }
        
        .nav-tabs .nav-link.active {
            color: #4D78EF;
            font-weight: bold;
        }
        
        .tab-content {
            padding: 20px 0;
        }
		
		/* Añade esto en tu sección de estilos */
.dark-mode .tab-content,
.dark-mode .list-group-item,
.dark-mode .nav-tabs .nav-link:not(.active),
.dark-mode pre code {
    color: white !important;
}

.dark-mode .bg-light {
    background-color: var(--card-bg) !important;
}

.dark-mode .nav-tabs {
    border-bottom-color: #444;
}

.dark-mode .nav-tabs .nav-link:hover {
    border-color: transparent;
    color: #4D78EF !important;
}

/* Añade esto en tu sección de estilos CSS */
.dark-mode .navbar .nav-link,
.dark-mode .navbar .dropdown-item {
    color: white !important;
}

.dark-mode .navbar .nav-link:hover,
.dark-mode .navbar .dropdown-item:hover {
    color: #4D78EF !important;
}

.dark-mode .navbar .dropdown-menu {
    background-color: var(--navbar-bg);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.dark-mode .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.1);
    color: white;
}

.dark-mode .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}
    </style>
</head>

<body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="logo.png" width="50" height="50" alt="Logo" class="me-2">
            <h1 class="gradient-text fw-bold mb-0"><span class="text-primary">dark</span></h1>
        </a>
        
        <button class="btn btn-outline-secondary rounded-circle me-2" onclick="toggleDarkMode()">
            <img src="img/moon.svg" alt="" width="20" id="theme-icon">
        </button>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark text-dark-mode" href="/">domini</a>
                </li>
				
				 <!-- Dropdown Bootstrap - Pàgines del projecte -->
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="pagesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Pàgines del projecte
    </button>
    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
        <?php
        // Llegir el directori actual
        $files = scandir(__DIR__);
        $validFiles = [];

        foreach ($files as $file) {
            // Ignorar directoris, arxius ocults i arxius que contenen 'nano_photos_provider2'
            if ($file === '.' || $file === '..' || $file[0] === '.' || strpos($file, 'nano_photos_provider2') !== false) {
                continue;
            }

            // Comprovar extensions .php o .html
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if (strtolower($ext) === 'php' || strtolower($ext) === 'html') {
                $validFiles[] = $file;
            }
        }

        if (!empty($validFiles)) {
            foreach ($validFiles as $file) {
                ?>
                <li><a class="dropdown-item" href="<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?>
                </a></li>
                <?php
            }
        } else {
            ?>
            <li><span class="dropdown-item-text text-muted">No s'han trobat arxius PHP o HTML</span></li>
            <?php
        }
        ?>
    </ul>
</div>
				
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark text-dark-mode" href="#" id="vhostsDropdown" role="button" data-bs-toggle="dropdown">
                        vhosts
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark-mode">
                        <?php
                        $hostsFile = 'C:\Windows\System32\drivers\etc\hosts';
                        if (file_exists($hostsFile)) {
                            $lines = file($hostsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                            $validHosts = [];

                            foreach ($lines as $line) {
                                $line = trim($line);
                                if (!empty($line) && strpos($line, '#') !== 0) {
                                    $parts = preg_split('/\s+/', $line);
                                    if (isset($parts[1])) {
                                        $validHosts[] = $parts[1];
                                    }
                                }
                            }

                            foreach ($validHosts as $host) {
                                ?>
                                <li><a class="dropdown-item text-dark-mode" href="http://<?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?></a></li>
                                <?php
                            }
                        } else {
                            ?>
                            <li><span class="dropdown-item text-muted">Archivo hosts no encontrado.</span></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-dark-mode" href="/phpmyadmin/" target="_blank">phpmyadmin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="gradient-text display-4 fw-bold mb-4">Insta.lacio i configuracio de NanoGallery PhotosProvider <span class="text-primary">html Bootstrap</span></h1>
                    <p class="text-muted mb-4">Ajudat per a la IA DeepSeek.</p>
                    
                    <div class="d-flex">
                        <a href="https://nanophotosprovider2.nanostudio.org/" class="btn btn-primary rounded-pill me-3">NANO PHOTOS PROVIDER</a>
                        <a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_npp2" class="btn btn-outline-secondary rounded-pill">CONFIGURAR</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="position-relative">
                        <img src="nanogallery.png" alt="Hero Image" class="img-fluid rounded">
                        <div class="position-absolute top-0 start-0 w-100 h-100 rounded d-none d-lg-block" style="background: linear-gradient(to top right, rgba(0,0,0,0.1), transparent); margin: -10px -10px -10px -10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructions Section with Tabs -->
    <section class="py-5">
    <div class="container">
        <h2 class="text-center display-5 mb-5">nanoPhotosProvider2 usage</h2>
        
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="installation-tab" data-bs-toggle="tab" data-bs-target="#installation" type="button">Installation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="html-tab" data-bs-toggle="tab" data-bs-target="#html" type="button">HTML Configuration</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="testing-tab" data-bs-toggle="tab" data-bs-target="#testing" type="button">Testing</button>
            </li>
        </ul>
        
        <div class="tab-content py-4" id="myTabContent">
            <div class="tab-pane fade show active" id="installation" role="tabpanel">
                <p class="fw-bold text-primary">
                    <i class="bi bi-arrow-right me-2"></i> Step 1: installation
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent border-secondary">crea una carpeta anomenada <strong class="text-white">nano_photos_provider2</strong></li>
                    <li class="list-group-item bg-transparent border-secondary">en aquesta carpeta:
                        <ul class="list-group list-group-flush ms-4">
                            <li class="list-group-item bg-transparent border-secondary">copy the files:
                                <ul class="list-group list-group-flush ms-4">
                                    <li class="list-group-item bg-transparent border-secondary">nano_photos_provider2.php</li>
                                    <li class="list-group-item bg-transparent border-secondary">nano_photos_provider2.json.class.php</li>
                                    <li class="list-group-item bg-transparent border-secondary">nano_photos_provider2.cfg</li>
                                    <li class="list-group-item bg-transparent border-secondary">nano_photos_provider2.encoding.php</li>
                                </ul>
                            </li>
                            <li class="list-group-item bg-transparent border-secondary">crea una carpeta anomenada <strong class="text-white">nano_photos_content</strong>
                                <ul class="list-group list-group-flush ms-4">
                                    <li class="list-group-item bg-transparent border-secondary">copia les teves fotos allà</li>
                                    <li class="list-group-item bg-transparent border-secondary">pots organitzar les teves fotos en carpetes (= àlbums)</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <div class="tab-pane fade" id="html" role="tabpanel">
                <p class="fw-bold text-primary">
                    <i class="bi bi-arrow-right me-2"></i> Step 2: configure your HTML page
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent border-secondary">The page can be located anywhere on your webserver.</li>
                    <li class="list-group-item bg-transparent border-secondary">Install and configure nanogallery2 (<a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_cloud" class="link-info">link</a>)</li>
                    <li class="list-group-item bg-transparent border-secondary">Use parameters: <strong class="text-white">kind</strong> and <strong class="text-white">dataProvider</strong></li>
                    <li class="list-group-item bg-transparent border-secondary">kind: 'nano_photos_provider2'</li>
                    <li class="list-group-item bg-transparent border-secondary">dataProvider: URL to nano_photos_provider2.php</li>
                </ul>
                <p class="mt-4">Example:</p>
                <pre class="p-3 rounded bg-dark"><code class="text-white">&lt;div id="nanogallery2" data-nanogallery2='{
    "kind":             "nano_photos_provider2",
    "dataProvider":     "http://mywebsever.com/nano_photos_provider2/nano_photos_provider2.php",
    "thumbnailHeight":  150,
    "thumbnailWidth":   150
}'&gt;      
&lt;/div&gt;</code></pre>
            </div>
            
            <div class="tab-pane fade" id="testing" role="tabpanel">
                <p class="fw-bold text-primary">
                    <i class="bi bi-arrow-right me-2"></i> Step 3: test your page
                </p>
                <p class="text-white">After completing the installation and configuration, open your web page in a browser to see the photo gallery in action.</p>
            </div>
        </div>
    </div>
</section>

    <!-- NanoGallery Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center display-4 mb-5">nanogallery</h1>
            
            <div id="nanogallery2" data-nanogallery2='{
                "kind": "nano_photos_provider2",
                "dataProvider": "nano_photos_provider2.php",
                "thumbnailHeight": 350,
                "thumbnailWidth": 350,
                "galleryTheme": {
                    "thumbnail": {
                        "background": "var(--card-bg)",
                        "borderColor": "rgba(209, 213, 219, 0.2)",
                        "titleColor": "WHITE",
                        "descriptionColor": "rgba(209, 213, 219, 0.7)"
                    },
                    "navigationBreadcrumb": {
                        "color": "WHITE"
                    }
                }
            }'></div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button id="to-top-button" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg>
    </button>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    
    <!-- NanoGallery JS -->
    <script src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Dark mode toggle function
        function toggleDarkMode() {
            const body = document.body;
            const themeIcon = document.getElementById('theme-icon');
            
            body.classList.toggle('dark-mode');
            
            // Guardar preferencia en localStorage
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                themeIcon.src = "img/sun.svg"; // Cambiar a icono de sol
            } else {
                localStorage.setItem('darkMode', 'disabled');
                themeIcon.src = "img/moon.svg"; // Cambiar a icono de luna
            }
        }
        
        // Comprobar preferencia al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                document.getElementById('theme-icon').src = "img/sun.svg";
            }
            
            // Inicializar NanoGallery después de que se cargue jQuery
            if (window.jQuery) {
                jQuery("#nanogallery2").nanogallery2({
                    // Puedes añadir más configuraciones aquí si es necesario
                });
            }
        });
        
        // Back to Top Button
        const toTopButton = document.getElementById('to-top-button');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                toTopButton.classList.add('show');
            } else {
                toTopButton.classList.remove('show');
            }
        });
        
        toTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>