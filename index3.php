<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer des Personnages</title>
    <style>
        .character-stats {
            margin-top: 20px;
        }
    </style>
        <script>
        // Charger les données JSON depuis le fichier
        fetch('data.json')
            .then(response => response.json())
            .then(data => {
                // Utiliser les données JSON
                console.log(data);
                data.forEach(character => {
                    console.log(`Nom: ${character.name}, Race: ${character.race}, Role: ${character.role}, Arme: ${character.arme}`);
                });
            })
            .catch(error => console.error('Erreur:', error));
    </script>
</head>
<body>
    <?php 
    require_once "autoloader.php";
$race = new Elfe() ;
$race->raceArray($race->getName(),$race->getRaceStats());
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $personnages = [];

        foreach ($_POST['characters'] as $characterData) {
            if (isset($characterData['name'], $characterData['race'], $characterData['role'], $characterData['arme'])) {
                $name = $characterData['name'];
                $race = $characterData['race'];
                $role = $characterData['role'];
                $arme = $characterData['arme'];
        
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
                }
        
                
            }
        

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
                 
                }

                switch ($arme) {
                    case 'Epee':
                        $arme = new Epee();
                        break;
                    default:
                        $arme = new Epee();
                        break;
                }

                $personnages[] = new Personnage($name, $race, $role, $arme);
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