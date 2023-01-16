<?php $this->loadBricks("Input"); ?>
<?php if (strlen($this->_["lang"])) $this->loadBricks("Input/" . $this->_["lang"]); ?>

		<section>
			<div class="frame">
				<?php /* interessant: Attribut formnovalidate für form */ ?>
				<form action="<?php echo $this->_["action"]; ?>.php" method="post">
					<input type="hidden" name="_continue" value="<?php echo $this->_["continue"]; ?>" />
					<input type="hidden" name="_id" value="<?php if ($this->_["entry"] != null) echo $this->_["entry"]["id"]; ?>" />
					<input type="hidden" name="_type" value="<?php echo $this->_["type"]; ?>" />
					<div>
						<label for="_name"><?php echo $this->_["bricks"]["input"]["name"]; ?></label>
						<input type="text" name="_name" id="_name" value="<?php if ($this->_["entry"] != null) echo $this->_["entry"]["name"]; ?>" required="required" />
						<span class="validity"></span>
					</div>
					<hr />

<?php
	foreach ($this->_["fields"] as $field => $fdata) {

		$adds = '';
		if (isset($fdata["validation"]) && isset($fdata["validation"]["type"]) && isset($fdata["validation"]["data"])) {
			if ($fdata["validation"]["type"] == "name" && $fdata["validation"]["data"] == "nonempty")
				$adds .= ' required="required"';
			if ($fdata["validation"]["type"] == "regexp")
				$adds .= ' required="required" pattern="' . $fdata["validation"]["data"] . '"';
		}
?>
					<div>
						<label for="<?php echo $field; ?>"><?php echo $this->_["bricks"][$this->_["lang"]][$field]; ?></label>
<?php
		switch ($fdata["type"]) {
			case "textarea":
?>
						<textarea name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>"<?php echo $adds; ?>><?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?></textarea>
<?php
				break;
			case "select":
?>
						<select name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>">
							<option value=""></option>
<?php
				if (isset($fdata["options"])) foreach ($fdata["options"] as $value => $name) {
?>
							<option value="<?php echo $value; ?>"<?php if ($this->_["entry"] != null && $this->_["entry"]["data"][$field] == $value) echo ' selected="selected"'; ?>>
								<?php echo $this->_["bricks"][$this->_["lang"]][$name]; ?>
							</option>
<?php
				}
?>
						</select>
<?php
				break;
			case "phone":
?>
						<input type="tel" name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>" value="<?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?>"<?php echo $adds; ?> />
						<?php if (isset($fdata["validation"])) { ?><span class="validity"></span><?php } ?>
<?php
				break;
			case "email":
?>
						<input type="email" name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>" value="<?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?>"<?php echo $adds; ?> />
						<?php if (isset($fdata["validation"])) { ?><span class="validity"></span><?php } ?>
<?php
				break;
			case "date":
?>
						<input type="date" name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>" value="<?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?>"<?php echo $adds; ?> />
						<?php if (isset($fdata["validation"])) { ?><span class="validity"></span><?php } ?>
<?php
				break;
			case "datetime":
?>
						<input type="datetime-local" name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>" value="<?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?>"<?php echo $adds; ?> />
						<?php if (isset($fdata["validation"])) { ?><span class="validity"></span><?php } ?>
<?php
				break;
			default:
?>
						<input type="text" name="entrydata[<?php echo $field; ?>]" id="<?php echo $field; ?>" value="<?php if ($this->_["entry"] != null) echo htmlentities($this->_["entry"]["data"][$field]); ?>"<?php echo $adds; ?> />
						<?php if (isset($fdata["validation"])) { ?><span class="validity"></span><?php } ?>
<?php
				break;
		}
?>
					</div>
<?php
	}
?>

					<div>
						<input type="submit" value="<?php echo $this->_["bricks"]["input"]["save"]; ?>" />
					</div>
				</form>
			</div>
		</section>
