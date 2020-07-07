<html>
  <head>
    <title>Nowy pracownik</title>
      <?php include('core/bootstrap.php');?>
  </head>
  <body>
    <?php
        include('core/config.php');
     ?>
    <form action="add_persons_save.php" name="frmAdd" method="post">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <tr>
          <th width="120">Imię</th>
          <td width="238"><input type="text" name="Imię" size="100"></td>
          </tr>
          <tr>
            <th width="120">Nazwisko</th>
            <td><input type="text" name="Nazwisko" size="100"></td>
            </tr>
          <tr>
        <tr>
          <th width="120">Stanowisko</th>
          <td><select name="StanowiskoId">
            <?php
                $sql = "select * from Stanowiska";
                  if ($stmt = $pdo->prepare($sql)) {
                     if ($stmt->execute()) {
                      }
                  }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                  {
                   $stanowiska = $row['Nazwa'];
                   $stan_id = $row['Id'];
                   echo "<option value='$stan_id'>$stanowiska</option>";
                  }
            ?>
          </select></td>
        </tr>
        <tr>
          <th width="120">Aktywny</th>
          <td>
            <input type="hidden" name="Aktywny" value="0">
            <input type="checkbox" name="Aktywny" size="10" value="1" checked="checked">
          </td>
          </tr>
        <tr>
          <th width="120">Mail</th>
          <td><input type="text" name="Mail" size="100"></td>
          </tr>
          <tr>
          <th width="120">Telefon</th>
          <td><input type="text" name="Telefon" size="11"></td>
          </tr>
          <tr>
          <th width="120">Spółka</th>
          <td><select name="SpółkaId">
            <?php
                $sql = "select * from Spolki";
                  if ($stmt = $pdo->prepare($sql)) {
                     if ($stmt->execute()) {
                      }
                  }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                  {
                   $spolki = $row['Nazwa'];
                   $spol_id = $row['Id'];
                   echo "<option value='$spol_id'>$spolki</option>";
                  }
            ?>
          </select></td>
        </tr>
        <tr>
        <th width="120">Dział</th>
        <td><select name="DziałId">
          <?php
              $sql = "select * from Dzialy";
                if ($stmt = $pdo->prepare($sql)) {
                   if ($stmt->execute()) {
                    }
                }
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                {
                 $dzial = $row['Nazwa'];
                 $dzial_id = $row['Id'];
                 echo "<option value='$dzial_id'>$dzial</option>";
                }
          ?>
        </select></td>
      </tr>
      <tr>
        <th width="120">Uwagi</th>
        <td width="238"><input type="text" name="Uwagi" size="100"></td>
        </tr>
        </table>
      <input type="submit" name="submit" value="submit">
    </form>
    <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_persons.php'" />
      </form>
  </body>
</html>
