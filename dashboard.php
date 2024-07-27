<?php
session_start();
$path_css = "layout/css/style.css?v=";
include "config.php";
include "includes/templates/header.php";
include "includes/templates/navbar.php";
?>

<div class="page-dashboard">
    <?php
    $stmt = $con->prepare("SELECT count(postid) from posts where user_id = ?");
    $stmt->execute(array($_SESSION["userid"]));
    $results = $stmt->fetchColumn();
    $count = $stmt->rowCount();

    ?>

    <h1>dashboard page</h1>
    <p class="new-article"><a href="posts.php?pt=add">add new post</a></p>

    <!-- <h2>my articles </h2> -->
    <div class="dashboard">
        <div class="articles">
        <?php 
            if($count){?>
                total articles <br> <?php echo $results; ?>

             <!--    // foreach($results as $result){
                //     echo "<div class='my-article'>
                //             <p><h4>" . $result["title"] . "</h4></p>
                //             <p>" . $result['content'] . "<p>
                //          </div>" ;
                // } -->
            <?php }


        ?>
        </div>
        <div class="comments">
            total comments <br> 100
        </div>
        <div class="vies">
            total views <br> 200
        </div>
    </div>
</div>
<?php
include "includes/templates/footer.php";
?>