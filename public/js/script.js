// Définir l'URL de l'API
const warrior = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=fr&type=normal%20monster&sort=level";

// Définir une fonction asynchrone qui utilise fetch()
async function getNormalWarriorMonsterCards(warrior) {
    try {
        // Attendre la réponse de l'API
        const response = await fetch(warrior);
        // Vérifier si la réponse est valide
        if (response.ok) {
            // Attendre la conversion de la réponse en JSON
            const data = await response.json();
            // Filtrer les cartes monstres guerrier
            let warriorMonsterCards = data.data.filter(card => card.race === "Warrior");
            // Limiter le nombre de cartes à 50
            warriorMonsterCards = warriorMonsterCards.slice(0, 50);
            // Obtenir une référence à la div parente
            const parentDiv = document.getElementById("warrior");
            // Créer une nouvelle div pour chaque carte, et y ajouter l'image et le nom de la carte
            warriorMonsterCards.forEach(card => {
                const cardDiv = document.createElement("div");
                const img = document.createElement("img");
                img.src = card.card_images[0].image_url;
                img.style.width = '250px'; // Ajuster la largeur de l'image
                img.style.height = 'auto'; // Ajuster la hauteur de l'image
                const p = document.createElement("p");
                p.textContent = card.name;
                const d = document.createElement("p");
                d.textContent = card.desc;
                const t = document.createElement("p");
                t.textContent = card.type;
                cardDiv.appendChild(img);
                cardDiv.appendChild(p);
                cardDiv.appendChild(d);
                cardDiv.appendChild(t);
                cardDiv.style.textAlign = 'center'
                parentDiv.appendChild(cardDiv);
            });
        } else {
            // Lancer une erreur si la réponse n'est pas valide
            throw new Error("La requête a échoué");
        }
    } catch (error) {
        // Attraper et afficher l'erreur
        console.error(error);
    }
}

// Appeler la fonction avec l'URL de l'API
getNormalWarriorMonsterCards(warrior);

// Définir l'URL de l'API
const magician = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=fr&type=normal%20monster&sort=level";

// Définir une fonction asynchrone qui utilise fetch()
async function getNormalMagicianMonsterCards(magician) {
    try {
        // Attendre la réponse de l'API
        const response = await fetch(magician);
        // Vérifier si la réponse est valide
        if (response.ok) {
            // Attendre la conversion de la réponse en JSON
            const data = await response.json();
            // Filtrer les cartes monstres guerrier
            let magicianMonsterCards = data.data.filter(card => card.race === "Spellcaster");
            // Limiter le nombre de cartes à 50
            magicianMonsterCards = magicianMonsterCards.slice(0, 50);
            // Obtenir une référence à la div parente
            const parentDiv = document.getElementById("magician");
            // Créer une nouvelle div pour chaque carte, et y ajouter l'image et le nom de la carte
            magicianMonsterCards.forEach(card => {
                const cardDiv = document.createElement("div");
                const img = document.createElement("img");
                img.src = card.card_images[0].image_url;
                img.style.width = '250px'; // Ajuster la largeur de l'image
                img.style.height = 'auto'; // Ajuster la hauteur de l'image
                const p = document.createElement("p");
                p.textContent = card.name;
                const d = document.createElement("p");
                d.textContent = card.desc;
                const t = document.createElement("p");
                t.textContent = card.type;
                cardDiv.appendChild(img);
                cardDiv.appendChild(p);
                cardDiv.appendChild(d);
                cardDiv.appendChild(t);
                cardDiv.style.textAlign = 'center'
                parentDiv.appendChild(cardDiv);
            });
        } else {
            // Lancer une erreur si la réponse n'est pas valide
            throw new Error("La requête a échoué");
        }
    } catch (error) {
        // Attraper et afficher l'erreur
        console.error(error);
    }
}

// Appeler la fonction avec l'URL de l'API
getNormalMagicianMonsterCards(magician);


// Définir l'URL de l'API
const zombie = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=fr&type=normal%20monster&sort=level";

// Définir une fonction asynchrone qui utilise fetch()
async function getNormalZombieMonsterCards(zombie) {
    try {
        // Attendre la réponse de l'API
        const response = await fetch(zombie);
        // Vérifier si la réponse est valide
        if (response.ok) {
            // Attendre la conversion de la réponse en JSON
            const data = await response.json();
            // Filtrer les cartes monstres guerrier
            let zombieMonsterCards = data.data.filter(card => card.race === "Zombie");
            // Limiter le nombre de cartes à 50
            zombieMonsterCards = zombieMonsterCards.slice(0, 50);
            // Obtenir une référence à la div parente
            const parentDiv = document.getElementById("zombie");
            // Créer une nouvelle div pour chaque carte, et y ajouter l'image et le nom de la carte
            zombieMonsterCards.forEach(card => {
                const cardDiv = document.createElement("div");
                const img = document.createElement("img");
                img.src = card.card_images[0].image_url;
                img.style.width = '250px'; // Ajuster la largeur de l'image
                img.style.height = 'auto'; // Ajuster la hauteur de l'image
                const p = document.createElement("p");
                p.textContent = card.name;
                const d = document.createElement("p");
                d.textContent = card.desc;
                const t = document.createElement("p");
                t.textContent = card.type;
                cardDiv.appendChild(img);
                cardDiv.appendChild(p);
                cardDiv.appendChild(d);
                cardDiv.appendChild(t);
                cardDiv.style.textAlign = 'center'
                parentDiv.appendChild(cardDiv);
            });
        } else {
            // Lancer une erreur si la réponse n'est pas valide
            throw new Error("La requête a échoué");
        }
    } catch (error) {
        // Attraper et afficher l'erreur
        console.error(error);
    }
}

// Appeler la fonction avec l'URL de l'API
getNormalZombieMonsterCards(zombie);



// *************************Magic*********************************************
async function fetchCards(color, type, subtype, limit) {
    const response = await fetch(`https://api.magicthegathering.io/v1/cards?colors=${color}`);
    const data = await response.json();
    const cards = data.cards;
    const parentDiv = document.getElementById('magic');
    const seenNames = {}; // Objet pour stocker les noms des cartes que nous avons déjà vues

    cards.forEach(card => {
        if (!seenNames[card.name]) { // Si nous n'avons pas encore vu ce nom de carte
            const cardDiv = document.createElement('div');
            const nameDiv = document.createElement('div');
            const imageDiv = document.createElement('div');

            nameDiv.textContent = card.name;
            if (card.imageUrl) {
                const img = document.createElement('img');
                img.src = card.imageUrl;
                imageDiv.appendChild(img);
            }

            cardDiv.appendChild(nameDiv);
            cardDiv.appendChild(imageDiv);
            parentDiv.appendChild(cardDiv);

            seenNames[card.name] = true; // Marquez ce nom de carte comme vu
        }
    });
}

fetchCards('G');
