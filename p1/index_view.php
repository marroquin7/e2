<!doctype html>
<html lang='en'>

<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
</head>

<body>
    <h1>DGMD E-2 Project 1</h1>
    <b>Author:</b> Cesar Marroquin
    <h2> Mechanics</h2>
    <ul>
        <li>Player A and Player B randomly “throw” either Rock, Paper or Scissors.</li>
        <li>A tie is declared if both players throw the same move.</li>
        <li>Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.</li>
    </ul>
    <h2> Results </h2>
    <ul>
        <li>Player A threw <b><?php echo $Player_A_Move; ?> </b></li>
        <li>Player B threw <b> <?php echo $Player_B_Move; ?> </b>
        </li>
        <li>Result: <b> <?php echo $result; ?> </b> </li>
    </ul>
</body>

</html>