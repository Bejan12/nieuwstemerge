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
        text-decoration: none;
        animation: fadeInButton 1.5s ease;
    }

    .btn-secondary:hover {
        background-color: #5121CA;
        border-color: #5121CA;
        transform: scale(1.05);
    }

    .btn-success {
        background-color: #28a745; /* Groene achtergrondkleur */
        color: white; /* Witte tekstkleur */
        padding: 12px 24px;
        font-size: 1.1rem;
        border-radius: 10px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        display: block;
        width: fit-content;
        text-decoration: none;
        animation: fadeInButton 1.5s ease;
    }

    .btn-success:hover {
        background-color: #218838; /* Donkerdere groene kleur bij hover */
        transform: scale(1.05);
    }

    .btn-primary {
        background-color: #007bff; /* Blauwe achtergrondkleur */
        border-color: #007bff;
        color: white; /* Witte tekstkleur */
        padding: 12px 24px;
        font-size: 1.1rem;
        border-radius: 25px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        margin-left: 10px; /* Voeg ruimte toe tussen de knoppen */
        animation: fadeInButton 1.5s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Donkerdere blauwe kleur bij hover */
        transform: scale(1.05);
    }

    /* Filter sectie stijlen */
    .filter-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        animation: fadeInButton 1.5s ease;
    }

    .filter-section {
        display: flex;
        gap: 10px; /* Voeg ruimte toe tussen de select elementen */
    }

    .filter-section select {
        padding: 8px; /* Maak de select elementen wat kleiner */
        font-size: 1rem;
        border-radius: 25px;
        border: 1px solid #dee2e6;
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

    @keyframes fadeInButton {
        from {
            opacity: 0;
            transform: translateY(10px);
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
</style>
<div class="container">
    <div class="row mt-3">
        <div class="col-12 text-center">
            <h3 class="mb-4"><?php echo $data['title']; ?></h3>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 text-right d-flex justify-content-end align-items-center">
            <a href="#" class="btn btn-success mr-2">Reis Toevoegen</a>
            <form action="<?php echo URLROOT; ?>/reizen/index" method="GET" class="form-inline d-inline-block">
                <div class="filter-section">
                    <div class="input-group mb-3">
                        <select name="bestemming" class="form-control">
                            <option value="">Selecteer bestemming</option>
                            <?php if (empty($data['bestemmingen'])) : ?>
                                <option value="">Geen bestemmingen gevonden</option>
                            <?php else : ?>
                                <?php foreach ($data['bestemmingen'] as $bestemming) : ?>
                                    <option value="<?php echo $bestemming->Land; ?>" <?php echo $data['bestemming'] == $bestemming->Land ? 'selected' : ''; ?>>
                                        <?php echo $bestemming->Land . ' - ' . $bestemming->Luchthaven; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select name="vertrekdatum" class="form-control">
                            <option value="">Selecteer vertrekdatum</option>
                            <?php if (empty($data['vertrekdatums'])) : ?>
                                <option value="">Geen vertrekdatums gevonden</option>
                            <?php else : ?>
                                <?php foreach ($data['vertrekdatums'] as $datum) : ?>
                                    <option value="<?php echo $datum->Vertrekdatum; ?>" <?php echo $data['vertrekdatum'] == $datum->Vertrekdatum ? 'selected' : ''; ?>>
                                        <?php echo $datum->Vertrekdatum; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Zoeken</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Vluchtnummer</th>
                        <th>Vertrekdatum</th>
                        <th>Vertrektijd</th>
                        <th>Aankomstdatum</th>
                        <th>Aankomsttijd</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['reizen'])) : ?>
                        <tr>
                            <td colspan="6" class="text-center">Geen reizen beschikbaar</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['reizen'] as $reis) : ?>
                            <tr>
                                <td><?php echo $reis->Vluchtnummer; ?></td>
                                <td><?php echo $reis->Vertrekdatum; ?></td>
                                <td><?php echo $reis->Vertrektijd; ?></td>
                                <td><?php echo $reis->Aankomstdatum; ?></td>
                                <td><?php echo $reis->Aankomsttijd; ?></td>
                                <td>
                                    <a href="#"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-left">
            <a href="<?php echo URLROOT; ?>/overzichten/index" class="btn btn-secondary">Terug naar het Dashboard</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>