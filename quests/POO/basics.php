<?php

// QUEST 2
$movieTitle = "Indiana Jones and the Last Crusade";
$hasWatched = true;
$releaseYear = 1989;
$rating = 8.2;

$hasWatched = true ? 'Yes' : 'Nope';

echo "$movieTitle has been released in $releaseYear, currently has a $rating rating on IMDB and did I watch it ? $hasWatched. ";
echo "- ";

// QUEST 3
$message1 = "0@sn9sirppa@#?ia'jgtvryko1";
$message2 = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj";
$message3 = "aopi?sgnirts@#?sedhtg+p9l!";

$message = $message1;
$keyNumber = (strlen($message) / 2);
$subStr = substr($message, 5, $keyNumber);
echo strrev(str_ireplace("@#?", " ", " $subStr"));

$message = $message2;
$keyNumber = (strlen($message) / 2);
$subStr = substr($message, 5, $keyNumber);
echo strrev(str_ireplace("@#?", " ", " $subStr"));

$message = $message3;
$keyNumber = (strlen($message) / 2);
$subStr = substr($message, 5, $keyNumber);
echo strrev(str_ireplace("@#?", " ", " | .$subStr"));

// QUEST 4
$indyMovies = ["Indiana Jones et le Temple maudit" => 1984, "Les Aventuriers de l'arche perdue" => 1981, "Indiana Jones et la Dernière Croisade" => 1989];

asort($indyMovies);
foreach ($indyMovies as $movie => $key) {
    echo nl2br("$key - $movie | ");
};

// QUEST 5
$weapons = ['fists', 'whip', 'gun'];
$opponentWeapon = $weapons[rand(0, 2)]; // Cela permet de choisir une arme de manière aléatoire.
$indyWeapon = '???';

switch ($opponentWeapon) {
    case 'fists':
        $indyWeapon = $weapons[2];
        break;
    case 'whip':
        $indyWeapon = $weapons[0];
        break;
    case 'gun':
        $indyWeapon = $weapons[1];
        break;
    default:
        $indyWeapon = 'nuclear';
        break;
};


echo "Opponent attacks Indy with $opponentWeapon, Indy draws his $indyWeapon and kills him. EZ. | ";

// QUEST 6
function writeSecretSentence(string $animal, string $something): string
{
    return "$animal is bowing down to $something ";
};

echo writeSecretSentence('The monkey', 'the stupidity of this world.');
