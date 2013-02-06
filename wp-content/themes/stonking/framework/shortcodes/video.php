<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'video_shortcode_filter');
add_action('tt_shortcode_generator', 'video_shortcode_generator');

function video_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Video', 'id' => 'video');
    return $shortcodes;
}

function video_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'video', 'video_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Video",
        "options" => array(
            array("name" => "type", "desc" => "Choose video type",
                "options" => array('html5', 'youtube', 'vimeo')),),
    );
    default_shortcode_render($option);
?>
    <div class="s-title"><label>Video url</label></div>
    <div class="s-element"><input type="text" id="style_shortcode_video" /></div>    
    <span class="style_shortcode_videoimage">
        <div class="s-title"><label>Video image</label></div>
        <div class="s-element"><input type="text" id="style_shortcode_videoimage" /></div></span>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_video_shortcode();"></p>
    <script type="text/javascript">
        function insert_video_shortcode(){
            pic = jQuery('#style_shortcode_videoimage').val();
            if( pic != '')
                pic = ' image="'+pic+'"';
            item ='[video type="'+jQuery('#style_shortcodeVideo0').val()+'" url="'+jQuery('#style_shortcode_video').val()+'"'+pic+']';
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function video_func($atts, $content = null) {
    extract($atts);
    if ($type == 'youtube')
        return '<div class="video-js-box">
					<iframe title="YouTube video player" class="youtube-player" type="text/html" width="600" height="370" src="' . $url . '" frameborder="0" allowFullScreen></iframe>
				</div>';
    else if ($type == 'vimeo')
        return '<div class="video-js-box">
					<iframe src="' . $url . '" width="600" height="450" frameborder="0"></iframe>
				</div>';
    else {
        $fileinfo = pathinfo($url);
        $format = $fileinfo['extension'];
        if ($format == 'mp4') {
            $source = '<source src="' . $url . '" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />';
            $link = '<a href="' . $url . '">MP4</a>';
        } else if ($format == 'webm') {
            $source = '<source src="' . $url . '" type=\'video/webm; codecs="vp8, vorbis"\' />';
            $link = '<a href="' . $url . '">WebM</a>';
        } else if ($format == 'ogv') {
            $source = '<source src="' . $url . '" type=\'video/ogg; codecs="theora, vorbis"\' />';
            $link = '<a href="' . $url . '">Ogg</a>';
        }
        $videojs = <<<_end_
			<div class="video-js-box">
				<!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
				<video id="example_video_1" class="video-js" width="600" height="248" controls="controls" preload="auto" poster="http://video-js.zencoder.com/oceans-clip.png">
					{$source}
					<!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
					<object id="flash_fallback_1" class="vjs-flash-fallback" width="600" height="248" type="application/x-shockwave-flash"
							data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
						<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="flashvars" value='config={"playlist":["http://video-js.zencoder.com/oceans-clip.png", {"url": "http://video-js.zencoder.com/oceans-clip.mp4","autoPlay":false,"autoBuffering":true}]}' />
						<!-- Image Fallback. Typically the same as the poster image. -->
						<img src="images/content/video/video.jpg" width="600" height="248" alt="Poster Image"
							 title="No video playback capabilities." />
					</object>
				</video>
				<!-- Download links provided for devices that can't play video in the browser. -->
				<p class="vjs-no-video"><strong>Download Video:</strong>
					{$link}
						<br/>
						<!-- Support VideoJS by keeping this link. -->
						<a href="http://videojs.com">HTML5 Video Player</a> by VideoJS
				</p>
			</div>
_end_;
        return $videojs;
    }
}

add_shortcode('video', 'video_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */
?>