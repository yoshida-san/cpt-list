jQuery(document).ready(function ($) {
	/* get post list(ajax) */
	var cptlist_pl_ajaxf = false;
	$(document).on('click', '#cptlist-ajax-manual-load', function () {
		if (cptlist_pl_ajaxf) {
			return false;
		} else {
			cptlist_pl_ajaxf = true;
		}
		var post_data = {
			'action': 'cpt_get_post_list',
			'cpt_ajax_get_post_list_data': {
				'post_type_slug': $(this).data('cpt-post-type-slug'),
				'taxonomy_slug': $(this).data('cpt-taxonomy-slug'),
				'terms': $(this).data('cpt-terms'),
				'order_by': $(this).data('cpt-order-by'),
				'order': $(this).data('cpt-order'),
				'list_style': $(this).data('list-style'),
				'list_count': $(this).data('list-count'),
				'list_color': $(this).data('list-color'),
				'list_padding': $(this).data('list-padding'),
				'title_show': $(this).data('title-show'),
				'title_element': $(this).data('title-element'),
				'title_size': $(this).data('title-size'),
				'title_color': $(this).data('title-color'),
				'meta_size': $(this).data('meta-size'),
				'meta_date_show': $(this).data('meta-date-show'),
				'meta_date_color': $(this).data('meta-date-color'),
				'meta_author_show': $(this).data('meta-author-show'),
				'meta_author_color': $(this).data('meta-author-color'),
				'meta_category_show': $(this).data('meta-category-show'),
				'meta_category_color': $(this).data('meta-category-color'),
				'meta_tag_show': $(this).data('meta-tag-show'),
				'meta_tag_color': $(this).data('meta-tag-color'),
				'excerpt_show': $(this).data('excerpt-show'),
				'excerpt_size': $(this).data('excerpt-size'),
				'excerpt_color': $(this).data('excerpt-color'),
				'thumbnail_use': $(this).data('thumbnail-use'),
				'thumbnail_image': $(this).data('thumbnail-image'),
				'thumbnail_anchor': $(this).data('thumbnail-anchor'),
				'thumbnail_height': $(this).data('thumbnail-height'),
				'thumbnail_cover_color': $(this).data('thumbnail-cover-color'),
				'page': $(this).data('page')
			}
		};
		var target = $(this).parent().children('.cptlist-parent');
		var page = $(this);
		var load_anchor = $(this);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: cptlist_ajax_url,
			data: post_data
		}).done(function (json_data) {
			if (!json_data.res) {
				switch (json_data.code) {
					case 100:
						break;
					case 200:
						break;
					case 300:
						load_anchor.hide();
						break;
				}
			} else {
				if (json_data.data !== '') {
					target.append(json_data.data);
					page.data('page', page.data('page') + 1);
				}
			}
		}).fail(function () {
		}).always(function () {
			cptlist_pl_ajaxf = false;
		});
		return false;
	});

});