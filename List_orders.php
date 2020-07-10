<html>

  <head>
    <title>Dział IT - Zamówienia</title>
      <?php include('core/bootstrap.php');?>
  </head>

  <body style="font-size:16px">

    <?php
            include('core/navbar.php');
            include('core/config.php');
            include('core/css.php');
    ?>

    <div>
    <h3 align="center">Wykaz Zamówień</h3>
    </div>
    <form>
      <input class="btn btn-dark" type="button" value="Dodaj Zamówienie" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_orders_form.php'" />
    </form>

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
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
          <th>Opcje
        	</tr>
        </thead>
    <!-- END NAGŁÓWEK TABELI -->
          <tbody>
            <?php

            $sql = "select
                      	z.Id_order,
                      	z.Opis,
                      	z.Dostawca,
                      	z.NumZamDost,
                      	z.DataZamowienia,
                      	z.StatusZam,
                      	z.DataDost,
                      	z.StatusFaktury,
                      	z.NrFaktury,
                      	z.Komentarz,
                      	f.id_faktury
                    from Zamowienie as z
                    left join Faktury as f on f.NumerFakt = z.NrFaktury
                    order by DataZamowienia";
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
            	 print "  <td><a href='view_faktury.php?id_faktury=".$row['id_faktury']."'>" . $row["NrFaktury"] . "</a><br>";
               //print "  <td>" . $row["NrFaktury"] . "<br>";
            	 print "  <td>" . $row["Komentarz"] . "<br>";
                  $delete="Czy chcesz usunąć?";
               print " <td><a class='btn btn-outline-dark btn-sm'  href='view_orders.php?Id_order=".$row['Id_order']."'>P</a>
                           <a class='btn btn-outline-dark btn-sm'  href='edit_orders_form.php?Id_order=".$row['Id_order']."'>E</a>
                           <a class='btn btn-outline-dark btn-sm'  href='delete_order.php?Id_order=".$row['Id_order']."' onclick=\"return confirm('".$delete."');\">U</a>
                           <a class='btn btn-outline-dark btn-sm'  href='add_faktury_form_fromorder.php?Id_order=".$row['Id_order']."'>F</a>";
               print "</tr>";
              }
            	 print_r($row);
             sqlsrv_close($conn);
             ?>
           </tbody>
      </table>
      <form>
        <input class="btn btn-dark" type="button" value="Dodaj Zamówienie" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_orders_form.php'" />
      </form>
    </div>
  </body>
</html>
