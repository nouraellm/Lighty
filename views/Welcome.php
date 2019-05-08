 <div class="doc-wrapper">
            <div class="container">
                <div class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="download-section" class="doc-section">
                                <h2 class="section-title">Overview</h2>
                                <div class="section-block">
                                    <p>Lighty is a free open-source PHP & MVC based framework, created by <a href="https://github.com/nouraellm" target="_blank">Noura</a> and tested/cleaned by <a href="https://github.com/AXeL-dev" target="_blank"> Anass (aka: AXeL) </a> for learning purpose. The current version is <b>v.1.0</b> was launched on 8 May 2019 provides a very light reusable code which is going to be improved in the upcoming version, including the architecture and adding new features.
                                    </p>
                                </div>
                            </section>
                            <section id="installation-section" class="doc-section">
                                <h2 class="section-title">Installation</h2>
                                <div id="step1"  class="section-block">
                                    <h3 class="block-title">Requirements</h3>
                                     <ul>
                                         <li> PHP >= 7.2 </li>
                                         <li> Python 3.4 for Argon2i hashing</li>
                                         <li> mod_rewrite enabeled </li>
                                         <li> Composer installed </li>
                                     </ul>
                                    </p>
                                </div>
                                <div id="step2"  class="section-block">
                                    <h3 class="block-title">Download</h3>
                                    <p>The repository is available for clones and contributions on github <a href="https://github.com/nouraellm/Lighty" target="_blank">(check it here)</a>. However you can Download the v.1.0 of Lighty Framework using the button below:
                                    </p>
                                    <p><a href="https://github.com/nouraellm/Lighty/archive/master.zip" class="btn btn-blue" target="_blank"><i class="fas fa-download"></i> Lighty Framework v.1.0</a></p>
                                </div>
                                <div id="step3"  class="section-block">
                                    <h3 class="block-title">Setup</h3>
                                    <p> if you used the the download button unzip the folder and then open it, you can use the following commands if you like terminal:
                                    </p>
                                    <p><code class="language-bash"> &nbsp; $ cd Lighty-master &nbsp;</code></p>
                                    <p>Then run composer to install dependecies</p>
                                    <p><code class="language-bash"> &nbsp; $/Lighty-master# composer install &nbsp;</code></p>
                                    <p> Now it's all done, you only need to create a database and change configurations in <b>conf/Config.php</b> to match your server's configuration, for example: </p>
                                    <p><pre><code class="language-php">                         
 /*
  * Database Configuration
  */
  define('ENABLED', TRUE);
  define('HOST',      '127.0.0.1');
  define('USERNAME',  'root');
  define('PASSWORD',  '');
  define('DATABASE',  'framework');  </code>
                                </pre>
                            </p>
                        </div>
                </section>
                            <section id="code-section" class="doc-section">
                                <h2 class="section-title">Architecture</h2>
                                <div class="section-block">
                                    <p>
                                        Lighty is easy to use and understand, if you still have a doubt about how PHP/MVC works, you can use this framework to give you a push forward.
                                    </p>
                                        <p>
                                        <pre>
                                         ├── app
                                         │   ├── Controller.php
                                         │   ├── Core.php
                                         │   ├── Database.php
                                         │   ├── Errors.php
                                         │   ├── Model.php
                                         │   └── View.php
                                         ├── composer.json
                                         ├── conf
                                         │   ├── Config.php
                                         │   ├── Functions.php
                                         │   └── Routes.php
                                         ├── controllers
                                         │   └── HomeController.php
                                         ├── models
                                         │   └── Home.php
                                         ├── public
                                         │   ├── assets
                                         │   │   ├── css
                                         │   │   │   ├── bootstrap.min.css
                                         │   │   │   ├── prism.css
                                         │   │   │   └── styles.css
                                         │   │   ├── images
                                         │   │   │   ├── favicon.ico
                                         │   │   │   └── logo.png
                                         │   │   └── js
                                         │   │       ├── all.js
                                         │   │       ├── bootstrap.min.js
                                         │   │       ├── jquery-3.3.1.min.js
                                         │   │       ├── jquery.scrollTo.min.js
                                         │   │       ├── main.js
                                         │   │       ├── prism.js
                                         │   │       └── stickyfill.js
                                         │   └── index.php
                                         ├── vendor
                                         │   ├── autoload.php
                                         │   └── composer
                                         │       ├── autoload_classmap.php
                                         │       ├── autoload_namespaces.php
                                         │       ├── autoload_psr4.php
                                         │       ├── autoload_real.php
                                         │       ├── autoload_static.php
                                         │       ├── ClassLoader.php
                                         │       ├── installed.json
                                         │       └── LICENSE
                                         └── views
                                             ├── errors
                                             │   └── index.php
                                             ├── includes
                                             │   ├── Footer.php
                                             │   └── Header.php
                                             └── Welcome.php</pre></p>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
                            
                                <nav id="doc-menu" class="nav doc-menu flex-column sticky">
                                    <a class="nav-link scrollto" href="#download-section">Overview</a>
                                    <a class="nav-link scrollto" href="#installation-section">Installation</a>
                                    <nav class="doc-sub-menu nav flex-column">
                                        <a class="nav-link scrollto" href="#step1">Requirements</a>
                                        <a class="nav-link scrollto" href="#step2">Download</a>
                                        <a class="nav-link scrollto" href="#step3">Setup</a>
                                    </nav>
                                    <a class="nav-link scrollto" href="#code-section">Architecture</a>
                                </nav>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    
    