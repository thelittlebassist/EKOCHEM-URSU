<html>
  <head>
    <title>Nowe zamówienie</title>
        <!-- ŁADOWANIE BOOTSTRAP -->
        <link rel="stylesheet" href="bt4/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- END ŁADOWANIE BOOTSTRAP -->
  </head>
  <body>
    <form action="save.php" name="frmAdd" method="post">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <tr>
          <th width="120">Opis</th>
          <td width="238"><input type="text" name="Opis" size="100"></td>
          </tr>
        <tr>
          <th width="120">Dostawca</th> 
          <td><input type="text" name="Dostawca" size="100"></td>
          </tr>
        <tr>
          <th width="120">Numer Zamówienia Dostawcy</th>
          <td><input type="text" name="NumZamDost" size="100"></td>
          </tr>
        <tr>
          <th width="120">Data Zamówienia</th>
          <td><input type="text" name="DataZamowienia" size="10"></td>
          </tr>
        <tr>
          <th width="120">Status Zamówienia</th>
          <td><input type="text" name="StatusZam" size="100"></td>
          </tr>
        <tr>
          <th width="120">Data Dostawy</th>
          <td><input type="text" name="DataDost" size="10"></td>
          </tr>
          <tr>
          <th width="120">Status Faktury</th>
          <td><input type="text" name="StatusFaktury" size="100"></td>
          </tr>
          <tr>
          <th width="120">Nr Faktury</th>
          <td><input type="text" name="NrFaktury" size="15"></td>
          </tr>
          <tr>
          <th width="120">Komentarz</th>
          <td><input type="text" name="Komentarz" size="100"></td>
          </tr>
          <tr>
        </table>
      <input type="submit" name="submit" value="submit">
    </form>
    <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/Zamowienia_strona.php'" />
      </form> 
  </body>
</html>
