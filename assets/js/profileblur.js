const input = document.getElementById('profile-photo-input');
  const preview = document.getElementById('image-preview');
  const cameraIcon = document.querySelector('.camera-icon');

  input.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
      preview.src = event.target.result;
      preview.style.display = 'block';
    };

    reader.readAsDataURL(file);
  });

  preview.addEventListener('click', function() {
    input.click();
  });

  

  //zoom image
  const zoomImage = document.getElementById('zoom-image');
  const zoomContainer = document.querySelector('.zoom-container');
  
  zoomContainer.addEventListener('click', function() {
    zoomContainer.classList.toggle('zoomed');
  });
  
 
