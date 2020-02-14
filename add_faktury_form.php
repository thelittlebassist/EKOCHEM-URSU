<html>
  <head>
    <title>Nowa faktura</title>
      <?php include('core/bootstrap.php');?>
  </head>
  <body>
    <form action="add_faktury_save.php" name="frmAdd" method="post">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <tr>
          <th width="120">Numer</th>
          <td width="238"><input type="text" name="NumerFakt" size="100"></td>
          </tr>
        <tr>
          <th width="120">Dostawca</th>
          <td><input type="text" name="Dostawca" size="100"></td>
          </tr>
        <tr>
          <th width="120">Numer Zamówienia</th>
          <td><input type="text" name="Id_order" size="100"></td>
          </tr>
        <tr>
          <th width="120">Data Wystawienia</th>
          <td><input type="text" name="DataWyst" size="10"></td>
          </tr>
        <tr>
          <th width="120">Data Dostawy</th>
          <td><input type="text" name="DataDost" size="100"></td>
          </tr>
          <tr>
          <th width="120">Kwota Brutto</th>
          <td><input type="text" name="Kwota" size="100"></td>
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
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_faktury.php'" />
      </form>
  </body>
</html>
