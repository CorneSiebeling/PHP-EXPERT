<?php

require 'database.php';
include 'header.php';
include 'menu.php';

$id = $_GET['id'];
$sql = "SELECT * FROM superheroes WHERE id = :ph_id";
$statement = $db_conn->prepare($sql);
$statement->bindParam(":ph_id", $id);
$statement->execute();
$database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit']) && $_POST['Title'] != "") {
    $title = $_POST['Title'];
    $alignment = $_POST['Alignment'];
    $gender = $_POST['Gender'];
    $height = $_POST['Height'];
    $maritalStatus = $_POST['MaritalStatus'];
    $eyes = $_POST['Eyes'];
    $hair = $_POST['Hair'];
    $placeOfBirth = $_POST['PlaceOfBirth'];
    $placeOfDeath = $_POST['PlaceOfDeath'];
    $citizenship = $_POST['Citizenship'];
    $occupation = $_POST['Occupation'];
    //UPDATE EEN WAARDE IN EEN DATABASE TABEL
    $sql = "UPDATE superheroes SET Title = :ph_title,
Alignment = :ph_ali, Gender = :ph_gender,
Height = :ph_height, MaritalStatus = :ph_marstatus,
Eyes = :ph_eyes, hair = :ph_hair, 
PlaceOfBirth = :ph_birth, PlaceOfDeath = :ph_death,
Citizenship = :ph_citi, Occupation = :ph_occu WHERE id = :ph_id ";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":ph_title", $title);              
    $stmt->bindParam(":ph_ali", $alignment);            
    $stmt->bindParam(":ph_gender", $gender);
    $stmt->bindParam(":ph_height", $height);
    $stmt->bindParam(":ph_marstatus", $maritalStatus);
    $stmt->bindParam(":ph_eyes", $eyes);
    $stmt->bindParam(":ph_hair", $hair);
    $stmt->bindParam(":ph_birth", $placeOfBirth);
    $stmt->bindParam(":ph_death", $placeOfDeath);
    $stmt->bindParam(":ph_citi", $citizenship);
    $stmt->bindParam(":ph_occu", $occupation);
    $stmt->bindParam(":ph_id", $id);
    $stmt->execute();
    header('location: superheroes_index.php');
}

?>

<div class="container">
    <h4 class="display-4">Update superhero</h4>     
    <form action="" method="post">
        <div class="col-6"></div>
        <h6>Title</h6>              <input type="text" name="Title"         class="form-control" value="<?php echo $database_gegevens['Title']; ?>">
        <h6>Alignment</h6>          <input type="text" name="Alignment"     class="form-control" value="<?php echo $database_gegevens['Alignment']; ?>">
        <h6>Gender</h6>             <input type="text" name="Gender"        class="form-control" value="<?php echo $database_gegevens['Gender']; ?>">
        <h6>Height</h6>             <input type="text" name="Height"        class="form-control" value="<?php echo $database_gegevens['Height']; ?>">
        <h6>Marital Status</h6>     <input type="text" name="MaritalStatus" class="form-control" value="<?php echo $database_gegevens['MaritalStatus']; ?>">
        <h6>Eyes</h6>               <input type="text" name="Eyes"          class="form-control" value="<?php echo $database_gegevens['Eyes']; ?>">
        <h6>Hair</h6>               <input type="text" name="Hair"          class="form-control" value="<?php echo $database_gegevens['Hair']; ?>">
        <h6>Place Of Birth</h6>     <input type="text" name="PlaceOfBirth"  class="form-control" value="<?php echo $database_gegevens['PlaceOfBirth']; ?>">
        <h6>Place Of Death</h6>     <input type="text" name="PlaceOfDeath"  class="form-control" value="<?php echo $database_gegevens['PlaceOfDeath']; ?>">
        <h6>Citizenship</h6>        <input type="text" name="Citizenship"   class="form-control" value="<?php echo $database_gegevens['Citizenship']; ?>">
        <h6>Occupation</h6>         <input type="text" name="Occupation"    class="form-control" value="<?php echo $database_gegevens['Occupation']; ?>">
        <button type="submit" class=" btn btn-info  mt-3" name="submit">opslaan!</button>
    </form>
</div>