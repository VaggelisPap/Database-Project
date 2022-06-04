<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Ερευνητών και των Έργων που δουλεύουν</title>
    </head>
    <body>
         <h1 align="center">ID Ερευνητών και Έργων</h1>

         Πρόσθεσε ένα ζέυγος ερευνητή/έργου:

         <form method="POST">
          <input type="number" name="idr" placeholder="ID Ερευνητή">
          <input type="number" name="idp" placeholder="ID Έργου">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Διέγραψε ένα ζέυγος ερευνητή/έργου:
        <form method="POST">
          <input type="number" name="idr" placeholder="ID Ερευνητή">
          <input type="number" name="idp" placeholder="ID Έργου">
          <button type="submit" name="submit2">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID Ερευνητή</th>
         <th>ID Έργου</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $idr = $_POST['idr'];
        $idp = $_POST['idp'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Researcher_works_on_Projects order by Project_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
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

        $sql = "insert into Researcher_works_on_Projects values('$idr','$idp')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from Researcher_works_on_Projects where Project_id = '$idp' and Researcher_id = '$idr'";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>