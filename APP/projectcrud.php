<!doctype html>
<html>
   <head>
        <title>Επεξεργασία Έργων</title>
    </head>
    <body>
         <h1 align="center">Έργα</h1>

         Πρόσθεσε ένα Έργο:

         <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <input type="text" name="budg" placeholder="Προϋπολογισμός">
          <input type="text" name="title" placeholder="Τίτλος">
          <input type="text" name="Summary" placeholder="Περίληψη">
          <input type="text" name="start_date" placeholder="Ημερομηνία έναρξης">
          <input type="text" name="end_date" placeholder="Ημερομηνία λήξης">
          <input type="text" name="grade" placeholder="Βαθμός">
          <input type="text" name="grade_date" placeholder="Ημερομηνία αξιολόγησης">
          <input type="number" name="orgid" placeholder="ID Οργανισμόυ">
          <input type="number" name="proid" placeholder="ID Προγράμματος">
          <input type="number" name="exeid" placeholder="ID Στελέχους">
          <input type="number" name="resid" placeholder="ID Υπεύθηνου">
          <input type="number" name="evaid" placeholder="ID Αξιολογητή">
          <button type="submit" name="submit1">Submit</button>
        </form>
        Ενημέρωσε ένα Έργο:
        <form method="POST">
         <input type="number" name="id" placeholder="ID">
         <input type="text" name="budg" placeholder=" Νέος Προϋπολογισμός">
          <input type="text" name="title" placeholder="Νέο Τίτλος">
          <input type="text" name="Summary" placeholder="Νέα Περίληψη">
          <input type="text" name="start_date" placeholder="Νέα Ημερομηνία έναρξης">
          <input type="text" name="end_date" placeholder="Νέα Ημερομηνία λήξης">
          <input type="text" name="grade" placeholder="Νέος Βαθμός">
          <input type="text" name="grade_date" placeholder="Νέα Ημερομηνία αξιολόγησης">
          <input type="number" name="orgid" placeholder="Νέο ID Οργανισμόυ">
          <input type="number" name="proid" placeholder="Νέο ID Προγράμματος">
          <input type="number" name="exeid" placeholder="Νέο ID Στελέχους">
          <input type="number" name="resid" placeholder="Νέο ID Υπεύθηνου">
          <input type="number" name="evaid" placeholder="Νέο ID Αξιολογητή">
          <button type="submit" name="submit2">Submit</button>
        </form>
        Διέγραψε ένα Έργο:
        <form method="POST">
          <input type="number" name="id" placeholder="ID">
          <button type="submit" name="submit3">Submit</button>
        </form>
        <br/>
        <br/>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Προϋπολογισμός</th>
         <th>Τίτλος</th>
         <th>Περίληψη</th>
         <th>Ημερομηνία έναρξης</th>
         <th>Ημερομηνία λήξης</th>
         <th>Βαθμός</th>
         <th>Ημερομηνία αξιολόγησης</th>
         <th>ID Οργανισμού</th>
         <th>ID Προγράμματος</th>
         <th>ID Στελέχους</th>
         <th>ID Υπεύθηνου</th>
         <th>ID Αξιολογητή</th>
         



        <?php

        $submit1 = $_POST['submit1'];
        $submit2 = $_POST['submit2'];
        $submit3 = $_POST['submit3'];
        $id = $_POST['id'];
        $b = $_POST['budg'];
        $t = $_POST['title'];
        $s = $_POST['Summary'];
        $sd = $_POST['start_date'];
        $ed = $_POST['end_date'];
        $g = $_POST['grade'];
        $gd = $_POST['grade_date'];
        $org = $_POST['orgid'];
        $pro = $_POST['proid'];
        $exe = $_POST['exeid'];
        $res = $_POST['resid'];
        $eva = $_POST['evaid'];

        include 'connection.php';
        $conn = OpenConn();
        $sql = "SELECT * FROM Projects order by Project_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Project_id']?></td>
            <td><?php echo $row['Budget']?></td>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['Summary']?></td>
            <td><?php echo $row['start_date']?></td>
            <td><?php echo $row['end_date']?></td>
            <td><?php echo $row['grade']?></td>
            <td><?php echo $row['grade_date']?></td>
            <td><?php echo $row['Organization_id']?></td>
            <td><?php echo $row['Program_id']?></td>
            <td><?php echo $row['Executive_id']?></td>
            <td><?php echo $row['Responsible_id']?></td>
            <td><?php echo $row['Evaluator_id']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
        <?php

        if(isset($submit1)){

        ?>

        <?php

        

        $sql = "INSERT into Projects (Project_id,Budget,Title,Summary,Projects.start_date,end_date,grade,grade_date,Organization_id,Program_id,Executive_id,Responsible_id, Evaluator_id) values('$id','$b','$t','$s','$sd','$ed','$g','$gd','$org','$pro','$exe','$res','$eva');";
        $res = mysqli_query($conn, $sql);
        if($res){
            echo "aaaaaaaaaaaaaaaa" ;
        }
        echo("Error description: " . mysqli_error($conn));
    
        echo "Προστέθηκε!!!";
        
        ?>
        </table>
        <?php
    }
    if(isset($submit2)){

        ?>

        <?php

        echo "Ενημερώθηκε!";

        $sql = "update Projects set Title = '$t', Budget = '$b',Summary = '$s' , start_date = '$sd', end_date = '$ed' ,Program_id = '$pro', Organization_id = '$org', grade = '$g', grade_date = '$gd', Responsible_id = '$res', Executive_id = '$exe', Evaluator_id = '$eva' where (Project_id = '$id ');";
        $res = mysqli_query($conn, $sql);
        
        ?>
        </table>
        <?php
    }
    if(isset($submit3)){

        ?>

        <?php

        echo "Διεγράφη!";

        $sql = "delete from Projects where Project_id = '$id '";
        $res = mysqli_query($conn, $sql);
        ?>
        </table>
        <?php
    }
    ?>
    </body>
</html>