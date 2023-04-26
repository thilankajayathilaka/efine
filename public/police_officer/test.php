<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My Website</title>
  </head>
  <body>
    <div id="content">
      <h1 class="translation" data-english="Hello, world!" data-sinhala="ආයුබෝවන්, ලෝකය!">Hello, world!</h1>
      <p class="translation" data-english="This is some sample text." data-sinhala="මෙය පරිපාලකයන්ට පරිපාලකයන්ට">This is some sample text.</p>
      <button onclick="setLanguage('sinhala')">Sinhala</button>
      <button onclick="setLanguage('english')">English</button>
      <br><br>
      <input type="text" id="searchfield" name="id" placeholder="Search the Licence Number" class="translation searchfield" data-english="Search the Licence Number" data-sinhala="බදු අංකය සොයන්න">
      <input type="submit" class="searchbt translation" name="search" value="search" data-english="Search" data-sinhala="සොයන්න">
    </div>

    <script>
      var language = "english"; // default language is Sinhala

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
      }
    </script>
  </body>
</html>
