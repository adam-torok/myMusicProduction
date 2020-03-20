<?php
// dbcect to database
error_reporting(1);
require_once('config.php');
$userId = $_SESSION['id'];
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
  mysqli_query($dbc, $sql);
  echo getRating($songId);
  exit(0);
}

function getLikes($id)
{
  global $dbc;
  $sql = "SELECT COUNT(*) FROM likes
  		  WHERE songId = $id AND action='like'";
  $rs = mysqli_query($dbc, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}


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
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
