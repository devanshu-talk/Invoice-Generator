<?php
session_start();
$items = $_POST['items'];
$_SESSION['items'] = $items;
if (!isset($_SESSION['items'])) {
	header('location:item.php');
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Invoice Generator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div id="b">
		<h1>
			<marquee scrollamount="5"> Welcome To Billing System </marquee>
		</h1>
	</div>
	

	<form action="invoice-result.php" method="POST">
		<div class="form-group justify-content-center">
			<table style="text-align:center;"> <br>
				<tr>
					<td>Date</td>
					<td> 
					<input type='text' class="form-control" name='date' /> 
					</td>
					<td>ID</td>
					<td> <input type='text' class="form-control" name='id' /> </td>
					<td>Customer ID</td>
					<td> <input type='text' class="form-control" name='custId' /> </td>
				</tr>
				
				<tr>
					<td colspan=2>
						<b>Bill To :: </b> <br>
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td> <input type='text' class="form-control" name='name' /> </td>
				</tr>
				<tr>
					<td>Company</td>
					<td> <input type='text' class="form-control" name='company' /> </td>
				</tr>
				<tr>
					<td>Address</td>
					<td> <input type='text' class="form-control" name='address' /> </td>
				</tr>
				<tr>
					<td>Phone</td>
					<td> <input type='text' class="form-control" name='phone' /> </td>
				</tr>

				<?php
				for ($i = 1; $i <= $items; $i++) {
				?>
					<tr>
						<td colspan=2>
							<b>Item <?php echo $i; ?></b>
						</td>
					</tr>
					<tr>
						<td>Name</td>
						<td> <input type='text' class="form-control" name="itemname<?php echo $i; ?>" /> </td>
					</tr>
					<tr>
						<td>Qty</td>
						<td> <input type='text' class="form-control" name="itemQty<?php echo $i; ?>" /> </td>
					</tr>
					<tr>
						<td>Tax</td>
						<td> <input type='text' class="form-control" name="itemTax<?php echo $i; ?>" /> </td>
					</tr>
					<tr>
						<td>Amount</td>
						<td> <input type='text' class="form-control" name="itemamount<?php echo $i; ?>" /> </td>
					</tr>
				<?php

				}

				?>

				<tr>
					<td colspan=2>
						<input type="submit" class="btn btn-primary" name="submit" value="Print Bill">

					</td>
				</tr>
			</table>
		</div>
	</form>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>