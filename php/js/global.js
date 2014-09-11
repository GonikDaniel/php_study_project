$('#item1_results_button').on('click', function(){
	var first_number = $('#first_number').val();
	var second_number = $('#second_number').val();

	if ($.trim(first_number) != '' && $.trim(second_number) != '') {
		$.post('../hw2/item1.php', {first_number: first_number, second_number: second_number}, function(data) {
			$('div.item1_results').html(data);
		});
	};
});


$('#switch').on('click', function(){
	var number = $('#number').val();

	if ($.trim(number) != '') {
		$.post('../hw2/item2.php', {number: number}, function(data) {
			$('div.switch_results').html(data);
		});
	};
});

$('#item4_results_button').on('click', function(){
	var arg1 = $('#arg1').val();
	var arg2 = $('#arg2').val();
	var operation = $('#operation').val();

	if ($.trim(arg1) != '' && $.trim(arg2) != '') {
		$.post('../hw2/item4.php', {arg1: arg1, arg2: arg2, operation: operation}, function(data) {
			$('div.item4_results').html(data);
		});
	};
});

$('#item5_results_button').on('click', function(){
	var val = $('#val').val();
	var pow = $('#pow').val();

	if ($.trim(val) != '' && $.trim(pow) != '') {
		$.post('../hw2/item5.php', {val: val, pow: pow}, function(data) {
			$('div.item5_results').html(data);
		});
	};
});

$('#item6_results_button').on('click', function(){
		$('div.item6_results').load('item6.php');
});




