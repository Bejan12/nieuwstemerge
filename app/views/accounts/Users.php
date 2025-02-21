<style>
    /* Algemene stijlen */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        width: 100%;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #6A00FF;
        font-weight: bold;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 20px;
        position: relative;
        animation: fadeInDown 1s ease;
    }

    h3::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #5121CA;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* Tabel stijlen */
    .table {
        width: 80%;
        margin: 0 auto 20px;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 1s ease;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #6A00FF;
        color: white;
        font-weight: bold;
    }

    .table tbody tr {
        transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(106, 0, 255, 0.1);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Knop stijlen */
    .btn-secondary {
        background-color: #6A00FF;
        border-color: #6A00FF;
        color: white;
        padding: 12px 24px;
        font-size: 1.1rem;
        border-radius: 25px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        display: block;
        width: fit-content;
        margin: 20px auto 0;
        animation: pulse 2s infinite;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #5121CA;
        border-color: #5121CA;
        transform: scale(1.05);
    }

    /* Animaties */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table tbody tr {
        animation: fadeIn 0.5s ease forwards;
    }

    .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(5) { animation-delay: 0.5s; }

    /* Stijlen voor geen accounts melding */
    .no-accounts {
        text-align: center;
        font-size: 1.5rem;
        color: #ff0000;
        margin-top: 20px;
    }

    .no-accounts .cross {
        font-size: 5rem;
        color: #ff0000;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <?php if (!empty($data['users'])) : ?>
    <div class="row mt-3">
        <div class="col-12 text-center">
            <h3 class="mb-4"><?php echo $data['title']; ?></h3>
        </div>
    </div>
    <?php endif; ?>
    <div class="row mb-4">
        <?php if (empty($data['users'])) : ?>
            <div class="col-12 text-center no-accounts">
                <div class="cross">✖</div>
                <p>Er zijn nog geen accounts geregistreerd, probeer het later opnieuw.</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '<?php echo URLROOT; ?>/overzichten/index';
                    }, 5000);
                </script>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!empty($data['users'])) : ?>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gebruikersnaam</th>
                        <th>Wachtwoord</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['users'] as $user) : ?>
                        <tr>
                            <td><?php echo $user->Gebruikersnaam; ?></td>
                            <td><?php echo $user->Wachtwoord; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
    <?php if (!empty($data['users'])) : ?>
    <div class="row mt-4">
        <div class="col-12 text-left">
            <a href="<?php echo URLROOT; ?>/overzichten/index" class="btn btn-secondary">Terug naar het Dashboard</a>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>