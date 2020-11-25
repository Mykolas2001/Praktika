<?php
include_once("config.php");
 

$result = mysqli_query($mysqli, "SELECT * FROM emp");
?>
 
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<head>    
    <title>Pagrindinis</title>
    <style type="text/css">
        .odd{
            background-color: lightgrey;
        }
        .even{
            background-color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="add.html">Naujas Darbuotojas<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
 

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <td>ID</td>
            <td>Vardas</td>
            <td>Atlyginimas</td>
            <td>Veiksmai</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        while($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td scope='row'>".$res['empno']."</td>";
            echo "<td>".$res['empname']."</td>";
            echo "<td>".$res['sal']."</td>";
            echo "<td><a href=\"update.php?id=$res[empno]\">Redaguoti</a> | <a href=\"delete.php?id=$res[empno]\" onClick=\"return confirm('Ar tikrai norite ištrinti šį darbuotoja?')\">Ištrinti</a></td>";
            echo "</tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>
