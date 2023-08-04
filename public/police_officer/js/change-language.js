var language = "english";
      var englishBtn = document.getElementById("englishBtn");
      var sinhalaBtn = document.getElementById("sinhalaBtn");

function setLanguage(lang) {
  var elements = document.getElementsByClassName("translation");
  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var text = element.getAttribute("data-" + lang);
    if (element.tagName.toLowerCase() === "input") {
      element.setAttribute("value", text);
      element.setAttribute("placeholder", text);
    } else {
      element.innerHTML = text;
    }
  }
  language = lang;
  if (lang === "english") {
    englishBtn.classList.add("active");
    sinhalaBtn.classList.remove("active");
  } else {
    sinhalaBtn.classList.add("active");
    englishBtn.classList.remove("active");
  }
}