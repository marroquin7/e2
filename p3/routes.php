<?php
return [
    #The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/records' => ['RecordController', 'saveRecords'],
    '/play'=> ['AppController', 'playgame'],
    '/record' => ['RecordController', 'display'],
    
    
];