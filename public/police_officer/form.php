<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Home </title>
    <link rel="stylesheet" href="./css/style2.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include './po_sidebar.php' ?>

  <section class="home-section">
  <?php include './navbar.php' ?>


</div>
</div>
</div>

<h3 id="add_Fine">Add Fine</h3>

<div class="form_container">
<h3 class="addFine">Add Fine</h3>
        <form>
            <label class="form label">Full Name of the Driver</label>
            <input type="text" class="field">
            <br>
            <label class="form label">Address</label>
            <input type="text" class="field">
            <br>
            <label class="form label">Vehicle Number</label>
            <input type="text" class="field">
            <br>
            <label class="form label">D/L Number</label>
            <input type="text" class="field">
            <br>
            <label class="form label">Date of the Violation</label>
            <input type="date"class="field">
            <br>
            <label class="form label">Place</label>
            <input type="text"class="field">
            <br>
            <label class="form label">Court or Fine</label>
            <div class="select-fine-opt">
            <label class="form label">Court</label>
            <input type="radio">
            <label class="form label">Fine</label>
            <input type="radio">
</div>
            <br>
            <label class="form label">Nature of Violation</label>
            <select class="field">
                <option>Violation 01</option>
                <option>Violation 02</option>
                <option>Violation 03</option>
                <option>Violation 04</option>
                <option>Violation 05</option>
            </select>
             <button class="add-btn">Add</button>
             <br>
             <label class="form label">Court</label>
             <select class="field">
                
             <option>High Court Ambilipitiya</option>
             <option>High Court Ampara</option>
             <option>High Court Anuradhapura</option>
             <option>High Court Avissawella</option>
             <option>High Court Badulla</option>
             <option>High Court Balapitiya</option>
             <option>High Court Batticaloa</option>
             <option>High Court Chilaw</option>
             <option>High Court Colombo</option>
             <option>High Court Galle</option>
             <option>High Court Gampaha</option>
             <option>High Court Hambantota</option>
             <option>High Court Jaffna</option>
             <option>High Court Kalmunai</option>
             <option>High Court Kandy</option>
             <option>High Court Kegalle</option>
             <option>High Court Kurunegala</option>
             <option>High Court Matara</option>
             <option>High Court Negombo</option>
             <option>High Court Panadura</option>
             <option>High Court Polonnaruwa</option>
             <option>High Court Puttalam</option>
             <option>High Court Ratnapura</option>
             <option>High Court Trincomalee</option>
             <option>High Court Vavuniya</option>
             <option>High Court Welikada</option>
             <option>District Court Akkaraipattu</option>
             <option>District Court Ampara</option>
             <option>District Court Anuradhapura</option>
             <option>District Court Attanagalla</option>
             <option>District Court Avissawella</option>
             <option>District Court Badulla</option>
             <option>District Court Balapitiya</option>
             <option>District Court Bandarawela</option>
             <option>District Court Batticaloa</option>
             <option>District Court Chavakachcheri</option>
             <option>District Court Chilaw</option>
             <option>District Court Colombo</option>
             <option>District Court Elpitiya</option>
             <option>District Court Embilipitiya</option>
             <option>District Court Galle</option>
             <option>District Court Gampaha</option>
             <option>District Court Gampola</option>
             <option>District Court Hambantota</option>
             <option>District Court Hatton</option>
             <option>District Court Homagama</option>
             <option>District Court Horana</option>
             <option>District Court Jaffna</option>
             <option>District Court Kalmunai</option>
             <option>District Court Kalutara</option>
             <option>District Court Kandy</option>
             <option>District Court Kayts</option>
             <option>District Court Kegalle</option>
             <option>District Court Kuliyapitiya</option>
             <option>District Court Kurunegala</option>
             <option>District Court Maho</option>
             <option>District Court Mallakam</option>
             <option>District Court Mannar</option>
             <option>District Court Marawila</option>
             <option>District Court Matale</option>
             <option>District Court Matara</option>
             <option>District Court Matugama</option>
             <option>District Court Moneragala</option>
             <option>District Court Moratuwa</option>
             <option>District Court Mount Lavinia</option>
             <option>District Court Mullativu</option>
             <option>District Court Negombo</option>
             <option>District Court Nuwara Eliya</option>
             <option>District Court Panadura</option>
             <option>District Court Point Pedro</option>
             <option>District Court Polonnaruwa</option>
             <option>District Court Pugoda</option>
             <option>District Court Puttalam</option>
             <option>District Court Ratnapura</option>
             <option>District Court Tangalle</option>
             <option>District Court Tissamaharamaya</option>
             <option>District Court Trincomalee</option>
             <option>District Court Vauniya</option>
             <option>District Court Walasmulla</option>
             <option>District Court Warakapola</option>
             <option>District Court Welimada </option>              
            </select>
             <br>
             <label class="form label">Court Date</label>
             <input type="date" id-"cdate">
             <br>
             <label class="form label">Police Station</label>
             <input type="text" class="field">
             <br>
             <lable class="form label">Issuing Officer</lable>
             <input type="text" class="field">
             <div class="btn-area">
             <button class="form-btn">Clear</button> 
            <button class="form-btn">Done</button>
              </div>
</form>  
        </div>
    
</section>
      <script src="script.js"></script>

</body>
</html>








