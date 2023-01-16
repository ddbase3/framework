				<div data-id="<?php echo $this->_["id"]; ?>" class="xrm-content xrm-type-<?php echo $this->_["type"]; ?>">
					<div class="xrm-entry-head"><?php echo $this->_["name"]; ?></div>
					<p><?php echo substr($this->_["data"]["note"], 0, 100) . ( strlen($this->_["data"]["note"]) > 100 ? ' ...' : '' ); ?></p>
					<p><a href="xrmentry.php?id=<?php echo $this->_["id"]; ?>">Anzeigen</a></p>
					<div class="xrm-entry-foot">
						<?php echo sizeof($this->_["xrmnames"]) ? '[' . implode('][', $this->_["xrmnames"]) . ']' : ''; ?>
					</div>
				</div>
