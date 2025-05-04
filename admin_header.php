<?php 
session_start();
include "connection.php";
?>


<nav class="navbar navbar-expand sticky-top" style="background-color:rgb(255, 202, 104);">
  <div class="container-lg">
    <a class="navbar-brand"  href="#">Kedai Kopi Kenangan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
        
        <li class="mt-2">
          <a class="navbar-brand" href="admin_list.php"><b><?php echo $_SESSION['username']; ?></a>
          </li>

          <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          </a>


          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
          </ul>

          
          

        </li>
      </ul>
    </div>
  </div>
</nav>