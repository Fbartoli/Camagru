<!DOCTYPE html>
<?php require_once("header.php"); ?>

<body>
	<div class="container-fluid">
		<div id="main" class="row text-center ">
			<div class="camera col-md-5">
				<video id="video" poster="/img/camagru.png">Video stream not available.</video>
				<canvas id="canvas">
				</canvas>
			</div>
			<div class="col-md-1">
				<button id="startbutton" class="btn btn-primary">Take photo</button>
			</div>
			<div id="side" class="output col-md-6">
			</div>

		</div>

	</div>




</body>
<script>
	(function() {
		// The width and height of the captured photo. We will set the
		// width to the value defined here, but the height will be
		// calculated based on the aspect ratio of the input stream.

		var width = 320; // We will scale the photo width to this
		var height = 0; // This will be computed based on the input stream

		// |streaming| indicates whether or not we're currently streaming
		// video from the camera. Obviously, we start at false.

		var streaming = false;

		// The various HTML elements we need to configure or control. These
		// will be set by the startup() function.
		var side = null;
		var video = null;
		var canvas = null;
		var startbutton = null;

		function startup() {
			video = document.getElementById('video');
			canvas = document.getElementById('canvas');
			startbutton = document.getElementById('startbutton');
			side = document.getElementById('side');
			navigator.mediaDevices.getUserMedia({
					video: true,
					audio: false
				})
				.then(function(stream) {
					video.srcObject = stream;
					video.play();
				})
				.catch(function(err) {
					console.log("An error occurred: " + err);
				});
			video.addEventListener('canplay', function(ev) {
				if (!streaming) {
					height = video.videoHeight / (video.videoWidth / width);

					// Firefox currently has a bug where the height can't be read from
					// the video, so we will make assumptions if this happens.

					if (isNaN(height)) {
						height = width / (4 / 3);
					}
					video.setAttribute('width', width);
					video.setAttribute('height', height);
					canvas.setAttribute('width', width);
					canvas.setAttribute('height', height);
					streaming = true;
				}
			}, false);

			startbutton.addEventListener('click', function(ev) {
				takepicture();
				ev.preventDefault();
			}, false);
			clearphoto();
		}

		// Fill the photo with an indication that none has been
		// captured.

		function clearphoto() {
			var context = canvas.getContext('2d');
			context.fillStyle = "#AAA";
			context.fillRect(0, 0, canvas.width, canvas.height);
		}

		// Capture a photo by fetching the current contents of the video
		// and drawing it into a canvas, then converting that to a PNG
		// format data URL. By drawing it on an offscreen canvas and then
		// drawing that to the screen, we can change its size and/or apply
		// other changes before drawing it.

		function takepicture() {
			var context = canvas.getContext('2d');
			var imgPath = '../img/camagru.png';
			var imgObj = new Image(50, 50);
			imgObj.src = imgPath;
			if (width && height) {
				canvas.width = width;
				canvas.height = height;
				context.drawImage(video, 0, 0, width, height);
				context.drawImage(imgObj, 70, 50);
				var data = canvas.toDataURL('image/png');
				var img = document.createElement("img");
				img.setAttribute('src', data);
				side.prepend(img);
			} else {
				clearphoto();
			}
		}
		// Set up our event listener to run the startup process
		// once loading is complete.
		window.addEventListener('load', startup, false);
	})();
</script>
<?php require_once("footer.html"); ?>

</html>