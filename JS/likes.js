$(document).ready(function(){

// Ha egy felhasználó a szívre kattint...
$('.like-btn').on('click', function(){
  var songId = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('far fa-heart')) {
  	action = 'like';
  } else if($clicked_btn.hasClass('fas fa-heart')){
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
  			$clicked_btn.removeClass('far fa-heart');
  			$clicked_btn.addClass('fas fa-heart');
  		} else if(action == "unlike") {
  			$clicked_btn.removeClass('fas fa-heart');
  			$clicked_btn.addClass('far fa-heart');
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);

  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fas fa-heart').removeClass('fas fa-heart').addClass('far fa-heart');
  	},
    error: function(req, err){ console.log('my message' + err); }

  });

});
});
