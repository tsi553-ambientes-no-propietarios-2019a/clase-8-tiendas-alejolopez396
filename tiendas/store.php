<?php 
include('common/utils.php');
if($_GET) {
	if(isset($_GET['id'])) {
		$id_tienda_url = $_GET['id'];
	}
}
$products = getProducts($conn, $id_tienda_url);
$id_tienda_sesion = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
</head>
<body>
    <h1>Tienda: <?php echo $_SESSION['user']['store']; ?></h1>
    <br>

    <?php if($id_tienda_sesion==$id_tienda_url) { ?>
        <a href="new_product.php">añadir producto</a>
    <?php } 

    ?>


    <h2>Lista de productos </h2>
    
    <table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Stock</th>
				<th>Precio</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($products as $p) { ?>
				<tr>
					<td><?php echo $p['code'] ?></td>
					<td><?php echo $p['name'] ?></td>
					<td><?php echo $p['type'] ?></td>
					<td><?php echo $p['stock'] ?></td>
					<td><?php echo $p['price'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
    
    <br>
    <form action="home.php" method="post">
        <button>Regresar a home</button>
    </form>
</body>
</html>