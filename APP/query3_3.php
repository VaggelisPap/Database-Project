<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιά έργα χρηματοδοτούνται σε συγκεκριμένο πεδίο και ποιοι ερευνητές ασχολούνται με αυτό το πεδίο το τελευταίο έτος;</h1>
         <form method="POST">
          <input type="text" name="title" placeholder="Όνομα πεδίου">
          <button type="submit" name="submit">Δες τα Έργα</button>
          <button type="submit" name="submit2">Δες τους ερευνητές</button>
        </form>
        

        
        <?php

        include 'connection.php';
        $conn = OpenConn();

        $submit = $_POST['submit'];
        $submit2 = $_POST['submit2'];
        $field = $_POST['title'];

        if(isset($submit)){

            ?>

        <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>Τίτλος Έργου</th>
         <th>Ημερομηνία έναρξης</th>
         <th>Ημερομηνία λήξης</th>
         <th>Πεδίο</th>

         <?php


        $sql = "select Projects.Title, Projects.start_date, Projects.end_date, Field.name from ((Projects join Projects_has_Field on Projects.Project_id = Projects_has_Field.Project_id) join Field on Field.Field_id = Projects_has_Field.Field_id) where Field.name = '$field' and Projects.end_date > NOW();";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['start_date']?></td>
            <td><?php echo $row['end_date']?></td>
            <td><?php echo $row['name']?></td>
            </tr>
            <?php

            
            
        }
    }

    if(isset($submit2)){


        ?>

         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επίθετο</th>
         <th>Πεδίο</th>
        
        <?php

        $sql = "select Researcher.Researcher_id,Researcher.first_name, Researcher.last_name,Field.name from Researcher join Researcher_works_on_Projects on Researcher.Researcher_id = Researcher_works_on_Projects.Researcher_id join Projects_has_Field on Projects_has_Field.Project_id = Researcher_works_on_Projects.Project_id join Field on Field.Field_id = Projects_has_Field.Field_id WHERE Field.name = '$field';";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['name']?></td>
            </tr>
            <?php

            
            
        }
    }

        ?>
        </table>
    </body>
</html>