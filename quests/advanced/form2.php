<?php

echo "Merci {$_POST['userFirstname']} {$_POST['userLastname']} de nous avoir contacté à propos de “{$_POST['userTheme']}”.
Un de nos conseiller vous contactera soit à l’adresse {$_POST['userEmail']} ou par téléphone au {$_POST['userPhone']} dans les plus brefs délais pour traiter votre demande : 
{$_POST['userMessage']}";
