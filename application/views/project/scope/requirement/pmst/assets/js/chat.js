$(function() {
$('.message').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		sendTxtMessage($(this).val());
	 }
     
    
});
$('.btnSend').click(function(){
       sendTxtMessage($('.message').val());
});

 

});	///end of jquery



function ChatSection(){
	
	var receiver_id = $(this).attr('itemid');
	// alert(receiver_id);
	console.log(receiver_id + "section");
	  
	  $('#receiver_id').val(receiver_id);
	  $('#reciver_name').html($(this).attr('title'));
	//  $('#ReciverName_txt').html($(this).attr('title'));
	  GetChatHistory(receiver_id);
	
	//chatSection
	
       // $('#chatSection :input').removeAttr('disabled');
       
}



function ScrollDown(){
	var elmnt = document.getElementById("content");
    var h = elmnt.scrollHeight;
   $('#content').animate({scrollTop: h}, 1);
}
window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#sender_name').val();
	//var Sender_ProfilePic = $('#Sender_ProfilePic').val();
	
		var str = '<div class="direct-chat-msg right">';
				str+='<div class="direct-chat-info clearfix">';
				 str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
				 str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
				// str+='</div><img class="direct-chat-img" src="'+Sender_ProfilePic+'" alt="">';
				 str+='<div class="direct-chat-text">'+message;
				 str+='</div></div>';
		$('#dumppy').append(str);
}

function sendTxtMessage(message){
	var messageTxt = message.trim();
	if(messageTxt!=''){
	//	console.log(message);
 		DisplayMessage(messageTxt);
		
				var receiver_id = $('#receiver_id').val();
				console.log(receiver_id);
				$.ajax({
						  dataType : "json",
						  type : 'post',
						  data : {messageTxt : messageTxt, receiver_id : receiver_id },
						  url: 'send-message',
						  success:function(data)
						  {
  							GetChatHistory(receiver_id)		 
						  },
						  error: function (jqXHR, status, err) {
							   alert('Local error callback1');
							   
						  }
 					});
					
		
		
		ScrollDown();
		$('.message').val('');
		$('.message').focus();
	}else{
		$('.message').focus();
	}
}

function GetChatHistory(receiver_id){
	console.log(receiver_id);
				$.ajax({
						 // dataType : "json",
  						  url: 'get-chat-history?receiver_id='+receiver_id,
						  success:function(data)
						  {
  							$('#dumppy').html(data);
							ScrollDown();	 
							
						  },
						  error: function (jqXHR, status, err) {
							//   alert('Local error callback2');
							   
						  }
 					});
}

setInterval(function(){ 
	var receiver_id = $('#receiver_id').val();
	if(receiver_id!=''){GetChatHistory(receiver_id);}
}, 3000);

window.load = GetChatHistory($('#receiver_id').val());