<?php

include("../includes/connect.php");

//TO POST A COMMENT
if(isset($_POST["post"]))
	{
		include("../includes/connect.php");
		$name=$_POST["uname"];
		$comment=$_POST["comment"];
		$query="insert into comments (comment_text,comment_by) values('$comment','$name')";
		mysqli_query($connect,$query);
	}

//CODE FOR UPVOTES 
if($_GET['do']==1)
{
	$id=$_GET['id'];
	$query="select upvotes from comments where comment_id=$id";
	$result = mysqli_query($connect, $query);
	if (mysqli_num_rows($result) > 0) 
		$row = mysqli_fetch_assoc($result);
	$vote=$row["upvotes"];
	$vote++;
	$query="update comments set upvotes=$vote where comment_id=$id";
	mysqli_query($connect,$query);
}

//CODE FOR DOWNVOTES
if($_GET['do']==2)
	{
	$id=$_GET['id'];
	$query="select downvotes from comments where comment_id=$id";
	$result = mysqli_query($connect, $query);
	if (mysqli_num_rows($result) > 0) 
		$row = mysqli_fetch_assoc($result);
	$vote=$row["downvotes"];
	$vote++;
	$query="update comments set downvotes=$vote where comment_id=$id";
	mysqli_query($connect,$query);
	}
	
//REDIRECT TO INDEX PAGE
header("location:../index.php");
?>
