<?php
/*
	Tim hieu Array
*/

	$sinhviens = array(
			array(
				'name' => 'Manh',
				'age' => 18,
				'weight' => 60
			),
			array(
				'name' => 'An',
				'age' => 20,
				'weight'=> 55
			)
		);
	$method = $_SERVER['REQUEST_METHOD'];
	$total_age = 0;
	$total_weight = 0;

	// Day la request GET den
	if($method == 'GET') {
		foreach ($sinhviens as $key => $sinhvien) {
			# code...
			$sinhvien_name = $sinhvien['name'];
			$sinhvien_age = $sinhvien['age'];
			$sinhvien_weight = $sinhvien['weight'];

			$total_age += (int) $sinhvien_age;
			$total_weight += (int) $sinhvien_weight;
		}
	} else { // $method == "POST"
		$results = array();
		$age = isset($_POST['age']) && !empty($_POST['age']) ? $_POST['age'] : true;
		$weight = isset($_POST['weight'])&& !empty($_POST['weight']) ? $_POST['weight'] : true;
		foreach ($sinhviens as $key => $sinhvien) {
			$sinhvien_age = $sinhvien['age'];
			$sinhvien_weight = $sinhvien['weight'];

			if($sinhvien_age == $age && $sinhvien_weight == $weight) {
				$total_age += $sinhvien_age;
				$total_weight += $sinhvien_weight;
				$results[] = $sinhvien;
			}
		}
		$sinhviens = $results;
	}
	$total_records = count($sinhviens);
	if($total_records == 0) {
		$average_age = 0;
		$average_weight = 0;
	} else {
		$average_age = $total_age / $total_records;
		$average_weight = $total_weight / $total_records;
	}	


?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
	<form action="" method="POST">
		<label>Age</label>
		<select name="age">
			<option value="" <?php echo isset($age)&&$age===true ? "selected" : null ?>></option>
			<option value="18" <?php echo (isset($age)&&$age==="18") ? "selected" : null ?>>18</option>
			<option value="19" <?php echo (isset($age)&&$age === "19") ? "selected" : null ?>>19</option>
			<option value="20" <?php echo (isset($age)&&$age === "20") ? "selected" : null ?>>20</option>
		</select>
		<label>Weight</label>
		<select name="weight">
			<option value="" <?php echo isset($weight) ? "selected" : null ?>></option>
			<option value="50" <?php echo (isset($weight) && $weight === "50") ? "selected" : null ?>>50</option>
			<option value="55" <?php echo (isset($weight) && $weight === "55") ? "selected" : null ?>>55</option>
			<option value="60" <?php echo (isset($weight) && $weight === "60") ? "selected" : null ?>>60</option>
		</select>	
		<input type="submit" name="Search">	
	</form>

  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Weight</th>
  </tr>
  <?php foreach($sinhviens as $sinhvien) { ?>
  <tr>
    <td><?php echo $sinhvien['name'];?></td>
    <td><?php echo $sinhvien['age'];?></td>
    <td><?php echo $sinhvien['weight'];?></td>
  </tr>
 	<?php } ?>
</table>
  <table>
  	<tr>
  		<th>Average age</th>
  		<th>Average weight</th>
  	</tr>
  	<tr>
  		<td><?php echo $average_age ?></td>
  		<td><?php echo $average_weight ?></td>
  	</tr>
  </table>
</body>
</html>
