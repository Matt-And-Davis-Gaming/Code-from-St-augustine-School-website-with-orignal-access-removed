<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>

		<style type="text/css">
			#messages{
				width: 90%;
				left: 0;
				right: 0;
				text-align: left;
				overflow-y: scroll;
				overflow-x: hidden;
				height:290px;
				-webkit-box-shadow: rgba(0, 0, 128, 0.247059) 5px 7px 9px;
				box-shadow: 5px 7px 9px;
			}
			#input{

			}
		</style>

		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" async></script>
		<script type="text/javascript">
			var chat = {}
			chat.fetchMessages = function(){

			};
			$(document).ready(function(){
				$('#input').keydown(function(event){
					if ( event.which == 13 && event.shiftKey == false) {
						event.preventDefault();
						alert($('#input').val());
						$('#input').val('');
					}
					//console.log(event.keyCode);
				});
			});
		</script>
	</head>
	<body>
		<div id="messages">

		</div>
		<textarea id="input"></textarea>
	</body>
</html>