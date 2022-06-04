<!doctype html>
<html>
   <head>
        <title>Ερευνητές ανά έργο</title>
    </head>
    <body>
         <h1 align="center">Ερευνητές ανά έργο</h1>
         Επέλεξε έργο:
         <form method="POST">
          <input type="text" name="title" placeholder="Τίτλος Έργου">
          <button type="submit" name="submit">Δες τους ερευνητές</button>
        </form>


         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επώνυμο</th>
         


         <?php

         include 'connection.php';
         $conn = OpenConn();

         $submit=$_POST['submit'];
         $title=$_POST['title'];

        if(isset($submit)){

        echo "Ερευνητές του Έργου: " . $title ;

        $sql = "SELECT Researcher_id, first_name, last_name FROM  ResProj WHERE Title LIKE '$title'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
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