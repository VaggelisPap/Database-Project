<!doctype html>
<html>
   <head>
        <title>Επεξεργασία πεδίων</title>
    </head>
    <body>
         <h1 align="center">Πεδία</h1>

         Πρόσθεσε ένα πεδίο:

         <form method="POST">
          <input type="number" name="idr" placeholder="ID Πεδίου">
          <input type="textr" name="idp" placeholder="Όνομα">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Διέγραψε ένα ζέυγος πεδίου/έργου:
        <form method="POST">
          <input type="number" name="idr" placeholder="ID Πεδίου">
          <input type="text" name="idp" placeholder="Όνομα">
          <button type="submit" name="submit2">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID Πεδίου</th>
         <th>Όνομα Πεδίου</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $idr = $_POST['idr'];
        $idp = $_POST['idp'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Field order by Field_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Field_id']?></td>
            <td><?php echo $row['name']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
        <?php

        if(isset($submit1)){

        ?>

        <?php

        echo "Προστέθηκε!";

        $sql = "INSERT into Field values('$idr','$idp')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "DELETE from Field where name = '$idp' and Field_id = '$idr'";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>