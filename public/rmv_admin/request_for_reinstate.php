

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home </title>
  <link rel="stylesheet" href="./CSS/style3.css">




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
                                <th>View Details</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td >1004</td>
                                <td>B453632</td>
                                <th>Gampaha</td>
                                <td>12/01/2022- 13.00</td>
                                <td class="t-status t-active">Reinstated</td>
                                <td><button>View</button></td>
                                
                                
                            </tr>

                            <tr>
                                <td>1005</td>
                                <td>B453672</td>
                                <td>Colombo</td>
                                <td>12/01/2022- 13.05</td>
                                <td class="t-status t-inactive">Suspended</td>
                                <td><button>View</button></td>
                                
                                
                            </tr>

                            <tr>
                                <td>1005</td>
                                <td>B453672</td>
                                <td>Colombo</td>
                                <td>12/01/2022- 13.05</td>
                                <td class="t-status t-inactive">Suspended</td>
                                <td><button>View</button></td>
                                
                                
                            </tr>

                            
                            
                            
                        </tbody>
                    </table>
                </div>
                
        </div>

    </section>

    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        
</div>

    
  </section>

  <script src="./js/script.js"></script> 




</body>

</html>