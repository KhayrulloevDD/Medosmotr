$(document).ready(function() {
	$("submit").click(function(){
		var name = $('#name1').val();
		var group = $('#group1').val();
		var email = $('#email1').val();
		var phone = $('#phone1').val();
		var date = $('#date1').val();
    $.get("demo_test.asp", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
});