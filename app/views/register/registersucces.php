<!-- filepath: /c:/Users/brakk/Desktop/SD jaar 2/TravelEasy/app/views/register/registersucces.php -->

<?php require_once APPROOT . '/views/includes/header.php'; ?>

<style>
.success-message {
    color: #6A00FF;
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
    animation: fadeIn 2s ease-in-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.checkmark-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
    flex-direction: column; /* Stack the checkmark and message vertically */
}

.checkmark {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #6A00FF;
    animation: scaleUp 0.5s ease-in-out forwards;
}

.checkmark::before {
    content: '✔';
    color: white;
    font-size: 4rem; /* Make the checkmark larger */
    opacity: 0;
    animation: fadeInCheck 0.5s 0.5s ease-in-out forwards;
}

@keyframes scaleUp {
    0% {
        transform: scale(0);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes fadeInCheck {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>

<div class="checkmark-container">
    <div class="checkmark"></div>
    <div class="success-message">
        U bent succesvol aangemeld
    </div>
</div>

<script>
    
    setTimeout(function() {
        window.location.href = '<?= URLROOT; ?>/thuis';
    }, 4000);
</script>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>