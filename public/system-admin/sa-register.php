<?php include("sa-dbh.inc.php"); ?>

<html>

<head>
<?php include("sa-head.php"); ?>
</head>

<body>

    <div class="content content-bg">
        <div class="title-bar">
            <div class="heading">
                <h1>System Admin | Register</h1>
            </div>
        </div>
        <div class="container">
            <form method="post" action="../../include/system-admin/sa-register.inc.php">
                <table class="form rmv">
                    <tr>
                        <td><label>System Admin Id</label></td>
                        <td>
                            <?php
                            $table = "system_admin";
                            $result = nextId($conn, $table);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $row['id'] + 1 ?>>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="pwd" id="pwd"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="../../index.php">
                                    <div class="btn btn-secondary">Cancel</div>
                                </a>
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                <?php include("../../include/main/errors.inc.php"); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>

</html>