const captureButton = document.getElementById('captureButton');
const canvas = document.getElementById('canvas');
const applyFilterButton = document.getElementById('applyFilterButton');
const editedImage = document.getElementById('editedImage');
const displayedImage = document.getElementById('displayedImage'); // Added this line
const ctx = canvas.getContext('2d');

captureButton.addEventListener('click', async () => {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        const video = document.createElement('video');
        document.canvas.appendChild(video);
        video.srcObject = stream;
        video.play();

        video.addEventListener('canplay', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            displayedImage.src = canvas.toDataURL(); // Update the displayed image
        });
    } catch (error) {
        console.error('Error accessing camera:', error);
    }
});

applyFilterButton.addEventListener('click', () => {
    // Apply image filters or other editing here using CamanJS
    
});