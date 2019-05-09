# Overview
Lighty is a free open-source PHP & MVC based framework, created by **Noura** and tested/cleaned by **<a href="https://github.com/AXeL-dev" target="_blank"> Anass (aka: AXeL) </a>** for learning purpose. The current version is <b>v.1.0</b> was launched on 8 May 2019 provides a very light reusable code which is going to be improved in the upcoming version, including the architecture and adding new features.
# Installation
### Requirements
- PHP >= 7.2
- Python 3.4 for Argon2i hashing
- mod_rewrite enabled
- Composer installed
### Download
Clone <code>$ git clone https://github.com/nouraellm/Lighty.git</code> or download the zip folder.
### Setup
if you used the the download button unzip the folder and then open it, you can use the following commands if you like terminal:

      $ cd Lighty-master  

Then run composer to install dependecies

      $/Lighty-master# composer install  

Now it's all done, you only need to create a database and change configurations in **conf/Config.php** to match your server's configuration, for example:

 <pre>                        
 /*
  * Database Configuration
  */
  define('ENABLED', TRUE);
  define('HOST',      '127.0.0.1');
  define('USERNAME',  'root');
  define('PASSWORD',  '');
  define('DATABASE',  'framework');  
  
  </pre>
                                
# Architecture
Lighty is easy to use and understand, if you still have a doubt about how PHP/MVC works, you can use this framework to give you a push forward.

                                         ├── app
                                         │   ├── Controller.php
                                         │   ├── Core.php
                                         │   ├── Database.php
                                         │   ├── Errors.php
                                         │   ├── Model.php
                                         │   └── View.php
                                         ├── composer.json
                                         ├── conf
                                         │   ├── Config.php
                                         │   ├── Functions.php
                                         │   └── Routes.php
                                         ├── controllers
                                         │   └── HomeController.php
                                         ├── models
                                         │   └── Home.php
                                         ├── public
                                         │   ├── assets
                                         │   │   ├── css
                                         │   │   │   ├── bootstrap.min.css
                                         │   │   │   ├── prism.css
                                         │   │   │   └── styles.css
                                         │   │   ├── images
                                         │   │   │   ├── favicon.ico
                                         │   │   │   └── logo.png
                                         │   │   └── js
                                         │   │       ├── all.js
                                         │   │       ├── bootstrap.min.js
                                         │   │       ├── jquery-3.3.1.min.js
                                         │   │       ├── jquery.scrollTo.min.js
                                         │   │       ├── main.js
                                         │   │       ├── prism.js
                                         │   │       └── stickyfill.js
                                         │   └── index.php
                                         ├── vendor
                                         │   ├── autoload.php
                                         │   └── composer
                                         │       ├── autoload_classmap.php
                                         │       ├── autoload_namespaces.php
                                         │       ├── autoload_psr4.php
                                         │       ├── autoload_real.php
                                         │       ├── autoload_static.php
                                         │       ├── ClassLoader.php
                                         │       ├── installed.json
                                         │       └── LICENSE
                                         └── views
                                             ├── errors
                                             │   └── index.php
                                             ├── includes
                                             │   ├── Footer.php
                                             │   └── Header.php
                                             └── Welcome.php
                                        
 ## Note 
 
 This project was made for learning purpose. Feel free to <img src="https://img.icons8.com/material/24/000000/code-fork.png"> and contribute.    
