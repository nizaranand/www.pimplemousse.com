<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function tt_render_title_option($item) {
?>
    <div class="option <?php print $item['type']; ?>">
    <?php print $item['title']; ?>
</div>
<br/>
<?php
}

function tt_render_text_option($item) {
?>
    <div class="option text_options <?php print $item['id']; ?>">
        <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
        <div class="value"><input type="text" class="theme_input" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>" value="<?php print get_the_option($item['id'], $item['std']); ?>"/></div>
        <div class="description"><?php print $item['desc']; ?></div>
    </div>
<?php
}

function tt_render_color_option($item) {
?>
    <div class="option color_options <?php print $item['id']; ?>">
        <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
        <div class="value"><input type="text" class="theme_input tt_colorpicker" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>" value="<?php print get_the_option($item['id'], $item['std']); ?>" style="background-color: <?php print get_the_option($item['id'], $item['std']); ?>;"/></div>
        <div class="description"><?php print $item['desc']; ?></div>
    </div>
<?php
}

function tt_render_font_type_option($item) {
?>
    <div class="option check_options <?php print $item['id']; ?>">
        <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
        <div class="value">
            <select name="<?php print $item['id']; ?>" id="<?php print $item['id']; ?>" class="theme_select">
            <?php
            global $defaultcufonFonts;
            $customFnts = get_option('custom_cufon_fonts');
            if ($customFnts['fonts']) {
                $customFnts['fonts'] = array_merge($defaultcufonFonts, $customFnts['fonts']);
            } else {
                $customFnts['fonts'] = $defaultcufonFonts;
            }
            if ($customFnts['fonts'] != '')
            //foreach ($customFnts['fonts'] as $customFnt) {
            //$item['options'] = array("Arial","Times","Tahoma","Courel");
                foreach ($customFnts['fonts'] as $option) {
            ?>
                    <option value="<?php print $option['name']; ?>" <?php if (get_the_option($item['id'], $item['std']) == $option['name'])
                        echo ' selected="selected"'; ?>>
<?php echo $option['name']; ?>
            </option><?php
                }
?>
        </select>
    </div>
    <div class="description"><?php print $item['desc']; ?></div>
</div>
<?php
        }

        function tt_render_textarea_option($item) {
?>
            <div class="option textarea_options <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
                    <textarea cols="35" rows="6" class="theme_input" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>"><?php print stripslashes(get_the_option($item['id'], $item['std'])); ?></textarea>
                </div>
                <div class="description"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_file_option($item) {
?>
            <div class="option file_options <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
                    <input type="text" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>" value="<?php print get_the_option($item['id'], $item['std']); ?>"/>
                    <input type="button" class="button" value="Upload" id="<?php print $item['id']; ?>_btn" onclick="browseMediaWindow('<?php print $item['id']; ?>')"/>
                </div>
                <div class="description"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_font_option($item) {
?>
            <div class="option cufon_options <?php print $item['id']; ?>" rel="<?php print $item['fnt_url']; ?>" fnt_name="<?php print $item['font']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value"><input type="checkbox" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>"/></div>
                <div class="description cufon_description" rel="<?php print $item['name']; ?>"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_font_size_option($item) {
?>
            <div class="option font-size-option <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value"><div class="font-slider" style="width:200px; float: left;"></div>
                    <input class="sizer-input slider" name="<?php print $item['id']; ?>" type="slider" slidermin="8" sliderdimension=" px" slidermax="72" sliderround="0" sliderstep="1" size="3" value="<?php print get_the_option($item['id'], $item['std']); ?>"/> px
                </div>
                <div class="description cufon_description" rel="<?php print $item['name']; ?>"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_size_option($item) {
?>
            <div class="option size-option <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value"><div class="size-slider" style="width:200px; float: left;"></div>
                    <input class="sizer-input" name="<?php print $item['id']; ?>" type="text" size="3" value="<?php print get_the_option($item['id'], $item['std']); ?>"/> px
                </div>
                <div class="description" rel="<?php print $item['name']; ?>"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_custom_fonts_option($item) {
?>
            <div class="option custom_cufon_fonts <?php print $item['id']; ?>">
                <div class="custom_cufon">
                    <div class="removeButton"></div>
                    <table class="cufon-table" width="100%">
                        <tr>
                            <th style="width:10%;">
                                <label for="featured_image">Font family name</label>

                            </th>
                            <td>
                                <input type="text" name="custom_cufon[#index#][name]" id="custom_cufon_#index#_name" value="" size="30" tabindex="30">
                                <small>Please select cufon font file</small>
                            </td>
                        </tr>
                        <tr>
                            <th style="width:10%;">
                                <label for="featured_image">Cufon font file</label>

                            </th>
                            <td>
                                <input type="text" name="custom_cufon[#index#][file]" id="custom_cufon_#index#_file" value="" size="30" tabindex="30">
                                <input class="button" rel="custom_cufon_#index#_file" type="button" value="Upload" >
                                <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                                <small>Please select cufon font file</small>
                            </td>
                        </tr>
                    </table>
                </div>
    <?php
            $customFnts = get_option('custom_cufon_fonts');

            if ($customFnts['fonts'] != '')
                foreach ($customFnts['fonts'] as $customFnt) {
    ?>
                    <div class="custom_cufon">
                        <div class="removeButton"></div>
                        <table class="cufon-table" width="100%">
                            <tr>
                                <th style="width:10%;">
                                    <label for="featured_image">Font family name</label>

                                </th>
                                <td>
                                    <input type="text" name="custom_cufon[#index#][name]" id="custom_cufon_#index#_name" value="<?php print $customFnt['name']; ?>" size="30" tabindex="30">
                                    <small>Please select cufon font file</small>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:10%;">
                                    <label for="featured_image">Cufon font file</label>

                                </th>
                                <td>
                                    <input type="text" name="custom_cufon[#index#][file]" id="custom_cufon_#index#_file" value="<?php print $customFnt['file']; ?>" size="30" tabindex="30">
                                    <input class="button" rel="custom_cufon_#index#_file" type="button" value="Upload" />
                                    <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                                    <small>Please select cufon font file</small>
                                </td>
                            </tr>
                        </table>
                    </div>
    <?php
                }
    ?>
        </div>
        <input type="hidden" id="custom_fonts_count" name="custom_fonts_count">
        <input type="button" id="custom_font_add_button" name="addmeta" class="add:the-list:newmeta" tabindex="9" value="Add another font"/>
<?php
        }

        function tt_render_checkbox_option($item) {
?>
            <div class="option check_options <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
        <div class="value"><input class="theme_check" type="checkbox" id="<?php print $item['id']; ?>" name="<?php print $item['id']; ?>" value="true" <?php
            if (get_the_option($item['id'], $item['std']) == 'true' || get_the_option($item['id'], $item['std']) == 'checked') {
                echo 'checked';
            }
?>/></div>
    <div class="description"><?php print $item['desc']; ?></div>
            </div>
<?php
        }

        function tt_render_select_option($item) {
?>
            <div class="option check_options <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
                    <select name="<?php print $item['id']; ?>" id="<?php print $item['id']; ?>" class="theme_select">
            <?php
            foreach ($item['options'] as $option) {
            ?>
            <option value="<?php print $option; ?>" <?php if (get_the_option($item['id'], $item['std']) == $option)
                            echo ' selected="selected"'; ?>>
            <?php echo $option; ?>
                        </option><?php
                    }
            ?>
                </select>
            </div>
            <div class="description"><?php print $item['desc']; ?></div>
                    </div>
<?php
                }
						  
		function tt_render_sidebar_content_option($val) {
                    $name = 'clean_sidebars_name';
?>
                    <div class="option check_options">
                        <div class="title"><label for="sidebar_add_name">Add sidebar</label></div>
                        <div class="value">
                            <input type="text" id="sidebar_add_name"/>
                            <input type="button" value="+" id="sidebar_add_button"/>
                            <input type="hidden" id="sidebars_name" name="<?php print $name; ?>" value="<?php print get_option($name); ?>"/>
                        </div>
                    </div>
                    <div class="option check_options <?php print $item['id']; ?>">
                        <div class="title"><?php print $item['name']; ?></div>
                        <div class="value">
                            <div class="sidebars">
                                <ul id="sidebar_list" class="sortable ui-sortable" unselectable="on">
                <?php
                    $sides = split('\|\|', get_option($name));
                    foreach ($sides as $row) {
                        if ($row != "") {
                ?>
                            <li><span class="_sidebar_name_span"><?php print $row; ?></span><br>
                                <div class="deleteButton" style="cursor: pointer;"></div>
                            </li>
                <?php
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
<?php
                }

                function tt_render_skin_content_option($val) {
                    $name = 'clean_skins_name';
?>
                    <div class="option check_options">
                        <div class="title"><label for="skin_add_name">Add new skin</label></div>
                        <div class="value">
                            <input type="text" id="sidebar_add_name"/>
                            <input type="button" value="+" id="sidebar_add_button"/>
                            <input type="hidden" id="sidebars_name" name="<?php print $name; ?>" value="<?php print get_option($name); ?>"/>
                        </div>
                    </div>
                    <div class="option check_options <?php print $item['id']; ?>">
                        <div class="title"><?php print $item['name']; ?></div>
                        <div class="value">
                            <div class="sidebars">
                                <ul id="sidebar_list" class="sortable ui-sortable" unselectable="on">
                <?php
                    $sides = split('\|\|', get_option($name));
                    foreach ($sides as $row) {
                        if ($row != "") {
                ?>
                            <li><span class="_sidebar_name_span"><?php print $row; ?></span><br>
                                <div class="deleteButton" style="cursor: pointer;"></div>
                            </li>
                <?php
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
<?php
                }

                function tt_render_sliderpost_option($item) {
?>
                    <div class="option check_options <?php print $item['id']; ?>">
                        <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
        <?php
                    $color = get_the_option($item['id'], $item['std']);
        ?>
                <select name="<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>" class="theme_select" >
            <?php
                    $terms = get_terms('slidercatalog');
                    foreach ($terms as $term) {
            ?>
                        <option value="<?php echo $term->slug; ?>"
            <?php
                        if ($color == $term->slug) {
                            echo ' selected="selected"';
                        }
            ?>>
<?php echo $term->name; ?>
                        </option>
<?php } ?>
                </select>
            </div>
            <div class="description"><?php print $item['desc']; ?></div>
                    </div>
<?php
                }

                function tt_render_portselect_option($item) {
?>
                    <div class="option check_options <?php print $item['id']; ?>">
                        <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
        <?php
                    $color = get_the_option($item['id'], $item['std']);
        ?>
                <select name="<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>" class="theme_select" >
            <?php
                    $terms = get_terms('catalog');
                    foreach ($terms as $term) {
            ?>
                        <option value="<?php echo $term->slug; ?>"
            <?php
                        if ($color == $term->slug) {
                            echo ' selected="selected"';
                        }
            ?>>
<?php echo $term->name; ?>
                        </option>
<?php } ?>
                </select>
            </div>
            <div class="description"><?php print $item['desc']; ?></div>
                    </div><?php
                }

                function tt_render_pageselect_option($item) {
?>
            <div class="option check_options <?php print $item['id']; ?>">
            <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
            <div class="value">
            <?php $color = get_the_option($item['id']); ?>
                <select name="<?php print $item['id'] ?>" id="<?php print $item['id'] ?>" class="theme_select" >
            <?php
                    $pages = get_pages();
                    foreach ($pages as $page) {
                        echo '<option value="' . $page->ID . '"';
                        if ($color == $page->ID)
                            echo ' selected="selected"'; echo '>';
                        echo $page->post_title;
                        echo '</option>';
                    }
            ?>
                            </select>
                        </div>
                        <div class="description"><?php print $item['desc']; ?></div>
                    </div>
<?php
                }

                function tt_render_postselect_option($item) {
?>
            <div class="option check_options <?php print $item['id']; ?>">
            <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
            <div class="value">
            <?php $color = get_the_option($item['id']); ?>
                <select name="<?php print $item['id'] ?>" id="<?php print $item['id'] ?>" class="theme_select" >
            <?php
                    $posts = get_posts('numberposts=-1');
                    foreach ($posts as $post) {
                        echo '<option value="' . $post->ID . '"';
                        if ($color == $post->ID)
                            echo ' selected="selected"'; echo '>';
                        echo $post->post_title;
                        echo '</option>';
                    }
            ?>
                            </select>
                        </div>
                        <div class="description"><?php print $item['desc']; ?></div>
                    </div>
<?php
                }

                function tt_render_patternselect_option($item) {
?>
            <div class="option check_options <?php print $item['id']; ?>">
                <div class="title"><label for="<?php print $item['id']; ?>"><?php print $item['name']; ?></label></div>
                <div class="value">
                   <?php $color = get_the_option($item['id']); ?>
<?php foreach ($item['options'] as $option) { ?>
             <div class="pattern-block">
                 <input class="theme_select <?php echo $option; ?>" type="radio" name="<?php print $item['id'] ?>" value="<?php echo $option; ?>" <?php
                        if ($color == $option) {
                            echo 'checked';
                        } ?>/>
						<div class="pattern <?php print $option; ?>"></div>
			</div>
<?php } ?>
                        </div>
                        <div class="description"><?php print $item['desc']; ?></div>
                    </div>
<?php
                }

                function tt_render_export_data_option($item) {
?>
            <div id="theme_data_exporter">
                <textarea cols=""  style="width:100%" rows="25" id="theme_date_export_area">

                </textarea>
            </div>
            <div>
                <input type="button" rel="tabs-<?php print $i + 1 ?>" name="export" class="button-primary export_button" value="Export data">
                    </div>
<?php
                }

                function tt_render_import_data_option($item) {
?>
            <div id="theme_data_importer">
                <textarea cols=""  style="width:100%" rows="25" id="theme_date_import_area">

                </textarea>
            </div>
            <div>
                <input type="button" rel="tabs-<?php print $i + 1 ?>" name="export" class="button-primary import_button" value="Import data">
                    </div>
<?php
                }
?>
