<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Repository/ReservationRepository.php';

$repository = new ReservationRepository();
$reservations = $repository->findAll();

$title="Réservation de salles";
include 'header.php';
?>
<table border="1" cellpadding="6">
    <tr><th>Date</th><th>Créneau</th><th>Salle</th><th>Ligue</th><th>Action</th></tr>
    <?php foreach ($reservations as $reservation): ?>
        <tr>
            <td><?= $reservation->dateReservation ?></td>
            <td><?= $reservation->getCreneau() ?></td>
            <td><?= $reservation->salle->getNom() ?></td>
            <td><?= $reservation->ligue->getNom() ?></td>
            <td><a href="supprimer-reservation.php?id=<?= $reservation->id ?>">Annuler</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include 'footer.php';