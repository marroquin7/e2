<?php

namespace App\Controllers;

class RecordController extends Controller
{
    public function saveRecords()
    {   #display all records from the data base
        dump($this->app->db()->all('rounds'));
        return $this->app->view('records', ['rounds'=> $this->app->db()->all('rounds')]);
    }
    public function display()
    {   #display the selected round
        $id = $this->app->param('id');
        return $this->app->view('record', ['round'=> $this->app->db()->findById('rounds', $id)]);
    }
}