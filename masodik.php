<?php
//if ($_SERVER["REQUEST_METHOD"] != "POST") {
//    http_response_code(405);
//    die("Hiba találat!");  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "SelectInsert.php";

    $errors = [];
    $database = new SelectInsert();
} else {
    http_response_code(405);
    die("Hiba találat!");
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felvétel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style >
    .container{
        background-color: rgba(200,200,200,0.6); 
    }      
    </style>

</head>

<body class="bg-success">

<?php

    //require_once "SelectInsert.php";     //

    //$errors = [];                      //
    //$databade = new SelectInsert();   //

    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $errors[] = "Az állat nevének megadása kötelező";
    }
    if (!isset($_POST["kind_of"]) || empty($_POST["kind_of"])) {
        $errors[] = "Az állat fajtájának megadása kötelező";
    }
    if (!isset($_POST["gender"]) || empty($_POST["gender"])) {
        $errors[] = "A nem megadása kötelező";
    }
    if (!isset($_POST["born"]) || empty($_POST["born"])) {
        $errors[] = "Születési dátum megadása kötelező";
    }
    if (!isset($_POST["age"]) || empty($_POST["age"])) {
        $errors[] = "A kor megadása kötelező";
    }
    if (!isset($_POST["meat_eating"]) || empty($_POST["meat_eating"])) {
        $errors[] = "A táplélék fajtájának megadása kötelező";
    }
    //var_dump($errors);

    if (empty($errors)) {
        //require_once "SelectInsert.php";            //
        //$database = new SelectInsert();            //
        
        if ($database->checkNameExist($_POST['name'])) {
            $errors[] = "Az állat neve már szerepel a listában";
        }
        if (empty($errors)) {
           $database->insert($_POST);
        }
    } 

?>

<!-- ***************************************************************** -->

    <div class="container">
        <br>
    </div>

<?php 
include "navigacio.php"
?>
        
    <div class="container">
        <div class="row align-items-center">    
            <div class="col-sm-12 align-self-center">
                <br>
                <img src="./images/allatok.jpg" class="mx-auto d-block mb-3" alt="rajzállatok">
            </div>
        </div>
        <div class="row">         
            <div class="col-sm-12">
                <h1 class="text-center">Felvétel</h1> 
            </div>
        </div>
    </div>    


    <main class="container">
        <form action="masodik.php" method="Post">  <!-- ///////////// -->
            <div class="mb-2">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="kind_of" class="form-label">kind_of</label>
                <input type="text" name="kind_of" id="kind_of" class="form-control" required>
            </div>
            <div class="mb-2"> 
                <label for="terms" class="form-label">gender</label>
                <!-- label for="terms" ???   -->
                <!--  -->
                <select name="gender" id="gender" class="form-select" required>
                    <option selected>Open this select menu</option>    
                    <option value="male">male</option>  
                    <option value="famale">famale</option>
                    <option value="neutered">neutered</option>
                </select>    
            </div>           
            <div class="mb-2">
                <label for="born" class="form-label">born</label>
                <input type="date" name="born" id="born" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="age" class="form-label">age</label>
                <input type="text" name="age" id="age" class="form-control" required>
            </div>
            <div class="mb-2"> 
                <label for="term" class="form-label">meat_eating</label>
                <select name="meat_eating" id="meat_eating" class="form-select" required>
                    <option selected>Open this select menu</option>    
                    <option value="yes">yes</option>  
                    <option value="no">no</option>
                </select>    
            </div>

            <button type="submit" class="btn btn-success">Elküld</button>
            <br>
            <br>
        </form>

    

    </main>

</body>
</html>