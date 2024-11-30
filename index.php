
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Personnage</title>
</head>
<body>
    <?php 
    require_once "autoloader.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifiez que toutes les données du formulaire sont présentes
        if (isset($_POST['name'], $_POST['race'], $_POST['role'], $_POST['arme'])) {
            // Récupérer les données du formulaire
            $name = $_POST['name'];
            $race = $_POST['race'];
            $role = $_POST['role'];
            $arme = $_POST['arme'];

            // Créez une instance de la race sélectionnée
            switch ($race) {
                case 'Nain':
                    $race = new Nain();
                    break;
                case 'Elfe':
                     $race = new Elfe();
                    break;
                case 'Orc':
                    $race = new Orc();
                    break;
                case 'Humain':
                    $race = new Humain();
                     break;
                 case 'Troll':
                    $race = new Troll();
                     break;
                 case 'Gobelin':
                    $race = new Gobelin();
                    break;
                                                   
                // Ajoutez d'autres cas pour d'autres races
                default:
                    $race = new Nain(); // Par défaut, utilisez Nain
                    break;
            }
            // Créez une instance du rôle sélectionné
            switch ($role) {
                case 'Guerrier':
                    $role = new Guerrier();
                    break;
                // Ajoutez d'autres cas pour d'autres rôles
                default:
                    $role = new Guerrier(); // Par défaut, utilisez Guerrier
                    break;
            }
            // Créez une instance de l'arme sélectionnée
            switch ($arme) {
                case 'Epee':
                    $arme = new Epee();
                    break;
                // Ajoutez d'autres cas pour d'autres armes
                default:
                    $arme = new Epee(); // Par défaut, utilisez Epee
                    break;
            }

            // Créez une instance de Personnage
            $personnage = new Personnage($name, $race, $role, $arme);

            // Affichez les informations du personnage
            echo "<pre>";
            echo $personnage;
            echo "</pre>";
        } else {
        
        // Afficher le formulaire
        ?>
        <form method="post" action="">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="race">Race:</label>
            <select id="race" name="race" required>
                <option value="Nain">Nain</option>
                <option value="Gobelin">Gobelin</option>
                <option value="Troll">Troll</option>
                <option value="Humain">Humain</option>
                <option value="Orc">Orc</option>
                <option value="Elfe">Elfe</option>
                <!-- Ajoutez d'autres options pour d'autres races -->
            </select><br>

            <label for="role">Rôle:</label>
            <select id="role" name="role" required>
                <option value="Guerrier">Guerrier</option>
                <!-- Ajoutez d'autres options pour d'autres rôles -->
            </select><br>

            <label for="arme">Arme:</label>
            <select id="arme" name="arme" required>
                <option value="Epee">Épée</option>
                <!-- Ajoutez d'autres options pour d'autres armes -->
            </select><br>

            <input type="submit" value="Créer le Personnage">
        </form>
        <?php
    }}
    ?>
</body>
</html>