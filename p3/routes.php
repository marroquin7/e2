<?php
return [
    #The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/records' => ['RecordController', 'saveRecords'],
    '/play'=> ['PlayController', 'playgame'],
    '/record' => ['RecordController', 'display'],
    '/p' => ['AppController', 'p'],
    
];