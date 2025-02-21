<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis Overzicht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
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
        }
        h2 {
            color: #0056b3;
            text-align: center;
        }
        input, select, button {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        button {
            background: #0056b3;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #003f7f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #0056b3;
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
    </style>
</head>
<body>

<div id="fullscreen-message" class="fullscreen-alert"></div>

<div class="container">
    <h2>📋 Klantenoverzicht</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Zoek op achternaam..." value="<?= htmlspecialchars($search_lastname) ?>">
        <button type="submit">🔍 Zoeken</button>
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
            <?php foreach ($filtered_customers as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['first_name']) ?></td>
                    <td><?= htmlspecialchars($customer['last_name']) ?></td>
                    <td><?= htmlspecialchars($customer['contact']) ?></td>
                    <td><?= htmlspecialchars($customer['purchase_history']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($search_lastname) && empty($filtered_customers)): ?>
        <script>
            document.getElementById("fullscreen-message").innerText = "❌ Geen klanten gevonden met deze achternaam.";
            document.getElementById("fullscreen-message").style.display = "flex";
            setTimeout(() => { 
                document.getElementById("fullscreen-message").style.display = "none"; 
                window.location.href = '?'; 
            }, 3000);
        </script>
    <?php endif; ?>
</div>
<div class="container">
    <h2>🌍 Bezoekers Filteren op Bestemming</h2>
    <form method="GET">
        <select name="destination">
            <option value="">Selecteer een bestemming...</option>
            <?php foreach ($destinations as $destination): ?>
                <option value="<?= htmlspecialchars($destination) ?>" <?= ($filter_destination == $destination) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($destination) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">📌 Filteren</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Bestemming</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filtered_visitors as $visitor): ?>
                <tr>
                    <td><?= htmlspecialchars($visitor['name']) ?></td>
                    <td><?= htmlspecialchars($visitor['destination']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($filter_destination) && empty($filtered_visitors)): ?>
        <script>
            document.getElementById("fullscreen-message").innerText = "❌ Geen bezoekers gevonden voor <?= htmlspecialchars($filter_destination) ?>.";
            document.getElementById("fullscreen-message").style.display = "flex";
            setTimeout(() => { 
                document.getElementById("fullscreen-message").style.display = "none"; 
                window.location.href = '?'; 
            }, 3000);
        </script>
    <?php endif; ?>
</div>
