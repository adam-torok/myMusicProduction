<?php
// dbcect to database
error_reporting(1);
require_once('config.php');
// lets assume a user is logged in with id $userId
$userId = $_SESSION['id'];

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $songId = $_POST['songId'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO likes (songId, userId, action)
         	   VALUES ($songId, $userId, 'like')
         	   ON DUPLICATE KEY UPDATE action='like'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM likes WHERE userId=$userId AND songId=$songId";
	      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($dbc, $sql);
  echo getRating($songId);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $dbc;
  $sql = "SELECT COUNT(*) FROM likes
  		  WHERE songId = $id AND action='like'";
  $rs = mysqli_query($dbc, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $dbc;
  $sql = "SELECT COUNT(*) FROM likes
  		  WHERE songId = $id AND action='dislike'";
  $rs = mysqli_query($dbc, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $dbc;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM likes WHERE songId = $id AND action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM likes
		  			WHERE songId = $id AND action='dislike'";
  $likes_rs = mysqli_query($dbc, $likes_query);
  $dislikes_rs = mysqli_query($dbc, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($songId)
{
  global $dbc;
  global $userId;
  $sql = "SELECT * FROM likes WHERE userId=$userId
  		  AND songId=$songId AND action='like'";
  $result = mysqli_query($dbc, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($songId)
{
  global $dbc;
  global $userId;
  $sql = "SELECT * FROM likes WHERE userId=$userId
  		  AND songId=$songId AND action='dislike'";
  $result = mysqli_query($dbc, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM likes";
$result = mysqli_query($dbc, $sql);
// fetch all likes from database
// return them as an associative array called $likes
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
