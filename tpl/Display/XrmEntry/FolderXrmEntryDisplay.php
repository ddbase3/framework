				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo $this->_["data"]["description"]; ?>
				</p>

				<p>
					<?php echo $this->_["data"]["type"]; ?>
				</p>

				<p>
					Tags: <?php echo sizeof($this->_["tags"]) ? implode(", ", $this->_["tags"]) : "-"; ?>
				</p>

				<p>
					Apps: <?php echo sizeof($this->_["apps"]) ? implode(", ", $this->_["apps"]) : "-"; ?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>
