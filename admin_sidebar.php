<div class="container-lg">
    <div class="row">
        <div class="col-lg-3" >    
        <nav class="navbar navbar-expand-lg rounded border mt-3" style="background-color:rgb(255, 249, 237)">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='a_list_admin')? 'active link-light ': 'link-dark' ;?>" aria-current="page" href="a_list_admin.php?x=a_list_admin"><i class="bi bi-person-fill"></i> Admin</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_menu')? 'active link-light ': 'link-dark' ;?>" href="admin_menu.php?x=admin_menu"><i class="bi bi-book-fill"></i></i> Menu</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_order')? 'active link-light ': 'link-dark' ;?>" href="admin_order.php?x=admin_order"><i class="bi bi-basket3-fill"></i></i> Order</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='admin_status_meja')? 'active link-light ': 'link-dark' ;?>" href="admin_status_meja.php?x=admin_status_meja"><i class="bi bi-clipboard2-fill"></i> Status Meja</a>
          </li>
        </ul>
      
      </div>
    </div>
  </div>
</nav>
        </div>
