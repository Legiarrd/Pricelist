<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <button class="indexbutton btn btn-dark" onclick="window.location.href='index.php'">Admin Panel</button>
          <button class="indexbutton btn btn-dark" onclick="window.location.href='edit.php'">Einträge bearbeiten</button>
          <button  class="indexbutton btn btn-dark active" onclick="window.location.href='add.php'">Eintrag hinzufügen</button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='../index.php'">Zur Hauptseite</button>
        </div>
      </div>
    </nav>
    <h1 class="display-4">Eintrag hinzufügen</h1>
    <hr>
    <form action="../php/addentry.php" method="post">
      <div class="form-group">
      <label>Artikel
      <input class="form-control" type="text" name="item" minlength="3" required>
    </label>
  </div>
  <div class="form-group">
    <label>Preis
      <input class="form-control" type="text" name="pricetag" required>
    </label>
  </div>
  <div class="form-group">
    <label>Kategorie
      <select class="form-control" name="category" class="adds" required>
        <option value="Lebensmittel">Lebensmittel</option>
        <option value="Getränke">Getränke</option>
      </select>
    </label>
  </div>
  <div class="form-group">
    <label>Markt
      <select name="store" class="form-control" required>
        <option value="Edeka">Edeka</option>
        <option value="Fleischer">Fleischer</option>
        <option value="Bäcker">Bäcker</option>
      </select>
    </label>
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit" name="submit">Senden</button>
  </div>
  </form>
</body>
</html>
