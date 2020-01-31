<html>
  <head>
    <title>Nowe zamówienie</title>
      <?php include('core/bootstrap.php');?>
  </head>
  <body>
    <form action="add_orders_save.php" name="frmAdd" method="post">
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
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/List_orders.php'" />
      </form> 
  </body>
</html>
