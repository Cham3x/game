const raceStats = {
    'Nain': { 'pv': 20, 'endurance': 15, 'mana': 5, 'force': 15, 'constitution': 15, 'agilite': 5, 'precision': 5 },
    'Elfe': { 'pv': 10, 'endurance': 10, 'mana': 20, 'force': 5, 'constitution': 5, 'agilite': 15, 'precision': 15 },
    'Orc': { 'pv': 30, 'endurance': 15, 'mana': 0, 'force': 20, 'constitution': 10, 'agilite': 5, 'precision': 5 },
    'Humain': { 'pv': 15, 'endurance': 10, 'mana': 10, 'force': 10, 'constitution': 10, 'agilite': 10, 'precision': 10 },
    'Gobelin': { 'pv': 15, 'endurance': 5, 'mana': 5, 'force': 5, 'constitution': 5, 'agilite': 20, 'precision': 15 },
    'Troll': { 'pv': 40, 'endurance': 20, 'mana': 0, 'force': 25, 'constitution': 15, 'agilite': -5, 'precision': 5 }
};

const roleStats = {
    'Guerrier': { 'pv': 20, 'endurance': 10, 'mana': 0, 'force': 15, 'constitution': 10, 'agilite': 5, 'precision': 5 }
    // Ajoutez d'autres rôles ici
};

const armeStats = {
    'Epee': { 'pv': 0, 'endurance': 0, 'mana': 0, 'force': 5, 'constitution': 0, 'agilite': 0, 'precision': 10 }
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

    statsDiv.innerHTML = `
        <p>PV: ${pv}</p>
        <p>Endurance: ${endurance}</p>
        <p>Mana: ${mana}</p>
        <p>Force: ${force}</p>
        <p>Constitution: ${constitution}</p>
        <p>Agilité: ${agilite}</p>
        <p>Précision: ${precision}</p>
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
}