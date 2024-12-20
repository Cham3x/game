document.addEventListener("DOMContentLoaded", (event) => {
    updateStats(0);
});

function addCharacter() {
    const charactersDiv = document.getElementById('characters');
    const newCharacterDiv = document.createElement('div');
    newCharacterDiv.classList.add('character');
    newCharacterDiv.innerHTML = `
        <label for="name">Nom:</label>
        <input type="text" id="name" name="characters[${characterIndex}][name]" required><br>
        <label for="race">Race:</label>
        <select id="race" name="characters[${characterIndex}][race]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(raceData).map(race => `<option value="${race}">${race}</option>`).join('')}
        </select><br>
        <label for="role">Rôle:</label>
        <select id="role" name="characters[${characterIndex}][role]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(roleData).map(role => `<option value="${role}">${role}</option>`).join('')}
        </select><br>
        <label for="arme">Arme:</label>
        <select id="arme" name="characters[${characterIndex}][arme]" required onchange="updateStats(${characterIndex})">
            ${Object.keys(armeData).map(arme => `<option value="${arme}">${arme}</option>`).join('')}
        </select><br>
        <div class="character-stats" id="stats-${characterIndex}"></div>
    `;
    charactersDiv.appendChild(newCharacterDiv);
    characterIndex++;
}