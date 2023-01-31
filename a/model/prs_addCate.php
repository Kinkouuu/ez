<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }
?>
<?php
if (isset($_POST['save'])) {
    $value = post('subject');
    // echo $value . " = ";
    if($value == 'direc') {
        $direc = $_POST['direc'];
        // echo $direc;
        $db->exec("INSERT INTO `cate` (direc) VALUES ('$direc')");
        $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id', 'Đã thêm ngành hàng $direc')");
        echo '<script>alert("Đã thêm ngành hàng '.$direc.'");window.location = "../cate.php";</script>';
    }else if($value == 'cate') {
        $cdirec = $_POST['cdirec'];
        $cate = $_POST['cate'];
        $db->exec("INSERT INTO `cate` (`direc`,`cate`) VALUES ('$cdirec','$cate')");
        $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id', 'Đã thêm danh mục hàng $cate cho ngành hàng $cdirec')");
        echo '<script>alert("Đã thêm danh mục hàng '.$cate.' cho ngành hàng '.$cdirec.'");window.location = "../cate.php";</script>'; 
        // echo $cdirec;
        // echo $cate;
    }else{
        $tdirec = $_POST['tdirec'];
        $tcate = $_POST['tcate'];
        $type = $_POST['type'];
        $db->exec("INSERT INTO `cate` (`direc`,`cate`,`type`) VALUES ('$tdirec','$tcate','$type')");
        $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id', 'Đã thêm loại hàng $type cho danh mục hàng $tcate của ngành hàng $tdirec')");
        echo '<script>alert("Đã thêm loại hàng '.$type.' cho danh mục hàng '.$tcate.' của ngành hàng '.$tdirec.'");window.location = "../cate.php";</script>'; 
        // echo $tdirec;
        // echo $tcate;
        // echo $type;
    }

}
?>
<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }
?>