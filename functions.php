<?php 

$conn = mysqli_connect("localhost", "root", "root", "DATA_PENDUDUK");

	function query($query){https://programmeradzansubuh.000webhostapp.com/
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}

		return $rows;
	}

 ?>
