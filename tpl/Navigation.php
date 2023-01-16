						<ul>

<?php if ($this->_["user"] != null) { ?>
							<li><a class="headbtn" href="seminarsketchpad.php"><img src="assets/custom/logo/base3logo_small.svg"> <span>Seminar-Sketchpad</span></a></li>
<?php } ?>

<?php if ($this->_["user"] != null && $this->_["user"]->role == "admin") { ?>
							<li><a class="headbtn" href="seminaradmin.php"><img src="assets/custom/logo/base3logo_small.svg"> <span>Seminar-Admin</span></a></li>
<?php } ?>

						</ul>
