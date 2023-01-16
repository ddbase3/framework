<?php if ($this->_["teaser"]) { ?>

				<div data-id="<?php echo $this->_["id"]; ?>" class="xrm-content xrm-type-<?php echo $this->_["type"]; ?>">
					<div class="xrm-entry-head"><?php echo $this->_["name"]; ?></div>
					<p><a href="xrmentry.php?id=<?php echo $this->_["id"]; ?>">Anzeigen</a></p>
					<div class="xrm-entry-foot">
						<?php echo sizeof($this->_["xrmnames"]) ? '[' . implode('][', $this->_["xrmnames"]) . ']' : ''; ?>
					</div>
				</div>

<?php } else { ?>

				<h1><?php echo $this->_["type"] . " - " . $this->_["id"]; ?></h1>
				<p>
					<?php print_r($this->_["data"]); ?>
				</p>

<?php } ?>
