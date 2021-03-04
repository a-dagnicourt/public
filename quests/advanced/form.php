<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $phoneErr = $themeErr = $messageErr = null;
$firstname = $lastname = $email = $phone = $theme = $message = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["userFirstname"])) {
    $firstnameErr = "Prénom requis";
  } else {
    $firstname = test_input($_POST["userFirstname"]);
    if (!preg_match("/^[[:alpha:]À-ÿ[:space:].-]{3,}$/", $firstname)) {
      $firstnameErr = "Seuls les lettres et les espaces sont acceptés";
    }
  }
  if (empty($_POST["userLastname"])) {
    $lastnameErr = "Nom de famille requis";
  } else {
    $lastname = test_input($_POST["userLastname"]);
    if (!preg_match("/^[[:alpha:]À-ÿ[:space:].-]{3,}$/", $lastname)) {
      $lastnameErr = "Seuls les lettres et les espaces sont acceptés";
    }
  }
  if (empty($_POST["userEmail"])) {
    $emailErr = "Email requis";
  } else {
    $email = test_input($_POST["userEmail"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format d'email invalide";
    }
  }
  $phone = test_input($_POST["userPhone"]);
  if (!preg_match("/^[0-9]*$/", $phone)) {
    $phoneErr = "Seuls les chiffres sont acceptés";
    $phone = "";
  }
  if (empty($_POST["userMessage"])) {
    $messageErr = "Message requis";
  } else {
    $message = test_input($_POST["message"]);
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div>
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="userFirstname" pattern="^[[:alpha:]À-ÿ[:space:].-]{3,}$" />
    <span class="error"><?php echo $firstnameErr == true ? $firstnameErr : "*"; ?></span>
  </div>
  <div>
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="userLastname" pattern="^[[:alpha:]À-ÿ[:space:].-]{3,}$" />
    <span class="error"><?php echo $lastnameErr == true ? $lastnameErr : "*"; ?></span>
  </div>
  <div>
    <label for="email">Email :</label>
    <input type="email" id="email" name="userEmail" />
    <span class="error"><?php echo $emailErr == true ? $emailErr : "*"; ?></span>
  </div>
  <div>
    <label for="phone">Téléphone :</label>
    <input type="tel" id="phone" name="userPhone" />
    <span class="error"><?php echo $phoneErr == true ? $phoneErr : null; ?></span>

  </div>
  <div>
    <label for="theme">Thématique :</label>
    <select id="theme" name="userTheme">
      <option value="mom">Ta mère</option>
      <option value="dad">Ton père</option>
      <option value="sister">Ta soeur</option>
    </select>
  </div>
  <div>
    <label for="message">Message :</label>
    <textarea id="message" name="userMessage"></textarea>
    <span class="error"><?php echo $firstnameErr == true ? $messageErr : "*"; ?></span>
  </div>
  <div class="button">
    <button type="submit">Envoyer</button>
  </div>
</form>
<p>
  <?php if (!empty($_POST["userFirstname"]) && !empty($_POST["userLastname"]) && !empty($_POST["userEmail"]) && !empty($_POST["userTheme"]) && !empty($_POST["userMessage"])) {
    echo "Merci {$_POST['userFirstname']} {$_POST['userLastname']} de nous avoir contacté à propos de “{$_POST['userTheme']}”.
Un de nos conseiller vous contactera soit à l’adresse {$_POST['userEmail']}";
  };
  if (!empty($_POST["userFirstname"]) && !empty($_POST["userLastname"]) && !empty($_POST["userEmail"]) && !empty($_POST["userTheme"]) && !empty($_POST["userMessage"]) && !empty($_POST["userPhone"])) {
    echo " ou par téléphone au {$_POST['userPhone']}";
  }
  if (!empty($_POST["userFirstname"]) && !empty($_POST["userLastname"]) && !empty($_POST["userEmail"]) && !empty($_POST["userTheme"]) && !empty($_POST["userMessage"])) {
    echo  " dans les plus brefs délais pour traiter votre demande : 
{$_POST['userMessage']}";
  };
  ?></p>