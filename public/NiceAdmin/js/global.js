$('input#searchcat').on('click', function(){
	var category = $('#select-cat').val();
	// alert(category);

	if ($.trim(category) != '') {
		$.post('controllers/category.php', {category: category}, function(data){
			alert(data);
		});
	}
});