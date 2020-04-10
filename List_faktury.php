<html>

  <head>
    <title>Dział IT - Faktury</title>
      <?php include('core/bootstrap.php');?>
  </head>

  <body style="font-size:16px">

    <?php
            include('core/navbar.php');
            include('core/config.php');
            include('core/css.php');
    ?>

    <div>
    <h3 align="center">Lista Faktur</h3>
    </div>

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
        <thead class="thead-dark">
          <tr>
          <th>id
          <th>Numer
          <th>Dostawca
          <th>Numer Zamówienia
          <th>Data Wystawienia
          <th>Data Dostawy
          <th>Kwota Brutto
          <th>Komentarz
          <th>Opcje
        	</tr>
        </thead>
    <!-- END NAGŁÓWEK TABELI -->

        <?php

            $sql = "select * from Faktury
                    inner join Zamowienie on [Zamowienie].[Id_order]=[Faktury].[Id_order]
                    order by DataWyst;";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute()) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print "<tr>";
               print "  <td>" . $row["id_faktury"] . "<br>";
               print "  <td>" . $row["NumerFakt"] . "<br>";
               print "  <td>" . $row["Dostawca"] . "<br>";
            	 print "  <td>" . $row["Id_order"] . "<br>";
            	 print "  <td>" . $row["DataWyst"] . "<br>";
            	 print "  <td>" . $row["DataDost"] . "<br>";
            	 print "  <td>" . $row["Kwota"] . "<br>";
            	 print "  <td>" . $row["Komentarz"] . "<br>";
               print " <td><a class='btn btn-outline-dark btn-sm'  href='edit_faktury_form.php?id_faktury=".$row['id_faktury']."'>Edytuj</a>
                            <a class='btn btn-outline-dark btn-sm'  href='delete_faktury.php?id_faktury=".$row['id_faktury']."'>Usuń</a><br>";
               print "</tr>";
              }
            	 print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <form>
        <input type="button" value="Dodaj fakturę" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_faktury_form.php'" />
      </form>
    </div>
  </body>
</html>
