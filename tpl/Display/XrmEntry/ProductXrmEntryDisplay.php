				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo $this->_["data"]["name"]; ?>
				</p>

<?php if (strlen($this->_["data"]["description"])) { ?>
				<p>
					<?php echo nl2br($this->_["data"]["description"]); ?>
				</p>
<?php } ?>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						Art.-Nr.: <?php echo $this->_["data"]["code"]; ?>
						<br />
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>
