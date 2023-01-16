<?php $this->loadBricks("Header"); ?>
<?php
/*
	$lang = array(
		"de" => array("flags" => [ "de", "at", "ch" ], "name" => "Deutsch"),
		"en" => array("flags" => [ "gb", "us", "au" ], "name" => "English"),
		"es" => array("flags" => [ "es", "mx", "co" ], "name" => "Español"),
		"bg" => array("flags" => [ "bg" ], "name" => "български")
	);
*/
	$lang = array(
		"de" => array("flags" => [ "de" ], "name" => "Deutsch"),
		"en" => array("flags" => [ "gb" ], "name" => "English"),
		"es" => array("flags" => [ "es" ], "name" => "Español"),
		"bg" => array("flags" => [ "bg" ], "name" => "български")
	);
?>

		<header>
			<ul class="head headleft">
				<li>
					<a class="headbtn headbtn-sub" href="/"><img src="assets/custom/icon/menu.svg" /><span><?php echo $this->_["bricks"]["header"]["navigation"]; ?></span></a>
					<div>
<?php echo $this->_["navigation"]; ?>
					</div>
				</li>

<?php if ($this->_["privacy"] > 0) { ?>
				<li><a class="logobtn" href="/"><img src="assets/custom/logo/base3logo_big.svg" /></a></li>
<?php } ?>
			</ul>
			<ul class="head headright">
				<li>
					<a class="headbtn headbtn-sub" href="/"><img src="assets/custom/icon/search.svg" /><span><?php echo $this->_["bricks"]["header"]["search"]; ?></span></a>
					<div>
						<input type="text" name="q" value="" placeholder="<?php echo $this->_["bricks"]["header"]["search"]; ?> ..." />
						<div class="searchresult"></div>
					</div>
				</li>
				<li>
					<a class="headbtn headbtn-sub" href="/"><img src="assets/custom/icon/favorite.svg" /><span><?php echo $this->_["bricks"]["header"]["favorites"]; ?></span></a>
					<div></div>
				</li>
				<li>
					<a class="headbtn headbtn-sub" href="/" rel="selectservicenavigation.php"><img src="assets/custom/icon/apps.svg" /><span><?php echo $this->_["bricks"]["header"]["services"]; ?></span></a>
					<div></div>
				</li>
				<li>
					<a class="headbtn headbtn-sub" href="/">
						<?php /* <img src="assets/flags/1x1/<?php echo $lang[$this->_["language"]]["flag"]; ?>.svg" /> */ ?>
						<img src="assets/custom/icon/language.svg" />
						<span><?php echo $lang[$this->_["language"]]["name"]; ?></span>
					</a>
					<div>
						<ul>
<?php foreach ($lang as $key => $l) { ?>
							<li>
								<a class="headbtn" href="<?php echo $key; ?>/<?php echo $this->_["name"]; ?>.php">
									<?php foreach ($l["flags"] as $flag) { ?><img src="assets/flags/1x1/<?php echo $flag; ?>.svg" /><?php } ?>
									<span><?php echo $l["name"]; ?></span>
								</a>
							</li>
<?php } ?>
						</ul>
					</div>
				</li>
				<li>
					<a class="headbtn headbtn-sub" href="/"><img src="assets/custom/icon/lock.svg" />
						<span><?php echo $this->_["userid"] ? $this->_["userid"] : $this->_["bricks"]["header"]["login"]; ?></span>
					</a>
					<div>
<?php if ($this->_["userid"] == null) { ?>
						<a class="button button-green" href="<?php echo $this->_["loginurl"]; ?>"><?php echo $this->_["bricks"]["header"]["login"]; ?></a>
						<a class="button button-blue" href="//account.base3.de/registration.php"><?php echo $this->_["bricks"]["header"]["signon"]; ?></a>
<?php } else { ?>
						<?php echo $this->_["bricks"]["header"]["hello"]; ?> <?php echo $this->_["fullname"]; ?>!
						<br />
						<?php echo $this->_["bricks"]["header"]["loggedinas"]; ?>: <strong><?php echo $this->_["userid"]; ?></strong>
						<hr />
						<a class="button button-blue" href="//account.base3.de"><?php echo $this->_["bricks"]["header"]["myaccount"]; ?></a>
						<a class="button button-red" href="<?php echo $this->_["logouturl"]; ?>"><?php echo $this->_["bricks"]["header"]["logout"]; ?></a>
<?php } ?>
					</div>
				</li>
			</ul>
		</header>
