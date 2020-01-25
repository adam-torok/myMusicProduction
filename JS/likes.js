$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var songId = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.data("prefix") == "far") {
  	 action = 'like';
  } else if($clicked_btn.data("prefix") == "fas"){
  	 action = 'unlike';
  }
  $.ajax({
  	url: 'welcome.php',
  	type: 'POST',
  	data: {
  		'action': action,
  		'songId': songId
  	},
  	success: function(data){
        console.log(data);
    		res = JSON.parse(data);
  		if (action == "like") {
  			$clicked_btn.data("prefix","fas");
  		} else if(action == "unlike") {
  			$clicked_btn.data("prefix","far");
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);

  		// change button styling of the other button if user is reacting the second time to post
    		$clicked_btn.attr('data-prefix', 'far');
     },
    error: function(req, err){ console.log('my message' + err); }

  });

});
});
