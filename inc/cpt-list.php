<?php
require_once dirname(__FILE__) . '/../cpt-list.php';

class CPTList extends WP_Widget {

	function CPTList() {
		parent::__construct('CPTList', 'CPT List', array('description' => __('Custom post types list view widget.', 'cpt-list')));
	}

	function form($instance) {
		$basic_settings = new CPTSettings();
		if ($instance) {
			$post_type_slug = esc_attr((array_key_exists('post_type_slug', $instance) ? $instance['post_type_slug'] : ''));
			$taxonomy_slug = esc_attr((array_key_exists('taxonomy_slug', $instance) ? $instance['taxonomy_slug'] : ''));
			$terms = esc_attr((array_key_exists('terms', $instance) ? $instance['terms'] : ''));
			$order_by = esc_attr((array_key_exists('order_by', $instance) ? $instance['order_by'] : 'desc'));
			$order = esc_attr((array_key_exists('order', $instance) ? $instance['order'] : 'date'));
			$list_style = esc_attr((array_key_exists('list_style', $instance) ? $instance['list_style'] : $basic_settings->get_basic_list_style()));
			$list_count = esc_attr((array_key_exists('list_count', $instance) ? $instance['list_count'] : $basic_settings->get_basic_list_count()));
			$list_pagination = esc_attr((array_key_exists('list_pagination', $instance) ? $instance['list_pagination'] : $basic_settings->get_basic_list_pagination()));
			$list_text_color = esc_attr((array_key_exists('list_text_color', $instance) ? $instance['list_text_color'] : $basic_settings->get_basic_list_text_color()));
			$list_padding_setting = esc_attr((array_key_exists('list_padding_setting', $instance) ? $instance['list_padding_setting'] : $basic_settings->get_basic_list_padding_setting()));
			$title_show = esc_attr((array_key_exists('title_show', $instance) ? $instance['title_show'] : $basic_settings->get_basic_title_show()));
			$title_element = esc_attr((array_key_exists('title_element', $instance) ? $instance['title_element'] : $basic_settings->get_basic_title_element_type()));
			$title_font_size = esc_attr((array_key_exists('title_font_size', $instance) ? $instance['title_font_size'] : $basic_settings->get_basic_title_font_size()));
			$title_color = esc_attr((array_key_exists('title_color', $instance) ? $instance['title_color'] : $basic_settings->get_basic_title_color()));
			$meta_font_size = esc_attr((array_key_exists('meta_font_size', $instance) ? $instance['meta_font_size'] : $basic_settings->get_basic_meta_font_size()));
			$meta_date_show = esc_attr((array_key_exists('meta_date_show', $instance) ? $instance['meta_date_show'] : $basic_settings->get_basic_meta_date_show()));
			$meta_author_show = esc_attr((array_key_exists('meta_author_show', $instance) ? $instance['meta_author_show'] : $basic_settings->get_basic_meta_author_show()));
			$meta_category_show = esc_attr((array_key_exists('meta_category_show', $instance) ? $instance['meta_category_show'] : $basic_settings->get_basic_meta_category_show()));
			$meta_tag_show = esc_attr((array_key_exists('meta_tag_show', $instance) ? $instance['meta_tag_show'] : $basic_settings->get_basic_meta_tag_show()));
			$meta_date_color = esc_attr((array_key_exists('meta_date_color', $instance) ? $instance['meta_date_color'] : $basic_settings->get_basic_meta_date_color()));
			$meta_author_color = esc_attr((array_key_exists('meta_author_color', $instance) ? $instance['meta_author_color'] : $basic_settings->get_basic_meta_author_color()));
			$meta_category_color = esc_attr((array_key_exists('meta_category_color', $instance) ? $instance['meta_category_color'] : $basic_settings->get_basic_meta_category_color()));
			$meta_tag_color = esc_attr((array_key_exists('meta_tag_color', $instance) ? $instance['meta_tag_color'] : $basic_settings->get_basic_meta_tag_color()));
			$excerpt_show = esc_attr((array_key_exists('excerpt_show', $instance) ? $instance['excerpt_show'] : $basic_settings->get_basic_excerpt_show()));
			$excerpt_font_size = esc_attr((array_key_exists('excerpt_font_size', $instance) ? $instance['excerpt_font_size'] : $basic_settings->get_basic_excerpt_font_size()));
			$excerpt_font_color = esc_attr((array_key_exists('excerpt_font_color', $instance) ? $instance['excerpt_font_color'] : $basic_settings->get_basic_excerpt_font_color()));
			$thumbnail_use = esc_attr((array_key_exists('thumbnail_use', $instance) ? $instance['thumbnail_use'] : $basic_settings->get_basic_thumbnail_use()));
			$thumbnail_image = esc_attr((array_key_exists('thumbnail_image', $instance) ? $instance['thumbnail_image'] : $basic_settings->get_basic_thumbnail_image()));
			$thumbnail_anchor = esc_attr((array_key_exists('thumbnail_anchor', $instance) ? $instance['thumbnail_anchor'] : $basic_settings->get_basic_thumbnail_anchor()));
			$thumbnail_height = esc_attr((array_key_exists('thumbnail_height', $instance) ? $instance['thumbnail_height'] : $basic_settings->get_basic_thumbnail_height()));
			$thumbnail_cover_color = esc_attr((array_key_exists('thumbnail_cover_color', $instance) ? $instance['thumbnail_cover_color'] : $basic_settings->get_basic_thumbnail_cover_color()));
		} else {
			$post_type_slug = '';
			$taxonomy_slug = '';
			$terms = '';
			$order_by = 'desc';
			$order = 'date';
			$list_style = $basic_settings->get_basic_list_style();
			$list_count = $basic_settings->get_basic_list_count();
			$list_pagination = $basic_settings->get_basic_list_pagination();
			$list_text_color = $basic_settings->get_basic_list_text_color();
			$list_padding_setting = $basic_settings->get_basic_list_padding_setting();
			$title_show = $basic_settings->get_basic_title_show();
			$title_element = $basic_settings->get_basic_title_element_type();
			$title_font_size = $basic_settings->get_basic_title_font_size();
			$title_color = $basic_settings->get_basic_title_color();
			$meta_font_size = $basic_settings->get_basic_meta_font_size();
			$meta_date_show = $basic_settings->get_basic_meta_date_show();
			$meta_author_show = $basic_settings->get_basic_meta_author_show();
			$meta_category_show = $basic_settings->get_basic_meta_category_show();
			$meta_tag_show = $basic_settings->get_basic_meta_tag_show();
			$meta_date_color = $basic_settings->get_basic_meta_date_color();
			$meta_author_color = $basic_settings->get_basic_meta_author_color();
			$meta_category_color = $basic_settings->get_basic_meta_category_color();
			$meta_tag_color = $basic_settings->get_basic_meta_tag_color();
			$excerpt_show = $basic_settings->get_basic_excerpt_show();
			$excerpt_font_size = $basic_settings->get_basic_excerpt_font_size();
			$excerpt_font_color = $basic_settings->get_basic_excerpt_font_color();
			$thumbnail_use = $basic_settings->get_basic_thumbnail_use();
			$thumbnail_image = $basic_settings->get_basic_thumbnail_image();
			$thumbnail_anchor = $basic_settings->get_basic_thumbnail_anchor();
			$thumbnail_height = $basic_settings->get_basic_thumbnail_height();
			$thumbnail_cover_color = $basic_settings->get_basic_thumbnail_cover_color();
		}
		?>
		<div class="cpt-list-admin-content-wrapper">
			<p class="widget-setting-content">
				<label for="<?php echo $this->get_field_id('post_type_slug'); ?>">
					<?php _e('Post type slug :', 'cpt-list'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('post_type_slug'); ?>"
					   name="<?php echo $this->get_field_name('post_type_slug'); ?>"
					   type="text"
					   placeholder="ex: movie"
					   value="<?php echo $post_type_slug; ?>" />
			</p>
			<p class="widget-setting-content">
				<label for="<?php echo $this->get_field_id('taxonomy_slug'); ?>">
					<?php _e('Taxonomy slug :', 'cpt-list'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('taxonomy_slug'); ?>"
					   name="<?php echo $this->get_field_name('taxonomy_slug'); ?>"
					   type="text"
					   placeholder="ex: actor"
					   value="<?php echo $taxonomy_slug; ?>" />
			</p>
			<p class="widget-setting-content">
				<label for="<?php echo $this->get_field_id('terms'); ?>">
					<?php _e('Terms (Comma separated) :', 'cpt-list'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>"
					   name="<?php echo $this->get_field_name('terms'); ?>"
					   type="text"
					   placeholder="ex: action,animation,mystery,horror"
					   value="<?php echo $terms; ?>" />
			</p>
			<p class="attention-message"><?php _e('If you narrow the output result, please set terms.', 'cpt-list'); ?></p>
			<p class="widget-setting-content">
				<label for="<?php echo $this->get_field_id('order_by'); ?>">
					<?php _e('Order by :', 'cpt-list'); ?>
				</label>
				<select class="" id="<?php echo $this->get_field_id('order_by'); ?>"
						name="<?php echo $this->get_field_name('order_by'); ?>"
						type="text">
					<option<?php ($order_by == 'desc') ? print ' selected ' : print ''; ?> value="desc"><?php _e('Desc', 'cpt-list'); ?></option>
					<option<?php ($order_by == 'asc') ? print ' selected ' : print ''; ?> value="asc"><?php _e('Asc', 'cpt-list'); ?></option>
				</select>
			</p>
			<p class="widget-setting-content">
				<label for="<?php echo $this->get_field_id('order'); ?>">
					<?php _e('Order :', 'cpt-list'); ?>
				</label>
				<select class="" id="<?php echo $this->get_field_id('order'); ?>"
						name="<?php echo $this->get_field_name('order'); ?>"
						type="text">
					<option<?php ($order == 'date') ? print ' selected ' : print ''; ?> value="date"><?php _e('Date', 'cpt-list'); ?></option>
					<option<?php ($order == 'modified') ? print ' selected ' : print ''; ?> value="modified"><?php _e('Modified', 'cpt-list'); ?></option>
					<option<?php ($order == 'comment_count') ? print ' selected ' : print ''; ?> value="comment_count"><?php _e('Comment count', 'cpt-list'); ?></option>
					<option<?php ($order == 'title') ? print ' selected ' : print ''; ?> value="title"><?php _e('Title', 'cpt-list'); ?></option>
					<option<?php ($order == 'author') ? print ' selected ' : print ''; ?> value="author"><?php _e('Author', 'cpt-list'); ?></option>
					<option<?php ($order == 'ID') ? print ' selected ' : print ''; ?> value="ID"><?php _e('ID', 'cpt-list'); ?></option>
				</select>
			</p>
			<div class="override-settings">
				<h2 class="settings-content-opener js-cpt-list-content-opener"><?php _e('Override Basic Settings?', 'cpt-list'); ?></h2>
				<p class="info-message"><?php _e('Changing the basic setting doesn\'t change the value.', 'cpt-list'); ?></p>
				<div class="settings-content js-cpt-list-content" style="display: none;">
					<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Post List Style Settings', 'cpt-list'); ?></h2>
					<div class="cpt-list-item-setting-wrapper js-cpt-list-content" style="display: none;">
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('list_style'); ?>">
								<?php _e('Post list style :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('list_style'); ?>"
									name="<?php echo $this->get_field_name('list_style'); ?>"
									type="text">
								<option<?php ($list_style == 'list') ? print ' selected ' : print ''; ?> value="list"><?php _e('List', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'full-width') ? print ' selected ' : print ''; ?> value="full-width"><?php _e('Full Width', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'full-cover') ? print ' selected ' : print ''; ?> value="full-cover"><?php _e('Full Cover', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'left-cover') ? print ' selected ' : print ''; ?> value="left-cover"><?php _e('Left Cover', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'right-cover') ? print ' selected ' : print ''; ?> value="right-cover"><?php _e('Right Cover', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'grid-one') ? print ' selected ' : print ''; ?> value="grid-one"><?php _e('Grid One', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'grid-two') ? print ' selected ' : print ''; ?> value="grid-two"><?php _e('Grid Two', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'grid-three') ? print ' selected ' : print ''; ?> value="grid-three"><?php _e('Grid Three', 'cpt-list'); ?></option>
								<option<?php ($list_style == 'grid-four') ? print ' selected ' : print ''; ?> value="grid-four"><?php _e('Grid Four', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('list_count'); ?>">
								<?php _e('Article number of per page :', 'cpt-list'); ?>
							</label>
							<input class="" id="<?php echo $this->get_field_id('list_count'); ?>"
								   name="<?php echo $this->get_field_name('list_count'); ?>"
								   type="number" min="1" max="30"
								   value="<?php echo $list_count; ?>" />
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('list_pagination'); ?>">
								<?php _e('Post list pagination :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('list_pagination'); ?>"
									name="<?php echo $this->get_field_name('list_pagination'); ?>"
									type="text">
								<option<?php ($list_pagination == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($list_pagination == 'pager') ? print ' selected ' : print ''; ?> value="pager"><?php _e('Pager', 'cpt-list'); ?></option>
								<option<?php ($list_pagination == 'manual-ajax') ? print ' selected ' : print ''; ?> value="manual-ajax"><?php _e('Manual AJAX', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('list_text_color'); ?>">
								<?php _e('Post list text color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('list_text_color'); ?>"
									name="<?php echo $this->get_field_name('list_text_color'); ?>"
									type="text">
								<option<?php ($list_text_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($list_text_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('list_padding_setting'); ?>">
								<?php _e('Post list auto padding setting :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('list_padding_setting'); ?>"
									name="<?php echo $this->get_field_name('list_padding_setting'); ?>"
									type="text">
								<option<?php ($list_padding_setting == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('On', 'cpt-list'); ?></option>
								<option<?php ($list_padding_setting == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('Off', 'cpt-list'); ?></option>
							</select>
						</p>
					</div>
				</div>
				<div class="settings-content js-cpt-list-content" style="display: none;">
					<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Title Settings', 'cpt-list'); ?></h2>
					<div class="cpt-list-item-setting-wrapper js-cpt-list-content" style="display: none;">
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('title_show'); ?>">
								<?php _e('Title display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('title_show'); ?>"
									name="<?php echo $this->get_field_name('title_show'); ?>"
									type="text">
								<option<?php ($title_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($title_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('title_element'); ?>">
								<?php _e('Title element type :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('title_element'); ?>"
									name="<?php echo $this->get_field_name('title_element'); ?>"
									type="text">
								<option<?php ($title_element == 'h1') ? print ' selected ' : print ''; ?> value="h1"><?php _e('Heading1(h1)', 'cpt-list'); ?></option>
								<option<?php ($title_element == 'h2') ? print ' selected ' : print ''; ?> value="h2"><?php _e('Heading2(h2)', 'cpt-list'); ?></option>
								<option<?php ($title_element == 'h3') ? print ' selected ' : print ''; ?> value="h3"><?php _e('Heading3(h3)', 'cpt-list'); ?></option>
								<option<?php ($title_element == 'h4') ? print ' selected ' : print ''; ?> value="h4"><?php _e('Heading4(h4)', 'cpt-list'); ?></option>
								<option<?php ($title_element == 'h5') ? print ' selected ' : print ''; ?> value="h5"><?php _e('Heading5(h5)', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('title_font_size'); ?>">
								<?php _e('Title font size :', 'cpt-list'); ?>
							</label>
							<input class="" id="<?php echo $this->get_field_id('title_font_size'); ?>"
								   name="<?php echo $this->get_field_name('title_font_size'); ?>"
								   type="number" min="10" max="64"
								   value="<?php echo $title_font_size; ?>" />px
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('title_color'); ?>">
								<?php _e('Title color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('title_color'); ?>"
									name="<?php echo $this->get_field_name('title_color'); ?>"
									type="text">
								<option<?php ($title_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($title_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the title, please set.', 'cpt-list'); ?></p>
					</div>
				</div>
				<div class="settings-content js-cpt-list-content" style="display: none;">
					<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Meta Info Settings', 'cpt-list'); ?></h2>
					<div class="cpt-list-item-setting-wrapper js-cpt-list-content" style="display: none;">
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_font_size'); ?>">
								<?php _e('Meta font size :', 'cpt-list'); ?>
							</label>
							<input class="" id="<?php echo $this->get_field_id('meta_font_size'); ?>"
								   name="<?php echo $this->get_field_name('meta_font_size'); ?>"
								   type="number" min="10" max="64"
								   value="<?php echo $meta_font_size; ?>" />px
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_date_show'); ?>">
								<?php _e('Date info display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_date_show'); ?>"
									name="<?php echo $this->get_field_name('meta_date_show'); ?>"
									type="text">
								<option<?php ($meta_date_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($meta_date_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_date_color'); ?>">
								<?php _e('Date meta info color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_date_color'); ?>"
									name="<?php echo $this->get_field_name('meta_date_color'); ?>"
									type="text">
								<option<?php ($meta_date_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($meta_date_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the date meta info, please set.', 'cpt-list'); ?></p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_author_show'); ?>">
								<?php _e('Author info display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_author_show'); ?>"
									name="<?php echo $this->get_field_name('meta_author_show'); ?>"
									type="text">
								<option<?php ($meta_author_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($meta_author_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_author_color'); ?>">
								<?php _e('Author meta info color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_author_color'); ?>"
									name="<?php echo $this->get_field_name('meta_author_color'); ?>"
									type="text">
								<option<?php ($meta_author_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($meta_author_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the author meta info, please set.', 'cpt-list'); ?></p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_category_show'); ?>">
								<?php _e('Category info display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_category_show'); ?>"
									name="<?php echo $this->get_field_name('meta_category_show'); ?>"
									type="text">
								<option<?php ($meta_category_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($meta_category_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_category_color'); ?>">
								<?php _e('Category meta info color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_category_color'); ?>"
									name="<?php echo $this->get_field_name('meta_category_color'); ?>"
									type="text">
								<option<?php ($meta_category_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($meta_category_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the category meta info, please set.', 'cpt-list'); ?></p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_tag_show'); ?>">
								<?php _e('Tag info display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_tag_show'); ?>"
									name="<?php echo $this->get_field_name('meta_tag_show'); ?>"
									type="text">
								<option<?php ($meta_tag_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('meta_tag_color'); ?>">
								<?php _e('Tag meta info color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('meta_tag_color'); ?>"
									name="<?php echo $this->get_field_name('meta_tag_color'); ?>"
									type="text">
								<option<?php ($meta_tag_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($meta_tag_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the tag meta info, please set.', 'cpt-list'); ?></p>
					</div>
				</div>
				<div class="settings-content js-cpt-list-content" style="display: none;">
					<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Excerpt Settings', 'cpt-list'); ?></h2>
					<div class="cpt-list-item-setting-wrapper js-cpt-list-content" style="display: none;">
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('excerpt_show'); ?>">
								<?php _e('Excerpt display :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('excerpt_show'); ?>"
									name="<?php echo $this->get_field_name('excerpt_show'); ?>"
									type="text">
								<option<?php ($excerpt_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($excerpt_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('excerpt_font_size'); ?>">
								<?php _e('Excerpt font size :', 'cpt-list'); ?>
							</label>
							<input class="" id="<?php echo $this->get_field_id('excerpt_font_size'); ?>"
								   name="<?php echo $this->get_field_name('excerpt_font_size'); ?>"
								   type="number" min="10" max="64"
								   value="<?php echo $excerpt_font_size; ?>" />px
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('excerpt_font_color'); ?>">
								<?php _e('Excerpt font color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('excerpt_font_color'); ?>"
									name="<?php echo $this->get_field_name('excerpt_font_color'); ?>"
									type="text">
								<option<?php ($excerpt_font_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($excerpt_font_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If you want to change only the color of the excerpt, please set.', 'cpt-list'); ?></p>
					</div>
				</div>
				<div class="settings-content js-cpt-list-content" style="display: none;">
					<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Thumbnail Settings', 'cpt-list'); ?></h2>
					<div class="cpt-list-item-setting-wrapper js-cpt-list-content" style="display: none;">
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('thumbnail_use'); ?>">
								<?php _e('Use substitute thumbnail :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('thumbnail_use'); ?>"
									name="<?php echo $this->get_field_name('thumbnail_use'); ?>"
									type="text">
								<option<?php ($thumbnail_use == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('Yes', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_use == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('No', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If the thumbnail is not set, use substitute image?', 'cpt-list'); ?></p>
						<p class="widget-setting-content image-selector">
							<label for="<?php echo $this->get_field_id('thumbnail_image'); ?>">
								<?php _e('Substitute thumbnail image :', 'cpt-list'); ?>
							</label>
							<?php
							$access_key = cpt_list_get_rand_str(16);
							?>
							<span class="cpt-list-image-preview" style="display: <?php ($thumbnail_image) ? print 'block' : print 'none'; ?>;">
								<img class="cpt-list-selected-image <?php echo $access_key; ?>" src="<?php echo $thumbnail_image; ?>" alt="">
							</span>
							<input class="image-url <?php echo $access_key; ?>"
								   id="<?php echo $this->get_field_id('thumbnail_image'); ?>"
								   name="<?php echo $this->get_field_name('thumbnail_image'); ?>"
								   type="text"
								   value="<?php echo $thumbnail_image; ?>" />
							<a class="cpt-list-select-image" data-target="<?php echo $access_key; ?>"><?php _e('Select', 'cpt-list'); ?></a>
							<a class="cpt-list-clear-image" data-target="<?php echo $access_key; ?>"><?php _e('Clear', 'cpt-list'); ?></a>
						</p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('thumbnail_anchor'); ?>">
								<?php _e('Thumbnail anchor :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('thumbnail_anchor'); ?>"
									name="<?php echo $this->get_field_name('thumbnail_anchor'); ?>"
									type="text">
								<option<?php ($thumbnail_anchor == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('On', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_anchor == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('Off', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If Post list style is Full Width or Grid, will be applied.', 'cpt-list'); ?></p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('thumbnail_height'); ?>">
								<?php _e('Thumbnail height :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('thumbnail_height'); ?>"
									name="<?php echo $this->get_field_name('thumbnail_height'); ?>"
									type="text">
								<option<?php ($thumbnail_height == 'small') ? print ' selected ' : print ''; ?> value="small"><?php _e('Small', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_height == 'medium') ? print ' selected ' : print ''; ?> value="medium"><?php _e('Medium', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_height == 'large') ? print ' selected ' : print ''; ?> value="large"><?php _e('Large', 'cpt-list'); ?></option>
							</select>
						</p>
						<p class="attention-message"><?php _e('* If Post list style is Grid, will be applied.', 'cpt-list'); ?></p>
						<p class="widget-setting-content">
							<label for="<?php echo $this->get_field_id('thumbnail_cover_color'); ?>">
								<?php _e('Thumbnail cover color :', 'cpt-list'); ?>
							</label>
							<select class="" id="<?php echo $this->get_field_id('thumbnail_cover_color'); ?>"
									name="<?php echo $this->get_field_name('thumbnail_cover_color'); ?>"
									type="text">
								<option<?php ($thumbnail_cover_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($thumbnail_cover_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_type_slug'] = strip_tags($new_instance['post_type_slug']);
		$instance['taxonomy_slug'] = strip_tags($new_instance['taxonomy_slug']);
		$instance['terms'] = strip_tags($new_instance['terms']);
		$instance['order_by'] = strip_tags($new_instance['order_by']);
		$instance['order'] = strip_tags($new_instance['order']);
		$instance['list_style'] = strip_tags($new_instance['list_style']);
		$instance['list_count'] = strip_tags($new_instance['list_count']);
		$instance['list_pagination'] = strip_tags($new_instance['list_pagination']);
		$instance['list_text_color'] = strip_tags($new_instance['list_text_color']);
		$instance['list_padding_setting'] = strip_tags($new_instance['list_padding_setting']);
		$instance['title_show'] = strip_tags($new_instance['title_show']);
		$instance['title_element'] = strip_tags($new_instance['title_element']);
		$instance['title_font_size'] = strip_tags($new_instance['title_font_size']);
		$instance['title_color'] = strip_tags($new_instance['title_color']);
		$instance['meta_font_size'] = strip_tags($new_instance['meta_font_size']);
		$instance['meta_date_show'] = strip_tags($new_instance['meta_date_show']);
		$instance['meta_author_show'] = strip_tags($new_instance['meta_author_show']);
		$instance['meta_category_show'] = strip_tags($new_instance['meta_category_show']);
		$instance['meta_tag_show'] = strip_tags($new_instance['meta_tag_show']);
		$instance['meta_date_color'] = strip_tags($new_instance['meta_date_color']);
		$instance['meta_author_color'] = strip_tags($new_instance['meta_author_color']);
		$instance['meta_category_color'] = strip_tags($new_instance['meta_category_color']);
		$instance['meta_tag_color'] = strip_tags($new_instance['meta_tag_color']);
		$instance['excerpt_show'] = strip_tags($new_instance['excerpt_show']);
		$instance['excerpt_font_size'] = strip_tags($new_instance['excerpt_font_size']);
		$instance['excerpt_font_color'] = strip_tags($new_instance['excerpt_font_color']);
		$instance['thumbnail_use'] = strip_tags($new_instance['thumbnail_use']);
		$instance['thumbnail_image'] = strip_tags($new_instance['thumbnail_image']);
		$instance['thumbnail_anchor'] = strip_tags($new_instance['thumbnail_anchor']);
		$instance['thumbnail_height'] = strip_tags($new_instance['thumbnail_height']);
		$instance['thumbnail_cover_color'] = strip_tags($new_instance['thumbnail_cover_color']);
		return $instance;
	}

	function widget($args, $instance, $echo = TRUE) {
		extract($args);
		if (!empty($instance)) {
			$post_type_slug = $instance['post_type_slug'];
			$taxonomy_slug = $instance['taxonomy_slug'];
			$terms = $instance['terms'];
			$order_by = $instance['order_by'];
			$order = $instance['order'];
			$list_style = $instance['list_style'];
			$list_count = $instance['list_count'];
			$list_pagination = $instance['list_pagination'];
			$list_text_color = $instance['list_text_color'];
			$list_padding_setting = $instance['list_padding_setting'];
			$title_show = $instance['title_show'];
			$title_element = $instance['title_element'];
			$title_font_size = $instance['title_font_size'];
			$title_color = $instance['title_color'];
			$meta_font_size = $instance['meta_font_size'];
			$meta_date_show = $instance['meta_date_show'];
			$meta_author_show = $instance['meta_author_show'];
			$meta_category_show = $instance['meta_category_show'];
			$meta_tag_show = $instance['meta_tag_show'];
			$meta_date_color = $instance['meta_date_color'];
			$meta_author_color = $instance['meta_author_color'];
			$meta_category_color = $instance['meta_category_color'];
			$meta_tag_color = $instance['meta_tag_color'];
			$excerpt_show = $instance['excerpt_show'];
			$excerpt_font_size = $instance['excerpt_font_size'];
			$excerpt_font_color = $instance['excerpt_font_color'];
			$thumbnail_use = $instance['thumbnail_use'];
			$thumbnail_image = $instance['thumbnail_image'];
			$thumbnail_anchor = $instance['thumbnail_anchor'];
			$thumbnail_height = $instance['thumbnail_height'];
			$thumbnail_cover_color = $instance['thumbnail_cover_color'];
		}

		$paged = $this->get_paged($list_pagination);
		$tax_query = $this->make_tax_query($taxonomy_slug, $terms);
		$query_result = $this->get_post($post_type_slug, $order, $order_by, $list_count, $paged, $tax_query);

		$list_info = array(
			'style' => $list_style,
			'count' => $list_count,
			'pagination' => $list_pagination,
			'color' => $list_text_color,
			'padding' => $list_padding_setting
		);
		$title_info = array(
			'show' => $title_show,
			'element' => $title_element,
			'size' => $title_font_size,
			'color' => $title_color
		);
		$meta_info = array(
			'size' => $meta_font_size,
			'date_show' => $meta_date_show,
			'author_show' => $meta_author_show,
			'category_show' => $meta_category_show,
			'tag_show' => $meta_tag_show,
			'date_color' => $meta_date_color,
			'author_color' => $meta_author_color,
			'category_color' => $meta_category_color,
			'tag_color' => $meta_tag_color
		);
		$excerpt_info = array(
			'show' => $excerpt_show,
			'size' => $excerpt_font_size,
			'color' => $excerpt_font_color
		);
		$thumbnail_info = array(
			'use' => $thumbnail_use,
			'image' => $thumbnail_image,
			'anchor' => $thumbnail_anchor,
			'height' => $thumbnail_height,
			'cover_color' => $thumbnail_cover_color
		);

		$before_widget = (isset($before_widget)) ? $before_widget : '';
		$ret = $before_widget;
		$ret .= '<div class="cpt-list-wrapper">';

		if (preg_match('[list]', $list_style)) {
			$ret .= $this->get_cpt_list($query_result, $list_info, $title_info, $meta_info);
		} elseif (preg_match('[width]', $list_style)) {
			$ret .= $this->get_cpt_full_width($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info);
		} elseif (preg_match('[cover]', $list_style)) {
			$ret .= $this->get_cpt_cover($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info);
		} elseif (preg_match('[grid]', $list_style)) {
			$ret .= $this->get_cpt_grid($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info);
		}
		$cpt_info = array(
			'post_type_slug' => $post_type_slug,
			'taxonomy_slug' => $taxonomy_slug,
			'terms' => $terms,
			'order_by' => $order_by,
			'order' => $order
		);
		$ret .= $this->pagination($cpt_info, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, $paged, $query_result->max_num_pages);
		$ret .= '</div>';
		$after_widget = (isset($after_widget)) ? $after_widget : '';
		$ret .= $after_widget;

		wp_reset_postdata();

		if ($echo) {
			echo $ret;
			return;
		} else {
			return $ret;
		}
	}

	private function get_paged($pagination) {
		if ($pagination == 'none') {
			$paged = 1;
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} elseif (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} else {
			$paged = 1;
		}
		return $paged;
	}

	public function make_tax_query($taxonomy_slug, $terms) {
		if (trim($terms) == '') {
			return '';
		}
		$term_array = explode(',', $terms);
		array_walk($term_array, 'cpt_list_trim_value');
		$ret = array(
			array(
				'taxonomy' => $taxonomy_slug,
				'field' => 'slug',
				'terms' => $term_array
			)
		);
		return $ret;
	}

	public function get_post($post_type, $order, $order_by, $count, $paged, $tax_query) {
		$args = array(
			'post_type' => $post_type,
			'order' => $order,
			'orderby' => $order_by,
			'posts_per_page' => $count,
			'paged' => $paged
		);
		if (is_array($tax_query)) {
			$args['tax_query'] = $tax_query;
		}
		$wp_query = new WP_Query($args);
		return $wp_query;
	}

	public function get_cpt_list($query_result, $list_info, $title_info, $meta_info, $wrap = TRUE) {
		$ret = '';
		$title_color = ($title_info['color'] != 'none') ? $title_info['color'] : $list_info['color'];
		$meta_date_color = ($meta_info['date_color'] != 'none') ? $meta_info['date_color'] : $list_info['color'];
		$meta_author_color = ($meta_info['author_color'] != 'none') ? $meta_info['author_color'] : $list_info['color'];
		$padding = ($list_info['padding'] == 'on') ? ' auto-padding-set ' : '';
		if ($query_result->have_posts()) {
			$ret .= ($wrap)? '<div class = "cptlist-parent">' : '';
			$ret .= '<ul class = "cpt-style-list ' . $padding . '">';
			while ($query_result->have_posts()) {
				$query_result->the_post();
				$date = ($meta_info['date_show'] == 'show') ? '<span class="meta-date cpt-font-' . $meta_date_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-calendar group-icon"></i>' . get_the_date() . '</span>' : '';
				$author = ($meta_info['author_show'] == 'show') ? '<span class="meta-author cpt-font-' . $meta_author_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-user group-icon"></i>' . get_the_author() . '</span>' : '';
				$ret .= '<li>' . $date . '<a href = "' . get_the_permalink() . '" class = "cpt-font-' . $title_color . '" style="font-size: ' . $title_info['size'] . 'px;">' . get_the_title() . '</a>' . $author . '</li>';
			}
			$ret .= '</ul>';
			$ret .= ($wrap)? '</div>' : '';
		}
		return $ret;
	}

	public function get_cpt_full_width($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, $wrap = TRUE) {
		$ret = '';
		$title_color = ($title_info['color'] != 'none') ? $title_info['color'] : $list_info['color'];
		$meta_date_color = ($meta_info['date_color'] != 'none') ? $meta_info['date_color'] : $list_info['color'];
		$meta_author_color = ($meta_info['author_color'] != 'none') ? $meta_info['author_color'] : $list_info['color'];
		$meta_category_color = ($meta_info['category_color'] != 'none') ? $meta_info['category_color'] : $list_info['color'];
		$meta_tag_color = ($meta_info['tag_color'] != 'none') ? $meta_info['tag_color'] : $list_info['color'];
		$excerpt_color = ($excerpt_info['color'] != 'none') ? $excerpt_info['color'] : $list_info['color'];
		$padding = ($list_info['padding'] == 'on') ? ' auto-padding-set ' : '';
		if ($query_result->have_posts()) {
			$ret .= ($wrap)? '<div class = "cpt-style-full-width cptlist-parent">': '';
			while ($query_result->have_posts()) {
				$query_result->the_post();
				$ret .= '<article class = "cptlist-row ' . $padding . '">';
				/* thumbnail */
				if (has_post_thumbnail()) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, true);
					$thumbnail = '<img src="' . $image_url[0] . '" alt="">';
				} elseif ($thumbnail_info['use'] == 'on') {
					$thumbnail = '<img src="' . $thumbnail_info['image'] . '" alt="">';
				} else {
					$thumbnail = '<p>No image.</p>';
				}
				if ($thumbnail_info['anchor'] == 'on') {
					$thumbnail = '<a href="' . get_the_permalink() . '">' . $thumbnail . '</a>';
				}
				$ret .= '<div class = "post-thumbnail cptlist-col span_6">';
				$ret .= $thumbnail;
				$ret .= '</div>';
				/* title, meta, excerpt */
				$date = ($meta_info['date_show'] == 'show') ? '<span class="meta-date cpt-font-' . $meta_date_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-calendar group-icon"></i>' . get_the_date() . '</span>' : '';
				$author = ($meta_info['author_show'] == 'show') ? '<span class="meta-author cpt-font-' . $meta_author_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-user group-icon"></i>' . get_the_author() . '</span>' : '';
				$excerpt = ($excerpt_info['show'] == 'show') ? '<p class="entry-excerpt cpt-font-' . $excerpt_color . '" style="font-size: ' . $excerpt_info['size'] . 'px;">' . get_the_excerpt() . '</p>' : '';
				$ret .= '<div class = "post-entry-data cptlist-col span_6">';
				$ret .= ($title_info['show'] == 'show') ? '<' . $title_info['element'] . ' class="entry-title"><a href="' . get_the_permalink() . '" class="cpt-font-' . $title_color . '" style="font-size: ' . $title_info['size'] . 'px;">' . get_the_title() . '</a></' . $title_info['element'] . '>' : '';
				$ret .= '<div class="entry-meta-da">' . $date . $author . '</div>';
				if ($taxonomy_slug && $meta_info['category_show'] == 'show') {
					$ret .= '<div class = "entry-meta-categories cpt-font-' . $meta_category_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-briefcase group-icon"></i>';
					$ret .= get_the_term_list($post->ID, $taxonomy_slug);
					$ret .= '</div>';
				}
				$ret .= $excerpt;
				if (get_the_tag_list() && $meta_info['tag_show'] == 'show') {
					$ret .= '<div class = "entry-meta-tags cpt-font-' . $meta_tag_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-tag group-icon"></i>' . get_the_tag_list() . '</div>';
				}
				$ret .= '</div>';
				$ret .= '</article>';
			}
			$ret .= ($wrap)? '</div>': '';
		}
		return $ret;
	}

	public function get_cpt_cover($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, $wrap = TRUE) {
		$ret = '';
		$title_color = ($title_info['color'] != 'none') ? $title_info['color'] : $list_info['color'];
		$meta_date_color = ($meta_info['date_color'] != 'none') ? $meta_info['date_color'] : $list_info['color'];
		$meta_author_color = ($meta_info['author_color'] != 'none') ? $meta_info['author_color'] : $list_info['color'];
		$meta_category_color = ($meta_info['category_color'] != 'none') ? $meta_info['category_color'] : $list_info['color'];
		$meta_tag_color = ($meta_info['tag_color'] != 'none') ? $meta_info['tag_color'] : $list_info['color'];
		$excerpt_color = ($excerpt_info['color'] != 'none') ? $excerpt_info['color'] : $list_info['color'];
		$cover_position = '';
		$padding = ($list_info['padding'] == 'on') ? ' auto-padding-set ' : '';
		if (preg_match('[full]', $list_info['style'])) {
			$cover_position = 'full';
		} elseif (preg_match('[left]', $list_info['style'])) {
			$cover_position = 'left';
		} elseif (preg_match('[right]', $list_info['style'])) {
			$cover_position = 'right';
		}
		if ($query_result->have_posts()) {
			$ret .= ($wrap)? '<div class = "cpt-style-cover cptlist-parent">': '';
			while ($query_result->have_posts()) {
				$query_result->the_post();
				$ret .= '<article class = "cptlist-row ' . $padding . '">';
				/* thumbnail */
				if (has_post_thumbnail()) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, true)[0];
				} elseif ($thumbnail_info['use'] == 'on') {
					$image_url = $thumbnail_info['image'];
				} else {
					$image_url = '';
				}
				/* background, overlay */
				$ret .= '<div class = "cptlist-col span_12" style="background-image: url(' . $image_url . '); background-size: cover; background-position: center center;">';
				$ret .= '<div class = "cover-overlay-' . $cover_position . ' cpt-bg-fade-' . $thumbnail_info['cover_color'] . '"></div>';
				/* title, meta, excerpt */
				$date = ($meta_info['date_show'] == 'show') ? '<span class="meta-date cpt-font-' . $meta_date_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-calendar group-icon"></i>' . get_the_date() . '</span>' : '';
				$author = ($meta_info['author_show'] == 'show') ? '<span class="meta-author cpt-font-' . $meta_author_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-user group-icon"></i>' . get_the_author() . '</span>' : '';
				$excerpt = ($excerpt_info['show'] == 'show') ? '<p class="entry-excerpt cpt-font-' . $excerpt_color . '" style="font-size: ' . $excerpt_info['size'] . 'px;">' . get_the_excerpt() . '</p>' : '';
				$ret .= '<div class = "post-entry-data cover-' . $cover_position . '">';
				$ret .= ($title_info['show'] == 'show') ? '<' . $title_info['element'] . ' class="entry-title"><a href="' . get_the_permalink() . '" class="cpt-font-' . $title_color . '" style="font-size: ' . $title_info['size'] . 'px;">' . get_the_title() . '</a></' . $title_info['element'] . '>' : '';
				$ret .= '<div class="entry-meta-da">' . $date . $author . '</div>';
				if ($taxonomy_slug && $meta_info['category_show'] == 'show') {
					$ret .= '<div class = "entry-meta-categories cpt-font-' . $meta_category_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-briefcase group-icon"></i>';
					$ret .= get_the_term_list($post->ID, $taxonomy_slug);
					$ret .= '</div>';
				}
				$ret .= $excerpt;
				if (get_the_tag_list() && $meta_info['tag_show'] == 'show') {
					$ret .= '<div class = "entry-meta-tags cpt-font-' . $meta_tag_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-tag group-icon"></i>' . get_the_tag_list() . '</div>';
				}
				$ret .= '</div>';
				$ret .= '</div>';
				$ret .= '</article>';
			}
			$ret .= ($wrap)? '</div>': '';
		}
		return $ret;
	}

	public function get_cpt_grid($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, $wrap = TRUE) {
		global $post;
		if (preg_match('[one]', $list_info['style'])) {
			$grid = 12;
			$col = 1;
		} elseif (preg_match('[two]', $list_info['style'])) {
			$grid = 6;
			$col = 2;
		} elseif (preg_match('[three]', $list_info['style'])) {
			$grid = 4;
			$col = 3;
		} elseif (preg_match('[four]', $list_info['style'])) {
			$grid = 3;
			$col = 4;
		}
		$title_color = ($title_info['color'] != 'none') ? $title_info['color'] : $list_info['color'];
		$meta_date_color = ($meta_info['date_color'] != 'none') ? $meta_info['date_color'] : $list_info['color'];
		$meta_author_color = ($meta_info['author_color'] != 'none') ? $meta_info['author_color'] : $list_info['color'];
		$meta_category_color = ($meta_info['category_color'] != 'none') ? $meta_info['category_color'] : $list_info['color'];
		$meta_tag_color = ($meta_info['tag_color'] != 'none') ? $meta_info['tag_color'] : $list_info['color'];
		$excerpt_color = ($excerpt_info['color'] != 'none') ? $excerpt_info['color'] : $list_info['color'];
		$padding = ($list_info['padding'] == 'on') ? ' auto-padding-set ' : '';
		$cnt = 0;
		$ret = '';
		if ($query_result->have_posts()) {
			$ret .= ($wrap)? '<div class = "cpt-style-grid cptlist-parent">' : '';
//			$ret .= '<div class = "cpt-style-grid">';
			$ret .= '<div class = "cptlist-row">';
			while ($query_result->have_posts()) {
				if ($cnt % $col == 0 && $cnt != 0) {
					$ret .= '</div><div class="cptlist-row">';
				}
				$cnt++;
				$query_result->the_post();
				$ret .= '<article class="cptlist-col span_' . $grid . ' ' . $padding . '">';
				/* thumbnail */
				if (has_post_thumbnail()) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, true);
					//$thumbnail = '<img src="' . $image_url[0] . '" alt="">';
					$thumbnail = ' style="background-image: url(' . $image_url[0] . '); background-size: cover; background-position: center center;" ';
				} elseif ($thumbnail_info['use'] == 'on') {
					//$thumbnail = '<img src="' . $thumbnail_info['image'] . '" alt="">';
					$thumbnail = ' style="background-image: url(' . $thumbnail_info['image'] . '); background-size: cover; background-position: center center;" ';
				} else {
					$thumbnail = ' style="height: 0px;" ';
				}
				if ($thumbnail_info['anchor'] == 'on') {
					$thumbnail = '<a href="' . get_the_permalink() . '" class="thumbnail-' . $thumbnail_info['height'] . '" ' . $thumbnail . '></a>';
				} else {
					$thumbnail = '<a class="thumbnail-' . $thumbnail_info['height'] . '" ' . $thumbnail . '></a>';
				}
				$ret .= '<div class = "post-thumbnail">';
				$ret .= $thumbnail;
				$ret .= '</div>';
				/* title, meta, excerpt */
				$date = ($meta_info['date_show'] == 'show') ? '<span class="meta-date cpt-font-' . $meta_date_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-calendar group-icon"></i>' . get_the_date() . '</span>' : '';
				$author = ($meta_info['author_show'] == 'show') ? '<span class="meta-author cpt-font-' . $meta_author_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-user group-icon"></i>' . get_the_author() . '</span>' : '';
				$excerpt = ($excerpt_info['show'] == 'show') ? '<p class="entry-excerpt cpt-font-' . $excerpt_color . '" style="font-size: ' . $excerpt_info['size'] . 'px;">' . get_the_excerpt() . '</p>' : '';
				$ret .= '<div class = "post-entry-data">';
				$ret .= ($title_info['show'] == 'show') ? '<' . $title_info['element'] . ' class="entry-title"><a href="' . get_the_permalink() . '" class="cpt-font-' . $title_color . '" style="font-size: ' . $title_info['size'] . 'px;">' . get_the_title() . '</a></' . $title_info['element'] . '>' : '';
				$ret .= '<div class="entry-meta-da">' . $date . $author . '</div>';
				$ret .= $excerpt;
				if ($taxonomy_slug && $meta_info['category_show'] == 'show') {
					$ret .= '<div class = "entry-meta-categories cpt-font-' . $meta_category_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-briefcase group-icon"></i>';
					$ret .= get_the_term_list($post->ID, $taxonomy_slug);
					$ret .= '</div>';
				}
				if (get_the_tag_list() && $meta_info['tag_show'] == 'show') {
					$ret .= '<div class = "entry-meta-tags cpt-font-' . $meta_tag_color . '" style="font-size: ' . $meta_info['size'] . 'px;"><i class="fa fa-tag group-icon"></i>' . get_the_tag_list() . '</div>';
				}
				$ret .= '</div>';
				$ret .= '</article>';
			}
			$ret .= '</div>';
			$ret .= ($wrap)? '</div>' : '';
//			$ret .= '</div>';
		}
		return $ret;
	}

	private function pagination($cpt_info, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, $paged, $pages = '', $range = 2) {
		$ret = '';
		$color = $list_info['color'];
		if ($list_info['pagination'] == 'pager') {
			$ret .= '<div class = "cpt-pagination">';
			if (empty($paged)) {
				$paged = 1;
			}
			if (1 != $pages) {
				for ($i = 1; $i <= $pages; $i++) {
					if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1))) {
						if ($i != $paged) {
							$ret .= '<a href = "' . get_pagenum_link($i) . '" class="cpt-font-' . $color . '">' . $i . '</a>';
						} else {
							$ret .= '<a class = "active cpt-area-' . $color . '">' . $i . '</a>';
						}
					}
				}
			}
			$ret .= '</div>';
		} elseif ($list_info['pagination'] == 'manual-ajax') {
			$param = $this->createAjaxParam($cpt_info, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info);
			$ret .= (1 != $pages) ? '<span id="cptlist-ajax-manual-load" class="ajax-action-color-' . $color . '" ' . $param . '>' . __('More Load', 'cpt-list') . '</span>' : '';
		}
		return $ret;
	}

	private function createAjaxParam($cpt_info, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info) {
		$ret = '';
		$ret .= ' data-cpt-post-type-slug="' . $cpt_info['post_type_slug'] . '" ';
		$ret .= ' data-cpt-taxonomy-slug="' . $cpt_info['taxonomy_slug'] . '" ';
		$ret .= ' data-cpt-terms="' . $cpt_info['terms'] . '" ';
		$ret .= ' data-cpt-order-by="' . $cpt_info['order_by'] . '" ';
		$ret .= ' data-cpt-order="' . $cpt_info['order'] . '" ';
		$ret .= ' data-list-style="' . $list_info['style'] . '" ';
		$ret .= ' data-list-count="' . $list_info['count'] . '" ';
		$ret .= ' data-list-color="' . $list_info['color'] . '" ';
		$ret .= ' data-list-padding="' . $list_info['padding'] . '" ';
		$ret .= ' data-title-show="' . $title_info['show'] . '" ';
		$ret .= ' data-title-element="' . $title_info['element'] . '" ';
		$ret .= ' data-title-size="' . $title_info['size'] . '" ';
		$ret .= ' data-title-color="' . $title_info['color'] . '" ';
		$ret .= ' data-meta-size="' . $meta_info['size'] . '" ';
		$ret .= ' data-meta-date-show="' . $meta_info['date_show'] . '" ';
		$ret .= ' data-meta-date-color="' . $meta_info['date_color'] . '" ';
		$ret .= ' data-meta-author-show="' . $meta_info['author_show'] . '" ';
		$ret .= ' data-meta-author-color="' . $meta_info['author_color'] . '" ';
		$ret .= ' data-meta-category-show="' . $meta_info['category_show'] . '" ';
		$ret .= ' data-meta-category-color="' . $meta_info['category_color'] . '" ';
		$ret .= ' data-meta-tag-show="' . $meta_info['tag_show'] . '" ';
		$ret .= ' data-meta-tag-color="' . $meta_info['tag_color'] . '" ';
		$ret .= ' data-excerpt-show="' . $excerpt_info['show'] . '" ';
		$ret .= ' data-excerpt-size="' . $excerpt_info['size'] . '" ';
		$ret .= ' data-excerpt-color="' . $excerpt_info['color'] . '" ';
		$ret .= ' data-thumbnail-use="' . $thumbnail_info['use'] . '" ';
		$ret .= ' data-thumbnail-image="' . $thumbnail_info['image'] . '" ';
		$ret .= ' data-thumbnail-anchor="' . $thumbnail_info['anchor'] . '" ';
		$ret .= ' data-thumbnail-height="' . $thumbnail_info['height'] . '" ';
		$ret .= ' data-thumbnail-cover-color="' . $thumbnail_info['cover_color'] . '" ';
		$ret .= ' data-page="2" ';
		return $ret;
	}

}

function cpt_list_trim_value(&$value) {
	$value = trim($value);
}

function cpt_list($atts) {
	$setting = new CPTSettings();
	$args = shortcode_atts(array(
		'post_type_slug' => 'post',
		'taxonomy_slug' => 'category',
		'terms' => '',
		'order' => 'desc',
		'order_by' => 'date',
		'list_style' => $setting->get_basic_list_style(),
		'list_count' => $setting->get_basic_list_count(),
		'list_pagination' => $setting->get_basic_list_pagination(),
		'list_text_color' => $setting->get_basic_list_text_color(),
		'list_padding_setting' => $setting->get_basic_list_padding_setting(),
		'title_show' => $setting->get_basic_title_show(),
		'title_element' => $setting->get_basic_title_element_type(),
		'title_font_size' => $setting->get_basic_title_font_size(),
		'title_color' => $setting->get_basic_title_color(),
		'meta_font_size' => $setting->get_basic_meta_font_size(),
		'meta_date_show' => $setting->get_basic_meta_date_show(),
		'meta_author_show' => $setting->get_basic_meta_author_show(),
		'meta_category_show' => $setting->get_basic_meta_category_show(),
		'meta_tag_show' => $setting->get_basic_meta_tag_show(),
		'meta_date_color' => $setting->get_basic_meta_date_color(),
		'meta_author_color' => $setting->get_basic_meta_author_color(),
		'meta_category_color' => $setting->get_basic_meta_category_color(),
		'meta_tag_color' => $setting->get_basic_meta_tag_color(),
		'excerpt_show' => $setting->get_basic_excerpt_show(),
		'excerpt_font_size' => $setting->get_basic_excerpt_font_size(),
		'excerpt_font_color' => $setting->get_basic_excerpt_font_color(),
		'thumbnail_use' => $setting->get_basic_thumbnail_use(),
		'thumbnail_image' => $setting->get_basic_thumbnail_image(),
		'thumbnail_anchor' => $setting->get_basic_thumbnail_anchor(),
		'thumbnail_height' => $setting->get_basic_thumbnail_height(),
		'thumbnail_cover_color' => $setting->get_basic_thumbnail_cover_color()
			), $atts, 'cpt-list');
	$obj = new CPTList();
	return $obj->widget($args, array(), FALSE);
}

add_shortcode('cpt-list', 'cpt_list');

/* Ajax */

function add_cptlist_post_list_ajax_url() {
	echo '<script>var cptlist_ajax_url = "' . admin_url('admin-ajax.php') . '";</script>';
}

add_action('wp_head', 'add_cptlist_post_list_ajax_url', 1);

function cpt_get_post_list() {
	$keys = array(
		'post_type_slug', 'taxonomy_slug', 'terms', 'order_by', 'order',
		'list_style', 'list_count', 'list_color', 'list_padding',
		'title_show', 'title_element', 'title_size', 'title_color',
		'meta_size', 'meta_date_show', 'meta_date_color', 'meta_author_show', 'meta_author_color', 'meta_category_show', 'meta_category_color', 'meta_tag_show', 'meta_tag_color',
		'excerpt_show', 'excerpt_size', 'excerpt_color',
		'thumbnail_use', 'thumbnail_image', 'thumbnail_anchor', 'thumbnail_height', 'thumbnail_cover_color',
		'page'
	);
	$cpt_settings = new CPTList();
	$all_post_data = filter_input_array(INPUT_POST);
	$ret = array();
	if (!array_key_exists('cpt_ajax_get_post_list_data', $all_post_data)) {
		$ret['res'] = FALSE;
		$ret['code'] = 100;
		$ret['message'] = __('[errCode:100] Parameter is abnormal.', 'cpt-list');
		echo json_encode($ret);
		die();
	}
	$cpt_ajax_data = $all_post_data['cpt_ajax_get_post_list_data'];
	if (!cpylist_array_keys_exists($keys, $cpt_ajax_data)) {
		$ret['res'] = FALSE;
		$ret['code'] = 200;
		$ret['message'] = __('[errCode:200] Parameter is abnormal.', 'cpt-list');
		echo json_encode($ret);
		die();
	}
	$post_type_slug = $cpt_ajax_data['post_type_slug'];
	$taxonomy_slug = $cpt_ajax_data['taxonomy_slug'];
	$terms = $cpt_ajax_data['terms'];
	$order = $cpt_ajax_data['order'];
	$order_by = $cpt_ajax_data['order_by'];
	$count = $cpt_ajax_data['list_count'];
	$page = $cpt_ajax_data['page'];

	$tax_query = $cpt_settings->make_tax_query($taxonomy_slug, $terms);
	$query_result = $cpt_settings->get_post($post_type_slug, $order, $order_by, $count, $page, $tax_query);
	if (!$query_result->have_posts()) {
		$ret['res'] = FALSE;
		$ret['code'] = 300;
		$ret['message'] = __('loaded all.', 'cpt-list');
		echo json_encode($ret);
		die();
	}
	
	$list_info = array(
		'style' => $cpt_ajax_data['list_style'],
		'count' => $cpt_ajax_data['list_count'],
		'color' => $cpt_ajax_data['list_color'],
		'padding' => $cpt_ajax_data['list_padding']
	);
	$title_info = array(
		'show' => $cpt_ajax_data['title_show'],
		'element' => $cpt_ajax_data['title_element'],
		'size' => $cpt_ajax_data['title_size'],
		'color' => $cpt_ajax_data['title_color']
	);
	$meta_info = array(
		'size' => $cpt_ajax_data['meta_size'],
		'date_show' => $cpt_ajax_data['meta_date_show'],
		'author_show' => $cpt_ajax_data['meta_author_show'],
		'category_show' => $cpt_ajax_data['meta_category_show'],
		'tag_show' => $cpt_ajax_data['meta_tag_show'],
		'date_color' => $cpt_ajax_data['meta_date_color'],
		'author_color' => $cpt_ajax_data['meta_author_color'],
		'category_color' => $cpt_ajax_data['meta_category_color'],
		'tag_color' => $cpt_ajax_data['meta_tag_color']
	);
	$excerpt_info = array(
		'show' => $cpt_ajax_data['excerpt_show'],
		'size' => $cpt_ajax_data['excerpt_size'],
		'color' => $cpt_ajax_data['excerpt_color']
	);
	$thumbnail_info = array(
		'use' => $cpt_ajax_data['thumbnail_use'],
		'image' => $cpt_ajax_data['thumbnail_image'],
		'anchor' => $cpt_ajax_data['thumbnail_anchor'],
		'height' => $cpt_ajax_data['thumbnail_height'],
		'cover_color' => $cpt_ajax_data['thumbnail_cover_color']
	);
	
	if (preg_match('[list]', $cpt_ajax_data['list_style'])) {
		$ret['data'] = $cpt_settings->get_cpt_list($query_result, $list_info, $title_info, $meta_info, FALSE);
	} elseif (preg_match('[width]', $cpt_ajax_data['list_style'])) {
		$ret['data'] = $cpt_settings->get_cpt_full_width($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, FALSE);
	} elseif (preg_match('[cover]', $cpt_ajax_data['list_style'])) {
		$ret['data'] = $cpt_settings->get_cpt_cover($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, FALSE);
	} elseif (preg_match('[grid]', $cpt_ajax_data['list_style'])) {
		$ret['data'] = $cpt_settings->get_cpt_grid($taxonomy_slug, $query_result, $list_info, $title_info, $meta_info, $excerpt_info, $thumbnail_info, FALSE);
	}

	$ret['res'] = TRUE;
	echo json_encode($ret);
	die();
}

add_action('wp_ajax_cpt_get_post_list', 'cpt_get_post_list');
add_action('wp_ajax_nopriv_cpt_get_post_list', 'cpt_get_post_list');

/* array_key_exists wrapper */

function cpylist_array_keys_exists($keys, $array) {
	if (empty($keys) || empty($array)) {
		return FALSE;
	}
	foreach ($keys as $value) {
		if (!array_key_exists($value, $array)) {
			return FALSE;
		}
	}
	return TRUE;
}