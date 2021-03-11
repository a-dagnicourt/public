<?php
require_once 'connect.php';

$pdo = new \PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstnameEntry']);
$lastname = trim($_POST['lastnameEntry']);
$query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
$pdo->exec($query);
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

// Form actions
$firstnameErr = $lastnameErr = null;
$firstnameEntry = $lastnameEntry = null;
$isValidated = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstnameEntry"])) {
        $firstnameErr = "Prénom requis";
    } else {
        $firstnameEntry = test_input($_POST["firstnameEntry"]);
        if (!preg_match("/^[[:alpha:]À-ÿ[:space:].-]{3,45}$/", $firstnameEntry)) {
            $isValidated = false;
            $firstnameErr = "Seuls les lettres et les espaces sont acceptés";
        }
    }
    if (empty($_POST["lastnameEntry"])) {
        $lastnameErr = "Nom de famille requis";
    } else {
        $lastnameEntry = test_input($_POST["lastnameEntry"]);
        if (!preg_match("/^[[:alpha:]À-ÿ[:space:].-]{3,45}$/", $lastnameEntry)) {
            $isValidated = false;
            $lastnameErr = "Seuls les lettres et les espaces sont acceptés";
        }
    }
    // header("Location : " . $_SERVER['PHP_SELF']);
    // exit;
    // Fuck it, je le ferais avec un putain de framework.
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$isValidated && $statement->execute();

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PDO Quest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row mt-5">
            <ul class="list-group col-12">
                <?php foreach ($friends as $friend) { ?>
                    <li class="list-group-item"><?= $friend['firstname'] ?> <?= $friend['lastname'] ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="row mt-5">
            <form class="col-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <span class="fst-italic"><?php echo $firstnameErr == true ? $firstnameErr : "*"; ?></span>
                    <input type="text" class="form-control" id="firstname" name="firstnameEntry" pattern="^[[:alpha:]À-ÿ[:space:].-]{3,45}$" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <span class="fst-italic"><?php echo $lastnameErr == true ? $lastnameErr : "*"; ?></span>
                    <input type="text" class="form-control" id="lastname" name="lastnameEntry" pattern="^[[:alpha:]À-ÿ[:space:].-]{3,45}$" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>