<?php $this->loadBricks("Registration"); ?>

		<section>
			<div class="frame">

<?php
	if (isset($_REQUEST["done"])) {
?>

					<h3><?php echo $this->_["bricks"]["registration"]["success"]; ?></h3>
					<p><?php echo $this->_["bricks"]["registration"]["loginavailable"]; ?></p>
					<p><a class="button button-green" href="login.php"><?php echo $this->_["bricks"]["registration"]["login"]; ?></a></p>

<?php
	} else {
?>

					<h3><?php echo $this->_["bricks"]["registration"]["registration"]; ?></h3>
					<form action="<?php echo $this->_["action"]; ?>" method="post">
						<input type="hidden" name="_continue" value="<?php echo $this->_["continue"]; ?>" />

						<input type="hidden" name="language" value="de" />

						<p>
							<?php echo $this->_["bricks"]["registration"]["firstname"]; ?>:
							<br />
							<input type="text" name="firstname" value="" placeholder="" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["registration"]["surname"]; ?>:
							<br />
							<input type="text" name="surname" value="" placeholder="" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["registration"]["email"]; ?>:
							<br />
							<input type="text" name="email" value="" placeholder="" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["registration"]["chooseusername"]; ?>:
							<br />
							<input type="text" name="userid" value="" placeholder="" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["registration"]["password"]; ?>:
							<br />
							<input type="password" name="password" value="" placeholder="" />
						</p>

<?php /*
						<p>
							<?php echo $this->_["bricks"]["registration"]["repeatpw"]; ?>:
							<br />
							<input type="password" name="repeatpassword" value="" placeholder="" />
						</p>
						<p>
							<?php echo $this->_["bricks"]["registration"]["privacy"]; ?>:
							<br />
							<div style="height:6em; padding:.3em; border:1px solid #ccc; overflow:auto;">
								TODO Datenschutzbestimmungen
							</div>
							<input type="checkbox" name="privacypolicy" value="1" />
							<?php echo $this->_["bricks"]["registration"]["readagreed"]; ?>
						</p>
*/ ?>

						<input class="button button-blue" type="submit" name="regist" value="<?php echo $this->_["bricks"]["registration"]["regist"]; ?>" />
						<input type="hidden" id="rpmch1" name="ch1" value="45wa4v" />
						<input type="hidden" id="rpmch2" name="ch2" value="" />
					</form>

<?php
	}
?>

			</div>
		</section>

		<script>$(function() { $('#rpmch1').val(''); $('#rpmch2').val('387fw5'); });</script>
