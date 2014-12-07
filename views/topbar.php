<?php
function getUrl($route = null) {
	return util\routeUrl ( $route );
}
function renderLeaf($label, $route) {
	?>
<li><a href="<?= getUrl($route); ?>"><?= $label; ?></a></li>
<?php
}
function renderComposite($label, $children) {
	?>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $label; ?></b></a>
	<ul class="dropdown-menu">
	<?php
	foreach ( $children as $label => $route ) {
		renderLeaf ( $label, $route );
	}
	?>
	</ul></li>
<?php } ?>
<div id="topbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo getUrl("front/home"); ?>">QUICK &amp; DIRTY.</a>
		</div>
		<div class="navbar-collapse collapse navbar-right">
			<ul class="nav navbar-nav">
 				<?php
					foreach ( $this->items as $key => $value ) {
						if (is_array ( $value )) {
							renderComposite ( $key, $value );
						} else {
							renderLeaf ( $key, $value );
						}
					}
					?>
				</ul>
		</div>
	</div>
</div>
