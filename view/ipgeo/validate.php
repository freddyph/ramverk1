<?php
namespace Anax\ipgeo;

?>

<?php if ($ip_adress) : ?>
<h1>Resultat av validering</h1>
<div class="ip">
    <p><b>IP du testar är:</b> <?= $ip_adress ?> (<?= $valid ?>)</p>
    <p><b>Typ av IP-adress är:</b> <?= $result ?></p>
    <p><b>Geografisk pos(Latitud):</b> <?= $lat ?></p>
    <p><b>Geografisk pos(Longitud):</b> <?= $long ?></p>
    <p><b>Ort:</b> <?= $city ?></p>
    <p><b>Land:</b> <?= $country ?></p>
</div>
<?php endif; ?>
