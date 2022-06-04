<!doctype html>
<html>
   <head>
        <title>Έργα του ΕΛΙΔΕΚ </title>
    </head>
    <body>
         <h1 align="center">Έργα του ΕΛΙΔΕΚ</h1>

         Επέλεξε κριτήρια:

         <form method="POST">
          <input type="number" name="duration" placeholder="Διάρκεια Έργου">
          <input type="text" name="date" placeholder="Χρονολογία">
          <input type="text" name="exec" placeholder="Όνομα Στελέχους">
          <button type="submit" name="submit">Δες τα Έργα</button>
        </form>

        <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Προϋπολογισμός</th>
         <th>Τίτλος</th>
         <th>Περίληψη</th>
         <th>Έναρξη</th>
         <th>Λήξη</th> 
         <th>Βαθμός</th>
         <th>Ημερομηνία Αξιολόγησης</th>
         <th>Όνομα Στελέχους</th>
         <th>Έπιθετο Στελέχους</th>

        <?php

       $submit=$_POST['submit'];
       $duration=$_POST['duration'];
       $date=$_POST['date'];
       $exec=$_POST['exec'];

       include 'connection.php';
       $conn = OpenConn();

        if(isset($submit)){
            if($duration!="" and $exec!="" and $date!="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE Projects.duration = $duration and YEAR(Projects.start_date) = $date and (Executive.first_name like '%$exec%' or Executive.last_name like '%$exec%') order by Projects.Project_id";
            else if($duration!="" and $exec!="" and $date =="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE Projects.duration = $duration and (Executive.first_name like '%$exec%' or Executive.last_name like '%$exec%') order by Projects.Project_id";
            else if($duration!="" and $exec=="" and $date!="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE Projects.duration = $duration and YEAR(Projects.start_date) = $date order by Projects.Project_id";
            else if($duration!="" and $exec=="" and $date=="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE Projects.duration = $duration  order by Projects.Project_id";
            else if($duration=="" and $exec!="" and $date!="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE YEAR(Projects.start_date) = $date and (Executive.first_name like '%$exec%' or Executive.last_name like '%$exec%') order by Projects.Project_id";
            else if($duration=="" and $exec!="" and $date=="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE (Executive.first_name like '%$exec%' or Executive.last_name like '%$exec%') order by Projects.Project_id";
            else if($duration=="" and $exec=="" and $date!="")$sql = "SELECT Projects.Project_id, Projects.Title, Projects.Budget, Projects.Summary, Projects.start_date, Projects.end_date, Projects.grade, Projects.grade_date, Executive.first_name, Executive.last_name FROM Projects join Executive ON Projects.Executive_id = Executive.Executive_id WHERE YEAR(Projects.start_date) = $date  order by Projects.Project_id";
            else{
                echo "Καταχώρησε τουλάχιστον ένα κριτήριο!";
            }
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Project_id']?></td>
            <td><?php echo $row['Budget'] . "€"?></td>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['Summary']?></td>
            <td><?php echo $row['start_date']?></td>
            <td><?php echo $row['end_date']?></td>
            <td><?php echo $row['grade']?></td>
            <td><?php echo $row['grade_date']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            </tr>
            <?php
        }
    }
        ?>
        </table>
    </body>
</html>