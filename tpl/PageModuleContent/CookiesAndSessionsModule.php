		<section>
			<div class="frame">

				<h3>Cookies and Sessions</h3>
				<form action="<?php echo $this->_["name"]; ?>.php" method="POST">
					<table>
<?php
	foreach (array("session", "cookie") as $type) foreach ($this->_[$type] as $key => $val) {
		if ($type == "cookie" && in_array($key, array("PHPSESSID", "cb-enabled"))) continue;
?>
						<tr><td>
							<input type="checkbox" name="<?php echo $type . "|" . $key; ?>" value="1" />
						</td><td>
							<?php echo $type; ?>
						</td><td>
							<?php echo $key; ?>
						</td><td>
							<?php echo $type == "session" ? json_encode($val) : $val; ?>
						</td></tr>
<?php
	}
?>
					</table>
					<input type="submit" name="delete" value="Löschen" />
				</form>

			</div>
		</section>
