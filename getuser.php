<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$dbc = mysqli_connect('localhost','24011_alien','24011_alien','24011_aliendatabase');
if (!$dbc) {
    die('Could not connect: ' . mysqli_error($dbc));
}

mysqli_select_db($dbc,"w3c_ajax_demo");
$sql = "SELECT * FROM w3c_ajax_demo WHERE FirstName LIKE '%" . $_GET['q'] . "%' OR LastName LIKE '%" . $_GET['q'] . "%'";
$result = mysqli_query($dbc, $sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($dbc);
?>
</body>
</html>
