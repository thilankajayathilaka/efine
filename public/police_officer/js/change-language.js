var language = "sinhala"; // default language is Sinhala

      function toggleLanguage() {
        var elements = document.getElementsByClassName("translation");
        for (var i = 0; i < elements.length; i++) {
          var element = elements[i];
          var text = element.getAttribute("data-" + language);
          if (element.tagName.toLowerCase() === "input") {
            element.setAttribute("value", text);
            element.setAttribute("placeholder", text);
          } else {
            element.innerHTML = text;
          }
        }
        language = (language === "english") ? "sinhala" : "english";
      }