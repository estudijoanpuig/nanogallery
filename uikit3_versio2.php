<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NANOGALLERY</title>
    <link rel="icon" href="logo.png">
    
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />
    
    <!-- CSS FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

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
        
        /* Custom dark mode classes for UIkit */
        .dark-mode .uk-navbar-container:not(.uk-navbar-transparent) {
            background-color: var(--navbar-bg) !important;
        }
        
        .dark-mode .uk-card-default {
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        .dark-mode .uk-tab > .uk-active > a {
            border-color: #4D78EF;
            color: #4D78EF;
        }
        
        .dark-mode .uk-tab > * > a {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .dark-mode .uk-tab > * > a:hover {
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
        }
        
        #to-top-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
        }
        
        #to-top-button:active {
            transform: translateY(-1px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2) !important;
        }
    </style>
</head>

<body>
    <!-- UIkit Navbar -->
    <nav class="uk-navbar-container" uk-navbar :class="{'dark-mode': document.body.classList.contains('dark-mode')}">
        <div class="uk-navbar-left">
            <div class="uk-navbar-item">
                <img src="logo.png" width="50" height="50" alt="Logo">
            </div>
            <div class="uk-navbar-item">
                <h1 class="gradient-text uk-text-bold uk-margin-remove"><a href="/"><span class="uk-text-primary">dark</span></a></h1>
            </div>
            <div class="uk-navbar-item">
                <button class="uk-button uk-button-default uk-border-rounded" onclick="toggleDarkMode()">
                    <img src="img/moon.svg" alt="" class="uk-icon" id="theme-icon">
                </button>
            </div>
        </div>
        
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li><a href="/">domini</a></li>
                <li>
                    <a href="#">vhosts</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
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
                                    <li><a href="http://<?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?></a></li>
                                    <?php
                                }
                            } else {
                                ?>
                                <li><span>Archivo hosts no encontrado.</span></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li><a href="/phpmyadmin/" target="_blank">phpmyadmin</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="uk-container uk-margin-large-top">
        <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
            <div>
                <h1 class="gradient-text uk-text-bold uk-heading-large">Insta.lacio i configuracio de NanoGallery PhotosProvider<span class="uk-text-primary"> html UIkit</span></h1>
                <p class="uk-text-muted">Ajudat per a la IA DeepSeek.</p>

                <div class="uk-margin-top">
                    <a href="https://nanophotosprovider2.nanostudio.org/" class="uk-button uk-button-primary uk-border-rounded">NANO PHOTOS PROVIDER</a>
                    <a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_npp2" class="uk-button uk-button-default uk-border-rounded uk-margin-left">CONFIGURAR</a>
                </div>
            </div>
            <div>
                <div class="uk-position-relative">
                    <img class="uk-border-rounded" src="nanogallery.png" alt="Hero Image" width="600" height="400">
                    <div class="uk-position-cover uk-border-rounded uk-margin-small-top uk-margin-small-bottom uk-margin-small-right uk-margin-small-left uk-hidden@m"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instructions Section with Tabs -->
    <div class="uk-container uk-margin-large">
        <h2 class="uk-text-center uk-heading-medium">nanoPhotosProvider2 usage</h2>
        
        <ul uk-tab>
            <li><a href="#">Installation</a></li>
            <li><a href="#">HTML Configuration</a></li>
            <li><a href="#">Testing</a></li>
        </ul>
        
        <ul class="uk-switcher uk-margin">
            <li>
                <p class="uk-text-bold">
                    <span uk-icon="icon: arrow-right" class="uk-margin-small-right"></span> Step 1: installation
                </p>
                <ul class="uk-list uk-list-bullet">
                    <li>crea una carpeta anomenada <strong>nano_photos_provider2</strong></li>
                    <li>en aquesta carpeta:
                        <ul class="uk-list uk-list-bullet uk-margin-small-left">
                            <li>copy the files:
                                <ul class="uk-list uk-list-bullet uk-margin-small-left">
                                    <li>nano_photos_provider2.php</li>
                                    <li>nano_photos_provider2.json.class.php</li>
                                    <li>nano_photos_provider2.cfg</li>
                                    <li>nano_photos_provider2.encoding.php</li>
                                </ul>
                            </li>
                            <li>crea una carpeta anomenada <strong>nano_photos_content</strong>
                                <ul class="uk-list uk-list-bullet uk-margin-small-left">
                                    <li>copia les teves fotos allà</li>
                                    <li>pots organitzar les teves fotos en carpetes (= àlbums)</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <p class="uk-text-bold">
                    <span uk-icon="icon: arrow-right" class="uk-margin-small-right"></span> Step 2: configure your HTML page
                </p>
                <ul class="uk-list uk-list-bullet">
                    <li>The page can be located anywhere on your webserver.</li>
                    <li>Install and configure nanogallery2 (<a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_cloud" class="uk-link">link</a>)</li>
                    <li>Use parameters: <strong>kind</strong> and <strong>dataProvider</strong></li>
                    <li>kind: 'nano_photos_provider2'</li>
                    <li>dataProvider: URL to nano_photos_provider2.php</li>
                </ul>
                <p class="uk-margin-top">Example:</p>
                <pre><code class="uk-text-small">&lt;div id="nanogallery2" data-nanogallery2='{
    "kind":             "nano_photos_provider2",
    "dataProvider":     "http://mywebsever.com/nano_photos_provider2/nano_photos_provider2.php",
    "thumbnailHeight":  150,
    "thumbnailWidth":   150
}'&gt;      
&lt;/div&gt;</code></pre>
            </li>
            <li>
                <p class="uk-text-bold">
                    <span uk-icon="icon: arrow-right" class="uk-margin-small-right"></span> Step 3: test your page
                </p>
                <p>After completing the installation and configuration, open your web page in a browser to see the photo gallery in action.</p>
            </li>
        </ul>
    </div>

    <h1 class="uk-text-center uk-heading-large uk-margin-large-top">nanogallery</h1>

    <!-- NanoGallery Container -->
    <div class="uk-container uk-margin-large-bottom">
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

    <!-- Back to Top Button - Versión mejorada -->
    <button id="to-top-button" class="uk-position-fixed uk-position-bottom-right uk-position-medium uk-icon-button uk-box-shadow-large">
        <span uk-icon="chevron-up"></span>
    </button>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>
    
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>

    <!-- Javascript code -->
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
        var toTopButton = document.getElementById("to-top-button");
        
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                toTopButton.style.display = "block";
            } else {
                toTopButton.style.display = "none";
            }
        };
        
        toTopButton.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>