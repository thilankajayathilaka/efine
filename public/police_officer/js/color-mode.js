function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode");
    var modeName = document.getElementById("mode-name");
    var modeNameMobile = document.getElementById("mode-name-mobile");
    if (body.classList.contains("dark-mode")) {
      modeName.innerHTML = "Light Mode";
      modeNameMobile.innerHTML = "Light Mode";
      document.querySelector('.bx-moon').classList.add('bx-sun');
      document.querySelector('.bx-moon').classList.remove('bx-moon');
    } else {
      modeName.innerHTML = "Dark Mode";
      modeNameMobile.innerHTML = "Dark Mode";
      document.querySelector('.bx-sun').classList.add('bx-moon');
      document.querySelector('.bx-sun').classList.remove('bx-sun');
    }
  }