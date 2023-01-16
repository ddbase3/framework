<?php
	$datefirst = "";
	$datedata = array();
	foreach ($this->_["data"]["dates"] as $date) {
		if (substr($date->data["start"], 0, 4) == "0000") continue;
		if (!strlen($datefirst) || substr($date->data["start"], 0, 10) < $datefirst) $datefirst = substr($date->data["start"], 0, 10);
		$d = array(
			"title" => $date->name,
			"url" => "https://xrm.base3.de/xrmentry.php?id=" . $date->id
		);
		$d["start"] = str_replace(" ", "T", $date->data["start"]);
		if (substr($date->data["end"], 0, 4) != "0000") $d["end"] = str_replace(" ", "T", $date->data["end"]);
		if ($date->data["allday"]) {
			$d["start"] = substr($d["start"], 0, 10);
			if (isset($d["end"])) $d["end"] = substr($d["end"], 0, 10);
		}
		$datedata[] = $d;
	}
?>
				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo nl2br($this->_["data"]["description"]); ?>
				</p>

				<p>
<?php /* ?>
<pre><?php print_r($this->_["data"]["dates"]); ?></pre>
<?php */ ?>
					<div id="calendar" class="fullcalendar"></div>
				</p>

				<p>
					Tags: <?php echo sizeof($this->_["tags"]) ? implode(", ", $this->_["tags"]) : "-"; ?>
				</p>

				<p>
					Apps: <?php echo sizeof($this->_["apps"]) ? implode(", ", $this->_["apps"]) : "-"; ?>
				</p>

				<link rel="stylesheet" href="assets/fullcalendar/main.min.css" />
				<style>
					#calendar.fullcalendar button { color:#000; }
				</style>
				<script src="assets/fullcalendar/main.min.js"></script>
				<script>
					document.addEventListener('DOMContentLoaded', function() {
						var calendarEl = document.getElementById('calendar');
						var calendar = new FullCalendar.Calendar(calendarEl, {
							initialView: 'dayGridMonth',
<?php if (strlen($datefirst)) { ?>
							initialDate: '<?php echo $datefirst; ?>',
<?php } ?>
							headerToolbar: {
								left: 'prev,next today',
								center: 'title',
								right: 'dayGridMonth,timeGridWeek,timeGridDay'
							},
							events: <?php echo json_encode($datedata); ?>
						});
						calendar.render();
					});
				</script>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>
