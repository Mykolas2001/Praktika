<?php
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $name=$_POST['name'];
    $empid=$_POST['empno'];
    $salary=$_POST['salary'];

    if(empty($name) || empty($empid) || empty($salary)) {
        if(empty($name)) {
            echo "<font color='red'>Laukelis 'Vardas' Tuscias.</font><br/>";
        }

        if(empty($empid)) {
            echo "<font color='red'>Laukelis 'Darbuotojo ID' Tuscias.</font><br/>";
        }

        if(empty($salary)) {
            echo "<font color='red'>Laukelis 'Atlyginimas' Tuscias.</font><br/>";
        }
    } else {
        $result = mysqli_query($mysqli, "UPDATE emp SET empname='$name',sal='$salary' WHERE empno=$id");
        header("Location: index.php");
    }
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM emp WHERE empno=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['empname'];
    $empid = $res['empno'];
    $salary = $res['sal'];
}
?>
<html>
<head>
    <title>Redaguoti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Pagrindinis<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<form action="add.php" method="post" name="form1">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Darbuotojo ID</label>
        <div class="col-sm-10">
            <input type="text" name="empno" value="<?php echo $empid;?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Vardas</label>
        <div class="col-sm-10">
            <input type="text" name="name" value="<?php echo $name;?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Atlyginimas</label>
        <div class="col-sm-10">
            <input type="text" name="salary" value="<?php echo $salary;?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <input class="btn btn-primary" type="submit" name="Submit" value="Redaguoti">
        </div>
    </div>
</form>
</body>
</html>
