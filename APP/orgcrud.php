<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Οργανισμών</title>
    </head>
    <body>
         <h1 align="center">Οργανισμοί</h1>

         Πρόσθεσε έναν οργανισμό:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="name" placeholder="Όνομα">
          <input type="text" name="sname" placeholder="Συντομογραφία">
          <input type="text" name="tk" placeholder="ΤΚ">
          <input type="text" name="str" placeholder="Διεύθυνση">
          <input type="text" name="city" placeholder="Πόλη">
          <input type="text" name="type" placeholder="Τύπος">
          <input type="text" name="budg" placeholder="Προϋπολογισμός">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε έναν Οργανισμό:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="name" placeholder=" Νέο Όνομα">
          <input type="text" name="sname" placeholder="Νέα Συντομογραφία">
          <input type="text" name="tk" placeholder="Νέος ΤΚ">
          <input type="text" name="str" placeholder="Νέα Διεύθυνση">
          <input type="text" name="city" placeholder="Νέα Πόλη">
          <input type="text" name="type" placeholder="Νέος Τύπος">
          <input type="text" name="budg" placeholder=" Νέος Προϋπολογισμός">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε έναν Οργανισμό:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <button type="submit" name="submit3">Submit</button>
        </form>
        Πρόσθεσε τηλέφωνο:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="number" name="thl" placeholder="Τηλέφωνο">
          <button type="submit" name="submit4">Submit</button>
        </form>
        Διέγραψε τηλέφωνο:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="number" name="thl" placeholder="Τηλέφωνο">
          <button type="submit" name="submit5">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>'Ονομα</th>
         <th>Συντομογραφία</th>
         <th>ΤΚ</th>
         <th>Διεύθυνση</th>
         <th>Πόλη</th>
         <th>Τύπος</th>
         <th>Προυπολογισμός</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $submit4 = $_POST['submit4'];
        $submit5 = $_POST['submit5'];
        $id = $_POST['id'];
        $n = $_POST['name'];
        $sn = $_POST['sname'];
        $str = $_POST['str'];
        $tk = $_POST['tk'];
        $city = $_POST['city'];
        $tp = $_POST['type'];
        $b = $_POST['budg'];
        $thl = $_POST['thl'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Organization order by Organization_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Organization_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['sort_name']?></td>
            <td><?php echo $row['TK']?></td>
            <td><?php echo $row['street']?></td>
            <td><?php echo $row['city']?></td>
            <td><?php echo $row['Type']?></td>
            <td><?php echo $row['Budget'] . "€"?></td>
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

        $sql = "insert into Organization (`Organization_id`,`name`,`sort_name`,`TK`,`street`,`city`,`Type`,`Budget`) values('$id', '$n', '$sn', '$tk', '$str', '$city', '$tp', '$b')";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Organization set name = '$n' ,sort_name = '$sn', TK = '$tk' , street = '$str', city = '$city', Type = '$tp', Budget = '$b' where Organization_id = '$id '";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from Organization where Organization_id = '$id '";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    if(isset($submit5)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from OrganizationPhones where Organization_id = '$id' and phone = '$thl'";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    if(isset($submit4)){

        ?>

        <?php

        echo "Προστέθηκε!";

        $sql = "insert into OrganizationPhones values('$thl','$id')";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>