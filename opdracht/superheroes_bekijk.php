<?php
    echo $_GET['id'];
        $id = $_GET['id'];
        require 'database.php';

        $sql = "SELECT FROM superheroes WHERE id = :ph_id";
        $stmt = $db_conn->prepare($sql);
        $stmt->bindParam(":ph_id", $id );

        $stmt->execute();
       
?>