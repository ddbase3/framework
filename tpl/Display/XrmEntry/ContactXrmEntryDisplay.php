				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php
						$parts = array();
						if (substr($this->_["data"]["title"], 0, 1) != "0") $parts[] = $this->_["data"]["title"];
						if (substr($this->_["data"]["firstname"], 0, 1) != "0") $parts[] = $this->_["data"]["firstname"];
						if (substr($this->_["data"]["lastname"], 0, 1) != "0") $parts[] = $this->_["data"]["lastname"];
						echo implode(" ", $parts);

						if (strlen($this->_["data"]["phone"])) echo '<br />' . $this->_["data"]["phone"];
						if (strlen($this->_["data"]["phonework"])) echo '<br />' . $this->_["data"]["phonework"];
						if (strlen($this->_["data"]["mobile"])) echo '<br />' . $this->_["data"]["mobile"];
						if (strlen($this->_["data"]["email1"])) echo '<br />' . $this->_["data"]["email1"];
						if (strlen($this->_["data"]["email2"])) echo '<br />' . $this->_["data"]["email2"];
						if (strlen($this->_["data"]["email3"])) echo '<br />' . $this->_["data"]["email3"];
						if (strlen($this->_["data"]["fax"])) echo '<br />' . $this->_["data"]["fax"];
						if (strlen($this->_["data"]["phone"])) echo '<br />' . $this->_["data"]["phone"];

						if (substr($this->_["data"]["dateofbirth"], 0, 1)) echo '<br />' . $this->_["data"]["dateofbirth"];
					?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
						<br />
						<?php echo $this->_["data"]["gender"]; ?>
					</span>
				</p>
