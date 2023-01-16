<?php
	$basedir = 'userfiles/mnt/nextcloud/' . substr($this->_["id"], 0, 2) . '/' . substr($this->_["id"], 2, 2) . '/' . $this->_["id"];

	function showFileTree($files, $basedir) {
		echo '<ul>';
		foreach ($files as $file) {
			echo '<li>';
			if ($file["type"] == "file") {
				echo '<a href="' . $basedir . $file["path"] . '" class="tree-file">';
				echo '<span class="tree-icon">&#x1F5CB;</span>';
				echo '<span class="tree-filename">' . $file["name"] . '</span>';
				echo '<span class="tree-filesize">' . $file["size"] . '</span>';
				echo '</a>';
			}
			if ($file["type"] == "folder") {
				echo '<a href="#" class="tree-folder">';
				echo '<span class="tree-icon">&#x1F5C1;</span>';
				echo '<span class="tree-filename">' . $file["name"] . '</span>';
				echo '</a>';
				if ($file["type"] == "folder") showFileTree($file["items"], $basedir);
				echo '</li>';
			}
		}
		echo '</ul>';
	}
?>

				<h1><?php echo $this->_["name"]; ?></h1>

				<p>
					<?php echo $this->_["data"]["description"]; ?>
				</p>

				<div class="tree">
					<?php showFileTree(json_decode($this->_["data"]["files"], 1), $basedir); ?>
				</div>

				<p>
					Tags: <?php echo sizeof($this->_["tags"]) ? implode(", ", $this->_["tags"]) : "-"; ?>
				</p>

				<p>
					Apps: <?php echo sizeof($this->_["apps"]) ? implode(", ", $this->_["apps"]) : "-"; ?>
				</p>

				<p style="padding-top:1em; font-size:.7em; line-height:1.2em; color:#999;">
					<span>
						DB: <?php echo implode(", ", $this->_["xrmnames"]) . " / " . $this->_["type"] . " / " . $this->_["id"]; ?>
					</span>
				</p>

<style>
	.tree { padding:.5em .5em .8em; background:#f7f7f7; border:1px solid #eee; border-radius:.5em; }
	.tree { font-size:.9em; }
	.tree * { font-size:1em; }
	.tree ul { display:none; margin:0; padding:0; list-style:none; }
	.tree ul.tree-active { display:block; clear:both; border-top:1px solid #ccc; }
	.tree ul.tree-path { display:block; }
	.tree li { display:none; margin:0; padding:0; }
	.tree ul.tree-active > li { border-bottom:1px solid #ccc; }
	.tree ul.tree-active > li, .tree ul li.tree-path { display:block; }
	.tree a { display:block; padding:10px; text-decoration:none; color:#000; }
	.tree li.tree-path > a, .tree > a { float:left; width:auto; height:22px; border:1px solid #bbb; border-radius:.5em; background:#ddd; margin:.3em .3em .8em; padding:.3em .5em .2em .2em; line-height:0; }
	.tree span.tree-icon { display:inline-block; width:1.5em; padding:.1em .2em .1em .1em; text-align:center; font-size:1.4em; line-height:0; }
	.tree span.tree-filesize { float:right; font-size:.8em; color:#666; }
</style>

<script>
	// Der Eintrag muss auf media.base3.de geöffnet werden, damit Verzeichnis ausgelesen werden kann. Alternativ Microservice erstellen
	var p = window.location.href.indexOf('.');
	if (window.location.href.substr(0, p) != 'https://media') window.location.href = 'https://media' + window.location.href.substr(p);

	var humanFileSize = function(size) {
		var i = size == 0 ? 0 : Math.floor( Math.log(size) / Math.log(1024) );
		return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
	};
	$('.tree-filesize').each(function() {
		var n = parseInt($(this).text());
		$(this).text(humanFileSize(parseInt($(this).text())));
	});

	$('<a href="#" class="tree-folder"><span class="tree-icon">&#x1F5C1;</span><span class="tree-filename">/</span></a>')
		.prependTo('.tree');
	$('.tree > ul').addClass('tree-active');
	$('.tree a.tree-file').attr('target', '_blank').on('click', function(e) {
		// e.preventDefault();
		// TODO
	});
	$('.tree a.tree-folder').on('click', function(e) {
		e.preventDefault();
		$('.tree .tree-active').removeClass('tree-active');
		$('.tree .tree-path').removeClass('tree-path');
		$(this).siblings('ul').addClass('tree-active').parents().addClass('tree-path');
	});
</script>
