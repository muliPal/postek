<?php
namespace mutall\capture;

include '../../../schema/v/code/schema.php';
include '../../../schema/v/code/questionnaire.php';
//
//Load the mappings to a database
$q = new \mutall\questionnaire("pos");

//This is the mpesa table
/*
//The name of the text table    
string $tname,
//
//The filename that holds the (milk) data    
string $filename,
//
//The following default values match the output from a database\\
//query
//
//The header colmumn names. If empty, it means the user wishes 
//to use the default values
array $cnames = [],
//
//Text used as the value separator
string $delimiter = ",",
//
//The row number, starting from 0, where column names are stored
//A negative number means that file has no header     
int $header_start = 0,
//
//The row number, starting from 0, where the table's body starts.        
int $body_start = 1//The name of the text table    
string $tname,
//
//The filename that holds the (milk) data    
string $filename,
//
//The following default values match the output from a database\\
//query
//
//The header colmumn names. If empty, it means the user wishes 
//to use the default values
array $cnames = [],
//
//Text used as the value separator
string $delimiter = ",",
//
//The row number, starting from 0, where column names are stored
//A negative number means that file has no header     
int $header_start = 0,
//
//The row number, starting from 0, where the table's body starts.        
int $body_start = 1
 */
$table = new csv(
        'x',
        'D:/mutall_projects/balansys/data/diaspora.csv'
);

//
//The mapping is defined by the laout variable, using the following pattern
//[exp, ename, cname]
$layout = [
    $table,
    [new lookup('x', 'qty'), 'stock', 'qty'],
    [new lookup('x', 'unit'), 'stock', 'unit'],
    [new lookup('x', 'category'), 'product', 'category'],
    [new lookup('x', 'unit'), 'product', 'unit'],
    [new lookup('x', 'Item'), 'product', 'name'],
    [new lookup('x', 'staff_name'), 'staff', 'name'],
    [new lookup('x', 'Date'), 'session', 'date'],
    [new lookup('x', 'session_num'), 'session', 'num'],
];
//
//Load the data using the most common method
$result = $q -> load_common($layout);
//
//print the q
echo $result;
