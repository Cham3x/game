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

// Lire les données JSON
$jsonRace = file_get_contents('./json/Race.json');
$raceData = json_decode($jsonRace, true);

$jsonRole = file_get_contents('./json/Role.json');
$roleData = json_decode($jsonRole, true);

$jsonArme = file_get_contents('./json/Arme.json');
$armeData = json_decode($jsonArme, true);

function instantiateClasses($data, $directory) {
    $instances = [];
    foreach (glob($directory . '*.php') as $filename) {
        $className = basename($filename, '.php');
        if (class_exists($className) && $className != "Race" && $className != "Role" && $className != "Arme") {
            if (isset($data[$className])) {
                $instances[] = new $className($className, $data[$className]);
            } else {
                $instances[] = new $className($className, []);
            }
        }
    }
    return $instances;
}

// Instancier toutes les classes enfants de Race, Role et Arme
$raceInstances = instantiateClasses($raceData, './APP/race/');
$roleInstances = instantiateClasses($roleData, './APP/role/');
$armeInstances = instantiateClasses($armeData, './APP/arme/');

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

            // Trouver l'instance du rôle appropriée
            $roleInstance = null;
            foreach ($roleInstances as $instance) {
                if (get_class($instance) === $role) {
                    $roleInstance = $instance;
                    break;
                }
            }

            if (!$roleInstance) {
                throw new Exception("Rôle inconnu: $role");
            }

            // Trouver l'instance de l'arme appropriée
            $armeInstance = null;
            foreach ($armeInstances as $instance) {
                if (get_class($instance) === $arme) {
                    $armeInstance = $instance;
                    break;
                }
            }

            if (!$armeInstance) {
                throw new Exception("Arme inconnue: $arme");
            }

            $personnages[] = new Personnage($name, $raceInstance, $roleInstance, $armeInstance);
        }
    }

    // Afficher les personnages dans une balise <article>
    echo "<article>";
    foreach ($personnages as $personnage) {
        echo "<pre>";
        echo $personnage;
        echo "</pre>";
    }
    echo "</article>";
} else {
    ?>
    <form method="post" action="">
        <div id="characters">
            <div class="character">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="characters[0][name]" required><br>

                <label for="race">Race:</label>
                <select id="race" name="characters[0][race]" required onchange="updateStats(0)">
                    <?php
                    foreach ($raceData as $raceName => $stats) {
                        echo "<option value=\"$raceName\">$raceName</option>";
                    }
                    ?>
                </select><br>
                <label for="role">Rôle:</label>
                <select id="role" name="characters[0][role]" required onchange="updateStats(0)">
                    <?php
                    foreach ($roleData as $roleName => $stats) {
                        echo "<option value=\"$roleName\">$roleName</option>";
                    }
                    ?>
                </select><br>

                <label for="arme">Arme:</label>
                <select id="arme" name="characters[0][arme]" required onchange="updateStats(0)">
                    <?php
                    foreach ($armeData as $armeName => $stats) {
                        echo "<option value=\"$armeName\">$armeName</option>";
                    }
                    ?>
                </select><br>

                <div class="character-stats" id="stats-0"></div>
            </div>
        </div>
        <button type="button" onclick="addCharacter()">Ajouter un personnage</button>
        <input type="submit" value="Créer les Personnages">
    </form>
    <script src="updateStats.js"></script>
    <script>
        let characterIndex = 1;
        const raceData = <?php echo json_encode($raceData); ?>;
        const roleData = <?php echo json_encode($roleData); ?>;
        const armeData = <?php echo json_encode($armeData); ?>;
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            updateStats(0);
        });
    </script>
    <?php
}
?>
</body>
</html>