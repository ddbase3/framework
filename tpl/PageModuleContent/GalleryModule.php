		<section class="gallerymodule">
			<div class="frame">

				<ul>
<?php foreach ($this->_["images"] as $image) { ?>
					<li><a rel="lightbox" href="<?php echo $image["image"]; ?>" style="background-image:url(<?php echo $image["image"]; ?>);"></a></li>
<?php } ?>
				</ul>

			</div>
		</section>

		<style>
			.gallerymodule ul { display:grid; grid-template-columns:1fr 1fr; grid-gap:10%; margin:4em 0; padding:0 0 14em; list-style:none; }
			.gallerymodule ul li { margin:0; padding:0; }
			.gallerymodule ul li a { display:block; background-position:center; background-size:cover; }
			.gallerymodule ul li a:before { content:""; display:block; padding-top:100%; }
			@media (min-width: 32em) {
				.gallerymodule ul { grid-template-columns:1fr 1fr 1fr 1fr; padding:0 0 2em; }
			}
		</style>
