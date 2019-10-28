$('#search').keyup(function(){
$('h1, p').slideToggle();

var txt = $(this).val();
if(txt != '')
{
$.ajax({
url:"livesearch.php",
method:"post",
data:{search:txt},
dataType:"text",
success:function(data){
	$('#result').html(data);

}


});
}else{

	$('#result').html('<b style="color:red;">THE SEARCH FIELD IS EMPTY!!!!!!{0}</b>')
}

		});