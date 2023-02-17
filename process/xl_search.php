<?php
    if(isset($_POST['search'])){
        $ten = $_POST['search'];
        header("Location:../index.php?action=timkiem&tensanpham=$ten");
    }
?>
