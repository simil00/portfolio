<?php
$menu = array();
$conn = Konekcija::Connect();

$sql = "SELECT * FROM strane";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
	$menu[] = array($row['strana'], $row['naziv_stranice']);
}

$conn->close();
?>