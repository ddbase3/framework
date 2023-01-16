<?php $this->loadBricks("ChangePassword"); ?>

		<section>
			<div class="frame">

					<h3><?php echo $this->_["bricks"]["changepassword"]["changepassword"]; ?></h3>
					<form action="<?php echo $this->_["action"]; ?>" method="post">
						<input type="hidden" name="_continue" value="<?php echo $this->_["continue"]; ?>" />

						<p>
							<?php echo $this->_["bricks"]["changepassword"]["oldpassword"]; ?>:
							<br />
							<input type="password" name="oldpassword" value="" placeholder="<?php echo $this->_["bricks"]["changepassword"]["oldpassword"]; ?>" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["changepassword"]["newpassword"]; ?>:
							<br />
							<input type="password" name="newpassword" value="" placeholder="<?php echo $this->_["bricks"]["changepassword"]["newpassword"]; ?>" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["changepassword"]["confirmnewpassword"]; ?>:
							<br />
							<input type="password" name="confirmnewpassword" value="" placeholder="<?php echo $this->_["bricks"]["changepassword"]["confirmnewpassword"]; ?>" />
						</p>

						<input class="button button-blue" type="submit" name="changepassword" value="<?php echo $this->_["bricks"]["changepassword"]["savechanges"]; ?>" />
					</form>

			</div>
		</section>
