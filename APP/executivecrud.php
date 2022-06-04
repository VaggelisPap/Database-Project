<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Στελεχών</title>
    </head>
    <body>
         <h1 align="center">Στελέχη</h1>

         Πρόσθεσε ένα Στέλεχος:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="first_name" placeholder="Όνομα">
          <input type="text" name="last_name" placeholder="Επίθετο">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε έναν Στέλεχος:
        <form method="POST">
        <input type="number" name="id" placeholder="ID">
          <input type="text" name="first_name" placeholder=" Νέο Όνομα">
          <input type="text" name="last_name" placeholder="Νέο Επίθετο">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε ένα Στέλεχος:
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
         <th>Επίθετο</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $id = $_POST['id'];
        $n = $_POST['first_name'];
        $l = $_POST['last_name'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Executive order by Executive_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Executive_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
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

        $sql = "insert into Executive(`Executive_id`,`first_name`,`last_name`) values('$id', '$n', '$l')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Executive set first_name = '$n' ,last_name = '$l' where Executive_id = '$id '";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from Executive where Executive_id = '$id '";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>