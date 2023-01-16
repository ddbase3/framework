				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php
						if (strlen($this->_["name"])) echo $this->_["name"] . '<br />';

						$str = trim($this->_["data"]["country"] == "gb"
							? $this->_["data"]["no"] . " " . $this->_["data"]["street"]
							: $this->_["data"]["street"] . " " . $this->_["data"]["no"]);
						if (strlen($str)) echo $str . '<br />';

						$str = trim($this->_["data"]["postalcode"] . " " . $this->_["data"]["city"]);
						if (strlen($str)) echo $str . '<br />';
					?>
				</p>

				<p>
				</p>

<?php if ($this->_["data"]["lat"] && $this->_["data"]["lng"]) { ?>
				<div class="map" style="height:20em;">
					<ul>
						<li>
							<a href="#" data-lat="<?php echo $this->_["data"]["lat"]; ?>" data-lng="<?php echo $this->_["data"]["lng"]; ?>">
								<?php echo $this->_["name"]; ?>
							</a>
						</li>
					</ul>
				</div>
<?php } ?>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
						<br />
						<?php
							echo $this->_["data"]["country"] . " / " . $this->_["data"]["type"];
							echo " / ";
							echo abs($this->_["data"]["lat"]) . "° " . ($this->_["data"]["lat"] > 0 ? "N" : "S");
							echo " ";
							echo abs($this->_["data"]["lng"]) . "° " . ($this->_["data"]["lng"] > 0 ? "O" : "W");
						?>
					</span>
				</p>
