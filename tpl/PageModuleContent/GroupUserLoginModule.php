<?php $this->loadBricks("Login"); ?>

<?php if ($this->_["authenticated"]) { /* ?>

					<h3>Logout</h3>
					<form action="<?php echo $this->_["action"]; ?>" method="post">
						<input type="submit" name="logout" value="Logout" />
					</form>

<?php */ } else { ?>

		<section>
			<div class="frame">
				<div class="transparentbox">

					<h3>Login</h3>
					<form action="<?php echo $this->_["action"]; ?>" method="post">
						<input type="password" name="password" value="" placeholder="<?php echo $this->_["bricks"]["login"]["password"]; ?>" />
						<br />
						<input type="submit" name="login" value="Login" />
					</form>

<?php /*
					<p>
						Current status: <strong><?php echo $this->_["status"]; ?></strong>
						<br />
						Current language: <strong><?php echo $this->_["language"]; ?></strong>
						<br />
						Current user id: <strong><?php echo $this->_["userid"]; ?></strong>
						<br />
						Current user service: <strong><?php echo $this->_["userservice"]; ?></strong>
					</p>
*/ ?>

				</div>
			</div>
		</section>

<?php } ?>
