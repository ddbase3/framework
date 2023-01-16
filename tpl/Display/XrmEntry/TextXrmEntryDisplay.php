				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo $this->_["data"]["mime"] == "text/html" ? $this->_["data"]["text"] : strip_tags($this->_["data"]["text"]); ?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
						<br />
						Mime: <?php echo $this->_["data"]["mime"]; ?>
					</span>
				</p>
