<?php 

define("SITE_STATUS", true);

if(SITE_STATUS == true){
	session_start();

	$path_css = "layout/css/style.css?v=";

	include "config.php";
	include "includes/templates/header.php";
	include "includes/templates/navbar.php";

	$a = "";

	if(isset($_GET["pt"])){$a = $_GET["pt"];}else{$a = "manage";}

	if($a == "manage"){ ?>
		<div class='posts-add'>

			<div class="add-post"><a href='?pt=add'>add new post </a></div>

<?php 
	
 	$stmt = $con->prepare("SELECT * from posts");
	$stmt->execute();
	$results = $stmt->fetchAll();
	$count = $stmt->rowCount();

	if($count){

		foreach($results as $result){

			$stmt = $con->prepare("SELECT count(comment) from comments where comment_id = ?");
			$stmt->execute(array($result["postid"]));
			$res = $stmt->fetchColumn();
			$count = $stmt->rowCount();

			echo "<div class='essay'>
		 			<h3><a href='?pt=r&d=" . $result["postid"] . "'>" . $result["title"] . "</a></h3>";
			echo "<p>" . $result["content"] . "</p>";

			if(isset($_SESSION["userid"]) && $result["user_id"] == $_SESSION["userid"]){
				echo "<div class='buttons'>
					  	<button class='edit'><a href='?pt=edit&d=" . $result["postid"] . "'>edit</a></button>
					  	<button class='delete'><a href='?pt=delete&d=" . $result["postid"] . "'>delete</a></button>
					  </div>";
			}
			if($res){
				echo "<p>comments: $res</p></div>";
			}else{
				echo "<p>no comments yet</p></div>";
			}

			
		}

	}
?>

		</div>
<?php }

	elseif($a == "add"){?>

		<div class="page-posts-add">

			<h1>add article</h1>
			<form action="?pt=insert" method="POST">

				<div class="div1">
					<label>title</label>
					<label>content</label>
				</div>
				<div class="div2">
					<input type="text" name="title">					
					<textarea cols="70" rows="30" name="content"></textarea>
				</div>
				<div class="clear"></div>
				<div><input type="submit" value="add"></div>
			</form>
			<div class="clear"></div>
		</div>

<?php }

	elseif($a == "insert"){
		if($_SERVER["REQUEST_METHOD"] == "POST"){

			$title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
			$content = filter_var($_POST["content"], FILTER_SANITIZE_STRING);

			echo $title . "<br>" . $content;

			$formerrors = array();

			if(empty($title)){$formerrors[] = "title can't empty";}
			if(empty($content)){$formerrors[] = "content can't empty";}

			if(!empty($formerrors)){
				foreach($formerrors as $error){
					echo "<p>$error</p>";
				}

			}else{
				
			$stmt = $con->prepare("INSERT INTO posts(title, content, user_id) values(:ztitle, :zcontent, :zuser_id)");
			$stmt->execute(array(
				"ztitle" => $title,
				"zcontent" => $content,
				"zuser_id" => $_SESSION["userid"]));
			$count = $stmt->rowCount();

			// echo $count;

			if($count){
				header("location: posts.php"); exit();
			}
			}
		
	}

	}

	elseif($a == "edit"){

		if(isset($_GET["d"]) && is_numeric($_GET["d"])){
			$d = $_GET["d"];
		}else{$d = 0;}

		$stmt = $con->prepare("SELECT * from posts where postid = ?");
		$stmt->execute(array($d));
		$results = $stmt->fetch();
		
		?>

		<div class="page-posts-edit">
			<h1>edit article</h1>
			<form action="?pt=update" method="POST">
				<input type="hidden" name="postid" value="<?php echo $results['postid']; ?>">
				<div>
					<label>title</label>
					<input type="text" name="title" value ="<?php echo $results['title']; ?>">
				</div>
				<div>
					<textarea rows="20" cols="100" name="content">
						<?php echo $results['content']; ?>
					</textarea>
				</div>
				<input type="submit" value="edit">
			</form>
		</div>

	<?php 
	}
	elseif($a == "update"){

		if($_SERVER["REQUEST_METHOD"] == "POST"){

			$postid = $_POST["postid"];
			$title = $_POST["title"];
			$content = $_POST["content"];

			$stmt = $con->prepare("UPDATE posts set title = ?, content = ? where postid = ?");
			$stmt->execute(array($title, $content, $postid));
			$count = $stmt->rowCount();

			echo $count;
		}
	}

	elseif($a == "delete"){

		if(isset($_GET["d"]) && is_numeric($_GET["d"])){
			$d = $_GET["d"];
		}else{$d = 0;}
		$stmt = $con->prepare("DELETE from posts where postid = ?");
		$stmt->execute(array($d));
		$count = $stmt->rowCount();
		echo $count; 
	}

	elseif($a == "r"){
		if(isset($_GET["d"]) && is_numeric($_GET["d"])){
			$d = $_GET["d"];
		}else{$d = 0;}

		$stmt = $con->prepare("SELECT * from posts where postid = ?");
		$stmt->execute(array($d));
		$result = $stmt->fetch();
		$count = $stmt->rowCount();

		$stmt = $con->prepare("SELECT count(comment) from comments where comment_id = ?");
		$stmt->execute(array($d));
		$n_comment = $stmt->fetchColumn();

		$stmt = $con->prepare("SELECT * from comments where comment_id = ? order by commentid desc");
		$stmt->execute(array($d));
		$comments = $stmt->fetchall();

		?>

		<div class="page-posts-read">

			<div>
				<h1><?php echo $result["title"] ; ?></h1>
				<p>
					<?php echo $result["content"]; ?>
				</p>
			</div>

			<div>
			<?php 
				if(isset($_SESSION["userid"]) && $result["user_id"] == $_SESSION["userid"]){ ?>
				<h4>add comment</h4>

				<form action="?pt=ac" method="POST">
					<input type="hidden" value="<?php echo $d;?>" name="post_id">
					<textarea cols="80" rows="7" placeholder="write comment" name="comment"></textarea>
					<div>
						<input type="submit">
					</div>
				</form>
			<?php } ?>

				<p><h3>comments: (<?php echo $n_comment; ?>)</h3></p>

				<?php 
					foreach($comments as $comment){
						echo "<p>" . $comment['comment'] . "</p>" ;
					}
				?>
			</div>
		</div>
	<?php
	}

	elseif($a == "ac"){
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
	}


else{echo "there is no such page";}

include "includes/templates/footer.php"; 

}else{echo "site closed for mantenance";}