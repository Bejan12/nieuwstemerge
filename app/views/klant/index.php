<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten Overzicht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e5f5; /* Lichtpaars */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            color: #6a1b9a; /* Diep paars */
            text-align: center;
            animation: fadeInDown 1s ease-in-out;
        }
        input, select, button {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            animation: fadeIn 1s ease-in-out;
        }
        button {
            background: #8e24aa; /* Paars */
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #6a1b9a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: fadeInUp 1s ease-in-out;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #8e24aa;
            color: white;
        }
        .fullscreen-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            text-align: center;
            display: none;
            z-index: 1000;
        }

        /* Animaties */
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
    </style>
</head>
<body>

<!-- 🔴 Fullscreen meldingen -->
<div id="no-customers-message" class="fullscreen-alert">Geen klanten gevonden met deze achternaam</div>
<div id="no-travel-message" class="fullscreen-alert">Geen reisinformatie gevonden voor deze bestemming</div>

<div class="container">
    <h2>Klantenoverzicht</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Zoek op achternaam..." value="<?= htmlspecialchars($data['search_lastname']) ?>">
        <button type="submit">Zoeken</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Contact</th>
                <th>Aankoopgeschiedenis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['filtered_customers'] as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['first_name']) ?></td>
                    <td><?= htmlspecialchars($customer['last_name']) ?></td>
                    <td><?= htmlspecialchars($customer['contact']) ?></td>
                    <td><?= htmlspecialchars($customer['purchase_history']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h2>Bezoekers & Reizen Filteren op Bestemming</h2>
    <form method="GET">
        <select name="destination" onchange="this.form.submit()">
            <option value="">Selecteer een bestemming...</option>
            <?php foreach ($data['destinations'] as $destination): ?>
                <option value="<?= htmlspecialchars($destination) ?>" <?= ($data['filter_destination'] == $destination) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($destination) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Bestemming</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['filtered_visitors'] as $visitor): ?>
                <tr>
                    <td><?= htmlspecialchars($visitor['name']) ?></td>
                    <td><?= htmlspecialchars($visitor['destination']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    // ✅ Unhappy scenario: Geen klanten gevonden
    <?php if (!empty($data['search_lastname']) && empty($data['filtered_customers'])): ?>
        document.getElementById("no-customers-message").style.display = "flex";
        setTimeout(() => document.getElementById("no-customers-message").style.display = "none", 3000);
    <?php endif; ?>

    // ✅ Unhappy scenario: Geen reisinformatie gevonden
    <?php if ($data['no_travel_info']): ?>
        document.getElementById("no-travel-message").style.display = "flex";
        setTimeout(() => document.getElementById("no-travel-message").style.display = "none", 3000);
    <?php endif; ?>
</script>

</body>
</html>
