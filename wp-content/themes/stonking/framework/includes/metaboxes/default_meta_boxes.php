<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class XacDefaultMetabox {

    var $metaConfiguration = Array(
        'title' => 'Additional options',
        'id' => 'themeton_additional_options',
        'type' => 'page',
        'meta_boxes' => Array()
    );
    var $metaValues;

    function construct($config) {
        $this->metaConfiguration = array_merge($this->metaConfiguration, $config);
        add_action('admin_menu', array(&$this, 'init'));
        add_action('save_post', array(&$this, 'saveMeta'));
    }

    function init() {
        add_meta_box($this->metaConfiguration['id'], __($this->metaConfiguration['title']), array(&$this, 'renderHtml'), $this->metaConfiguration['type'], 'normal');
    }

    function renderHtml() {
        global $post, $shortname;
        $this->metaValues = get_post_meta($post->ID, $this->metaConfiguration['id'], true);
        wp_nonce_field(plugin_basename(__FILE__), $this->metaConfiguration['id'] . '_noncename');
        print '<table class="form-table">';
        foreach ($this->metaConfiguration['meta_boxes'] as $metakey => $metabox) {
            if (function_exists($shortname . '_metabox_' . $metabox['type'])) {
                call_user_func($shortname . '_metabox_' . $metabox['type']);
            } else {
                print '<tr class="tt_meta_rowitem" id="' . $metakey . '" rel="';
					if(isset($metabox['rel'])) {print $metabox['rel'];} else { print '';}
				print '">';
                print '<th style="10%">' . $metabox['title'] . '</th><td>';
                if (method_exists(&$this, 'render_meta_' . $metabox['type'])) {
                    call_user_func(array(&$this, 'render_meta_' . $metabox['type']), $metabox);
                } else {
                    print 'meta not found' . $metabox['type'];
                }
                print '</td></tr>';
            }
        }
        print '</table>';
    }

    function render_meta_text($meta) {
        if(isset($this->metaValues[$meta['name']]) && $this->metaValues[$meta['name']]) { $value = $this->metaValues[$meta['name']]; }
		elseif (isset($meta['std'])) { $value = $meta['std']; }
		else {$value = '';}
        print '<input type="text" name="' . $meta['name'] . '" value="' . $value . '"/>';
        print ' <small>' . $meta['description'] . '</small>';
    }

    function render_meta_select($meta) {
		if(isset($this->metaValues[$meta['name']]) && $this->metaValues[$meta['name']]) { $value = $this->metaValues[$meta['name']]; }
		elseif (isset($meta['std'])) { $value = $meta['std']; }
		else {$value = '';}
        print '<select name="' . $meta['name'] . '">';
        foreach ($meta['options'] as $meta_options) {
            print '<option value="' . $meta_options . '" ';
            print $meta_options == $value ? 'selected ' : '';
            print '>' . $meta_options . '</option>';
        }
        print '</select>';
        print ' <small>' . $meta['description'] . '</small>';
    }
	
	function render_meta_postselect($meta) {
		if(isset($this->metaValues[$meta['name']]) && $this->metaValues[$meta['name']]) { $value = $this->metaValues[$meta['name']]; }
		elseif (isset($meta['std'])) { $value = $meta['std']; }
		else {$value = '';}
        $posts = get_posts('numberposts=-1');
		print '<select name="' . $meta['name'] . '">';
        foreach ($posts as $post) {
            print '<option value="' . $post->ID . '" ';
            print $post->ID == $value ? 'selected ' : '';
            print '>' . $post->post_title . '</option>';
        }
        print '</select>';
        print ' <small>' . $meta['description'] . '</small>';
	}	
	
    function render_meta_textarea($meta) {
		if(isset($this->metaValues[$meta['name']]) && $this->metaValues[$meta['name']]) { $value = $this->metaValues[$meta['name']]; }
		elseif (isset($meta['std'])) { $value = $meta['std']; }
		else {$value = '';}
        print '<textarea name="' . $meta['name'] . '" rows="10" cols="45">' . $value . '</textarea>';
        print ' <small>' . $meta['description'] . '</small>';
    }

    function render_meta_checkbox($meta) {
		$value = '';
        if(isset($meta['name']) && isset($this->metaValues[$meta['name']])) {
			if($this->metaValues[$meta['name']]) {
				if($this->metaValues[$meta['name']] == 'true') $value = 'checked';
			}
		} else if(isset($meta['std']) && $this->metaValues == '') { $value = $meta['std']; }
        print '<input type="checkbox" name="' . $meta['name'] . '" value="true" ' . $value . ' />';
        print ' <small>' . $meta['description'] . '</small>';
    }

    function render_meta_categories($meta) {
        if ($this->metaValues[$meta['name']]) {
            $selected = split(",", $this->metaValues[$meta['name']]);
        }
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $categories = get_categories($args);
        foreach ($categories as $category) {
            print '<input class="theme_check" type="checkbox" name="' . $meta['name'] . '[]" id="' . $category->cat_ID . '" value="' . $category->name . '" ';
            if ($selected)
                print in_array($category->cat_ID, $selected) ? 'checked' : '';
            print '> ' . $category->name . '<br/>';
        }
        print ' <small>' . $meta['description'] . '</small>';
    }

    function render_meta_terms($meta) {
        $taxonomy = $meta['term'];
        if (!$taxonomy) {
            $taxonomy = 'category';
        }
        $args = array('taxonomy' => $taxonomy);
        $tax_terms = get_terms($taxonomy, $args);
		$i = 0;
        foreach ($tax_terms as $tax_term) {
            $tax_checked = '';

            if (isset($this->metaValues[$meta['name']]) && $this->metaValues[$meta['name']]) {
                $checkedValues = (array) $this->metaValues[$meta['name']];
                if (in_array($tax_term->slug, $checkedValues)) {
                    $tax_checked = 'checked';
                }
            }
            //if($tax_term->slug==)
            print '<input id="radio' . $i . '" ' . $tax_checked . ' type="checkbox" name="' . $meta['name'] . '[]" value="' . $tax_term->slug . '"/> <label for="radio' . $i . '" class="white">' . $tax_term->name . '</label><br/>';
            $i++;
        }
		print ' <small>' . $meta['description'] . '</small>';
    }

    function saveMeta($post_id) {
        if (!isset($_POST[$this->metaConfiguration['id'] . '_noncename']))
			return;
		if(!wp_verify_nonce($_POST[$this->metaConfiguration['id'] . '_noncename'], plugin_basename(__FILE__)))
			return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return ;
        if (!current_user_can('edit_post', $post_id))
            return ;
        if (isset($_POST['post_type']) && $this->metaConfiguration['type'] == $_POST['post_type']) {
            $myDefaultMeta = Array();
            foreach ($this->metaConfiguration['meta_boxes'] as $metakey => $metabox) {
				if(isset($_POST[$metabox['name']]))
					$myDefaultMeta[$metabox['name']] = ($_POST[$metabox['name']]);
            }
            if (get_post_meta($post_id, $this->metaConfiguration['id']) == '') {
                add_post_meta($post_id, $this->metaConfiguration['id'], $myDefaultMeta, true);
            } else {
                update_post_meta($post_id, $this->metaConfiguration['id'], $myDefaultMeta);
            }
        }
    }

}

?>
