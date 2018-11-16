function load_user_online(){


$.get("functions.php?onlineuser=result", function(data){
       $(".usersonline").text(data);
});
}


setInterval(function(){
	load_user_online();
},500);

