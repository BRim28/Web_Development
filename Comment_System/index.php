<html>
	
	<head>
		<title>Comments Page</title>
		<link rel="stylesheet" href="includes/styles.css">
	</head>
	
	
	<body style="background-color: #EFEFEF">
		<!-- GENERAL LAYOUT OF WEB PAGE-->
		<div class="header"> 	
				<br><h2  align="center"><font color="white" size="40px">COMMENT SECTION</font></h2>
		</div>
		<div class="form-group" align="center">
			<form method="POST" action="files/insertComment.php"><br><br><br>
			<div class="container" >
				<input type="text" class="textbox" placeholder="Enter your name..." name="uname" required><br><br>
				<textarea class="textarea" name="comment" rows="8" placeholder="Type a comment..." required></textarea><br><br>
				<input type="submit" class="button" name="post" value="Post Comment" /><br><br>
				
				<!-- PHP BLOCK FOR FETCHING PREVIOUS COMMENTS -->
				<?php
					include("includes/connect.php");
					$query="select * from comments";;
					$result = mysqli_query($connect, $query);
					
					if (mysqli_num_rows($result) > 0) 
					{
						while($row = mysqli_fetch_assoc($result)) 
						{
							echo"<BR><BR><div align='left' style='float:left'>";
							echo "<B>".$row['comment_id'].". ". $row['comment_by']."</B><br>".$row['comment_text']."</div>";
							echo "<div style='float:right'>
								  <a href='files/insertComment.php?do=1&id=".$row['comment_id']."'><img src='images/up.png' style='width:25px;height:23px;'></a>".
								  $row['upvotes']."<br>
								  <a href='files/insertComment.php?do=2&id=".$row['comment_id']."'><img src='images/down.png' style='width:25px;height:23px;'></a>".
								  $row['downvotes']."</div><br><br><br><hr>";
						}
					} 
					else 
					{
						echo "No comments yet !";
					}
					echo"</div>";
				?>
			</div>   	
			</form>
		</div>
 </body>
</html>


