<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add a Home</title>

</head>

<body>

  <h1>Add your home</h1>
  <hr>

  <?php

  // TODO Create a FORM to ADD items of housing to the TABLE named "housing".
  // ? Required fields are: title, address, city, pc, area, price, type

  $title = '';
  $address = '';
  $city = '';
  $pc = '';
  $area = '';
  $price = '';
  $desc = '';


  if (!empty($_POST)) {
    $title = $_POST['titleInput'];
    $adress = $_POST['addressInput'];
    $city = $_POST['cityInput'];
    $pc = $_POST['postcodeInput'];
    $area = $_POST['areaInput'];
    $price = $_POST['priceInput'];
    $selected = $_POST['homeInput'];
    $image = $_FILES['file-input'];
    $desc = $_POST['descInput'];

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'real_estate';

    $conn = mysqli_connect($server, $user, $password);
    echo 'Connection successful!' . '<br>';
    // var_dump($conn);

    $db_found = mysqli_select_db($conn, $db_name);

    // ? The POSTAL CODE format must be verified and correct
    $num_length = strlen((string) $pc);
    if (strlen($pc) !== 4) {
      echo 'Please enter a valid Luxembourg postal code.';
    } else {
      // echo 'Postal Code accepted!';
    }

    // ? The PRICE and AREA fields must contain integers only
    if (empty($_POST["areaInput"]) || empty($_POST['priceInput'])) {
      echo 'You must enter a number.';
    }

    // ? The PHOTO field must allow an image file upload, with several checks: extension and type of file, size of the file, etc.
    // ! Researched this via this website: https://phppot.com/php/php-image-upload-with-size-type-dimension-validation/
    if (isset($_POST["upload"])) {
      // Get Image Dimension
      $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
      $width = $fileinfo[0];
      $height = $fileinfo[1];

      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );

      // Get image file extension
      $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);

      // Validate file input to check if is not empty
      if (!file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
          "type" => "error",
          "message" => "Choose image file to upload."
        );
      }    // Validate file input to check if is with valid extension
      else if (!in_array($file_extension, $allowed_image_extension)) {
        $response = array(
          "type" => "error",
          "message" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
        echo $result;
      }    // Validate image file size
      else if (($_FILES["file-input"]["size"] > 2000000)) {
        $response = array(
          "type" => "error",
          "message" => "Image size exceeds 2MB"
        );
      }    // Validate image file dimension
      else if ($width > "300" || $height > "200") {
        $response = array(
          "type" => "error",
          "message" => "Image dimension should be within 300X200"
        );
      } else {
        $target = "image/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
          $response = array(
            "type" => "success",
            "message" => "Image uploaded successfully."
          );
        } else {
          $response = array(
            "type" => "error",
            "message" => "Problem in uploading image files."
          );
        }
      }
    }

    // Testing the content.
    // var_dump($title);
    // var_dump($adress);
    // var_dump($city);
    // var_dump($pc);
    // var_dump($area);
    // var_dump($price);
    // var_dump($selected);
    // var_dump($desc);
    var_dump($image);

    if ($db_found) {
      echo "$db_name found!<br>";
      $query = "INSERT INTO housing (title, address, city, pc, area, price, photo, type, description)
      VALUES ('$title', '$address', '$city', '$pc', '$area', '$price', '$image', '$selected', '$desc')";
    }
  }

  ?>
  <form action="" method="POST" id="frm-image-upload" name='img' enctype="multipart/form-data">
    <input type="text" name="titleInput" placeholder="title of home" required>
    <label for="address">Adress
      <input type="text" name="addressInput" placeholder="address" required>
      <input type="text" name="cityInput" placeholder="city" required>
      <input type="text" name="postcodeInput" placeholder="postal code" required>
    </label>
    <input type="number" name="areaInput" placeholder="area (in sq. meters)" required>
    <input type="number" name="priceInput" placeholder="price" required>
    <?php
    // ? The TYPE field MUST be managed via a RADIO input type or a SELECT option.
    ?>
    <select name="homeInput">
      <option value="Bungalow">Bungalow</option>
      <option value="Semi-Detached">Semi-Detached</option>
      <option value="Detached">Detached</option>
      <option value="Flat">Flat</option>
      <option value="Rowhome">Rowhome</option>
      <option value="Cottage">Cottage</option>
      <option value="Manor">Manor</option>
      <option value="Mansion">Mansion</option>
      <option value="Fortress">Fortress</option>
      <option value="Castle">Castle</option>
      <option value="Shack">Shack</option>
      <option value="Hovel">Hovel</option>
      <option value="Hut">Hut</option>
      <option value="Cave">Cave</option>
      <option value="Mound of Dirt">Mound of Dirt</option>
    </select>
    <input type="file" name="file-input">
    <input type="text" name="descInput" placeholder="description" required>
    <input type="submit" name="submitBtn" Value="Add Home" required>
  </form>

</body>

</html>