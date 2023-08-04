function showPopup(message) {
    var popup = document.createElement('div');
    popup.className = 'popup';
    popup.textContent = message;

    var overlay = document.createElement('div');
    overlay.className = 'overlay';

    document.body.appendChild(overlay);
    document.body.appendChild(popup);

    setTimeout(function () {
        document.body.removeChild(overlay);
        document.body.removeChild(popup);
    }, 6000); 
}
