<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Προγγραμάτων</title>
    </head>
    <body>
         <h1 align="center">Προγράμματα</h1>

         Πρόσθεσε ένα Πρόγραμμα:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="name" placeholder="Όνομα">
          <input type="text" name="sector" placeholder="Διεύθυνση ΕΛΙΔΕΚ">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε ένα Πρόγραμμα:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="name" placeholder=" Νέο Όνομα">
          <input type="text" name="sector" placeholder="Νέα Διεύθυνση ΕΛΙΔΕΚ">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε ένα Πρόγραμμα:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <button type="submit" name="submit3">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>'Ονομα</th>
         <th>Διεύθυνση ΕΛΙΔΕΚ</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $id = $_POST['id'];
        $n = $_POST['name'];
        $s = $_POST['sector'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Program order by Program_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Program_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['sector']?></td>
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

        $sql = "insert into Program(`Program_id`,`name`,`sector`) values('$id', '$n', '$s')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Program set name = '$n' ,sector = '$s' where Program_id = '$id '";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "DELETE from Program where Program_id = '$id '";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>