const doAjax = (url, type, data) => {
	return $.ajax({
		url: url,
		type: type,
		data: data
	})
}

document.addEventListener('DOMContentLoaded', function () {
	var DatePickerElems = document.querySelectorAll('.datepicker');
	var Dinstances = M.Datepicker.init(DatePickerElems, {});

	var SelectElems = document.querySelectorAll('select');
    var Sinstances = M.FormSelect.init(SelectElems, {});

	// $('select').formSelect();
});
