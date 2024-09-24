<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Simple Chat Bot</title>
  <link rel="stylesheet" type="text/css" href="bot.css">
</head>
<body>
  <div class="chat-screen">
	<div class="wrapper">
		<div class="title">Chat Bot</div>
		<div class="form">
			<div class="bot-inbox inbox">
					<image class="icon" src="../images/icons/man_icon.ico"  />
				<div class="msg-header scale-in-tl">
					<p>Hello,How can I help you ?</p>
				</div>
			</div>
			<!-- <div class="user-inbox inbox "><div class="msg-header scale-in-tr"><p>Hi</p></div></div> -->
		</div>
		<div class="typing-field">
			<div class="input-data">
				<input id="data" type="text" name="msg" placeholder="Type something here.." required>
				<button id="send-btn">SEND</button>
			</div>
		</div>
	</div>
  </div>

<script src="../vendor/jquery/jquery_3.6.0.min.js"></script>

<script>

$(document).ready(function() {
	$("#send-btn").on("click", function() {
		$value = $("#data").val();
		$msg = '<div class="user-inbox inbox"><div class="msg-header scale-in-tr"><p>'+$value+'</p></div></div>';
		$(".form").append($msg);
	    $("#data").val("");
		// start ajax code
		$.ajax({
		  url: 'bot_msg.php',
		  type: "POST",
		  data: {text:$value},
		  success: function(result){
		    	$replay = '<div class="bot-inbox inbox"><image class="icon" src="../images/icons/man_icon.ico"  /><div class="msg-header scale-in-tl"><p>'+result+'</p></div></div>';
			   $(".form").append($replay);
		       $(".form").scrollTop($(".form")[0].scrollHeight);
            }
		   });
	});
});
</script>
</body>
</html>