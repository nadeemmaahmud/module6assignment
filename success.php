<?php
session_start();
if (!isset($_SESSION['name'])) {
	header("Location: index.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body{
            margin-top: 30px;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1 style="text-align: center;"><b>Registration Successful!</b></h1>
                <p>Welcome, <?php echo $_SESSION['name']; ?>!</p>
                <p>Your information has been saved.</p>

                <h2>Registered Users</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                    </tr>

                    <?php
                    $file = fopen('users.csv', 'r');
                    while (($data = fgetcsv($file)) !== FALSE) {
                        echo "<tr>";
                        echo "<td>" . $data[0] . "</td>";
                        echo "<td>" . $data[1] . "</td>";
                        echo "<td><img src='uploads/" . $data[2] . "' height='100'></td>";
                        echo "</tr>";
                    }
                    fclose($file);
                    ?>
                </table>
                <a href="/index.html"><button type="button">Go to Home</button></a>
            </div>
        </div>
    </div>
</body>
</html>