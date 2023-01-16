<?php $this->loadBricks("Logout"); ?>

		<section>
			<div class="frame">

				<h3><?php echo $this->_["bricks"]["logout"]["logout"]; ?></h3>

<?php if ($this->_["userid"]) { ?>

				<p>
					<?php echo $this->_["bricks"]["logout"]["desc"]; ?>
					<strong><?php echo $this->_["userid"]; ?></strong>.
				</p>

				<table>
<?php foreach ($this->_["services"] as $name => $service) { ?>
					<tr>
						<th><?php echo $name; ?></th>
						<td>
							<iframe src="<? echo $service; ?>/embeded.php?logout" style="display:inline-block; width:20em; height:2em; border:0;">
								oh ... no iframes?
							</iframe>
						</td>
					</tr>
<?php } ?>
				</table>

				<script>
					setTimeout(function() { location.reload(true); }, 3000);
				</script>

<?php } else { ?>

				<p><?php echo $this->_["bricks"]["logout"]["success"]; ?>.</p>

<?php } ?>

			</div>
		</section>
