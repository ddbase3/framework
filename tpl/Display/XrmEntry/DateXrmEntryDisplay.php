				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo $this->_["data"]["start"]; ?>
					-
					<?php echo $this->_["data"]["start"]; ?>
					<?php echo $this->_["data"]["allday"] ? "(ganztägig)" : ""; ?>
				</p>

				<p>
					<?php echo nl2br($this->_["data"]["description"]); ?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>
