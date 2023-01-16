				<h1><?php echo $this->_["name"]; ?> (<?php echo $this->_["data"]["filename"]; ?>)</h1>
				<p>
					<?php echo $this->_["type"] . " - " . $this->_["id"]; ?>
				</p>
				<p>Mime: <?php echo $this->_["data"]["mime"]; ?></p>
				<p><?php echo $this->_["data"]["content"]; ?></p>
<?php	
	$file = $this->_["data"]["tmpname"];
	$pos = strpos($file, "userfiles");
	$file = $pos === false ? "userfiles/" . $file : substr($file, $pos);

	$suffix = substr($this->_["data"]["filename"], strrpos($this->_["data"]["filename"], ".") + 1);
	$suffix = strtolower($suffix);

	if (in_array($suffix, array("jpg", "jpeg", "png", "gif", "bmp"))) {
?>
				<p><img src="https://xrm.base3.de/base3/system/<?php echo $file; ?>" style="max-width:100%;" /></p>
<?php
	}
	if ($suffix == "mp4") {
?>
				<p><video style="max-width:100%;"><source src="https://xrm.base3.de/base3/system/<?php echo $file; ?>" type="video/mp4"></video></p>
<?php
	}
	if ($suffix == "avi") {
?>
				<p><video style="max-width:100%;"><source src="https://xrm.base3.de/base3/system/<?php echo $file; ?>" type="video/avi"></video></p>
<?php
	}
	if ($suffix == "pdf") {
?>
				<p><a href="https://xrm.base3.de/base3/system/<?php echo $file; ?>">PDF öffnen</a></p>
<?php
	}
?>
