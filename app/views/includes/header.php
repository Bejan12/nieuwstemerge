<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelEasy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/style.css">
    <link rel="shortcut icon" href="<?= URLROOT; ?>/public/img/favicon.ico" type="image/x-icon">
    <style>
      .navbar {
        height: 100px; /* Adjust the height as needed */
        background-color: white; /* Change the navbar color to white */
      }
      .navbar-brand img {
        height: 80px; /* Adjust the logo size as needed */
      }
      .navbar-text {
        position: absolute;
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
      
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= URLROOT; ?>">
          <img src="<?= URLROOT; ?>/public/img/logo.png" alt="TravelEasy Logo" class="d-inline-block align-text-top">
        </a>
        <span class="navbar-text">
          Forget the struggle, just TravelEasy!
        </span>
      </div>
    </nav>
  </body>
</html>