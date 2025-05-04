<?php 

include('connection.php');

$query = mysqli_query($conn, 'SELECT * FROM menu');
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kedai Kopi Kenangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="user_menu.css">

  </head>
  <body class="menu">
    <div class="container py-10 my-3">
      <div class="row">
        <div class="title">
        <h1>Menu</h1>
          <h1>Kedai Kopi Kenangan</h1>
          <br>
          <h4 class="moto">Jln. Cirebon-kediri no.245 depan ramayana 1, papua barat, indonesia</h4> 
          
          <h4 class=" moto mb-4" >================================================================</h4> 
        </div>
        <br>
        <br>
        <br>

        <h2 class="motoo">Pilih Pesananmu</h2>


        <div class="container">
        <div class="row mt-3">

        <div class="page-header clearfix">
                      
                        <a href="user_order.php" class="btn btn-warning pull-right">Keranjang</a>

                    </div>

          
          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
          <div class="menu-item" data-id="<?php echo $result['id_menu']; ?>" data-name="<?php echo $result['nama_menu']; ?>" data-price="<?php echo $result['harga']; ?>">

          <div class="card-body">
              <img src="images/<?php echo $result['gambar'] ?>" class="card-img-top" alt="foto" alt="foto" width="50" height="200">
              

                <h5 class="card-title font-weight-bold mb-3"><?php echo $result['nama_menu'] ?> </h5>

                <h5 class="card-title font-weight-bold mb-3"><?php echo $result['deskripsi'] ?></h5>

               <label class="mb-3" class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>

               <button class="btn btn-success btn-sm w-100 mt-2" onclick="addToOrder(this)">Beli</button>

                
              </div>
              </div>
          </div>
          <?php endforeach; ?>
         </div> 

      </div>
  
  </div>


  
  <script>
    const order = JSON.parse(localStorage.getItem('order')) || [];

    function addToOrder(button) {
      const menuItem = button.closest('.menu-item');
      const id = menuItem.dataset.id;
      const name = menuItem.dataset.name;
      const price = parseInt(menuItem.dataset.price);

      const existingItem = order.find(item => item.id === id);
      if (existingItem) {
        existingItem.quantity++;
      } else {
        order.push({ id, name, price, quantity: 1 });
      }

      localStorage.setItem('order', JSON.stringify(order));
      alert(`${name} added to your order!`);
    }

  </script>
  
</body>
</html> 
