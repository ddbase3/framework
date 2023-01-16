		<section>
			<div class="frame">

				<form action="<?php echo $this->_["action"]; ?>" method="post">

					<input type="hidden" id="imagedata" name="image" value="" />

					<p>Handschriftprobe:</p>

					<canvas class="sketchpad" id="sketchpad"></canvas>

					<p>
						<input type="submit" id="submit" name="submit" value=" &nbsp; Absenden &nbsp; " />
						<input type="button" id="clear" value=" &nbsp; Bereinigen &nbsp; " />
					</p>

				</form>

			</div>
		</section>

		<style>
			#sketchpad { width:300px; height:300px; border:1px solid #999; }
		</style>

		<script src="assets/sketchpad/sketchpad.js"></script>

		<script>
			var canvas = document.getElementById("sketchpad");
			var sketchpad = new Sketchpad({
				element: '#sketchpad',
				width: 300,
				height: 300,
				penSize: 30
			});
			$("#submit").on("click", function() {
				$("#imagedata").val(canvas.toDataURL());
			});
			$("#clear").click(function(e) {
				e.preventDefault();
				var context = canvas.getContext('2d');
				context.clearRect(0, 0, context.canvas.width, context.canvas.height);
				context.beginPath();
			});
		</script>
