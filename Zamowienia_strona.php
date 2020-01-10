<html>

  <head>
    <title>Dział IT - Zamówienia</title>

    <!-- ŁADOWANIE BOOTSTRAP -->
    <link rel="stylesheet" href="bt4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- END ŁADOWANIE BOOTSTRAP -->

  </head>

  <body style="font-size:16px">

    <!-- PASEK NAWIGACJI -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">EKOCHEM-IT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="http://localhost/add_form.php">Dodaj Zamówienie</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!-- END PASEK NAWIGACJI -->

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover">
        <caption>Zamówienia</caption>
        <thead class="thead-dark">
          <tr>
          <th>id
          <th>Opis
          <th>Dostawca
          <th>Numer zam. dost.
          <th>Data Zamówienia
          <th>Status
          <th>Data Dostawy
          <th>Status Faktury
          <th>Nr Faktury
          <th>Komentarz
          <th>Edytuj
        	</tr>
        </thead>
    <!-- END NAGŁÓWEK TABELI -->

        <?php
          	/* config pod PDO i OOP */
          define('DB_SERVER', 'localhost\SQLEXPRESS');
          define('DB_USERNAME', 'Rysiu');
          define('DB_PASSWORD', '@sql^local1249');
          define('DB_NAME', 'Rejestr_Zakupow');
          try {
              $pdo = new PDO("sqlsrv:Server=" . DB_SERVER . ";Database=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
              // Set the PDO error mode to exception
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              die("ERROR: Could not connect. " . $e->getMessage());
          }
            $sql = "select * from Zamowienie order by DataZamowienia";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute()) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print "<tr>";
               print "  <td>" . $row["Id_order"] . "<br>";
               print "  <td>" . $row["Opis"] . "<br>";
            	 print "  <td>" . $row["Dostawca"] . "<br>";
            	 print "  <td>" . $row["NumZamDost"] . "<br>";
            	 print "  <td>" . $row["DataZamowienia"] . "<br>";
            	 print "  <td>" . $row["StatusZam"] . "<br>";
            	 print "  <td>" . $row["DataDost"] . "<br>";  
            	 print "  <td>" . $row["StatusFaktury"] . "<br>";
            	 print "  <td>" . $row["NrFaktury"] . "<br>";
            	 print "  <td>" . $row["Komentarz"] . "<br>";
               print " <td><a class='btn btn-outline-dark btn-sm'  href='edit_form.php?Id_order=".$row['Id_order']."'>Edytuj</a><br>";
               print "</tr>";
              }
            	 print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <form>
        <input type="button" value="Dodaj Zamówienie" onclick="window.location.href='http://localhost/add_form.php'" />
      </form> 
    </div>
  </body>
</html>
