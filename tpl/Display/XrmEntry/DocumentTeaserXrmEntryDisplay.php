				<div data-id="<?php echo $this->_["id"]; ?>" class="xrm-content xrm-type-<?php echo $this->_["type"]; ?>" style="background:url(https://cache.base3.de/thumbnail.php?id=<?php echo $this->_["id"]; ?>) no-repeat; background-size:cover;">
					<div class="xrm-entry-head"><?php echo $this->_["name"]; ?></div>
					<p><a href="xrmentry.php?id=<?php echo $this->_["id"]; ?>">Anzeigen</a></p>
					<div class="xrm-entry-foot">
						<?php echo sizeof($this->_["xrmnames"]) ? '[' . implode('][', $this->_["xrmnames"]) . ']' : ''; ?>
					</div>
				</div>
