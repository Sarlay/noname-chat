$(document).ready(function(){
  updateUserChat();
  scrollBottom();
	setInterval(function(){
		updateUserChat();
	}, 8000)});


function sendMessage(message_content) {
	message = $("#input_content").val();
  console.log("sending message")
  console.log(message)
	$.ajax({
		url:"action.php",
		method:"POST",
		data:{content:message, action:'add_message'},
		dataType: "json",
	});
  $("#input_content").val("");
  updateUserChat(); // update after message sent
  clearMessageInput();
  scrollBottom();
};

function clearMessageInput(){
    document.getElementById('input_content').value = '';
}

function updateUserChat() {
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:'update_user_chat'},
			dataType: "json",
			complete:function(response){
				$('#message_list').html(response.responseJSON.conversation);
			}
		});
};

function loginAccount() {  // login into account using username and password
  username = $("#account_username").val();
  password = $("#account_password").val(); // get input values
  $.ajax({
    url:"action.php",
    method:"POST",
    data:{username:username, password:password, action:'login_account'},
    dataType: "json",
    statusCode: {
      200: function(xhr) { // logged in, valid credentials
        startConfetti();
        setTimeout("stopConfetti()", 1000); // PARTY !!
        setTimeout("window.location.href = window.location + 'chat.php'", 1000); // wait 1000 ms and then
      },
      401: function(xhr) { // logged in, valid credentials
        alert("invalid credentials");
      },
    },
});
}


function scrollBottom() {
  bottom_li = document.getElementById("last_li");
  if (typeof(bottom_li) != 'undefined' && bottom_li != null) // check if element exists
  {
    bottom_li.scrollIntoView(false) // false: the bottom of the element will be aligned to the bottom of the visible area https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollIntoView
  }
};

function registerAccount() {
  username = $("#account_username").val();
  password = $("#account_password").val();
  $.ajax({
    url:"action.php",
    method:"POST",
    data:{username:username, password:password, action:'create_account'},
    dataType: "json",
    statusCode: {
      200: function(xhr) { // logged in, valid credentials
        startConfetti();
        setTimeout("stopConfetti()", 1000);
        setTimeout("window.location.href = window.location + 'chat.php'", 1000);
      },
      406: function(xhr) { // logged in, valid credentials
        alert("not enough credentials supplied");
      },
    }
  });
};
