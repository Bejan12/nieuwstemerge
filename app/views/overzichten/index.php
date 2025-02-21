<!-- Voor het centreren van de container gebruiken we het boorstrap grid -->
<div class="container">
    <div class="row mt-3">

        <div class="col-2"></div>

        <div class="col-8">

            <h3><?php echo $data['title']; ?></h3>
            <a href="<?php echo URLROOT; ?>/reizen/index" class="overzichtknoppen">Overzicht Reizen</a>
            <a href="<?= URLROOT; ?>/accounts/users" class="overzichtknoppen">Overzicht accounts!</a>
            <a href="<?= URLROOT; ?>/klant/index" class="overzichtknoppen">Overzicht Klanten</a>

        </div>
        
        <div class="col-2"></div>
        
    </div>

</div>

<style>

@import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Ultra&display=swap');
    body {
        background-color: #F5EEFE;
    }

    .container {
        margin-top: 50px;
        text-align: center;
    }

    h3 {
        font-family: 'Instrument Sans', sans-serif;
        font-weight: bold;
        font-size: 50px;
        color: #6A00FF;
        margin-bottom: 30px;
    }

    .overzichtknoppen {
        display: inline-block;
        background-color: #6A00FF;
        border-color: #6A00FF;
        color: white;
        font-family: 'Instrument Sans', sans-serif;
        font-weight: bold;
        font-size: 18px;
        padding: 15px 30px;
        margin: 10px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
    }

    .overzichtknoppen:hover {
        background-color: #5121CA;
        border-color: #5121CA;
        transform: scale(1.05);
    }
</style>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>