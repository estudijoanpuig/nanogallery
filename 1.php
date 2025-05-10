<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NANOGALLERY</title>
  <link rel="icon" href="logo.png">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
  <link href="https://unpkg.com/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet">
  <link href="https://unpkg.com/nanogallery2/dist/css/themes/clean/nanogallery2_clean.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding-top: 60px;
    }
    .gradient-text {
      background: radial-gradient(138.06% 1036.51% at 95.25% -2.54%, #7ED4FD 14.06%, #709DF7 51.02%, #4D78EF 79.09%);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }
    #to-top-button {
      transition: all 0.3s ease;
      background-color: #4D78EF;
      color: white;
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
      z-index: 999;
    }
    #to-top-button.show {
      opacity: 1;
      visibility: visible;
    }
    #to-top-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    #to-top-button:active {
      transform: translateY(-1px);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top border-bottom">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="logo.png" width="40" height="40" alt="Logo" class="me-2">
        <h1 class="gradient-text fw-bold mb-0"><span class="text-primary">NANOGALLERY</span></h1>
      </a>
      <button class="btn btn-outline-secondary rounded-circle me-2" onclick="toggleDarkMode()">
        <i class="bi bi-moon" id="theme-icon"></i>
      </button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="/">domini</a></li>
		  
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
            <a class="nav-link dropdown-toggle" href="#" id="vhostsDropdown" role="button" data-bs-toggle="dropdown">vhosts</a>
            <ul class="dropdown-menu">
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
                                    echo '<li><a class="dropdown-item" href="http://'.htmlspecialchars($host, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars($host, ENT_QUOTES, 'UTF-8').'</a></li>';
                                }
                            } else {
                                echo '<li><span class="dropdown-item text-muted">Archivo hosts no encontrado.</span></li>';
                            }
                            ?>
                        </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="/phpmyadmin/" target="_blank">phpmyadmin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
    <section class="py-5 mt-4">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="gradient-text display-4 fw-bold mb-4">Instal·lació i configuració de NanoGallery</h1>
                    <p class="text-muted mb-4">Ajudat per a la IA DeepSeek.</p>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <a href="https://nanophotosprovider2.nanostudio.org/" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-download me-2"></i> NANO PHOTOS PROVIDER
                        </a>
                        <a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_npp2" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-gear me-2"></i> CONFIGURAR
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="nanogallery.png" alt="NanoGallery Demo" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Instructions Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center display-5 mb-5">nanoPhotosProvider2 usage</h2>
            
            <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="installation-tab" data-bs-toggle="tab" data-bs-target="#installation" type="button">
                        <i class="bi bi-download me-2"></i> Installation
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="html-tab" data-bs-toggle="tab" data-bs-target="#html" type="button">
                        <i class="bi bi-code me-2"></i> HTML Configuration
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="testing-tab" data-bs-toggle="tab" data-bs-target="#testing" type="button">
                        <i class="bi bi-check-circle me-2"></i> Testing
                    </button>
                </li>
            </ul>
            
            <div class="tab-content bg-body p-4 rounded shadow-sm">
                <div class="tab-pane fade show active" id="installation" role="tabpanel">
                    <h3 class="fw-bold text-primary mb-4">
                        <i class="bi bi-arrow-right me-2"></i> Step 1: installation
                    </h3>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent">crea una carpeta anomenada <strong>nano_photos_provider2</strong></li>
                        <li class="list-group-item bg-transparent">en aquesta carpeta:
                            <ul class="list-group list-group-flush ms-4">
                                <li class="list-group-item bg-transparent">copy the files:
                                    <ul class="list-group list-group-flush ms-4">
                                        <li class="list-group-item bg-transparent">nano_photos_provider2.php</li>
                                        <li class="list-group-item bg-transparent">nano_photos_provider2.json.class.php</li>
                                        <li class="list-group-item bg-transparent">nano_photos_provider2.cfg</li>
                                        <li class="list-group-item bg-transparent">nano_photos_provider2.encoding.php</li>
                                    </ul>
                                </li>
                                <li class="list-group-item bg-transparent">crea una carpeta anomenada <strong>nano_photos_content</strong>
                                    <ul class="list-group list-group-flush ms-4">
                                        <li class="list-group-item bg-transparent">copia les teves fotos allà</li>
                                        <li class="list-group-item bg-transparent">pots organitzar les teves fotos en carpetes (= àlbums)</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="tab-pane fade" id="html" role="tabpanel">
                    <h3 class="fw-bold text-primary mb-4">
                        <i class="bi bi-arrow-right me-2"></i> Step 2: configure your HTML page
                    </h3>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item bg-transparent">The page can be located anywhere on your webserver.</li>
                        <li class="list-group-item bg-transparent">Install and configure nanogallery2 (<a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_cloud" class="link-primary">link</a>)</li>
                        <li class="list-group-item bg-transparent">Use parameters: <strong>kind</strong> and <strong>dataProvider</strong></li>
                        <li class="list-group-item bg-transparent">kind: 'nano_photos_provider2'</li>
                        <li class="list-group-item bg-transparent">dataProvider: URL to nano_photos_provider2.php</li>
                    </ul>
                    
                    <h5 class="mb-3">Example:</h5>
                    <pre class="p-3 bg-dark text-white rounded"><code>&lt;div id="nanogallery2" data-nanogallery2='{
    "kind":             "nano_photos_provider2",
    "dataProvider":     "http://mywebsever.com/nano_photos_provider2/nano_photos_provider2.php",
    "thumbnailHeight":  150,
    "thumbnailWidth":   150
}'&gt;&lt;/div&gt;</code></pre>
                </div>
                
                <div class="tab-pane fade" id="testing" role="tabpanel">
                    <h3 class="fw-bold text-primary mb-4">
                        <i class="bi bi-arrow-right me-2"></i> Step 3: test your page
                    </h3>
                    
                    <p>After completing the installation and configuration, open your web page in a browser to see the photo gallery in action.</p>
                    
                    <div class="alert alert-info mt-4">
                        <i class="bi bi-lightbulb me-2"></i> Tip: Check the browser console (F12) if the gallery doesn't appear.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NanoGallery Demo Section -->
    <section class="py-5 bg-body-secondary">
        <div class="container">
            <h2 class="text-center display-5 mb-5">Exemple de NanoGallery</h2>
            
            <div class="p-4 bg-body rounded shadow-sm">
                <div id="nanogallery2" data-nanogallery2='{
                    "kind": "nano_photos_provider2",
                    "dataProvider": "nano_photos_provider2.php",
                    "thumbnailHeight": 350,
                    "thumbnailWidth": 350,
                    "galleryTheme": {
                        "thumbnail": {
                            "background": "var(--card-bg)",
                            "borderColor": "var(--border-color)",
                            "titleColor": "rgba(255,255,255,0.9)",
                            "descriptionColor": "rgba(255,255,255,0.7)"
                        },
                        "navigationBreadcrumb": {
                            "color": "white"
                        }
                    }
                }'></div>
            </div>
        </div>
    </section>

  <button id="to-top-button" class="btn btn-primary">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
  <script src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>

  <script>
    function toggleDarkMode() {
      const html = document.documentElement;
      const isDark = html.getAttribute('data-bs-theme') === 'dark';
      html.setAttribute('data-bs-theme', isDark ? 'light' : 'dark');
      document.getElementById('theme-icon').className = isDark ? 'bi bi-moon' : 'bi bi-sun';
    }

    window.addEventListener('scroll', function () {
      const button = document.getElementById('to-top-button');
      if (window.scrollY > 300) {
        button.classList.add('show');
      } else {
        button.classList.remove('show');
      }
    });
    document.getElementById('to-top-button').addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>
</body>

</html>
