var a = $(".getdoctype");
	var doc_type_input = $(".doc_type_input")[0];
	for (var i = 0; i < a.length; i++)
	{
		a[i].addEventListener('click', function(event){
			var doctype = event.target.dataset.id;
			doc_type_input.value = doctype;
		});
	}