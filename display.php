<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Homes Display</title>
  <style>
    h1 {
      text-align: center;
    }
  </style>
</head>

<body>


  <h1>Home Display</h1>
  <hr>

  <?php
  $server = 'localhost';
  $user = 'root';
  $password = '';
  $db_name = 'real_estate';

  $conn = mysqli_connect($server, $user, $password);
  // echo 'Connection successful.' . '<br>';
  $db_found = mysqli_select_db($conn, $db_name);

  // TODO - Find all of the housing items with their respective information
  if ($db_found) {
    // echo "$db_name found!<br>";
    // Prepare the query:
    $query = 'SELECT * FROM housing';
    // Send the query to the DB
    $results = mysqli_query($conn, $query);
    // $db_record = mysqli_fetch_assoc($results);
    // $db_record2 = mysqli_fetch_assoc($results);
    echo '<table border="1">';
    while ($db_record = mysqli_fetch_assoc($results)) {

      echo '<tr><th>Name:</th>';
      echo '<th>Address:</th>';
      echo '<th>City:</th>';
      echo '<th>Postal Code:</th>';
      echo '<th>Size (m²):</th>';
      echo '<th>Price (€):</th>';
      echo '<th>Type of Home:</th>';
      echo '<th>Description:</th>';
      echo '<th>Image:</th></tr>';
      echo '<tr><td>' . $db_record['title'] . '</td>';
      echo '<td>' . $db_record['address'] . '</td>';
      echo '<td>' . $db_record['city'] . '</td>';
      echo '<td>' . $db_record['pc'] . '</td>';
      echo '<td>' . $db_record['area'] . '</td>';
      echo '<td>' . $db_record['price'] . '</td>';
      echo '<td>' . $db_record['type'] . '</td>';
      echo '<td>' . $db_record['description'] . '</td>';
      echo '<td><img height="200px" src="imgs/' . $db_record['photo'] . '"></tr></td>';
    }
  } else {
    echo "$db_name not found!";
  }

  mysqli_close($conn);
  ?>
</body>

</html>