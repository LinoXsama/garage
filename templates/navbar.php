<header class="p-3 text-bg-dark">
  <div class="container">
  
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <!-- LOGO DU GARAGE -->
          <img src="config/logo2.png" alt="Logo Garage Vincent">&nbsp;&nbsp;
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-secondary">Accueil</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link px-2 text-white">Services</a></li>
          <li class="nav-item"><a href="cars.php" class="nav-link px-2 text-white">Nos véhicules</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link px-2 text-white">Contactez-nous</a></li>
        </ul>
      </div>

        <div class="ml-auto">
          <?php
            
            if(isset($_SESSION['user_id'])) 
            {
              if($_SESSION['USER_TYPE'] === 'admin')
              {
                echo '<a href="admin_dashboard.php" class="btn btn-outline-light btn-sm me-2">ADMINISTRATION</a>';
              }
            }
            
            if(isset($_SESSION['user_id']))
            {
              if($_SESSION['USER_TYPE'] === 'employee')
              {
                echo '<a href="user_dashboard.php" class="btn btn-outline-light btn-sm me-2">ADMINISTRATION</a>';
              }
            }
            if(isset($_SESSION['user_id']))
            {
              echo '<a href="logout.php" class="btn btn-outline-light btn-sm me-2 ctm-btn2">DECONNEXION</a>';
            }
            else
            {
              echo '<a href="login.php" class="btn btn-outline-light btn-sm me-2">CONNEXION</a>';
            }
          ?>
        </div>
      </nav>

      <!-- Menu coulissant pour écrans de petite taille -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavMobile">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="index.php" class="nav-link text-secondary">Accueil</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">Services</a></li>
                        <li class="nav-item"><a href="cars.php" class="nav-link text-white">Nos véhicules</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link text-white">Contactez-nous</a></li>
                    </ul>
                </div>
            </nav>
    
  </div>
</header>