<?php

if ( ! is_active_sidebar( 'sp_nav' ) ) {
	return;
}
?>

<aside class="xeory-spnav-wrap">

	<div class="sp-nav-inner">
	<span class="xeory-spnav-btn-close"></span>
		<?php do_action('xeory_prepend_spnav-area');?>
		<?php dynamic_sidebar( 'sp_nav' ); ?>
		<?php do_action('xeory_append_spnav-area');?>
	</div>
</aside>