		<section>
			<div class="frame">

				<p>
<?php foreach ($this->_["logs"] as $log) { ?>
					<?php echo $log["timestamp"]; ?>
					|
<?php
	// $data = json_decode($log["log"], 1);
	// echo $data["msg"];
	echo $log["log"];
?>
					<br />
<?php } ?>
				</p>

			</div>
		</section>
