<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <button  class="indexbutton btn btn-dark active" onclick="window.location.href='add.php'">Eintrag hinzufügen</button>
          <button class="indexbutton btn btn-dark" onclick="window.location.href='index.php'">Zurück</button>
        </div>
      </div>
    </nav>
    <form action="php/addentry.php" method="post">
      <label>Artikel
      <input type="text" name="item" minlength="3" required>
    </label>
    <label>Kategorie
      <select name="category" class="adds" required>
        <option value="Lebensmittel">Lebensmittel</option>
        <option value="Getränke">Getränke</option>
      </select>
    </label>
    <label>Preis
      <input type="text" name="pricetag" required>
    </label>
    <label>Markt
      <select name="store" class="adds" required>
        <option value="Edeka">Edeka</option>
        <option value="Fleischer">Fleischer</option>
        <option value="Bäcker">Bäcker</option>
      </select>
    </label>
    <button type="submit" name="submit">Senden</button>
  </form>
</body>
</html>
