<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Παραδοτέων</title>
    </head>
    <body>
         <h1 align="center">Παραδοτέα</h1>

         Πρόσθεσε ένα Παραδοτέο:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="date" placeholder="Ημερομηνία">
          <input type="text" name="title" placeholder="Τίτλος">
          <input type="text" name="Summary" placeholder="Περίληψη">
          <input type="number" name="idp" placeholder="ID Έργου">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε ένα Παραδοτέο:
        <form method="POST">
        <input type="number" name="id" placeholder="ID">
          <input type="text" name="date" placeholder="Νέα Ημερομηνία">
          <input type="text" name="title" placeholder=" Νέος Τίτλος">
          <input type="text" name="Summary" placeholder="Νέα Περίληψη">
          <input type="number" name="idp" placeholder="Νέο ID Έργου">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε ένα Παραδοτέο:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <button type="submit" name="submit3">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Ημερομηνία</th>
         <th>Τίτλος</th>
         <th>Περίληψη</th>
         <th>ID Έργου</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $id = $_POST['id'];
        $t = $_POST['title'];
        $s = $_POST['Summary'];
        $d = $_POST['date'];
        $idp = $_POST['idp'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Deliverable order by Deliverable_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Deliverable_id']?></td>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['Summary']?></td>
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

        $sql = "insert into Deliverable values('$id', '$d', '$t', '$s', '$idp')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Deliverable set Title = '$t' , Summary = '$s', date = '$d', Project_id = '$idp' where (Deliverable_id = '$id');";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "DELETE from Deliverable where Deliverable_id = '$id'";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>