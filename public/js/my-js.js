$(document).ready(function() {
	let $btnSearch        = $("button#btn-search");
	let $btnClearSearch	  = $("button#btn-clear");

	let $inputSearchField = $("input[name  = search_field]");
	let $inputSearchValue = $("input[name  = search_value]");

	let $selectFilter     = $("select[name = select_filter]");
	let $selectChangeAttr = $("select[name =  select_change_attr]");
	let $selectChangeAttrAjax = $("select.select-ajax");


	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
    	$inputSearchField.val(field);
	});

	$btnSearch.click(function() {

		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);
		params 			= ['page', 'filter_status', 'select_field', 'select_value'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&"
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		window.location.href = pathname + "?" + link + 'search_field='+ search_field + '&search_value=' + search_value.replace(/\s+/g, '+').toLowerCase();
	});

	$btnClearSearch.click(function() {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['page', 'filter_status', 'select_filter'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&"
			}
		});

		window.location.href = pathname + "?" + link.slice(0,-1);
	});

	//Event onchange select filter
	$selectFilter.on('change', function () {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['page', 'filter_status', 'search_field', 'search_value'];

		let link		= "";
		$.each( params, function( key, value ) {
			if (searchParams.has(value) ) {
				link += value + "=" + searchParams.get(value) + "&"
			}
		});

		let select_field = $(this).data('field');
		let select_value = $(this).val();
		window.location.href = pathname + "?" + link.slice(0,-1) + 'select_field='+ select_field + '&select_value=' + select_value;
 	});

	// Ajax Change Select Options
	$selectChangeAttr.on('change', function() {
		let ele 			= $(this);
		let select_value 	= ele.val();
		let url 			= ele.data('url');
		$.ajax({
            url: url.replace('value_new', select_value),
			type: "GET",
			dataType: "JSON",
            success: function (response) {
				showNotify(ele, response.message);
            },
        });
	});

	// Ajax Change Attribute Select Options
	$selectChangeAttrAjax.on('change', function() {
		let ele 			= $(this);
		let select_value 	= ele.val();
		let url 			= ele.data('url');
		$.ajax({
			url: url.replace('value_new', select_value),
			type: "GET",
			dataType: "JSON",
			success: function (response) {
				showNotify(ele, response.message);
			},
		});
	});
	$('#company').change(function(){
        var companyId = $(this).val();
        $.ajax({
            url: '/companies/' + companyId + '/persons',
            type: 'GET',
            data: {
                'company_id': companyId
            },
            success: function(data){
                $('#person').empty();
                $.each(data, function(key, value){
                    $('#person').append('<option value="' + value.id + '">' + value.full_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

	$('#person').change(function(){
        var selectedPersons = $(this).val();
        var tags = [];

        $.each(selectedPersons, function(index, value){
            tags.push($('#person option[value="' + value + '"]').text());
        });

        $('#description').addTag(tags.join(','));
    });

	$('#birthday').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	});

	$('#start_time').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	});

	$('#end_time').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	});
	


	//Init datepicker
	// $('.datepicker').datepicker({
	// 	format: 'dd-mm-yyyy',
	// });

	//Ajax Delete
	let $btnDelete = $(".btn-delete");
    $btnDelete.click(function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					);
				window.location.href = url;
            }
        });
    });

	// Ajax Change Status
	let $btnStatus = $(".ajax-status");
    $btnStatus.on("click", function () {
        let btn	= $(this);
		var url = btn.data('url');
		var currentClass = btn.data('class');
        $.ajax({
            url: url,
			type: "GET",
			dataType: "JSON",
            success: function (response) {
				btn.removeClass(currentClass);
				btn.addClass(response.statusObj.class);
				btn.html(response.statusObj.name);
				btn.data('url', response.link);
				btn.data('class', response.statusObj.class);
				showNotify(btn, response.message);
            },
        });
    });

	// Ajax Change Is Home
	let $btnIsHome = $(".ajax-is-home");
	$btnIsHome.on("click", function () {
		let btn	= $(this);
		var url = btn.data('url');
		var currentClass = btn.data('class');
		$.ajax({
			url: url,
			type: "GET",
			dataType: "JSON",
			success: function (response) {
				btn.removeClass(currentClass);
				btn.addClass(response.isHomeObj.class);
				btn.html(response.isHomeObj.name);
				btn.data('url', response.link);
				btn.data('class', response.isHomeObj.class);
				showNotify(btn, response.message);
			},
		});
	});

	// Ajax Change Ordering
	let $inputOrdering	= $("input.ordering");
	$inputOrdering.on("change", function () {
		let $currentElement	= $(this);
		let value 			= $currentElement.val();
		var $url 			= $currentElement.data('url');

		$.ajax({
            url: $url.replace('value_new', value),
			type: "GET",
			dataType: "JSON",
            success: function (result) {
				if (result) {
					showNotify($currentElement, result.message);
					$(".modified." + result.id).html(result.modified)
				} else {
					console.log(result);
				}
            }
        });
	});

	// Filter Category
	$('select[name="filter_category"]').on("change", function () {
		var pathname		= window.location.pathname;
		let searchParams 	= new URLSearchParams(window.location.search);
		arrParam			= [
			"filter_status",
			"search_field",
			"search_value"
		];

		let link			= "";
		$.each(arrParam, function(key, value) {
			if (searchParams.has(value)) {
				link += `${value}=${searchParams.get(value)}&`;
			}
		});

		let filter_category	= $(this).val();

		window.location.href	= `${pathname}?${link}filter_category=${filter_category}`;
	});

	$(".tags").tagsInput({
		'defaultText': '',
		'width': '100%'
	});

	$(".product-attr-tags").tagsInput({
		'defaultText': '',
		'width': '100%',
		'delimiter': '$$'
	});

});

function randomString(length) {
	var	result				= '';
	var characters			= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	var charactersLength 	= characters.length;
	let counter = 0;
	while (counter < length) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
		counter += 1;
	}
	return result;
};

function showNotify(element, message, type = "success") {
	element.notify(message, {
		position: "top center",
		className: type,
	})
}