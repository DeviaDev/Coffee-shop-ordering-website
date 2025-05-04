<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="login.css">

	<?php include "head.php"; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

<link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Agbalumo&family=Hedvig+Letters+Serif:opsz@12..24&family=Libre+Baskerville:ital@1&family=Merriweather:ital,wght@0,300;1,300&family=Noto+Sans+Kawi&family=Playfair+Display&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Ubuntu+Condensed&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

</head>
<body class="main">

<nav class="navbar">
<h1>Dashboard Admin</h1>
</nav>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="check_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="login">
 
			<br/>
			<br/>
		</form>
		
	</div>

    <div class="fixed-bottom text-center">
    Copyright 2025, Kedai Kopi Kenangan
</div>
 
</body>
</html>