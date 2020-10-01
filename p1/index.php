<?php

$moves = ['Rock', 'Paper', 'Scissors'];

$Player_A_Move = $moves[rand(0, 2)];
$Player_B_Move = $moves[rand(0, 2)];

$result =null;
if ($Player_A_Move == $Player_B_Move) {
    $result = 'Tie';
} elseif ($Player_A_Move == 'Paper' and $Player_B_Move=='Rock') {
    $result ='Player A Wins';
} elseif ($Player_A_Move == 'Paper' and $Player_B_Move=='Scissors') {
    $result ='Player B Wins';
} elseif ($Player_A_Move == 'Rock' and $Player_B_Move=='Paper') {
    $result ='Player B Wins';
} elseif ($Player_A_Move == 'Rock' and $Player_B_Move=='Scissors') {
    $result ='Player A Wins';
} elseif ($Player_A_Move == 'Scissors' and $Player_B_Move=='Rock') {
    $result ='Player B Wins';
} elseif ($Player_A_Move == 'Scissors' and $Player_B_Move=='Paper') {
    $result ='Player A Wins';
}


require 'index_view.php';
