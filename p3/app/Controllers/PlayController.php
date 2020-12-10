<?php
namespace App\Controllers;

class PlayController extends Controller
{
    public function playgame()
    {   #New instance of the app
        $game = new GameController(true);
        $game->play();
        $results= $game->getResults();
      
        $player = $this->app->input('player');
        $computer = $game->compMove();
        $outcome = $game->outcome();

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

        #prepare statement to append to database
        $data =[
            'player' => $player,
            'computer'=> $computer,
            'outcome'=> $outcome,
        ];
        #insert $data to database
        dump($data);
        dump($this->app->db()->insert('rounds', $data));
        
       
     
        return $this->app->view('index', ['results'=> $results]);
    }
}