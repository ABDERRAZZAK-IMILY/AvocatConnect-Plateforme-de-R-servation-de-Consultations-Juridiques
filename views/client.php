<?php
session_start();
include 'db_connect.php';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - AvocatConnect</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <h1>AvocatConnect</h1>
        </nav>
    </header>
<?php
$stmt = $query->query("SELECT * FROM user WHERE role = 'avocat'");
$avocats = $stmt->fetch();
echo $avocats;
?>

<section class="avocat-list">
    <h2>Liste des Avocats</h2>
    <div class="avocat-grid">
        <?php foreach ($avocats as $avocat): ?>
            <div class="lawyer-card">
                <h3><?php echo htmlspecialchars($avocat['nom'] . ' ' . $avocat['prenom']); ?></h3>
                <p>Spécialité: <?php echo htmlspecialchars($avocat['specialite']); ?></p>
                <p>Email: <?php echo htmlspecialchars($avocat['email']); ?></p>
                <a href="book-consultation.php?avocat_id=<?php echo $avocat['id']; ?>" class="btn">Prendre RDV</a>
            </div>
        <?php endforeach; ?>
        <button>reserve</button>
    </div>
</section>

<style>
    .lawyers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
    }
    .lawyer-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background: #2c3e50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 10px;
    }
</style>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const reserveButtons = document.querySelectorAll('.btn');
    
    reserveButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const modal = document.createElement('div');
            modal.classList.add('modal');
            modal.innerHTML = `
                <div class="modal-content">
                    <h3>Réserver une consultation</h3>
                    <input type="date" id="consultation-date" min="${new Date().toISOString().split('T')[0]}">
                    <input type="time" id="consultation-time">
                    <button id="confirm-reservation">Confirmer</button>
                    <button id="cancel-reservation">Annuler</button>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            const avocatId = this.getAttribute('href').split('=')[1];
            
            document.getElementById('confirm-reservation').addEventListener('click', function() {
                const date = document.getElementById('consultation-date').value;
                const time = document.getElementById('consultation-time').value;
                
                if (!date || !time) {
                    alert('Veuillez sélectionner une date et une heure');
                    return;
                }
                
                fetch('avocat.php', {
                    method: 'POST',
                    
                })
                .then(response => response.json())
                .then(data => {
                    alert('Réservation effectuée avec succès!');
                    modal.remove();
                })
                .catch(error => {
                    alert('Erreur lors de la réservation');
                });
            });
            
            document.getElementById('cancel-reservation').addEventListener('click', function() {
                modal.remove();
            });
        });
    });
});
</script>

<style>
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.modal-content input {
    padding: 8px;
}

.modal-content button {
    padding: 10px;
    cursor: pointer;
}
</style>