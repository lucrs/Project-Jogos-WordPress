<?php if (is_active_sidebar('sidebar-jogos')) { ?>
				<div class="col-md-3" id="sidebar-right">
					<?php do_action('before_sidebar'); ?>
					<?php dynamic_sidebar('sidebar-jogos'); ?>
				</div>
<?php } ?>