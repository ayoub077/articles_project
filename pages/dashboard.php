<?php
session_start();
$path_css = "../layout/css/style.css";
include "../config.php";
include "../includes/header.php";
include "../includes/navbar.php";
?>

<h1>dashboard page</h1>
<div>
    <?php
    $stmt = $con->prepare("SELECT * from posts where user_id = ?");
    $stmt->execute(array($_SESSION["userid"]));
    $results = $stmt->fetchAll();
    $count = $stmt->rowCount();

    // echo "userid is: " . $_SESSION['userid'];
    // echo $count;

    if($count){
        // echo "success";

        foreach($results as $result){echo $result["title"] . "<br>" . $result['content'] ;}
    }


    ?>
</div>
<?php
?>