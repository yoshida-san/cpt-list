<?php
/*
  Plugin Name: CPT List
  Plugin URI: https://github.com/yoshida-san/cpt-list
  Description: Will add the custom post type list view shortcode and widget.
  Version: 0.1.1
  Author: Satoshi Yoshida
  Author URI: https://github.com/yoshida-san/cpt-list
  License: GPLv2 or later
 */
/*  Copyright 2015 Satoshi Yoshida (email : yos.3104@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

require_once dirname(__FILE__) . '/inc/cpt-list.php';

class CPTSettings {

	function __construct() {
		add_action('admin_menu', array($this, 'add_pages'));
	}

	function add_pages() {
		add_submenu_page('plugins.php', __('CPT List', 'cpt-list'), __('CPT List', 'cpt-list'), 'level_8', __FILE__, array($this, 'setting_view'));
	}

	function setting_view() {
		$post_settings = filter_input(INPUT_POST, "cpt_list_settings", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
		if (!is_null($post_settings)) {
			check_admin_referer('cpt_list_settings');
			update_option('cpt_list_settings', $post_settings);
			?><div class="updated fade"><p><strong><?php _e('Settings saved.', 'cpt-list'); ?></strong></p></div><?php
		}
		?>
		<div class="cpt-list-admin-content-wrapper">
			<div class="cpt-list-admin-settings-content-wrapper">
				<h1 class="cpt-list-settings-title"><?php _e('CPT List Basic Settings', 'cpt-list'); ?></h1>
				<p class="info-message" style="font-size: 1.0rem;"><?php _e('CPT List outputs post list of custom post type. Let\'s immediately make common configuration.', 'cpt-list'); ?></p>
				<form class="admin-content" action="" method="post">
					<?php
					wp_nonce_field('cpt_list_settings');
					$settings = get_option('cpt_list_settings');
					$basic_list_style = isset($settings['basic_list_style']) ? esc_html($settings['basic_list_style']) : $this->get_basic_list_style();
					$basic_list_count = isset($settings['basic_list_count']) ? esc_html($settings['basic_list_count']) : $this->get_basic_list_count();
					$basic_list_pagination = isset($settings['basic_list_pagination']) ? esc_html($settings['basic_list_pagination']) : $this->get_basic_list_pagination();
					$basic_list_text_color = isset($settings['basic_list_text_color']) ? esc_html($settings['basic_list_text_color']) : $this->get_basic_list_text_color();
					$basic_list_padding_setting = isset($settings['basic_list_padding_setting']) ? esc_html($settings['basic_list_padding_setting']) : $this->get_basic_list_padding_setting();
					$basic_title_show = isset($settings['basic_title_show']) ? esc_html($settings['basic_title_show']) : $this->get_basic_title_show();
					$basic_title_element_type = isset($settings['basic_title_element_type']) ? esc_html($settings['basic_title_element_type']) : $this->get_basic_title_element_type();
					$basic_title_font_size = isset($settings['basic_title_font_size']) ? esc_html($settings['basic_title_font_size']) : $this->get_basic_title_font_size();
					$basic_title_color = isset($settings['basic_title_color']) ? esc_html($settings['basic_title_color']) : $this->get_basic_title_color();
					$basic_meta_font_size = isset($settings['basic_meta_font_size']) ? esc_html($settings['basic_meta_font_size']) : $this->get_basic_meta_font_size();
					$basic_meta_date_show = isset($settings['basic_meta_date_show']) ? esc_html($settings['basic_meta_date_show']) : $this->get_basic_meta_date_show();
					$basic_meta_author_show = isset($settings['basic_meta_author_show']) ? esc_html($settings['basic_meta_author_show']) : $this->get_basic_meta_author_show();
					$basic_meta_category_show = isset($settings['basic_meta_category_show']) ? esc_html($settings['basic_meta_category_show']) : $this->get_basic_meta_category_show();
					$basic_meta_tag_show = isset($settings['basic_meta_tag_show']) ? esc_html($settings['basic_meta_tag_show']) : $this->get_basic_meta_tag_show();
					$basic_meta_date_color = isset($settings['basic_meta_date_color']) ? esc_html($settings['basic_meta_date_color']) : $this->get_basic_meta_date_color();
					$basic_meta_author_color = isset($settings['basic_meta_author_color']) ? esc_html($settings['basic_meta_author_color']) : $this->get_basic_meta_author_color();
					$basic_meta_category_color = isset($settings['basic_meta_category_color']) ? esc_html($settings['basic_meta_category_color']) : $this->get_basic_meta_category_color();
					$basic_meta_tag_color = isset($settings['basic_meta_tag_color']) ? esc_html($settings['basic_meta_tag_color']) : $this->get_basic_meta_tag_color();
					$basic_excerpt_show = isset($settings['basic_excerpt_show']) ? esc_html($settings['basic_excerpt_show']) : $this->get_basic_excerpt_show();
					$basic_excerpt_font_size = isset($settings['basic_excerpt_font_size']) ? esc_html($settings['basic_excerpt_font_size']) : $this->get_basic_excerpt_font_size();
					$basic_excerpt_font_color = isset($settings['basic_excerpt_font_color']) ? esc_html($settings['basic_excerpt_font_color']) : $this->get_basic_excerpt_font_color();
					$basic_thumbnail_use = ($settings['basic_thumbnail_use']) ? esc_html($settings['basic_thumbnail_use']) : $this->get_basic_thumbnail_use();
					$basic_thumbnail_image = ($settings['basic_thumbnail_image']) ? esc_html($settings['basic_thumbnail_image']) : $this->get_basic_thumbnail_image();
					$basic_thumbnail_anchor = ($settings['basic_thumbnail_anchor']) ? esc_html($settings['basic_thumbnail_anchor']) : $this->get_basic_thumbnail_anchor();
					$basic_thumbnail_height = ($settings['basic_thumbnail_height']) ? esc_html($settings['basic_thumbnail_height']) : $this->get_basic_thumbnail_height();
					$basic_thumbnail_cover_color = ($settings['basic_thumbnail_cover_color']) ? esc_html($settings['basic_thumbnail_cover_color']) : $this->get_basic_thumbnail_cover_color();
					?>
					
					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Post List Style Settings', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<h3 class="cpt-list-setting-title"><?php _e('Post list style', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_list_style]">
								<option<?php ($basic_list_style == 'list') ? print ' selected ' : print ''; ?> value="list"><?php _e('List', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'full-width') ? print ' selected ' : print ''; ?> value="full-width"><?php _e('Full Width', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'full-cover') ? print ' selected ' : print ''; ?> value="full-cover"><?php _e('Full Cover', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'left-cover') ? print ' selected ' : print ''; ?> value="left-cover"><?php _e('Left Cover', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'right-cover') ? print ' selected ' : print ''; ?> value="right-cover"><?php _e('Right Cover', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'grid-one') ? print ' selected ' : print ''; ?> value="grid-one"><?php _e('Grid One', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'grid-two') ? print ' selected ' : print ''; ?> value="grid-two"><?php _e('Grid Two', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'grid-three') ? print ' selected ' : print ''; ?> value="grid-three"><?php _e('Grid Three', 'cpt-list'); ?></option>
								<option<?php ($basic_list_style == 'grid-four') ? print ' selected ' : print ''; ?> value="grid-four"><?php _e('Grid Four', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Article number of per page', 'cpt-list'); ?></h3>
							<input class="cpt-list-item" name="cpt_list_settings[basic_list_count]" min="1" max="30" type="number" value="<?php echo $basic_list_count; ?>">
							<h3 class="cpt-list-setting-title"><?php _e('Post list pagination', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_list_pagination]">
								<option<?php ($basic_list_pagination == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_list_pagination == 'pager') ? print ' selected ' : print ''; ?> value="pager"><?php _e('Pager', 'cpt-list'); ?></option>
								<option<?php ($basic_list_pagination == 'manual-ajax') ? print ' selected ' : print ''; ?> value="manual-ajax"><?php _e('Manual AJAX', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Post list text color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_list_text_color]">
								<option<?php ($basic_list_text_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_list_text_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Post list auto padding setting', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_list_padding_setting]">
								<option<?php ($basic_list_padding_setting == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('On', 'cpt-list'); ?></option>
								<option<?php ($basic_list_padding_setting == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('Off', 'cpt-list'); ?></option>
							</select>
						</div>
					</section>

					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Title Settings', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<h3 class="cpt-list-setting-title"><?php _e('Title display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_title_show]">
								<option<?php ($basic_title_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_title_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Title element type', 'cpt-list'); ?></h3>
							<select name="cpt_list_settings[basic_title_element_type]" type="text">
								<option<?php ($basic_title_element_type == 'h1') ? print ' selected ' : print ''; ?> value="h1"><?php _e('Heading1(h1)', 'cpt-list'); ?></option>
								<option<?php ($basic_title_element_type == 'h2') ? print ' selected ' : print ''; ?> value="h2"><?php _e('Heading2(h2)', 'cpt-list'); ?></option>
								<option<?php ($basic_title_element_type == 'h3') ? print ' selected ' : print ''; ?> value="h3"><?php _e('Heading3(h3)', 'cpt-list'); ?></option>
								<option<?php ($basic_title_element_type == 'h4') ? print ' selected ' : print ''; ?> value="h4"><?php _e('Heading4(h4)', 'cpt-list'); ?></option>
								<option<?php ($basic_title_element_type == 'h5') ? print ' selected ' : print ''; ?> value="h5"><?php _e('Heading5(h5)', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Title font size', 'cpt-list'); ?></h3>
							<input class="cpt-list-item" name="cpt_list_settings[basic_title_font_size]" min="10" max="64" type="number" value="<?php echo $basic_title_font_size; ?>">px
							<h3 class="cpt-list-setting-title"><?php _e('Title color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_title_color]">
								<option<?php ($basic_title_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_title_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the title, please set.', 'cpt-list'); ?></p>
						</div>
					</section>

					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Meta Info Settings', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<h3 class="cpt-list-setting-title"><?php _e('Meta font size', 'cpt-list'); ?></h3>
							<input class="cpt-list-item" name="cpt_list_settings[basic_meta_font_size]" min="10" max="64" type="number" value="<?php echo $basic_meta_font_size; ?>">px
							<h3 class="cpt-list-setting-title"><?php _e('Date info display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_date_show]">
								<option<?php ($basic_meta_date_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Date meta info color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_date_color]">
								<option<?php ($basic_meta_date_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_date_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the date meta info, please set.', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Author info display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_author_show]">
								<option<?php ($basic_meta_author_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Author meta info color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_author_color]">
								<option<?php ($basic_meta_author_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_author_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the author meta info, please set.', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Category info display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_category_show]">
								<option<?php ($basic_meta_category_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Category meta info color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_category_color]">
								<option<?php ($basic_meta_category_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_category_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the category meta info, please set.', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Tag info display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_tag_show]">
								<option<?php ($basic_meta_tag_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Tag meta info color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_meta_tag_color]">
								<option<?php ($basic_meta_tag_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_meta_tag_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the tag meta info, please set.', 'cpt-list'); ?></p>
						</div>
					</section>

					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Excerpt Settings', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<h3 class="cpt-list-setting-title"><?php _e('Excerpt display', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_excerpt_show]">
								<option<?php ($basic_excerpt_show == 'show') ? print ' selected ' : print ''; ?> value="show"><?php _e('Show', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_show == 'hide') ? print ' selected ' : print ''; ?> value="hide"><?php _e('Hide', 'cpt-list'); ?></option>
							</select>
							<h3 class="cpt-list-setting-title"><?php _e('Excerpt font size', 'cpt-list'); ?></h3>
							<input class="cpt-list-item" name="cpt_list_settings[basic_excerpt_font_size]" min="10" max="64" type="number" value="<?php echo $basic_excerpt_font_size; ?>">px
							<h3 class="cpt-list-setting-title"><?php _e('Excerpt font color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_excerpt_font_color]">
								<option<?php ($basic_excerpt_font_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_excerpt_font_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If you want to change only the color of the excerpt, please set.', 'cpt-list'); ?></p>
						</div>
					</section>

					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('Thumbnail Settings', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<h3 class="cpt-list-setting-title"><?php _e('Use substitute thumbnail', 'cpt-list'); ?></h3>
							<select name="cpt_list_settings[basic_thumbnail_use]" type="text">
								<option<?php ($basic_thumbnail_use == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('Yes', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_use == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('No', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If the thumbnail is not set, use substitute image?', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Substitute thumbnail image', 'cpt-list'); ?></h3>
							<div class="image-selector cpt-list-item">
								<?php
								$access_key = cpt_list_get_rand_str(16);
								?>
								<span class="cpt-list-image-preview" style="display: <?php ($basic_thumbnail_image) ? print 'block' : print 'none'; ?>;">
									<img class="cpt-list-selected-image <?php echo $access_key; ?>" src="<?php echo $basic_thumbnail_image; ?>" alt="">
								</span>
								<input class="image-url <?php echo $access_key; ?>"
									   name="cpt_list_settings[basic_thumbnail_image]"
									   type="text"
									   value="<?php echo $basic_thumbnail_image; ?>" />
								<a class="cpt-list-select-image" data-target="<?php echo $access_key; ?>"><?php _e('Select', 'cpt-list'); ?></a>
								<a class="cpt-list-clear-image" data-target="<?php echo $access_key; ?>"><?php _e('Clear', 'cpt-list'); ?></a>
							</div>
							<h3 class="cpt-list-setting-title"><?php _e('Thumbnail anchor', 'cpt-list'); ?></h3>
							<select name="cpt_list_settings[basic_thumbnail_anchor]" type="text">
								<option<?php ($basic_thumbnail_anchor == 'on') ? print ' selected ' : print ''; ?> value="on"><?php _e('On', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_anchor == 'off') ? print ' selected ' : print ''; ?> value="off"><?php _e('Off', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If Post list style is Full Width or Grid, will be applied.', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Thumbnail height', 'cpt-list'); ?></h3>
							<select name="cpt_list_settings[basic_thumbnail_height]" type="text">
								<option<?php ($basic_thumbnail_height == 'small') ? print ' selected ' : print ''; ?> value="small"><?php _e('Small', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_height == 'medium') ? print ' selected ' : print ''; ?> value="medium"><?php _e('Medium', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_height == 'large') ? print ' selected ' : print ''; ?> value="large"><?php _e('Large', 'cpt-list'); ?></option>
							</select>
							<p class="attention-message"><?php _e('* If Post list style is Grid, will be applied.', 'cpt-list'); ?></p>
							<h3 class="cpt-list-setting-title"><?php _e('Thumbnail cover color', 'cpt-list'); ?></h3>
							<select class="" name="cpt_list_settings[basic_thumbnail_cover_color]">
								<option<?php ($basic_thumbnail_cover_color == 'none') ? print ' selected ' : print ''; ?> value="none"><?php _e('None', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'black') ? print ' selected ' : print ''; ?> value="black" class="option-black"><?php _e('Black', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'white') ? print ' selected ' : print ''; ?> value="white" class="option-white"><?php _e('White', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'red') ? print ' selected ' : print ''; ?> value="red" class="option-red"><?php _e('Red', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'pink') ? print ' selected ' : print ''; ?> value="pink" class="option-pink"><?php _e('Pink', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'purple') ? print ' selected ' : print ''; ?> value="purple" class="option-purple"><?php _e('Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'deeppurple') ? print ' selected ' : print ''; ?> value="deeppurple" class="option-deeppurple"><?php _e('Deep Purple', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'indigo') ? print ' selected ' : print ''; ?> value="indigo" class="option-indigo"><?php _e('Indigo', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'blue') ? print ' selected ' : print ''; ?> value="blue" class="option-blue"><?php _e('Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'lightblue') ? print ' selected ' : print ''; ?> value="lightblue" class="option-lightblue"><?php _e('Light Blue', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'cyan') ? print ' selected ' : print ''; ?> value="cyan" class="option-cyan"><?php _e('Cyan', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'teal') ? print ' selected ' : print ''; ?> value="teal" class="option-teal"><?php _e('Teal', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'green') ? print ' selected ' : print ''; ?> value="green" class="option-green"><?php _e('Green', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'lightgreen') ? print ' selected ' : print ''; ?> value="lightgreen" class="option-lightgreen"><?php _e('Light Green', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'lime') ? print ' selected ' : print ''; ?> value="lime" class="option-lime"><?php _e('Lime', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'yellow') ? print ' selected ' : print ''; ?> value="yellow" class="option-yellow"><?php _e('Yellow', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'amber') ? print ' selected ' : print ''; ?> value="amber" class="option-amber"><?php _e('Amber', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'orange') ? print ' selected ' : print ''; ?> value="orange" class="option-orange"><?php _e('Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'deeporange') ? print ' selected ' : print ''; ?> value="deeporange" class="option-deeporange"><?php _e('Deep Orange', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'brown') ? print ' selected ' : print ''; ?> value="brown" class="option-brown"><?php _e('Brown', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'grey') ? print ' selected ' : print ''; ?> value="grey" class="option-grey"><?php _e('Grey', 'cpt-list'); ?></option>
								<option<?php ($basic_thumbnail_cover_color == 'bluegrey') ? print ' selected ' : print ''; ?> value="bluegrey" class="option-bluegrey"><?php _e('Blue Grey', 'cpt-list'); ?></option>
							</select>
						</div>
					</section>
					
					
					<section class="cpt-list-item-settings">
						<h2 class="cpt-list-item-title js-cpt-list-content-opener"><?php _e('CPT List Shortcode Template', 'cpt-list'); ?></h2>
						<div class="cpt-list-item-setting-wrapper js-cpt-list-content">
							<input type="text" onclick="this.select();" style="width: 300px;margin-top: 10px;" readonly="readonly" value='[cpt-list post_type_slug="post" taxonomy_slug="category" terms="" order="desc" order_by="date"]'>
							<h3 class="cpt-list-setting-title"><?php _e('Shortcode Parameters', 'cpt-list'); ?></h3>
							<a href="http://beek.jp/cpt-list/"><?php _e('Check here.', 'cpt-list'); ?></a>
						</div>
					</section>
					

					<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save', 'cpt-list'); ?>"></p>
				</form>
			</div>
		</div>
		<?php
	}

	function get_basic_list_style() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_list_style']) ? $option['basic_list_style'] : 'list';
	}

	function get_basic_list_count() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_list_count']) ? $option['basic_list_count'] : 12;
	}

	function get_basic_list_pagination() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_list_pagination']) ? $option['basic_list_pagination'] : 'pager';
	}

	function get_basic_list_text_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_list_text_color']) ? $option['basic_list_text_color'] : 'black';
	}

	function get_basic_list_padding_setting() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_list_padding_setting']) ? $option['basic_list_padding_setting'] : 'on';
	}

	function get_basic_title_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_title_show']) ? $option['basic_title_show'] : 'show';
	}

	function get_basic_title_element_type() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_title_element_type']) ? $option['basic_title_element_type'] : 'h3';
	}

	function get_basic_title_font_size() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_title_font_size']) ? $option['basic_title_font_size'] : 20;
	}

	function get_basic_title_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_title_color']) ? $option['basic_title_color'] : 'none';
	}

	function get_basic_meta_date_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_date_show']) ? $option['basic_meta_date_show'] : 'show';
	}

	function get_basic_meta_author_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_author_show']) ? $option['basic_meta_author_show'] : 'show';
	}

	function get_basic_meta_category_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_category_show']) ? $option['basic_meta_category_show'] : 'show';
	}

	function get_basic_meta_tag_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_tag_show']) ? $option['basic_meta_tag_show'] : 'show';
	}

	function get_basic_meta_date_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_date_color']) ? $option['basic_meta_date_color'] : 'none';
	}

	function get_basic_meta_author_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_author_color']) ? $option['basic_meta_author_color'] : 'none';
	}

	function get_basic_meta_category_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_category_color']) ? $option['basic_meta_category_color'] : 'none';
	}

	function get_basic_meta_tag_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_tag_color']) ? $option['basic_meta_tag_color'] : 'none';
	}

	function get_basic_meta_font_size() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_meta_font_size']) ? $option['basic_meta_font_size'] : 12;
	}

	function get_basic_excerpt_show() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_excerpt_show']) ? $option['basic_excerpt_show'] : 14;
	}

	function get_basic_excerpt_font_size() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_excerpt_font_size']) ? $option['basic_excerpt_font_size'] : 14;
	}

	function get_basic_excerpt_font_color() {
		$option = get_option('cpt_list_settings');
		return isset($option['basic_excerpt_font_color']) ? $option['basic_excerpt_font_color'] : 'none';
	}

	function get_basic_thumbnail_use() {
		$option = get_option('cpt_list_settings');
		return ($option['basic_thumbnail_use']) ? $option['basic_thumbnail_use'] : 'on';
	}

	function get_basic_thumbnail_image() {
		$option = get_option('cpt_list_settings');
		return ($option['basic_thumbnail_image']) ? $option['basic_thumbnail_image'] : plugins_url('images/default-thumbnail.png', __FILE__);
	}

	function get_basic_thumbnail_anchor() {
		$option = get_option('cpt_list_settings');
		return ($option['basic_thumbnail_anchor']) ? $option['basic_thumbnail_anchor'] : 'on';
	}

	function get_basic_thumbnail_height() {
		$option = get_option('cpt_list_settings');
		return ($option['basic_thumbnail_height']) ? $option['basic_thumbnail_height'] : 'medium';
	}

	function get_basic_thumbnail_cover_color() {
		$option = get_option('cpt_list_settings');
		return ($option['basic_thumbnail_cover_color']) ? $option['basic_thumbnail_cover_color'] : 'black';
	}

}

$cpt_list_settings = new CPTSettings();

add_action('admin_enqueue_scripts', 'cpt_list_load_media');
add_action('wp_enqueue_scripts', 'cpt_list_enqueue_files');
add_action('admin_menu', 'cpt_list_admin_enqueue_files');

function cpt_list_load_media() {
	wp_enqueue_media();
}

function cpt_list_admin_enqueue_files() {
	wp_register_style('cpt-list-style-admin', plugins_url('', __FILE__) . '/css/cpt-list-admin.css', array(), '0.1.0');
	wp_register_script('cpt-list-sctipt-admin', plugins_url('', __FILE__) . '/js/cpt-list-admin.js', array("jquery"), '0.1.0', TRUE);
	wp_enqueue_style('cpt-list-style-admin');
	wp_enqueue_script('cpt-list-sctipt-admin');
}

function cpt_list_enqueue_files() {
	wp_register_style('cpt-list-responsive-gs', plugins_url('', __FILE__) . '/component/responsive.gs/responsive.gs.12col.css', array(), '3.0');
	wp_register_style('cpt-list-font-awesome', plugins_url('', __FILE__) . '/component/font-awesome-4.4.0/css/font-awesome.min.css', array(), '4.4.0');
	wp_register_style('cpt-list-style', plugins_url('', __FILE__) . '/css/cpt-list.css', array(), '0.1.1');
	wp_register_script('cpt-list-sctipt', plugins_url('', __FILE__) . '/js/cpt-list.js', array("jquery"), '0.2.1', TRUE);
	wp_enqueue_script('jquery');
	wp_enqueue_style('cpt-list-responsive-gs');
	wp_enqueue_style('cpt-list-font-awesome');
	wp_enqueue_style('cpt-list-style');
	wp_enqueue_script('cpt-list-sctipt');
}

add_action('widgets_init', function() {
	register_widget('CPTList');
});

function cpt_list_load_textdomain() {
	load_plugin_textdomain('cpt-list', FALSE, basename(dirname(__FILE__)) . '/languages');
}

add_action('plugins_loaded', 'cpt_list_load_textdomain');

function cpt_list_get_rand_str($length) {
	static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
	$str = '';
	for ($i = 0; $i < $length; ++$i) {
		$str .= $chars[mt_rand(0, 61)];
	}
	return $str;
}
