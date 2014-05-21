var objDiv = document.getElementById("chatbox");
objDiv.scrollTop = objDiv.scrollHeight;
// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		if (clientmsg != "")
		{
		$.post("post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
		}
	});
	
	//Load the file containing the chat log
	function loadLog(){		 
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "<?php echo $_SESSION['roomtype']; ?>",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 1000);	//Reload file every 2 seconds
	
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to leave the chatroom?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
});
    window.onbeforeunload = function(){
         $.get("index.php", {logout: "true"}); 
    }