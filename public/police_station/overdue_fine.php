<?php include './require.php';
include_once '../../include/TCPDF-main/tcpdf.php'

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Overdue fine</title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<script>
function showModal(fine_id) {
    // Show the modal
    let modal = document.getElementById("myModal");
    modal.style.display = "block";

    // Focus on the court date input field
    let courtDateInput = document.getElementById("courtDateInput");
    courtDateInput.focus();
}

function hideModal() {
    // Hide the modal
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
}
</script>

<body>
    <?php include './sidebar.php' ?>

    <section class="home-section">

        <?php include './navbar.php' ?>
        <h3 class="i-name">
            Overdue Fine Details
        </h3>
        <div class="paymentsearch">
            <div class="search">

                <form action="" method="post">
                    <label>Search By</label>
                    <select name="search_criteria" style="margin-left: 15px;">
                        <option value="Fine_ID">Fine ID</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                    </select>
                    <input type="text" name="search_value" class="serchinput">
                    <input type="submit" value="Search" class="searchbtn">
                    <button class="pdf" name="download_pdf"> <a href="../../include/police_station/overdue_fine_pdf.php"
                            style="text-decoration:none; color:white"> Download PDF</a></button>
                    </select>

                </form>


            </div>
        </div>
        </div>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Fine ID</td>
                    <td>Driver Name</td>
                    <td>Licence No</td>
                    <td>Violation</td>
                    <td>Points</td>
                    <td>Amount</td>
                    <td>Overdue date</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search_value'])) {


                        // Execute the query
                        $result = mysqli_query($con, overduefineSearch());

                        // Display the results
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["fine_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><Button>Send to Court</Button></td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                    } else {
                        // If no search value is provided, display all the data
                        $result = mysqli_query($con, readOverdueFineDetails());
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                        <td><?php echo $row["fine_id"] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['licence_no'] ?></td>
                        <td><?php echo $row["violation"] ?></td>
                        <td><?php echo $row["points"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td><Button>Send to Court</Button></td>

                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);
                    }

                    mysqli_close($con);


                    ?>
                </tbody>
            </table>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideModal()">&times;</span>
                <p>Enter the new court date :</p>
                <input type="date" id="courtDateInput">
                <button onclick="updateOverdueFine()">Update</button>
            </div>
        </div>

    </section>
    <script>
    function showModal($fine_id, $court_date) {
        // Show the modal
        let modal = document.getElementById("myModal");
        modal.style.display = "block";

        // Focus on the court date input field
        let courtDateInput = document.getElementById("courtDateInput").value = $court_date;
        courtDateInput.focus();
    }

    function hideModal() {
        // Hide the modal
        let modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function updateOverdueFine() {
        // Get the fine ID and court date input
        let fineId = $fine_id;
        let courtDateInput = document.getElementById("courtDateInput");

        // Make sure the court date is not empty
        let courtDate = courtDateInput.value.trim();
        if (courtDate === "") {
            alert("Please enter a valid court date.");
            return;
        }

        // Make an AJAX request to update the overdue fine record in the database
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "update_overdue_fine.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Hide the modal
                hideModal();

                // Redirect the user to a new page to display the updated overdue fine details
                window.location.href = "overdue_fine_details.php?fine_id=" + fineId;
            }
        };
        xhr.send("fine_id=" + fineId + "&court_date=" + encodeURIComponent(courtDate));
    }
    </script>

</body>

</html>