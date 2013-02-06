<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'table_shortcode_filter');
add_action('tt_shortcode_generator', 'table_shortcode_generator');

function table_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Table', 'id' => 'table');
    return $shortcodes;
}

function table_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'table', 'columns_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Table",
        "options" => array(
            array("name" => "row count", "desc" => "Row count", "options" => array('1', '2', '3', '4', '5', '6', '7', '8')),
            array("name" => "column count", "desc" => "Column count", "options" => array('1', '2', '3', '4', '5', '6', '7', '8')),
            array("name" => "styles", "desc" => "Table style", "options" => array('none', 'black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink')),
            array("name" => "width", "desc" => "Table width", "options" => array('100%', '90%', '80%', '70%', '60%', '50%', '40%', '30%', '20%', '10%'))
            ));
    default_shortcode_render($option);
?>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_table_shortcode();"></p>
    <script type="text/javascript">
        function insert_table_shortcode(){
            var klass = '';
            var twidth = '100%';
            if(jQuery('#style_shortcodeTable2').val() != 'none')
                klass = jQuery('#style_shortcodeTable2').val()+' styled-table';
                twidth = jQuery('#style_shortcodeTable3').val();
            tagtext = "<table class=\""+klass+"\" border='1' width=\""+twidth+"\">";
            var singlenode = "";
            var row = jQuery('#style_shortcodeTable0').val();
            var column = jQuery('#style_shortcodeTable1').val();
            for (i=0;i<row;i++)
            {
                singlenode = "";
                for (j=0;j<column;j++)
                {
                    if(i==0)
                        singlenode += "<th>Your title</th>";
                    else if(i==row-1)
                        singlenode += "<td>Your footer</td>";
                    else
                        singlenode += "<td>Your data</td>";
                }
                if(i==0)
                    tagtext = tagtext + "<thead><tr>"+singlenode+"</tr></thead><tbody>";
                else if(i==row-1)
                    tagtext = tagtext + "<tr>"+singlenode+"</tr></tbody>";
                else
                    tagtext = tagtext + "<tr>"+singlenode+"</tr>";
            }
            tagtext = tagtext + "</table>";
            send_to_editor( tagtext);
        }
    </script>
<?php

    print $after_shortcode;
}
?>