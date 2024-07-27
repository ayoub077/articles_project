<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){
	
	$path_css = "layout/css/style.css?v=";
	include "config.php";
	include "includes/templates/header.php";
	include "includes/templates/navbar.php";

	$stmt = $con->prepare("SELECT * from posts");
    $stmt->execute();
    $results = $stmt->fetchAll();
    $count = $stmt->rowCount();

    $read = "";

    if(isset($_GET["r"])){$read = $_GET["r"];}else{
    	$read = "manage";
    }

    
    if($read == "manage"){
?>

		<div class="container_body">
			<div class="articles">
				<?php foreach($results as $result){?>
				<div class="essay">
				 	<h2> <?php echo "<a href='index.php?r=read&n=" . $result["postid"] . "'>" . $result["title"] . "</a>" ;?></h2> 
				 	<p><?php echo $result['content']; ?></p>
				
					
				</div>
				
				<?php } ?>
			</div>

			<div class="sidebar">
	        	<section>
	        		<h1>most view</h1>
	        		<div>
	        			<h2>titles and titles and titles</h2>
	        		</div>
	        	</section>
	    	</div>

		</div>
		<div class="clear"></div>


	        
	    <?php 
	}

	elseif($read == "read"){
		if(isset($_GET["n"]) && is_numeric($_GET["n"])){
    					$r = $_GET['n'];
    				}else{$r = 0;}

    				$stmt = $con->prepare("SELECT * from posts where postid = ?");
				    $stmt->execute(array($r));
				    $result = $stmt->fetch();
				    $count = $stmt->rowCount();

				    $stmt1 = $con->prepare("SELECT * from comments where comment_id = ? order by commentid desc");
					$stmt1->execute(array($r));
					$comments = $stmt1->fetchall();

					$stmt2 = $con->prepare("SELECT count(comment) from comments where comment_id = ?");
					$stmt2->execute(array($r));
					$n_comment = $stmt2->fetchColumn();
					
?>
	    	
    	<div class="container_body">
    		<div class="articles">

    			<div class="essay">

    			 	<?php
    			 		if($count){

						    echo "<p>" . $result["title"] . "</p>";
						    echo "<p>" . $result["content"] . "</p>"; 
						}else{
						    	header("location: index.php"); exit();
						}
    			 	?>
    		
    			</div>
    			<?php
    				if(isset($_SESSION["username"])){

    			?>
    			<div>
    				<form action="?r=ac" method="POST">
						<input type="hidden" value="<?php echo $r;?>" name="post_id">
						<textarea cols="80" rows="4" placeholder="write comment..." name="comment"></textarea>
						<div>
							<input type="submit">
						</div>
					</form>
    			</div>
        		<?php } ?>

    			<div class="comments">
    				<h2 class="head-cooment">comments (<?php echo $n_comment; ?>)</h2>
    				<section>
        				<?php
        					foreach($comments as $comment){
									echo "<p>" . $comment['comment'] . "</p>" ;
								}
						?>
					</section>
    			</div>
        			
        	</div>

    		<div class="sidebar">
	        	<section>
	        		<h1>most view</h1>
	        		<div>
	        			<h2>titles and titles and titles</h2>
	        		</div>
	        	</section>
	    	</div>

	    </div>
	    <div class="clear"></div>
	        				
<?php 
	}elseif($read == "ac"){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$comment = $_POST["comment"];
			$comment_id = $_POST["post_id"];

			$stmt = $con->prepare("INSERT INTO comments(comment, comment_id) values(:zcomment, :zcomment_id)");
				$stmt->execute(array(
					"zcomment" => $comment,
					"zcomment_id" => $comment_id
				));
				$count = $stmt->rowCount();		
 		}
	}else{echo "there is no such page";}

	include "includes/templates/footer.php";

	} else{echo "site closed for maintenance!";}

?>