		<section>
			<div class="frame">

				<form action="<?php echo $this->_["action"]; ?>" method="post">

					<h3>Schriftprobe Zahlen einholen</h3>

					<p>
						Es werden in die Desktop-Abarbeitung 10 Aufgaben mit den zu schreibenden Ziffern 0-9 eingetragen.
						<br />
						Den Teilnehmern entsprechend den Desktop-Link per Whatsapp ans Smartphone senden.
					</p>

					<p>
						<select name="userid">
							<option value="">[Bitte auswählen ...]</option>
<?php foreach ($this->_["users"] as $user) { ?>
							<option value="<?php echo $user; ?>"><?php echo $user; ?></option>
<?php } ?>
						</select>
					</p>

					<p>
						<input type="submit" name="submit" value="Absenden" />
					</p>

				</form>

			</div>
		</section>
