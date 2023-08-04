<?php include './require.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Court fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Court case Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" class="searchbar">
                    <label>Search By</label>
                    <select name="search_criteria" id="fines" style="margin-left: 15px; width:150px;">
                        <option value="case_id">Case Id</option>
                        <option value="name">Name</option>
                    </select>
                    <input type="text" name="search" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf" name="download_pdf"> <a href="../../include/police_station/court_cases_pdf.php"
                            style="text-decoration:none; color:white"> Download PDF</a></button>
                </form>

            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Court ID</td>
                    <td>Driver Name</td>
                    <td>Licence No</td>
                    <td>Violation</td>
                    <td>Points</td>
                    <td>Overdue date</td>
                    <td>Court date</td>
                    <td>Sent to Court</td>
                    <td>Details</td>
                </thead>
                <tbody>
                    <?php
                    $page = 1;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }

                    $limit = 15;
                    $offset = ($page - 1) * 14;

                    if (isset($_POST['search_value'])) {

                        // Execute the query
                        $result = mysqli_query($con, courtfineSearch($police_station));

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["case_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><?php echo $row['court_date'] ?></td>
                        <td>
                            <form method="post" class="form_btn_checklist">
                                <input type="hidden" name="case_id" value="<?php echo $row['case_id']; ?>">
                                <input type="checkbox" name="status" <?php if ($row['status'] == 1) echo "checked"; ?>
                                    class="court_checkbox" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td><button class="court_view_btn"><a
                                    href="./court_fine_update.php?fine_id=<?php echo $row["case_id"] ?>">View</a></button>
                        </td>
                    </tr>
                    <div class="pagination">
                        <?php if ($page > 1) { ?>
                        <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
                        <?php } ?>
                        <?php if ($num_rows > ($page * 15)) { ?>
                        <a href="?page=<?php echo ($page + 1); ?>">Next</a>
                        <?php } ?>
                    </div>
                    <?php
                        }
                        mysqli_free_result($result);
                    } else {
                        // If no search value is provided, display all the data
                        $result = mysqli_query($con, readCourtFineDetails($police_station, $limit, $offset));
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                        <td><?php echo $row["case_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><?php echo $row['court_date'] ?></td>
                        <td>
                            <form method="post" class="form_btn_checklist">
                                <input type="hidden" name="case_id" value="<?php echo $row['case_id']; ?>">
                                <input type="checkbox" name="status" <?php if ($row['status'] == 1) echo "checked"; ?>
                                    class="court_checkbox" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td><button class="court_view_btn"><a
                                    href="./court_fine_update.php?fine_id=<?php echo $row["case_id"] ?>">View</a></button>
                        </td>


                    </tr>
                    <?php $num_rows = mysqli_num_rows($result); ?>
                    <div class="pagination">
                        <?php if ($page > 1) { ?>
                        <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
                        <?php } ?>
                        <?php if ($num_rows > ($page * 15)) { ?>
                        <a href="?page=<?php echo ($page + 1); ?>">Next</a>
                        <?php } ?>
                    </div>
                    <?php
                        }
                        $result = mysqli_query($con, readOverdueFineDetails($police_station));
                        while ($row = mysqli_fetch_assoc($result)) {

                            $fine_id = $row["fine_id"];
                            $licence_no = $row["licence_no"];
                            $violation = $row["violation"];
                            $points = $row["points"];
                            $date = $row["violation_date"];
                            $vehicle_no = $row["vehicle_no"];
                            $officer_id = $row["officer_id"];
                            $location = $row["location"];
                            $message = $row["message"];
                            $court_name = $row["court_name"];
                            $court_date = $row["court_date"];
                            $mobile_no = $row["mobile_no"];

                            if ($row['sent_court'] == 0) {
                                if (AddToCourt($con, $licence_no, $violation, $points, $date, $vehicle_no, $officer_id, $location, $message, $court_name, $police_station, $court_date)) {
                                    $sql = "UPDATE `fine` SET `sent_court` = '1' WHERE `fine`.`fine_id` = '$fine_id'";
                                    mysqli_query($con, $sql);

                                    require_once(__DIR__ . '/vendor/autoload.php');
                                    $api_instance = new NotifyLk\Api\SmsApi();
                                    $user_id = "24954"; // string | API User ID - Can be found in your settings page.
                                    $api_key = "fSMvM0w043q5VQ3XxItm"; // string | API Key - Can be found in your settings page.
                                    $message = "Your fine is send to the court.Your court date is $court_date.Court is $court_name.For more information contact $police_station police station"; // string | Text of the message. 320 chars max.
                                    $to = "$mobile_no"; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
                                    $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
                                    $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
                                    $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
                                    $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
                                    $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
                                    $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
                                    $type = null; // string | Message type. Provide as unicode to support unicode (optional).

                                    try {
                                        $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
                                    } catch (Exception $e) {
                                        echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
                                    }
                                }
                            }
                        }





                        mysqli_free_result($result);
                    }




                    ?>
                </tbody>
                <?php
                // Update the status in the database when the toggle button is clicked
                if (isset($_POST['case_id'])) {
                    $case_id = $_POST['case_id'];
                    $status = isset($_POST['status']) ? 1 : 0;

                    $sql = "UPDATE court_cases SET status=$status WHERE case_id=$case_id";
                    mysqli_query($con, $sql);
                }
                mysqli_close($con);
                ?>
            </table>
        </div>
    </section>
    <script src=" ../js/script.js"></script>

</body>

</html>