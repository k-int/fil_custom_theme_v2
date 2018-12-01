<?php if ( is_active_sidebar( 'right-column' ) ) : ?>
	<div class="sideBar">
		<div class="nav">
			<div class="bFrameT"><i></i></div>
				<?php dynamic_sidebar( 'right-column' ); ?>
			<div class="bFrameB"><i></i></div>
		</div>
	</div>
<?php endif; ?>