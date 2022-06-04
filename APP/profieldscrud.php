<!doctype html>
<html>
   <head>
        <title>Επεξεργασία πεδίων ανά έργο</title>
    </head>
    <body>
         <h1 align="center">ID Πεδίων και Έργων</h1>

         Πρόσθεσε ένα ζέυγος πεδίου/έργου:

         <form method="POST">
          <input type="number" name="idr" placeholder="ID Πεδίου">
          <input type="number" name="idp" placeholder="ID Έργου">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Διέγραψε ένα ζέυγος πεδίου/έργου:
        <form method="POST">
          <input type="number" name="idr" placeholder="ID Πεδίου">
          <input type="number" name="idp" placeholder="ID Έργου">
          <button type="submit" name="submit2">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID Πεδίου</th>
         <th>ID Έργου</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $idr = $_POST['idr'];
        $idp = $_POST['idp'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Projects_has_Field order by Project_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Field_id']?></td>
            <td><?php echo $row['Project_id']?></td>
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

        $sql = "INSERT into Projects_has_Field values('$idp','$idr')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "DELETE from Projects_has_Field where Project_id = '$idp' and Field_id = '$idr'";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>