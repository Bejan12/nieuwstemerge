<?php require_once APPROOT . '/views/includes/header.php'; ?>




<div class="container form-container">
    <h1><?php echo $data['title']; ?></h1>
    <form action="<?= URLROOT; ?>/register/create" method="post">
        <div class="form-group">
            <label for="voornaam" class="form-label">Voornaam: <sup>*</sup></label>
            <input type="text" name="voornaam" class="form-control form-input form-input-width-350" value="<?php echo $data['voornaam']; ?>">
            <span class="text-danger"><?php echo $data['voornaamError']; ?></span>
        </div>
        <div class="form-group">
            <label for="tussenvoegsel" class="form-label">Tussenvoegsel:</label>
            <input type="text" name="tussenvoegsel" class="form-control form-input form-input-width-350" value="<?php echo $data['tussenvoegsel']; ?>">
        </div>
        <div class="form-group">
            <label for="achternaam" class="form-label">Achternaam: <sup>*</sup></label>
            <input type="text" name="achternaam" class="form-control form-input form-input-width-350" value="<?php echo $data['achternaam']; ?>">
            <span class="text-danger"><?php echo $data['achternaamError']; ?></span>
        </div>
        <div class="form-group">
            <label for="geboortedatum" class="form-label">Geboortedatum: <sup>*</sup></label>
            <input type="date" name="geboortedatum" class="form-control form-input form-input-width-350" value="<?php echo $data['geboortedatum']; ?>">
            <span class="text-danger"><?php echo $data['geboortedatumError']; ?></span>
        </div>
        <div class="form-group">
            <label for="paspoortgegevens" class="form-label">Paspoortgegevens:</label>
            <input type="text" name="paspoortgegevens" class="form-control form-input form-input-width-350" value="<?php echo $data['paspoortgegevens']; ?>">
        </div>
        <div class="form-group">
            <label for="gebruikersnaam" class="form-label">Gebruikersnaam: <sup>*</sup></label>
            <input type="text" name="gebruikersnaam" class="form-control form-input form-input-width-350" value="<?php echo $data['gebruikersnaam']; ?>">
            <span class="text-danger"><?php echo $data['gebruikersnaamError']; ?></span>
        </div>
        <div class="form-group">
            <label for="wachtwoord" class="form-label">Wachtwoord: <sup>*</sup></label>
            <input type="password" name="wachtwoord" class="form-control form-input form-input-width-350" value="<?php echo $data['wachtwoord']; ?>">
            <span class="text-danger"><?php echo $data['wachtwoordError']; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" value="Registreren" class="btn btn-primary">
        </div>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>