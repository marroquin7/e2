<?php
session_start();
$option = $_GET['option'];
$moves = ['Rock', 'Paper', 'Scissors'];

$Player_input = $option;
$Computer = $moves[rand(0, 2)];

$result =null;
if ($Player_input == $Computer) {
    $result = 'Tie';
} elseif ($Player_input == 'Paper' and $Computer=='Rock') {
    $result ='You Won!';
} elseif ($Player_input == 'Paper' and $Computer=='Scissors') {
    $result ='You Lost';
} elseif ($Player_input == 'Rock' and $Computer=='Paper') {
    $result ='You Lost';
} elseif ($Player_input == 'Rock' and $Computer=='Scissors') {
    $result ='You Won!';
} elseif ($Player_input == 'Scissors' and $Computer=='Rock') {
    $result ='You Lost';
} elseif ($Player_input == 'Scissors' and $Computer=='Paper') {
    $result ='You Won!';
}


$_SESSION['outcome'] = [
    'option' => $option,
    'Player_input' => $Player_input,
    'Computer' => $Computer,
    'result' => $result
];

    header('Location: index.php');
