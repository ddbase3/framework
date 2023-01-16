<?php $this->loadBricks("Login"); ?>

		<section>
			<div class="frame">
				<div class="transparentbox">

					<h3><?php echo $this->_["bricks"]["login"]["login"]; ?></h3>

					<form action="<?php echo $this->_["action"]; ?>" method="post">
						<input type="hidden" name="_continue" value="<?php echo $this->_["continue"]; ?>" />
						<input type="text" name="username" value="" placeholder="<?php echo $this->_["bricks"]["login"]["username"]; ?>" />
						<input type="password" name="password" value="" placeholder="<?php echo $this->_["bricks"]["login"]["password"]; ?>" />
						<br />
						<input class="button button-green" type="submit" name="login" value="<?php echo $this->_["bricks"]["login"]["login"]; ?>" />
					</form>

					<hr />

					<a href="https://account.base3.de/registration.php"><?php echo $this->_["bricks"]["login"]["regist"]; ?></a>
					|
					<a href="https://account.base3.de/forgottenpassword.php"><?php echo $this->_["bricks"]["login"]["forgotpw"]; ?></a>

				</div>
			</div>
		</section>
