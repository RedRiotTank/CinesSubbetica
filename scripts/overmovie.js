var imageContainers = document.getElementsByClassName('image-container');
var overlayTexts = document.getElementsByClassName('overlay-text');

for (var i = 0; i < imageContainers.length; i++) {
    imageContainers[i].addEventListener('mouseenter', showOverlayText);
    imageContainers[i].addEventListener('mouseleave', hideOverlayText);
    overlayTexts[i].addEventListener('mouseenter', keepOverlayText);
    overlayTexts[i].addEventListener('mouseleave', hideOverlayText);
}

function showOverlayText() {
    var overlayText = this.getElementsByClassName('overlay-text')[0];
    overlayText.style.opacity = '1';
}

function hideOverlayText() {
    var overlayText = this.getElementsByClassName('overlay-text')[0];
    overlayText.style.opacity = '0';
}

function keepOverlayText() {
    this.style.opacity = '1';
}