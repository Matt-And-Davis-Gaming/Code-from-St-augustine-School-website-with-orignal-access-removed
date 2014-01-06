<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>

		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" async></script>
		<script type="text/javascript">
			var chat = {}
			chat.fetchMessages = function(){

			};

			$('#input').keydown(function(event){
				/*if ( event.which == 13 && event.shiftKey == false) {
					event.preventDefault();
					alert($('#input').val());
				}*/
				console.log(event.keyCode);
			});
		</script>
	</head>
	<body>
		<div id="messages">

		</div>
		<textarea id="input">

		</textarea>
	</body>
</html>