<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function test()
    {
        dump('It works! You invoked your first command.');
    }

    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'player' => 'varchar(255)',
            'computer' => 'varchar(255)',
            'outcome' => 'varchar(255)',
            'timestamp' => 'datetime',
            
        ]);
        
        dump('Migration complete; check the database for your new tables.');
    }
}