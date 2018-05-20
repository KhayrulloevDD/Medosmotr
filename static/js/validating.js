$.validator.addMethod("lettersonly", function(value, element) 
{
	return this.optional(element) || /^[a-zа-я ]+$/i.test(value);
}, "Letters and spaces only please");

$("#myForm").validate({
	errorClass: "error",
	rules: {
		name: {
			required: true,
			lettersonly: true,
			maxlength: 50
		},
		group: {
			required: true,
			maxlength: 20
		},
		email: {
			required: true,
			email: true,
			maxlength: 50
		},
		phone: {
			required: true,
			number: true,
			maxlength: 12
		},
		date: {
			required: true,
			date: true
		},
		time: {
			required: true
		}
	},
	messages: {
		name: {
			required: "Введите ФИО.",
			lettersonly: "Введите буквы и пробел",
			maxlength: "Слишком длинный текст для ФИО"
		},
		group: {
			required: "Введите номер группы.",
			maxlength: "Слишком длинный номер группы."
		},
		email: {
			required: "Введите адрес электронной почты.",
			email: "Некорректно введена адрес электронной почты.",
			maxlength: "Слишком длинная почта."
		},
		phone: {
			required: "Введите номер вашего телефона.",
			number: "В номере должны быть только числа",
			maxlength: "Слишком длинный номер"
		},
		date: {
			required: "Выберите дату."
		},
		time: {
			required: "Выберите время."
		},
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
	}

});