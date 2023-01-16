		<section>
			<div class="frame">

				<ul class="xrmadds-list" style="margin:0; padding:0; list-style:none; border-top:1px solid #ddd;">
<?php foreach ($this->_["entries"] as $entry) { ?>
					<li style="margin:0; padding:0; border-bottom:1px solid #ddd;">
						<a href="xrmentry.php?id=<?php echo $entry->id; ?>" style="display:block; position:relative; min-height:1.5em; padding:1.1em 0; color:#000; text-decoration:none;">
							<img src="assets/custom/xrm/<?php echo $entry->type; ?>.svg" style="display:block; position:absolute; left:0; top:.5em; width:2em; padding:.3em; background:#009; border:.1em solid #006; border-radius:.3em;" />
							<span style="display:block; padding-left:4em;">
								<?php echo $entry->name; ?>
							</span>
						</a>
					</li>
<?php } ?>
				</ul>

			</div>
		</section>
