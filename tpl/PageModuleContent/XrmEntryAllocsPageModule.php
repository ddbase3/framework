		<section>
			<div class="frame">

				<div class="xrm-entries">

<?php
	foreach (array("tag", "category", "project", "contact", "address", "folder", "task", "link", "note", "date", "file", "media", "product", "resource", "code", "account", "text") as $type) {
		if (!isset($this->_["entries"][$type])) continue;
?>
					<div class="xrm-<?php echo $type; ?>list<?php if ($type == "address") echo " map"; ?>">
						<ul>
<?php foreach ($this->_["entries"][$type] as $entry) { ?>
							<li>
<?php if ($type == "address") { ?>
								<a href="xrmentry.php?id=<?php echo $entry->id; ?>" data-lat="<?php echo $entry->data["lat"]; ?>" data-lng="<?php echo $entry->data["lng"]; ?>">
									<?php echo $entry->name; ?>
								</a>
<?php } else if ($type == "link") { ?>
								<a target="_blank" href="<?php echo $entry->data["link"]; ?>" rel="<?php echo $entry->id; ?>">
									<?php echo $entry->name; ?>
								</a>
<?php } else { ?>
								<a href="xrmentry.php?id=<?php echo $entry->id; ?>">
									<?php echo $entry->name; ?>
								</a>
<?php } ?>

							</li>
<?php } ?>
						</ul>
					</div>
<?php
	}
?>

				</div>

			</div>
		</section>
