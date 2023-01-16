				<h1><?php echo $this->_["name"]; ?></h1>

<?php if (strlen($this->_["data"]["description"])) { ?>
				<p>
					<?php echo nl2br($this->_["data"]["description"]); ?>
				</p>
<?php } ?>

				<p>
					<?php
						$parts = array();
						if (substr($this->_["data"]["start"], 0, 1) != "0") $parts[] = $this->_["data"]["start"];
						if (substr($this->_["data"]["deadline"], 0, 1) != "0") $parts[] = $this->_["data"]["deadline"];
						echo implode(" - ", $parts);
					?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
						<br />
						Projekt-ID: <?php echo $this->_["data"]["projid"]; ?>
						<br />
						Alias: <?php echo $this->_["data"]["alias"]; ?>
					</span>
				</p>
