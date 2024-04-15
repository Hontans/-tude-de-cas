const inputFile = document.querySelector('#video_uploads');
const previewContainer = document.querySelector('.preview');


inputFile.addEventListener('change', function () {
	const image = this.files[0]
	if(image.size < 1000000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allVideos = previewContainer.querySelectorAll('video');
			allVideos.forEach(item=> item.remove());

			const source = reader.result;

			const video = document.createElement('video');
			video.setAttribute("controls", "");

			const videoSource = document.createElement('source');
			videoSource.src = source;
			videoSource.type = image.type;

			video.appendChild(videoSource);
			previewContainer.appendChild(video);
		}
		reader.readAsDataURL(image);
	} else { 
		alert("Image size more than 1G");
	}
})