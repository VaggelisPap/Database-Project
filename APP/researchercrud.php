<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Ερευνητών</title>
    </head>
    <body>
         <h1 align="center">Ερευνητές</h1>

         Πρόσθεσε έναν Ερευνητή:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="first_name" placeholder="Όνομα">
          <input type="text" name="last_name" placeholder="Επίθετο">
          <input type="text" name="date_of_birth" placeholder="Ημερομηνία γέννησης">
          <input type="text" name="sex" placeholder="Φύλο">
          <input type="text" name="org" placeholder="ID Οργανισμού">
          <input type="text" name="wdate" placeholder="Ημερομηνία ένταξης">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε έναν Ερευνητή:
        <form method="POST">
        <input type="number" name="id" placeholder="ID">
          <input type="text" name="first_name" placeholder="Νέο Όνομα">
          <input type="text" name="last_name" placeholder="Νέο Επίθετο">
          <input type="text" name="date_of_birth" placeholder="Νέα Ημερομηνία γέννησης">
          <input type="text" name="sex" placeholder="Νέο Φύλο">
          <input type="text" name="org" placeholder="Νέο ID Οργανισμού">
          <input type="text" name="wdate" placeholder="Νέα Ημερομηνία ένταξης">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε έναν Ερευνητή:
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
         <th>Ημερομηνία γέννησης</th>
         <th>Φύλο</th>
         <th>ID Οργανισμού</th>
         <th>Ημερομηνία ένταξης</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $id = $_POST['id'];
        $n = $_POST['first_name'];
        $l = $_POST['last_name'];
        $bd = $_POST['date_of_birth'];
        $s = $_POST['sex'];
        $org = $_POST['org'];
        $wd = $_POST['wdate'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Researcher order by Researcher_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['date_of_birth']?></td>
            <td><?php echo $row['sex']?></td>
            <td><?php echo $row['Organization_id']?></td>
            <td><?php echo $row['work_date']?></td>
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

        $sql = "insert into Researcher(`Researcher_id`,`first_name`,`last_name`,`date_of_birth`,`sex`, `Organization_id`, `work_date`) values('$id', '$n', '$l', '$bd', '$s', '$org', '$wd')";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Researcher set first_name = '$n' ,last_name = '$l' , date_of_birth = '$bd', sex = '$s' , Organization_id = '$org', work_date = '$wd' where Researcher_id = '$id '";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from Researcher where Researcher_id = '$id '";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>