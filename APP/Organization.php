<!doctype html>
<html>
   <head>
        <title>Οργανισμοί</title>
    </head>
    <body>
         <h1 align="center">Οργανισμοί</h1>

         Δες τα τηλέφωνα του Οργανισμού(ID):

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <button type="submit" name="submit">Δες τα τηλέφωνα</button>
        </form>

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

        $submit = $_POST['submit'];
        $id = $_POST['id'];

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

        if(isset($submit)){

        ?>

        <table border = "1" align="center" style="line-height:25px;">
        <tr>
        <th>Τηλέφωνα του Οργανισμού με ID = <?php  echo $id; ?></th>

        <?php

        $sql = "select phone from OrganizationPhones where Organization_id = '$id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['phone']?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>