		<section>
			<div class="frame">
				<h1><?php echo $this->_["entry"]->name; ?></h1>
				<p><i>ID <?php echo $this->_["entry"]->id; ?></i></p>
				<ul>
					<?php foreach ($this->_["entry"]->data as $key => $val) { ?>
					<li><strong><?php echo $key; ?></strong>: <?php echo $val; ?></li>
					<?php } ?>
				</ul>
				<h3>Links</h3>
				<ul>
					<?php foreach ($this->_["entry"]->alloc as $alloc) { ?>
					<li><a href="?xrmid=<?php echo $alloc; ?>"><?php echo $alloc; ?></a></li>
					<?php } ?>
				</ul>
				<pre>
<?php /* print_r($this->_["entry"]); */ ?>
				</pre>
				<p><?php echo uniqid(); ?><p>
			</div>
		</section>
