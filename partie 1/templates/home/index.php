<h2>
    Hello <?= $name; ?>
</h2>

<form method="post" action="." >
    <br>
    <h1>Afficher un nom : </h1>
    <br>
    <input name="name" id="name" type="text" placeholder="Nom à afficher" required>
    <input id="name" type="submit" value="Envoyer">
</form>