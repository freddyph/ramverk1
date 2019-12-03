<?php
namespace Anax\ipchecker;

?>

<?php if ($ip_adress) : ?>
<h1>Resultat av validering</h1>
<div class="ip">
    <p><b>IP du testar är:</b> <?= $ip_adress ?></p>
    <p><b>IP-address är en:</b> <?= $valid ?></p>
    <p><b>Typ av IP-adress är:</b> <?= $result ?></p>
    <p><b>Domän är:</b> <?= $domain ?></p>
</div>
<?php endif; ?>
