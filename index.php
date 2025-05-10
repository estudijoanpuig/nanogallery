<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NANOGALLERY</title>
    <link rel="icon" href="logo.png">
	
	<!-- CSS FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	
	<!-- TAILWIND & ALPINE -->
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

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
    </style>
</head>

<body>
    <!-- TAILWIND DARK MODE NAVBAR BBDD -->
<header x-data="{ mobileMenuOpen: false, dropdownOpen: false }" class="relative z-30" :class="{'bg-gray-900': document.body.classList.contains('dark-mode'), 'bg-white': !document.body.classList.contains('dark-mode')}">
    <!-- pc -->
    <div class="px-8 mx-auto xl:px-5 max-w-7xl">
        <div class="flex items-center justify-between h-24 border-gray-100 md:justify-start md:space-x-6">
            <div class="flex flex-row w-full sm:w-auto items-center">
                <img src="logo.png" align="left" width="50" height="" />
                <h1 class="font-bold text-3xl text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline basis-1/2"><a href="/"><span class="text-indigo-600 dark:text-indigo-400">dark</span></a></h1>

                <button class="block ml-5 cursor-pointer bg-indigo-400 hover:bg-indigo-200 rounded-full p-4 hover:transition-colors" onclick="toggleDarkMode()">
                    <img src="img/moon.svg" alt="" class="w-5" id="theme-icon">
                </button>
            </div>
            <div class="flex justify-end flex-grow -my-2 -mr-2 md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                    </svg>
                </button>
            </div>

            <nav class="flex items-center justify-end flex-1 hidden w-full h-full space-x-10 md:flex">
                <a href="/" class="text-base font-medium leading-6 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600" :class="{'text-gray-500': !document.body.classList.contains('dark-mode'), 'text-gray-300': document.body.classList.contains('dark-mode')}">domini</a>
				
				<!-- Primer dropdown - Pàgines del projecte -->
<div @mouseenter="pagesOpen = true" @mouseleave="pagesOpen = false" @click.away="pagesOpen = false" x-data="{ pagesOpen: false }" class="relative h-full select-none">
    <div @click="pagesOpen = !pagesOpen"
         :class="{
            'text-wave-600': pagesOpen,
            'text-gray-500': !pagesOpen && !document.body.classList.contains('dark-mode'),
            'text-gray-300': !pagesOpen && document.body.classList.contains('dark-mode')
        }"
         class="inline-flex items-center h-full space-x-2 text-base font-medium leading-6 transition duration-150 ease-in-out cursor-pointer select-none hover:text-wave-600 focus:outline-none">
        <span>pagines del projecte</span>
        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
        </svg>
    </div>

    <!-- Dropdown content -->
    <div x-show="pagesOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-1"
         class="absolute z-10 w-48 mt-2 origin-top-right rounded-md shadow-lg"
         style="display: none;">
        <div class="rounded-md shadow-xs"
             :class="{
                'bg-white': !document.body.classList.contains('dark-mode'),
                'bg-gray-800': document.body.classList.contains('dark-mode')
            }">
            <div class="py-1">
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
        <a href="<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?>"
           class="block px-4 py-2 text-sm transition duration-150 ease-in-out hover:text-wave-600"
           :class="{
                'text-gray-700': !document.body.classList.contains('dark-mode'),
                'text-gray-300': document.body.classList.contains('dark-mode')
            }"><?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?></a>
        <?php
    }
} else {
    ?>
    <span class="block px-4 py-2 text-sm text-gray-500">No s'han trobat arxius PHP o HTML</span>
    <?php
}
?>
            </div>
        </div>
    </div>
</div>

<!-- Segon dropdown - Vhosts -->
<div @mouseenter="hostsOpen = true" @mouseleave="hostsOpen = false" @click.away="hostsOpen = false" x-data="{ hostsOpen: false }" class="relative h-full select-none">
    <div @click="hostsOpen = !hostsOpen"
         :class="{
            'text-wave-600': hostsOpen,
            'text-gray-500': !hostsOpen && !document.body.classList.contains('dark-mode'),
            'text-gray-300': !hostsOpen && document.body.classList.contains('dark-mode')
        }"
         class="inline-flex items-center h-full space-x-2 text-base font-medium leading-6 transition duration-150 ease-in-out cursor-pointer select-none hover:text-wave-600 focus:outline-none">
        <span>vhosts</span>
        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
        </svg>
    </div>

    <!-- Dropdown content -->
    <div x-show="hostsOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-1"
         class="absolute z-10 w-48 mt-2 origin-top-right rounded-md shadow-lg"
         style="display: none;">
        <div class="rounded-md shadow-xs"
             :class="{
                'bg-white': !document.body.classList.contains('dark-mode'),
                'bg-gray-800': document.body.classList.contains('dark-mode')
            }">
            <div class="py-1">
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
        <a href="http://<?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?>"
           class="block px-4 py-2 text-sm hover:bg-gray-100"
           :class="{
                'text-gray-700 hover:bg-gray-100': !document.body.classList.contains('dark-mode'),
                'text-gray-300 hover:bg-gray-700': document.body.classList.contains('dark-mode')
            }"><?= htmlspecialchars($host, ENT_QUOTES, 'UTF-8') ?></a>
        <?php
    }
} else {
    ?>
    <span class="block px-4 py-2 text-sm text-gray-500">Archivo hosts no encontrado.</span>
    <?php
}
?>
            </div>
        </div>
    </div>
</div>


                <div class="w-1 h-5 mx-10 border-r" :class="{'border-gray-300': !document.body.classList.contains('dark-mode'), 'border-gray-600': document.body.classList.contains('dark-mode')}"></div>

                <a href="/phpmyadmin/" target="_blank" class="text-base font-medium leading-6 whitespace-no-wrap hover:text-wave-600 focus:outline-none" :class="{'text-gray-500': !document.body.classList.contains('dark-mode'), 'text-gray-300': document.body.classList.contains('dark-mode')}">
                    phpmyadmin
                </a>
            </nav>
        </div>
    </div>

    <!-- mobil -->
    <div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out scale-100" x-transition:enter-start="opacity-50 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-75 ease-in scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="absolute inset-x-0 top-0 transition origin-top transform md:hidden" style="display: none;">
        <div class="shadow-lg">
            <div class="divide-y-2 shadow-xs" :class="{'bg-white divide-gray-50': !document.body.classList.contains('dark-mode'), 'bg-gray-900 divide-gray-700': document.body.classList.contains('dark-mode')}">
                <div class="pt-6 pb-6 space-y-6">
                    <div class="flex items-center justify-between px-8 mt-1">
                        <div>
                            <img class="w-auto h-10 sm:h-10" src="img/logo.png" alt="">
                        </div>
                        <div class="-mr-2">
                            <button @click="mobileMenuOpen = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <nav class="grid gap-6 px-8 py-4">
                            <a href="/" class="text-base font-medium leading-6 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none" :class="{'text-gray-500': !document.body.classList.contains('dark-mode'), 'text-gray-300': document.body.classList.contains('dark-mode')}">domini</a>
                            
                            <!-- Mobile dropdown -->
                            <div x-data="{ mobileDropdownOpen: false }" class="space-y-2">
                                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="flex items-center justify-between w-full text-base font-medium leading-6 focus:outline-none" :class="{'text-gray-500': !document.body.classList.contains('dark-mode') && !mobileDropdownOpen, 'text-gray-300': document.body.classList.contains('dark-mode') && !mobileDropdownOpen, 'text-wave-600': mobileDropdownOpen}">
                                    <span>estudijoanpuig</span>
                                    <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'transform rotate-180': mobileDropdownOpen }" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                
                                <div x-show="mobileDropdownOpen" x-collapse class="pl-4 space-y-2">
                                    <a href="#" class="block text-sm" :class="{'text-gray-600': !document.body.classList.contains('dark-mode'), 'text-gray-400': document.body.classList.contains('dark-mode')}">Item 1</a>
                                    <a href="#" class="block text-sm" :class="{'text-gray-600': !document.body.classList.contains('dark-mode'), 'text-gray-400': document.body.classList.contains('dark-mode')}">Item 2</a>
                                    <a href="#" class="block text-sm" :class="{'text-gray-600': !document.body.classList.contains('dark-mode'), 'text-gray-400': document.body.classList.contains('dark-mode')}">Item 3</a>
                                </div>
                            </div>
                            
                            <div class="w-full h-px" :class="{'bg-gray-300': !document.body.classList.contains('dark-mode'), 'bg-gray-600': document.body.classList.contains('dark-mode')}"></div>
                            
                            <a href="/phpmyadmin/" class="text-base font-medium leading-6 whitespace-no-wrap hover:text-wave-600 focus:outline-none" :class="{'text-gray-500': !document.body.classList.contains('dark-mode'), 'text-gray-300': document.body.classList.contains('dark-mode')}">
                                phpmyadmin
                            </a>
                        </nav>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</header>
<!-- final navbar -->

    <!-- Hero -->
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            <div>
                <h1 class="bg-[radial-gradient(138.06%_1036.51%_at_95.25%_-2.54%,_#7ED4FD_14.06%,#709DF7_51.02%,#4D78EF_79.09%)] bg-clip-text text-5xl leading-[1.2] tracking-tighter text-transparent sm:text-center sm:text-[4rem] sm:leading-[4.75rem] lg:text-left">Insta.lacio i configuracio de NanoGallery PhotosProvider<span class="text-blue-600"> html Tailwind</span></h1>
                <p class="mt-3 text-lg" :class="{'text-gray-600': !document.body.classList.contains('dark-mode'), 'text-gray-400': document.body.classList.contains('dark-mode')}">Ajudat per a la IA DeepSeek.</p>

                <div class="mt-12 hidden lg:flex">
                    <button type="button" class="rounded-full bg-sky-300 py-2 px-6 font-semibold text-slate-900 hover:bg-sky-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900">
                        <a href="https://nanophotosprovider2.nanostudio.org/">NANO PHOTOS PROVIDER</a>
                    </button>
                    <a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_npp2" class="ml-6 rounded-full border py-2 px-6 font-semibold focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900" :class="{'border-white/10 bg-slate-700/40 text-white hover:border-white/20 hover:bg-slate-700/60': document.body.classList.contains('dark-mode'), 'border-gray-300 bg-gray-100 text-gray-700 hover:bg-gray-200': !document.body.classList.contains('dark-mode')}">
                        CONFIGURAR
                    </a>
                </div>
            </div>
            <!-- End Col -->

            <div class="relative ms-4">
                <img class="w-full rounded-md" src="nanogallery.png" alt="Hero Image">
                <div class="absolute inset-0 -z-1 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6" :class="{'bg-linear-to-tr from-gray-200 via-white/0 to-white/0': !document.body.classList.contains('dark-mode'), 'from-neutral-800 via-neutral-900/0 to-neutral-900/0': document.body.classList.contains('dark-mode')}"></div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Hero -->
	
	
	

    <!-- Secció d'instruccions AMB TABS--> 
<div class="container mx-auto my-12" x-data="tabs">
  <div class="flex flex-wrap justify-center">
    <div class="hidden md:block md:w-1/12"></div>
    <div class="w-full md:w-10/12">
      <h2 class="text-center text-2xl font-bold my-8 text-gray-800 dark:text-white">
        nanoPhotosProvider2 usage
      </h2>

      <!-- Tabs Navigation -->
      <div class="flex border-b border-gray-200 dark:border-gray-600">
        <template x-for="(tab, index) in ['Installation', 'HTML Configuration', 'Testing']" :key="index">
          <button
            class="px-4 py-2 font-medium focus:outline-none"
            :class="{
              'text-blue-600 border-b-2 border-blue-600 dark:text-blue-400 dark:border-blue-400': activeTab === index + 1,
              'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-100': activeTab !== index + 1
            }"
            @click="activeTab = index + 1"
            x-text="tab"
          ></button>
        </template>
      </div>

      <!-- Tabs Content -->
      <div class="text-left text-lg space-y-6 mt-6 text-gray-700 dark:text-white">
        <!-- Tab 1 -->
        <div x-show="activeTab === 1" x-transition>
          <p class="font-bold">
            <i class="fa fa-arrow-right mr-2" aria-hidden="true"></i> Step 1: installation
          </p>
          <ul class="list-disc pl-5 space-y-2 mt-4">
            <li>crea una carpeta anomenada <strong>nano_photos_provider2</strong></li>
            <li>en aquesta carpeta:
              <ul class="list-disc pl-5 space-y-2 mt-2">
                <li>copy the files:
                  <ul class="list-disc pl-5 space-y-2 mt-2">
                    <li>nano_photos_provider2.php</li>
                    <li>nano_photos_provider2.json.class.php</li>
                    <li>nano_photos_provider2.cfg</li>
                    <li>nano_photos_provider2.encoding.php</li>
                  </ul>
                </li>
                <li>crea una carpeta anomenada <strong>nano_photos_content</strong>
                  <ul class="list-disc pl-5 space-y-2 mt-2">
                    <li>copia les teves fotos allà</li>
                    <li>pots organitzar les teves fotos en carpetes (= àlbums)</li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- Tab 2 -->
        <div x-show="activeTab === 2" x-transition>
          <p class="font-bold">
            <i class="fa fa-arrow-right mr-2" aria-hidden="true"></i> Step 2: configure your HTML page
          </p>
          <ul class="list-disc pl-5 space-y-2 mt-4">
            <li>The page can be located anywhere on your webserver.</li>
            <li>Install and configure nanogallery2 (<a href="https://nanogallery2.nanostudio.org/datasource.html#ngy2_cloud" class="text-blue-400 hover:underline">link</a>)</li>
            <li>Use parameters: <strong>kind</strong> and <strong>dataProvider</strong></li>
            <li>kind: 'nano_photos_provider2'</li>
            <li>dataProvider: URL to nano_photos_provider2.php</li>
          </ul>
          <p class="mt-4">Example:</p>
          <pre class="p-4 rounded overflow-x-auto bg-gray-100 dark:bg-gray-800">
<code class="text-sm text-gray-800 dark:text-gray-100">
<pre>
 <code id="htmlViewer" style="color:rgb(68, 68, 68); font-weight:400;background-color:rgb(240, 240, 240);background:rgb(240, 240, 240);display:block;padding: .5em;">&lt;div id=<span style="color:rgb(136, 0, 0); font-weight:400;">&quot;nanogallery2&quot;</span> <span style="color:rgb(68, 68, 68); font-weight:700;">data</span>-nanogallery2=&#x27;{
    <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;kind&quot;</span>:             <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;nano_photos_provider2&quot;</span>,
    <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;dataProvider&quot;</span>:     <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;http://mywebsever.com/nano_photos_provider2/nano_photos_provider2.php&quot;</span>,
    <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;thumbnailHeight&quot;</span>:  <span style="color:rgb(136, 0, 0); font-weight:400;">150</span>,
    <span style="color:rgb(136, 0, 0); font-weight:400;">&quot;thumbnailWidth&quot;</span>:   <span style="color:rgb(136, 0, 0); font-weight:400;">150</span>
  }&#x27;&gt;      
&lt;/div&gt;</code></pre>
</code>
</pre>
        </div>

        <!-- Tab 3 -->
        <div x-show="activeTab === 3" x-transition>
          <p class="font-bold">
            <i class="fa fa-arrow-right mr-2" aria-hidden="true"></i> Step 3: test your page
          </p>
          <p class="mt-4">After completing the installation and configuration, open your web page in a browser to see the photo gallery in action.</p>
        </div>
      </div>
    </div>
    <div class="hidden md:block md:w-1/12"></div>
  </div>
</div>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('tabs', () => ({
      activeTab: 1
    }))
  });
</script>


<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('tabs', () => ({
      activeTab: 1
    }))
  });
</script>
	
    <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-center md:text-6xl md:tracking-tight">
        <span class="bg-[radial-gradient(138.06%_1036.51%_at_95.25%_-2.54%,_#7ED4FD_14.06%,#709DF7_51.02%,#4D78EF_79.09%)] bg-clip-text text-5xl leading-[1.2] tracking-tighter text-transparent sm:text-center sm:text-[4rem] sm:leading-[4.75rem] lg:text-left">nanogallery</span>
    </h1>

    <!-- NanoGallery Container -->
    <div class="container mx-auto px-4 mb-12">
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

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>
    
    <!-- TAILWIND Back Top Top Button -->
    <button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full drop-shadow-md bg-indigo-500 text-white text-3xl font-bold">&uarr;</button>

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
            
            // Forzar actualización de Alpine.js
            document.dispatchEvent(new Event('darkModeChanged'));
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
        
        // Botón "volver arriba"
        var toTopButton = document.getElementById("to-top-button");
        
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }
        
        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>