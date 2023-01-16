				<table style="width:100%;">
					<tr>
						<th>Date</th>
						<td><?php echo $this->_["date"]; ?></td>
					</tr>
					<tr>
						<th>From</th>
						<td><?php echo $this->_["from"]; ?></td>
					</tr>
					<tr>
						<th>To</th>
						<td><?php echo $this->_["to"]; ?></td>
					</tr>
					<tr>
						<th>Subject</th>
						<td><?php echo $this->_["subject"]; ?></td>
					</tr>
					<tr>
						<th>Importance</th>
						<td><?php echo $this->_["importance"]; ?></td>
					</tr>
					<tr>
						<th>Attachments</th>
						<td>
<?php foreach ($this->_["attachments"] as $attachment) { ?>
							<a href="https://mailer.base3.de/emaildisplay.php?filename=<?php echo $this->_["filename"]; ?>&attachment=<?php echo $attachment; ?>"><?php echo $attachment; ?></a>
							&nbsp;
<?php } ?>
						</td>
					</tr>
<?php /*
					<tr>
						<th>Content-Type</th>
						<td><?php echo $this->_["contenttype"]; ?></td>
					</tr>
*/ ?>
				</table>

				<p>&nbsp;</p>

				<table style="width:100%;"><tr><td style="padding:.5em .5em 0;">
					<iframe id="mailcontent" style="width:100%; height:30em; border:none;"></iframe>
				</td></tr></table>

				<script>
					var content = <?php echo json_encode($this->_["message"]); ?>;
					var ifMailContent = document.getElementById('mailcontent');
					var iframeDoc = ifMailContent.contentWindow.document;
					iframeDoc.open();
					iframeDoc.write(content);
					iframeDoc.close();
				</script>
