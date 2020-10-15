<!doctype html>
<html lang='en'>

<head>
    <title>Project 2</title>
    <meta charset='utf-8'>
</head>

<body>
    <h2>DGMD E-2 Project 2</h2>
    <h1>Rock, Paper, Scissors Game Simulator</h1>
    <b>Author:</b> Cesar Marroquin
    <h2> Instructions</h2>
    <ul>
        <li>Select either Rock, Paper or Scissors, and click on "Throw" to play against the computer</li>
        <li>A tie is declared if both players throw the same move.</li>
        <li>Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.</li>
    </ul>
    <form method='GET' action="process.php">
        <input type='radio' name='option' value='Rock' id='Rock'><label for='Rock'>Rock</label>
        <input type='radio' name='option' value='Paper' id='Paper'><label for='Paper'>Paper</label>
        <input type='radio' name='option' value='Scissors' id='Scissors'><label for='Scissors'>Scissors</label>
        <button type="submit">Throw</button>
    </form>
    <?php if ($resultAvailable) {?>
    <h2> Results </h2>

    <ul>
        <li>You threw <b> <?php echo $Player_input ?></b></li>
        <li>The computer threw <b> <?php echo $Computer ?> </b>
        </li>
        <li>Result: <b> <?php echo $result; ?> </b> </li>
    </ul>
    <?php } ?>

</body>

</html>