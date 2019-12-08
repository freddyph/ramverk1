<?php
namespace Anax\ipgeo;

?>
<title>Lokalisera IP</title>
<h1>Lokalisering av IP</h1>
<h2>Skriv in IP nedan:</h2>
<form method="post">
<p>Fyll i en IP adress för att kontrollera om den är giltig samt vilken domän den tillhör. </p>
        <label for="ip_adress">IP Address: </label>
        <input type="text" name="ip_adress" placeholder="Ange IP Address" >
        <input type="submit" value="Validera">
</form>
<form method="post">
<p>För att få JSON-format fyll i nedan. </p>
        <label for="json_adress">IP Address: </label>
        <input type="text" name="json_adress" value="<?= $userIP ?>">
        <input type="submit" value="Validera">
</form>
<p>För att använda API-json använd geojson/api?json_adress=(ip-adress att testa).</p>
<h2>Testroutes:</h2>
<p><a href="http://www.student.bth.se/~anau17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geojson/api?json_adress=8.8.8.8"/>ip 8.8.8.8</a>
<p><a href="http://www.student.bth.se/~anau17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geojson/api?json_adress=2001:0db8:85a3:0000:0000:8a2e:0370:7334"/>ip 2001:0db8:85a3:0000:0000:8a2e:0370:7334</a>
