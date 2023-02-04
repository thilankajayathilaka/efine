

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="../css/style3.css">




  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'rmv_sidebar.php' ?>

  <section class="home-section">

  <?php include 'navbar.php' ?>
    <h3 class="i-name">
      Requests for Licence Reinstate.
    </h3>
    

        
          
                
                    <table class="rmv-table">
                        <thead>
                            <tr>
                                <th >Request Id</th>
                                <th>Licence No</th>
                                <th>Police Station</th>
                                <th>Suspended Date and Time</th>
                                <th>Status</th>
                                <th></th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <th >1004</th>
                                <th>B453632</th>
                                <th>Gampaha</th>
                                <th>12/01/2022- 13.00</th>
                                <td class="t-status t-active">Reinstated</td>
                                <th><th><button>View</button></th></th>
                                <th></th>
                                
                            </tr>

                            <tr>
                                <th >1005</th>
                                <th>B453672</th>
                                <th>Colombo</th>
                                <th>12/01/2022- 13.05</th>
                                <td class="t-status t-inactive">Suspended</td>
                                <th><th><button>View</button></th></th>
                                <th></th>
                                
                            </tr>

                            <tr>
                                <th >1006</th>
                                <th>B457872</th>
                                <th>Jaffna</th>
                                <th>12/01/2022- 13.10</th>
                                <td class="t-status t-inactive">Suspended</td>
                                <th><th><button>View</button></th></th>
                                <th></th>
                                
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                
        </div>

    </section>

    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        
</div>

    
  </section>

  <script src="../js/script.js"></script>



</body>

</html>