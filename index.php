<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Vježba</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="m-5 text-center display-4 fw-bold">Calculator</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

                <div class="col-6 offset-4">
                    <input type="number" name="numberOne" id="" class="form-control m-5 optionSel" placeholder="Number One">
                </div>
                <div class="col-6 offset-4">
                    <select name="operator" id="" class="form-select m-5 optionSel">
                        <option class="h1" value="add"><strong>+</strong></option>
                        <option class="h1" value="substract">-<strong></strong></option>
                        <option class="h1" value="multiply">*<strong></strong></option>
                        <option class="h1" value="division">/<strong></strong></option>
                    </select>
                </div>
                <div class="col-6 offset-4">
                    <input type="number" name="numberTwo" id="" class="form-control m-5 optionSel" placeholder="Number Two">
                </div>

                <button name="btnCalc" class="btn btn-info btn-lg col-4 offset-6" type="submit">Calculate</button>
                <br><br><br>
        </div>
    </div>
    </form>
    <div class="container card rounded offset-2" style="text-align: center;font-weight:bold;font-size:2em;border: 3px solid black;">
        <?php
        if (isset($_POST["btnCalc"])) {
            $num1 = filter_input(INPUT_POST, "numberOne", FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, "numberTwo", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            //Error Handling
            $errors = false;
            if (empty($num1) || empty($num2) || empty($operator)) {
                echo "<p>Fill in all fields</p>";
                $errors = true;
            }
            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo "<p>write numbers only</p>";
                $errors = true;
            }
            //Calculate numbers if no errors
            if (!$errors) {
                $value = 0;
                switch ($operator) {
                    case "add":
                        $value = $num1 + $num2;
                        break;

                    case "substract":
                        $value = $num1 - $num2;
                        break;
                    case "multiply":
                        $value = $num1 * $num2;
                        break;
                    case "divide":
                        $value = $num1 / $num2;
                        break;
                    default:
                        echo "<p>Something went wrong</p>";
                }
                echo "<p class='calc-results'>Result= " . $value . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>