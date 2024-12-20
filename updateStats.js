/* const raceStats =


  {
    'Nain': { 'pv': 20, 'endurance': 15, 'mana': 5, 'force': 15, 'constitution': 15, 'agilite': 5, 'precision': 5 , 'intelligence': 10, 'resistance': 20 },
    'Elfe': { 'pv': 10121, 'endurance': 10, 'mana': 20, 'force': 5, 'constitution': 5, 'agilite': 15, 'precision': 15 , 'intelligence': 20, 'resistance': 5},
    'Orc': { 'pv': 30, 'endurance': 15, 'mana': 0, 'force': 20, 'constitution': 10, 'agilite': 5, 'precision': 5 , 'intelligence': 5, 'resistance': 25 },
    'Humain': { 'pv': 15, 'endurance': 10, 'mana': 10, 'force': 10, 'constitution': 10, 'agilite': 10, 'precision': 10 , 'intelligence': 15, 'resistance': 10 },
    'Gobelin': { 'pv': 15, 'endurance': 5, 'mana': 5, 'force': 5, 'constitution': 5, 'agilite': 20, 'precision': 15 , 'intelligence': 10, 'resistance': 5 },
    'Troll': { 'pv': 40, 'endurance': 20, 'mana': 0, 'force': 25, 'constitution': 15, 'agilite': -5, 'precision': 5 , 'intelligence': 5, 'resistance': 30 } 
}; 

const roleStats = {
    'Guerrier': { 'pv': 20, 'endurance': 10, 'mana': 0, 'force': 15, 'constitution': 10, 'agilite': 5, 'precision': 5, 'intelligence': 5, 'resistance': 10 },
    'Voleur': { 'pv': 10, 'endurance': 10, 'mana': 5, 'force': 10, 'constitution': 5, 'agilite': 20, 'precision': 15, 'intelligence': 10, 'resistance': 5 },
    'Magicien': { 'pv': 5, 'endurance': 5, 'mana': 30, 'force': 5, 'constitution': 5, 'agilite': 10, 'precision': 10, 'intelligence': 25, 'resistance': 5 },
    'Archer': { 'pv': 15, 'endurance': 10, 'mana': 5, 'force': 10, 'constitution': 10, 'agilite': 15, 'precision': 20, 'intelligence': 10, 'resistance': 5 },
    'Berserker': { 'pv': 25, 'endurance': 15, 'mana': 0, 'force': 20, 'constitution': 15, 'agilite': 5, 'precision': 5, 'intelligence': 5, 'resistance': 10 },
    'Paladin': { 'pv': 20, 'endurance': 15, 'mana': 10, 'force': 15, 'constitution': 15, 'agilite': 10, 'precision': 10, 'intelligence': 15, 'resistance': 20 }
};

const armeStats = {
    'Epee': { 'pv': 0, 'endurance': 0, 'mana': 0, 'force': 5, 'constitution': 0, 'agilite': 0, 'precision': 10 , 'intelligence': 20, 'resistance': 5}
    // Ajoutez d'autres armes ici
};

function updateStats(index) {
    const race = document.querySelector(`select[name="characters[${index}][race]"]`).value;
    const role = document.querySelector(`select[name="characters[${index}][role]"]`).value;
    const arme = document.querySelector(`select[name="characters[${index}][arme]"]`).value;

    const statsDiv = document.getElementById(`stats-${index}`);
    const raceStatsValues = raceStats[race] || {};
    const roleStatsValues = roleStats[role] || {};
    const armeStatsValues = armeStats[arme] || {};

    const pv = 100 + (raceStatsValues.pv || 0) + (roleStatsValues.pv || 0) + (armeStatsValues.pv || 0);
    const endurance = 50 + (raceStatsValues.endurance || 0) + (roleStatsValues.endurance || 0) + (armeStatsValues.endurance || 0);
    const mana = 50 + (raceStatsValues.mana || 0) + (roleStatsValues.mana || 0) + (armeStatsValues.mana || 0);
    const force = 10 + (raceStatsValues.force || 0) + (roleStatsValues.force || 0) + (armeStatsValues.force || 0);
    const constitution = 10 + (raceStatsValues.constitution || 0) + (roleStatsValues.constitution || 0) + (armeStatsValues.constitution || 0);
    const agilite = 10 + (raceStatsValues.agilite || 0) + (roleStatsValues.agilite || 0) + (armeStatsValues.agilite || 0);
    const precision = 10 + (raceStatsValues.precision || 0) + (roleStatsValues.precision || 0) + (armeStatsValues.precision || 0);
    const intelligence = 10 + (raceStatsValues.intelligence || 0) + (roleStatsValues.intelligence || 0) + (armeStatsValues.intelligence || 0);
    const resistance = 10 + (raceStatsValues.resistance || 0) + (roleStatsValues.resistance || 0) + (armeStatsValues.resistance || 0);

    statsDiv.innerHTML = `
        <p>PV: ${pv}</p>
        <p>Endurance: ${endurance}</p>
        <p>Mana: ${mana}</p>
        <p>Force: ${force}</p>
        <p>Constitution: ${constitution}</p>
        <p>Agilité: ${agilite}</p>
        <p>Précision: ${precision}</p>
        <p>Intelligence: ${intelligence}</p>
        <p>Résistance: ${resistance}</p>
    `;
}

function addCharacter() {
    const charactersDiv = document.getElementById('characters');
    const newCharacterDiv = document.createElement('div');
    newCharacterDiv.classList.add('character');
    newCharacterDiv.innerHTML = `
        <label for="name">Nom:</label>
        <input type="text" id="name" name="characters[${characterIndex}][name]" required><br>

        <label for="race">Race:</label>
        <select id="race" name="characters[${characterIndex}][race]" required onchange="updateStats(${characterIndex})">
            <option value="Nain">Nain</option>
            <option value="Gobelin">Gobelin</option>
            <option value="Troll">Troll</option>
            <option value="Humain">Humain</option>
            <option value="Orc">Orc</option>
            <option value="Elfe">Elfe</option>
        </select><br>

        <label for="role">Rôle:</label>
        <select id="role" name="characters[${characterIndex}][role]" required onchange="updateStats(${characterIndex})">
            <option value="Guerrier">Guerrier</option>
        </select><br>

        <label for="arme">Arme:</label>
        <select id="arme" name="characters[${characterIndex}][arme]" required onchange="updateStats(${characterIndex})">
            <option value="Epee">Épée</option>
        </select><br>

        <div class="character-stats" id="stats-${characterIndex}"></div>
    `;
    charactersDiv.appendChild(newCharacterDiv);
    characterIndex++;
    document.addEventListener("DOMContentLoaded",(event)=> {updateStats(characterIndex)})
} 
 */


let raceStats = {};
let roleStats = {};
let armeStats = {};

// Charger les données JSON pour les races
fetch('getJsonStats.php?file=Race')
    .then(response => response.json())
    .then(data => {
        raceStats = data.races;
        // Initialiser les statistiques pour le premier personnage
        updateStats(0);
    })
    .catch(error => console.error('Erreur:', error));

// Charger les données JSON pour les rôles
fetch('getJsonStats.php?file=Role')
    .then(response => response.json())
    .then(data => {
        roleStats = data.roles;
        // Initialiser les statistiques pour le premier personnage
        updateStats(0);
    })
    .catch(error => console.error('Erreur:', error));

// Charger les données JSON pour les armes
fetch('getJsonStats.php?file=Arme')
    .then(response => response.json())
    .then(data => {
        armeStats = data.armes;
        // Initialiser les statistiques pour le premier personnage
        updateStats(0);
    })
    .catch(error => console.error('Erreur:', error));

function updateStats(index) {
    const race = document.querySelector(`select[name="characters[${index}][race]"]`).value;
    const role = document.querySelector(`select[name="characters[${index}][role]"]`).value;
    const arme = document.querySelector(`select[name="characters[${index}][arme]"]`).value;
    const statsDiv = document.getElementById(`stats-${index}`);
    const raceStatsValues = raceStats[race] || {};
    const roleStatsValues = roleStats[role] || {};
    const armeStatsValues = armeStats[arme] || {};

    const pv = 100 + (raceStatsValues.pv || 0) + (roleStatsValues.pv || 0) + (armeStatsValues.pv || 0);
    const endurance = 50 + (raceStatsValues.endurance || 0) + (roleStatsValues.endurance || 0) + (armeStatsValues.endurance || 0);
    const mana = 50 + (raceStatsValues.mana || 0) + (roleStatsValues.mana || 0) + (armeStatsValues.mana || 0);
    const force = 10 + (raceStatsValues.force || 0) + (roleStatsValues.force || 0) + (armeStatsValues.force || 0);
    const constitution = 10 + (raceStatsValues.constitution || 0) + (roleStatsValues.constitution || 0) + (armeStatsValues.constitution || 0);
    const agilite = 10 + (raceStatsValues.agilite || 0) + (roleStatsValues.agilite || 0) + (armeStatsValues.agilite || 0);
    const precision = 10 + (raceStatsValues.precision || 0) + (roleStatsValues.precision || 0) + (armeStatsValues.precision || 0);
    const intelligence = 10 + (raceStatsValues.intelligence || 0) + (roleStatsValues.intelligence || 0) + (armeStatsValues.intelligence || 0);
    const resistance = 10 + (raceStatsValues.resistance || 0) + (roleStatsValues.resistance || 0) + (armeStatsValues.resistance || 0);

    statsDiv.innerHTML = `
        <p>PV: ${pv}</p>
        <p>Endurance: ${endurance}</p>
        <p>Mana: ${mana}</p>
        <p>Force: ${force}</p>
        <p>Constitution: ${constitution}</p>
        <p>Agilité: ${agilite}</p>
        <p>Précision: ${precision}</p>
        <p>Intelligence: ${intelligence}</p>
        <p>Résistance: ${resistance}</p>
    `;
}

let characterIndex = 1;
const maxCharacters = 5; // Définir le nombre maximum de personnages

document.addEventListener("DOMContentLoaded", (event) => {
    updateStats(0);
});

function addCharacter() {
    if (characterIndex >= maxCharacters) {
        alert("Vous avez atteint le nombre maximum de personnages.");
        return;
    }

    const charactersDiv = document.getElementById('characters');
    const newCharacterDiv = document.createElement('div');
    newCharacterDiv.classList.add('character');
    newCharacterDiv.innerHTML = `
        <label for="name">Nom:</label>
        <input type="text" id="name" name="characters[${characterIndex}][name]" required><br>
        <label for="race">Race:</label>
        <select id="race" name="characters[${characterIndex}][race]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(raceStats).map(race => `<option value="${race}">${race}</option>`).join('')}
        </select><br>
        <label for="role">Rôle:</label>
        <select id="role" name="characters[${characterIndex}][role]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(roleStats).map(role => `<option value="${role}">${role}</option>`).join('')}
        </select><br>
        <label for="arme">Arme:</label>
        <select id="arme" name="characters[${characterIndex}][arme]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(armeStats).map(arme => `<option value="${arme}">${arme}</option>`).join('')}
        </select><br>
        <div class="character-stats" id="stats-${characterIndex}"></div>
    `;
    charactersDiv.appendChild(newCharacterDiv);
    updateStats(characterIndex);
    characterIndex++;
}