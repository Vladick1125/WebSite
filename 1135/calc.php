
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Calculat0r+</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<form action="" method="post" class="calculate-form">
    <input type="text" name="number1" class="numbers" placeholder="Первое число">
    <select class="operations" name="operation">
        <option value='plus'>+ </option>
        <option value='minus'>- </option>
        <option value="multiply">* </option>
        <option value="divide">/ </option>
    </select>
    <input type="text" name="number2" class="numbers" placeholder="Второе число">

    <input class="submit_form" type="submit" name="submit" value="Получить ответ">
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
<?php
$message='';
if(isset($_POST['submit'])) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
}
if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
    $error_result = 'Не все поля заполнены';
}

else {
    if(!is_numeric($number1) || !is_numeric($number2)) {
        $error_result = "Операнды должны быть числами";
    }
    else
        switch($operation){
            case 'plus':
                $result = $number1 + $number2;
                $message=$number1.'+'.$number2.'='.$result;
                break;
            case 'minus':
                $result = $number1 - $number2;
                $message=$number1.'-'.$number2.'='.$result;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                $message=$number1.'*'.$number2.'='.$result;
                break;
            case 'divide':
                if( $number2 == '0')
                    $error_result = "На ноль делить нельзя!";
                else
                    $result = $number1 / $number2;
                $message=$number1.'/'.$number2.'='.$result;
                break;
        }
}
if(isset($error_result)) {
    echo "Ошибка: $error_result";
}
else {
    echo $message;
}
