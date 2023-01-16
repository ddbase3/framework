				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo nl2br(htmlentities($this->_["data"]["note"])); ?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>
