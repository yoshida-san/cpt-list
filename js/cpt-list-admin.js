jQuery(document).ready(function ($) {
	/* media picker */
	var custom_uploader;
	var bwe_identifier;
	$(document).on('click', '.cpt-list-select-image', function (e) {
		e.preventDefault();
		bwe_identifier = $(this).data('target');
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}
		custom_uploader = wp.media({
			title: 'Choose Image',
			library: {
				type: 'image'
			},
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});
		custom_uploader.on('select', function () {
			var images = custom_uploader.state().get('selection');
			images.each(function (file) {
				$('input.' + bwe_identifier).val(file.toJSON().url);
				$('img.' + bwe_identifier).parent().show();
				$('img.' + bwe_identifier).attr('src', file.toJSON().url);
			});
		});
		custom_uploader.open();
	});

	$(document).on('click', '.cpt-list-clear-image', function (e) {
		e.preventDefault();
		e.stopPropagation();
		bwe_identifier = $(this).data('target');
		$('input.' + bwe_identifier).val('');
		$('img.' + bwe_identifier).parent().hide();
		$('img.' + bwe_identifier).attr('src', '');
	});

	$(document).on('click', '.js-cpt-list-content-opener', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(this).parent().children('.js-cpt-list-content').slideToggle();
	});
});