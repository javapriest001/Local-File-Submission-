<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'nid_exam';


$conn = mysqli_connect($server , $username , $password, $db_name );
if (!$conn){
    echo "Could not connect to database";
}

if (isset($_POST['submit'])){
    $matric = $_POST['matric'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
   // $extension = pathinfo($filename, PATHINFO_EXTENSION);


    // the physical file on a temporary uploads directory on the server
   $file = $_FILES['myfile']['tmp_name'];
    //$size = $_FILES['myfile']['size'];

    $uploads_dir = './141Pratical';

    move_uploaded_file($file,  $uploads_dir. '/' . $filename);

    $sql = "INSERT into files (matric , file) VALUES('$matric' , '$filename')";
    if (mysqli_query($conn , $sql)){
        echo '<script>
                window.alert("Submitted successfully.");
            </script>';
        //echo "";
    }else{
        echo "Failed to submit";
    }



//    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
//        echo "You file extension must be .zip, .pdf or .docx";
//    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
//        echo "File too large!";
//    } else {
//        // move the uploaded (temporary) file to the specified destination
//        if (move_uploaded_file($file, $destination)) {
//            $sql = "INSERT INTO files (matric, file) VALUES ('$matric', $filename)";
//            if (mysqli_query($conn, $sql)) {
//                echo "File uploaded successfully";
//            }
//        } else {
//            echo "Failed to upload file.";
//        }
//    }

}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>NID 1 EXAM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>


  <div class="container-fluid">
      <div class="row justify-content-center mt-5">
          <div class="col-md-2"></div>
          <div class="col-md-6">
              <div class="card border-0 shadow py-5">
                  <div class="card-body bg-none">
                      <div class="card-header">
                          <h1 class="text-center">UPLOAD FILE</h1>
                      </div>
                      <div>
                          <form method="post" action="index.php" enctype="multipart/form-data">
                              <input class="form-control mb-2" type="text" name="matric" placeholder="Matric Number" required>
                              <input class="form-control mb-2" type="file" name="myfile" placeholder="Matric Number" required>
                              <input type="submit" name="submit" class="btn btn-primary w-100 shadow-sm">
                              <a href="./files/test.csv" class="text-center">Download Exam</a>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-2"></div>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>

