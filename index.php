<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>    
<?php 
require_once "autoloader.php";
function instantiateRaceClasses() {
    $raceInstances = [];
    $directory = './APP/race/';
    foreach (glob($directory . '*.php') as $filename) {
        $className = basename($filename, '.php');
        if (class_exists($className)&& $className!="Race") {
            // Passer des arguments par défaut au constructeur
            $raceInstances[] = new $className($className,[]);
        }
    }
    return $raceInstances;
}
// Instancier toutes les classes enfants de Race
$raceInstances = instantiateRaceClasses();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $personnages = [];
    foreach ($_POST['characters'] as $characterData) {
        if (isset($characterData['name'], $characterData['race'], $characterData['role'], $characterData['arme'])) {
            $name = $characterData['name'];
            $race = $characterData['race'];
            $role = $characterData['role'];
            $arme = $characterData['arme'];
            // Trouver l'instance de la race appropriée
            $raceInstance = null;
            foreach ($raceInstances as $instance) {
                if (get_class($instance) === $race) {
                    $raceInstance = $instance;
                    break;
                }
            }
            if (!$raceInstance) {
                throw new Exception("Race inconnue: $race");
            }
            // Instancier la classe de rôle appropriée
            switch ($role) {
                case 'Guerrier':
                    $role = new Guerrier();
                    break;
                case 'Voleur':
                    $role = new Voleur();
                    break;
                case 'Paladin':
                    $role = new Paladin();
                    break;
                case 'Magicien':
                    $role = new Magicien();
                    break;
                case 'Archer':
                    $role = new Archer();
                    break;
                case 'Berserker':
                    $role = new Berserker();
                    break;
                default:
                    throw new Exception("Rôle inconnu: $role");
            }

            // Instancier la classe d'arme appropriée
            switch ($arme) {
                case 'Epee':
                    $arme = new Epee();
                    break;
               /*  default:
                    $arme = new Epee();
                    break; */
            }

            $personnages[] = new Personnage($name, $raceInstance, $role, $arme);
        }
    }

    foreach ($personnages as $personnage) {
        echo "<pre>";
        echo $personnage;
        echo "</pre>";
    }
} else {
    ?>
    <form method="post" action="">
        <div id="characters">
            <div class="character">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="characters[0][name]" required><br>

                <label for="race">Race:</label>
                <select id="race" name="characters[0][race]" required onchange="updateStats(0)">
                    <option value="Nain">Nain</option>
                    <option value="Gobelin">Gobelin</option>
                    <option value="Troll">Troll</option>
                    <option value="Humain">Humain</option>
                    <option value="Orc">Orc</option>
                    <option value="Elfe">Elfe</option>
                </select><br>
                <label for="role">Rôle:</label>
                <select id="role" name="characters[0][role]" required onchange="updateStats(0)">
                    <option value="Guerrier">Guerrier</option>
                    <option value="Berserker">Berserker</option>
                    <option value="Voleur">Voleur</option>
                    <option value="Magicien">Magicien</option>
                    <option value="Paladin">Paladin</option>
                    <option value="Archer">Archer</option>
                </select><br>

                <label for="arme">Arme:</label>
                <select id="arme" name="characters[0][arme]" required onchange="updateStats(0)">
                    <option value="Epee">Épée</option>
                </select><br>

                <div class="character-stats" id="stats-0"></div>
            </div>
        </div>
        <button type="button" onclick="addCharacter()">Ajouter un personnage</button>
        <input type="submit" value="Créer les Personnages">
    </form>
    <script src="updateStats.js"></script>
    <script>document.addEventListener("DOMContentLoaded",(event)=> {updateStats(0)})</script>
    <script>
        let characterIndex = 1;
    </script>
    <?php
}
?>
</body>
</html>