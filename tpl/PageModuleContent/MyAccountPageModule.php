<?php $this->loadBricks("Account"); ?>

		<section>
			<div class="frame">

				<h3><?php echo $this->_["bricks"]["account"]["myaccount"]; ?></h3>

				<h5><?php echo $this->_["bricks"]["account"]["mydata"]; ?></h5>

				<table>
					<tr>
						<th><?php echo $this->_["bricks"]["account"]["name"]; ?></th>
						<td><?php echo $this->_["user"]->name; ?></td>
					</tr>
					<tr>
						<th><?php echo $this->_["bricks"]["account"]["email"]; ?></th>
						<td><?php echo $this->_["user"]->email; ?></td>
					</tr>
					<tr>
						<th><?php echo $this->_["bricks"]["account"]["username"]; ?></th>
						<td><?php echo $this->_["user"]->id; ?></td>
					</tr>
					<tr>
						<th><?php echo $this->_["bricks"]["account"]["password"]; ?></th>
						<td>********** (<a href="changepassword.php"><?php echo $this->_["bricks"]["account"]["change"]; ?></a>)</td>
					</tr>
				</table>

				<h5><?php echo $this->_["bricks"]["account"]["mygroups"]; ?></h5>

				<p><?php echo $this->_["bricks"]["account"]["allocated"]; ?>:</p>

<?php if (sizeof($this->_["groups"])) { ?>
				<ul>
<?php foreach ($this->_["groups"] as $group) { ?>
					<li><?php echo $group->name; ?></li>
<?php } ?>
				</ul>
<?php } else {?>
				<?php echo $this->_["bricks"]["account"]["nogroups"]; ?>.
<?php } ?>

			</div>
		</section>
