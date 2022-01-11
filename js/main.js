var yaTarget;

$(function() {
	$.localScroll({
		duration: 1000,
		hash: true,
		offset: -65
	});

	$('.fancybox').fancybox({
		openEffect  : 'elastic',
		closeEffect : 'elastic'
	});

	// youtube fix
	$('iframe').each(function() {
		var url = $(this).attr("src");
		if ($(this).attr("src").indexOf("?") > 0) {
			$(this).attr({
				"src": url + "&wmode=transparent",
				"wmode": "Opaque"
			});
		} else {
			$(this).attr({
				"src": url + "?wmode=transparent",
				"wmode": "Opaque"
			});
		}
	});

	$('.section.action').prev().css({'z-index': '1','bottom': '-18px'});

	$("[name=phone]").mask("+7 (999) 999-99-99");

	var callbackPopup = {
		init: function(){
			var self = this;

			$('.callback-btn').click(function(event){
				self.root.arcticmodal({
					closeOnOverlayClick: false,
					beforeOpen: self.beforeOpen(event)
				});
			});

			this.form.submit(this.send);
		},
		root: $('#callback-modal'),
		form: $('#callback-modal form'),
		btnOk: $('#callback-modal-btn-ok'),
		caption: $('#callback-modal .caption'),
		startMessage: 'Заказ звонка',
		finishMessage: '<div class="header">Cпасибо.</div>Заказ на звонок принят. В ближайшее время наш менеджер свяжется с Вами.',
		beforeOpen: function(event){
			var subject = $(event.target).text();

			this.caption.html(this.startMessage);
			this.form
				.find('[name=subject]').val(subject)
				.end().show();
			this.btnOk.hide();
		},
		send: function(){
			var form = $(this);

			if (!checkForm(form)) {
				return false;
			}

			data = form.serialize();

			$.ajax({
				url: 'sender.php',
				type: 'POST',
				dataType: 'json',
				data: data
			})
			.done(function(response) {
				if (response.status == 'OK') {
					callbackPopup.caption.html(callbackPopup.finishMessage);
					form.hide();
					clearForm(form);
					callbackPopup.btnOk.show();
				}

				yaCounter();
			});

			return false;
		}
	};

	callbackPopup.init();

	$('.request-form').on('submit', function(e){
		var section;
		var form = $(this);

		e.preventDefault();

		if (!checkForm(form)) {
			return false;
		}

		data = form.serialize();

		$.ajax({
			url: 'sender.php',
			type: 'POST',
			dataType: 'json',
			data: data
		})
		.done(function(response) {
			if (response.status == 'OK') {
				alert('Спасибо! Ваши данные успешно отправлены');
				clearForm(form);
			}

			yaCounter();
		});
	});

	function yaCounter(){
		yaCounter27092204.reachGoal(yaTarget);
	}

	function checkForm(form){
		var error = false;

		form.find("[required]").each(function(){
			$(this).closest('.form-field').removeClass("form-required-field_state_fail");
			if($(this).val() == ""){
				$(this).closest('.form-field').addClass("form-required-field_state_fail");
				error = true;
			}
		});

		return !error;
	}
	
	// ClearForm
	function clearForm(form) {
		$(':input', form).each( function() {
			var type = this.type;
			var tag = this.tagName.toLowerCase();

			if (type == 'text' || type == 'password' || tag == 'textarea') $(this).val('');
			else if (type == 'checkbox' || type == 'radio') this.checked = false;
			else if (tag == 'select') this.selectedIndex = -1;
		});
	}

});