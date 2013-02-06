<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="sidebars-container">
	<div class="sidebars">
		<div class="logo">
			<?php logo_init(); ?>
		</div>
		<div class="navigation">
			<?php navigation(); ?>
		</div>
		<?php dynamic_sidebar('Sidebar right');?>
	</div>
</div>
