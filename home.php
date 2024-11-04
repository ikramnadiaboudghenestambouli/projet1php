<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap">
    <style>
        body{
            background-color:whitesmoke;
            font-family:"Tajawal","sans-sarif";

        }
        #mother{
            width: 100%;
            font-size:20px;

        }
        main{
            float:left;
            border:1px solid gray;
            padding:5px;

        }
        input{
            padding:4px;
            border:2px solid black;
            text-align:center;
            font-size:17px;
            font-family:"Tajawal","sans-sarif";

        }
        aside{
             text-align:center;
             width:300px;
             float:right;
             border:1px solid black;
             padding:10px;
             font-size:20px;
             background-color:silver;
             color:white;
        }
        /* Style pour les labels */
aside label {
    font-size: 18px;
    color: #333333;
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: left;
    font-weight: bold;
}

/* Style pour les champs input */
aside input {
    width: 100%;
    padding: 8px;
    border: 2px solid #666;
    border-radius: 4px;
    font-size: 16px;
    font-family: "Tajawal", "sans-serif";
    margin-bottom: 10px;
    box-sizing: border-box;
}

/* Ajout de style pour l'état de focus */
aside input:focus {
    border-color: #333333;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

        #tab1{
            width:1400px;
            font-size:20px
            
        }
        #tab1 th{
         background-color:silver;
         color:black;
         font-size:20px;
         padding:10px;

        }
        aside button{
            width:190px;
            padding:8px;
            margin-top:7px;
            font-size: 17px;
            font-family:"Tajawal","sans-sarif";
            font-weight:bold;
        }
    </style>
</head>
<body dir='rtl'>
    <?php
    #connecter avec base de donnee 
    $host='localhost';
    $user='root';
    $pass='';
    $db='students';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con,"select * from student");
    #button variable
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value( '$id','$name','$address')";
        mysli_query($con,$sqls);
        header("location:home.php");
    }
    if(isset($_POST['del'])){
        $sqls = "delete from student where name='$name'";
        mysqli_query($con, $sqls);
        header("location:home.php");
    }
    ?>
    <div id='mother'>
      <form method='POST'>
        
         <aside>
            <div id='div'>
                <img src="https://th.bing.com/th/id/OIP._Fs_-LhY_V_O3_o3gA-QngHaHa?w=206&h=206&c=7&r=0&o=5&dpr=1.5&pid=1.7" alt="logo de site" width="200px">
                <h3>tableau de directeur</h3>
                <label for=""> numero d'etudiant</label><br>
                <input type="text" name='id' id='id'>
                <label for="">nom d'etudiant</label>
                <input type="text" name="name" id="name">
                <label for="">address d'etudiant</label>
                <input type="text" name='address' id='address'>
                <br><br>
                <button name="add"> ajouter etudiant</button>
                <button name="del"> supprimer  etudiant</button>
            </div>
         </aside>
         <main>
            <table id="tab1">
              <tr>
                <th> id d'etudiant</th>
                <th>nom d'etudiant</th>
                <th>address d'etudiant</th>
              </tr>
              <?php
              while($row =mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['name']."</td>";
                echo"<td>".$row['address']."</td>";
                echo"</tr>";

              }
              ?>
            </table>
         </main>
      </form>
    </div>
</body>
</html>