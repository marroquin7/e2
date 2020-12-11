<?php
namespace App\Controllers;

class AppController extends Controller
{
    private $persistResults;
    private $maxResults =1;
    private $sessionKey;
  
    public function index()
    {   #Main display - Home Page
        $results= $this->app->old('results');
    
        return $this->app->view('index', ['results'=> $results]);
    }
    /* Logic of game
     $move - Player move
     $computer - system move
     $outcome - Result of the game
     */
    public function play()
    {
        $move = $this->app->input('player');
        $computer = $this->getRandomMove();
        if ($computer == $move) {
            $outcome = 'It is a tie';
        } elseif ($move == 'Rock' and $computer == 'Scissors' or $move == 'Paper' and $computer == 'Rock' or $move == 'Scissors'
        and $computer == 'Paper') {
            $outcome = 'You Won!';
        } else {
            $outcome = 'You Lost';
        }
        $results= [
            'player' => $move,
            'computer' => $computer,
            'outcome' => $outcome,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        #Store the data after each round for display
        if ($this->persistResults) {
            $this->persistResults($results);
        }
     
        return $results;
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

    public function playgame()
    {
        #assign $results to $data
        $data = $this->play();
        $results= $this->getResults();

        # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
        $charset = $this->app->env('DB_CHARSET', 'utf8mb4');

        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";

        # Driver-specific connection options
        $options = [
             \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
             \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
             \PDO::ATTR_EMULATE_PREPARES => false,
         ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        #$data contains the array of values submitted to the database
        $this->app->db()->insert('rounds', $data);
        # return $this->app->view('index', ['results'=> $results]);
        #Create variables
        foreach ($results as $result) {
            $player =$result['player'];
            $computer =$result['computer'];
            $outcome =$result['outcome'];
            $timestamp = $result['timestamp'];
        }
        $this->app->validate([
          'player'=> 'required'
         ]);
        $this->app->redirect('/', [
              'results'=> [
                  'player'=> $player,
                  'computer'=> $computer,
                  'outcome'=> $outcome,
                  'timestamp'=> $timestamp

              ]
           ]);
    }
}