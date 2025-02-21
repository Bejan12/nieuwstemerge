<!-- filepath: app/views/home/index.php -->

<style>
@import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Ultra&display=swap');

body {
    background-color: white;
    overflow-x: hidden; /* Voorkom horizontaal scrollen */
    margin: 0; /* Verwijder standaard marges */
    padding: 0; /* Verwijder standaard padding */
}

.navbar {
    height: 100px; /* Adjust the height as needed */
    background-color: white; /* Change the navbar color to white */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px; /* Voeg padding toe aan de zijkanten */
}
.navbar-brand img {
    height: 80px; /* Adjust the logo size as needed */
}
.navbar-text {
    position: absolute;
    top: 7%;
    left: 50%;
    transform: translateX(-50%);
    font-size: 1.5rem; /* Adjust the font size as needed */
    animation: blink 2s infinite; /* Slow down the blinking animation */
}
@keyframes blink {
    0%, 100% {
        color: black; /* Start and end with black color */
    }
    50% {
        color: darkgray; /* Midway change to dark gray */
    }
}

.auth-buttons {
    display: flex;
    gap: 10px; /* Voeg ruimte toe tussen de knoppen */
}

.auth-buttons a {
    font-family: 'Instrument Sans', sans-serif;
    font-weight: bold;
    font-size: 20px;
    color: #5121CA;
    font-weight: bold;
    text-decoration: none;
    padding: 20px 40px; /* Voeg padding toe aan de knoppen */
}

.auth-buttons a:first-child {
    background-color: #5121CA; /* Paarse achtergrondkleur voor de "Aanmelden" knop */
    color: white; /* Witte tekstkleur voor de "Aanmelden" knop */
}

.purple-banner {
    background-color: #6A00FF;
    height: 543px; /* Pas de hoogte aan naar wens */
    width: 100%;
    position: relative; /* Zorg ervoor dat de container de referentie is voor absolute positionering */
    color: white; /* Voor toekomstige tekst */
    padding: 20px; /* Voeg padding toe om de tekst van de rand af te houden */
    box-sizing: border-box; /* Zorg ervoor dat padding wordt meegerekend in de breedte */
}

.purple-banner h1 {
    font-family: Instrument Sans, sans-serif;
    font-weight: bold;
    position: absolute;
    top: 70px; /* Pas de top-positie aan naar wens */
    left: 70px; /* Pas de left-positie aan naar wens */
    margin: 0; /* Verwijder standaard marges */
}

.purple-banner p {
    font-family: Instrument Sans, sans-serif;
    font-weight: bold;
    color: #E1DDDD;
    position: absolute;
    top: 200px; /* Pas de top-positie aan naar wens */
    left: 70px; /* Pas de left-positie aan naar wens */
    margin: 0; /* Verwijder standaard marges */
    max-width: 600px; /* Beperk de breedte van de paragraaf */
}

.images-container {
    position: absolute;
    top: 70px; /* Pas de top-positie aan naar wens */
    right: 300px; /* Pas de right-positie aan naar wens */
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.images-container img {
    margin-bottom: 20px; /* Voeg ruimte toe tussen de afbeeldingen */
}

.images-container img:first-child {
    width: 625px;
    height: 160px;
    border-radius: 25px;
}

.images-container .small-images {
    display: flex;
    gap: 40px; /* Voeg ruimte toe tussen de kleine afbeeldingen */
}

.images-container .small-images img {
    width: 293px;
    height: 195px; 
    border-radius: 25px;
    margin-bottom: 0; /* Verwijder de marge onder de kleine afbeeldingen */  
}

.icon-container {
    display: flex;
    justify-content: center;
    gap: 172px; /* Voeg ruimte toe tussen de icon-items */
    margin-top: 70px; /* Voeg ruimte toe boven de icon-container */
}

.icon-item {
    text-align: center;
}

.icon-item img {
    width: 110px; /* Pas de breedte van de icon-afbeeldingen aan */
    height: 100px; /* Pas de hoogte van de icon-afbeeldingen aan */
}

.icon-item h3 {
    font-family: Instrument Sans, sans-serif;
    font-size: 17px;
    font-weight: bold;
    color: #5121CA; /* Pas de kleur van de kopjes aan */
    margin-top: 10px; /* Voeg ruimte toe boven de kopjes */
}
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?= URLROOT; ?>">
        <img src="<?= URLROOT; ?>/public/img/logo.png" alt="TravelEasy Logo" class="d-inline-block align-text-top">
    </a>
    <span class="navbar-text">
        Forget the struggle, just TravelEasy!
    </span>
    <div class="auth-buttons">
        <a href="<?= URLROOT; ?>/register">Aanmelden</a>
        <a href="<?= URLROOT; ?>/inlog">Inloggen</a>
    </div>
</nav>

<div class="purple-banner">
    <div>
        <h1>Vlieg goedkoop met<br> TravelEasy!</h1>
        <p>Jouw startpunt voor een zorgeloze reis! Of je nu droomt <br> van een ontspannen strandvakantie, een avontuurlijke <br> roadtrip of een culturele stedentrip, wij regelen alles tot <br>in de puntjes.<br><br>
        Met onze expertise en persoonlijke service maken we <br> reizen eenvoudig en onvergetelijk. Ontdek jouw <br> volgende bestemming en laat ons het werk doen, jij <br> hoeft alleen maar te genieten!</p>
    </div>
    <div class="images-container">
        <img src="<?= URLROOT; ?>/public/img/pexels-anna-he-82665374-12504725.jpg" alt="Strandkust">
        <div class="small-images">
            <img src="<?= URLROOT; ?>/public/img/Plane-wing-2a.jpg" alt="Vleugel van een vliegtuig">
            <img src="<?= URLROOT; ?>/public/img/shutterstock_2186094243.jpg" alt="Shutterstock afbeelding">
        </div>
    </div>
</div>

<div class="icon-container">
    <div class="icon-item">
        <img src="<?= URLROOT; ?>/public/img/geldbesparen.png" alt="Icon 1">
        <h3>De voordeligste prijzen</h3>
    </div>
    <div class="icon-item">
        <img src="<?= URLROOT; ?>/public/img/vliegtuigicon.png" alt="Icon 2">
        <h3>De beste vluchten </h3>
    </div>
    <div class="icon-item">
        <img src="<?= URLROOT; ?>/public/img/wereldicon.png" alt="Icon 3">
        <h3>De mooiste bestemmingen</h3>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>