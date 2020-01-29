<html>

  <head>
    <title>Dział IT - Zamówienia</title>
      <?php include('core/bootstrap.php');?>
  </head>

  <body style="font-size:16px">

    <?php
            include('core/navbar.php');
            include('core/config.php');
    ?>

    <div>
    <h3 align="center">Wykaz Zamówień</h3>
    </div>

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover">
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

        <?php
          
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
               print " <td><a class='btn btn-outline-dark btn-sm'  href='edit_form.php?Id_order=".$row['Id_order']."'>Edytuj</a>
                            <a class='btn btn-outline-dark btn-sm'  href='delete_order.php?Id_order=".$row['Id_order']."'>Usuń</a><br>";
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
