<html>
  <head>
    <title>Nowy Dostawca</title>
      <?php include('core/bootstrap.php');?>
  </head>
  <body>
    <form action="Add_supplier_save.php" method="post">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <tr>
          <th width="120">Nazwa</th>
          <td width="238"><input type="text" name="Name" size="100"></td>
          </tr>
        <tr>
          <th width="120">Adres</th>
          <td><input type="text" name="Adres" size="100"></td>
          </tr>
        <tr>
          <th width="120">Mail</th>
          <td><input type="text" name="mail" size="100"></td>
          </tr>
        <tr>
          <th width="120">Strona</th>
          <td><input type="text" name="website" size="100"></td>
          </tr>
        <tr>
        </table>
      <input type="submit" name="submit" value="submit">
    </form>
    <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_suppliers.php'" />
      </form>
  </body>
</html>
