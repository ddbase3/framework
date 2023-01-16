		<section>
			<div class="frame">

<?php if ($this->_["admin"]) { ?>
				<a href="seminaradmin.php" target="_blank" style="float:right;">Admin</a>
<?php } ?>

				<h5>Schriftproben<h5>

				<table id="handwrittennumbers">
				</table>

			</div>
		</section>

		<style>
			#handwrittennumbers td, #handwrittennumbers img { width:32px; height:32px; }
		</style>

		<script>
			var updateHandwrittenNumbersStatus = function() {
				$.get("neuralnetworkseminarawaitinghandwrittennumbersservice.json", function(res) {
					for (var i=0; i<res.length; i++) {
						var d = res[i];
						var fullid = d.processid + '-' + d.userid;
						var tr = $('#' + fullid);
						if (tr.length) {
							for (var j=0; j<=9; j++) {
								var td = $('.n' + j, tr);
								td.html(d.numbers[j] ? '<img src="local/HandwrittenNumbers/' + fullid + '/' + j + '.png">' : '&nbsp;');
							}
						} else {
							tr = $('<tr id="' + fullid + '"></tr>').appendTo("#handwrittennumbers");
							$('<th>' + d.userid + '</th>').appendTo(tr);
							for (var j=0; j<=9; j++) {
								var td = $('<td class="n' + j + '"></td>').appendTo(tr);
								td.html(d.numbers[j] ? '<img src="local/HandwrittenNumbers/' + fullid + '/' + j + '.png">' : '&nbsp;');
							}
						}
					}
				});
				setTimeout(function() { updateHandwrittenNumbersStatus(); }, 3000);
			};
			updateHandwrittenNumbersStatus();
		</script>
