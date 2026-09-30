<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Repository/LigueRepository.php';
require_once __DIR__ . '/../src/Repository/ReservationRepository.php';

$ligues = (new LigueRepository())->findAll();
$repository = new ReservationRepository();
$resultats = [];

if (isset($_GET['ligue_id'])) {
    $resultats = $repository->findByLigue((int) $_GET['ligue_id']);
}
$title='Recherche des réservations';
include 'header.php';
?>
<form method="get">
    <select name="ligue_id">
        <?php foreach ($ligues as $ligue): ?>
            <option value="<?= $ligue->id ?>"><?= $ligue->getNom() ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Rechercher</button>
</form>
<?php if (isset($_GET['ligue_id'])): ?>
    <ul>
        <?php foreach ($resultats as $reservation): ?>
            <li><?= $reservation['date_reservation'] ?> : <?= $reservation['heure_debut'] ?> - <?= $reservation['heure_fin'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif;
include 'footer.php';
?>
