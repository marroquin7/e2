<?php

namespace App\Controllers;

class GameController extends Controller
{
    private $persistResults;
    private $maxResults;
    private $sessionKey;
    public $outcome;
    public $computer;
    
    /*Initialize variables
    $persistResults - stores the session game results
    $maxResults - number of results diplaying after a round
    $timezone - To store the date and time of each round
*/
    public function __construct(bool $persistResults = false, int $maxResults = 1, string $timezone = 'America/New_York')
    {
        date_default_timezone_set($timezone);

        if ($persistResults) {
            $this->maxResults = $maxResults;
            $this->persistResults = $persistResults;
        }
    }
    
    /*
    Logic of game
    $move - Player move
    $computer - system move
    $outcome - Result of the game
    */
    public function play()
    {
        $move = $_POST['player'];
        $this->computer = $this->getRandomMove();

        if ($this->computer == $move) {
            $this->outcome = 'It is a tie';
        } elseif ($move == 'Rock' and $this->computer == 'Scissors' or $move == 'Paper' and $this->computer == 'Rock' or $move == 'Scissors' and $this->computer == 'Paper') {
            $this->outcome = 'You Won!';
        } else {
            $this->outcome = 'You Lost';
        }
        

        $results= [
            'player' => $move,
            'computer' => $this->computer,
            'outcome' => $this->outcome,
            'timestamp' => date('F j, Y, g:i:s a')
        ];
        
        #Store the data after each round for display
        if ($this->persistResults) {
            $this->persistResults($results);
        }
        return $results;
    }
    
    public function outcome()
    {
        return $this->outcome;
    }
    public function compMove()
    {
        return $this->computer;
    }

    public function getResults()
    {   # Return the session data
        return $_SESSION[$this->sessionKey] ?? null;
    }

    private function persistResults(array $results)
    {
        # Get the existing session data
        $_SESSION[$this->sessionKey] = $this->getResults() ?? [];

        # Add these results to the start
        array_unshift($_SESSION[$this->sessionKey], $results);
        
        # Use array slice to make sure we're only includeing 0 up to maxResults
        $_SESSION[$this->sessionKey] = array_slice($_SESSION[$this->sessionKey], 0, $this->maxResults);
    }

   
    #Get the random move
    public function getRandomMove()
    {
        return ['Rock','Paper','Scissors'][rand(0, 1)];
    }
}