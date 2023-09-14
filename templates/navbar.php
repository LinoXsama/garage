<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <!-- LOGO DU GARAGE -->
        <img src="config/logo2.png" alt="Logo Garage Vincent">&nbsp;&nbsp;
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 text-secondary">Accueil</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Services</a></li>
        <li><a href="cars.php" class="nav-link px-2 text-white">Nos véhicules</a></li>
        <li><a href="contact.php" class="nav-link px-2 text-white">Contactez-nous</a></li>
      </ul>

      <div class="text-end">
        <?php
          if(isset($_SESSION['user_id']) & ($_SESSION['USER_TYPE'] === 'admin'))
          {
            echo '<a href="admin_dashboard.php" class="btn btn-outline-light me-2">ADMINISTRATION</a>';
          }
          else if(isset($_SESSION['user_id']) & ($_SESSION['USER_TYPE'] === 'employee'))
          {
            echo '<a href="user_dashboard.php" class="btn btn-outline-light me-2">ADMINISTRATION</a>';
          }

          if(isset($_SESSION['user_id']))
          {
            echo '<a href="logout.php" class="btn btn-outline-light me-2">DECONNEXION</a>';
          }
          else 
          {
            echo '<a href="login.php" class="btn btn-outline-light me-2">CONNEXION</a>';
          }
        ?>
      </div>
    </div>
  </div>
</header>