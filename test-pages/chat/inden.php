<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>

		<style type="text/css">
			#messages{
				width: 100%;
				left: 0;
				right: 0;
				text-align: left;
				overflow-y: scroll;
				overflow-x: hidden;
				height:290px;
				-webkit-box-shadow: rgba(0, 0, 128, 0.247059) 5px 7px 9px;
				box-shadow: 5px 7px 9px;
				border: 2px dashed #ffffff;
				padding-left: 5px;
			}
			#input{
				margin-top: 9px;
				height: 100px;
				width: 98%;
			}
			#messages p > a{
				text-decoration: none;
				color: #708c98;
			}
		</style>

		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" async></script>
		<script type="text/javascript">
			var chat = {}
			chat.fetchMessages = function(){
				$.get("/chat_get.php",
				function(data,status){
					if(data != ''){
						$('#messages').html(data);
					}else{
						$('#messages').html("No messages available.");
					}
				});
			};
			$(document).ready(function(){
				$('#input').keydown(function(event){
					if ( event.which == 13 && event.shiftKey == false) {
						event.preventDefault();
						//alert($('#input').val());
						console.log($('#input').val());
						console.log('sending data');
						$.post("/chat_post.php",
							{
								message: $('#input').val()
							},
							function(data,status){
						  		// alert("Data: " + data + "\nStatus: " + status);
						  		if(data != ''){
						  			console.log('data sent back');
						  			console.log('asking user');
						  			var go = confirm(data);
						  			if(go == false){
						  				window.location = '/help/policies#chat';
						  			}
						  		}else{
						  			console.log('no data sent back');
						  		}
						  		console.log(data + '\n\n');
						  		chat.fetchMessages();
							}
						);
						$('#input').val('');
					}
					//console.log(event.keyCode);
				});
			});

			setInterval(chat.fetchMessages, 3000);
			chat.fetchMessages();
		</script>
	</head>
	<body>
		<div id="messages">

		</div>
		<textarea id="input" placeholder="Please type your message here! Press enter to send. Use Shift + enter for a new line"></textarea>
	</body>
</html>