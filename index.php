<?php

$program = '++++++++[>++++[>++>+++>+++>+<<<<-]>+>+>->>+[<]<-]>>.>---.+++++++..+++.>>.<-.<.+++.------.--------.>>+.>++.';
$input = '';
$output = '';

$inputArray = str_split($input);
$programArray = str_split($program);
$loopArray = [];
$memoryArray = [0 => 0];

$inputPointer = 0;
$memoryPointer = 0;

for ($programPointer = 0; $programPointer < count($programArray); $programPointer++) {
    switch ($programArray[$programPointer]) {
        case '+':
            $memoryArray[$memoryPointer]++;
            break;
        case '-':
            $memoryArray[$memoryPointer]--;
            break;
        case '>':
            if (!isset($memoryArray[++$memoryPointer])) {
                $memoryArray[$memoryPointer] = 0;
            }
            break;
        case '<':
            if (!isset($memoryArray[--$memoryPointer])) {
                $memoryArray[$memoryPointer] = 0;
            }
            break;
        case '[':
            $loopArray[] = $programPointer;
            break;
        case ']':
            if ($memoryArray[$memoryPointer] !== 0) {
                $programPointer = array_pop($loopArray) - 1;
            } else {
                array_pop($loopArray);
            }
            break;
        case '.':
            $output .= chr($memoryArray[$memoryPointer]);
            break;
        case ',':
            if (isset($inputArray[$inputPointer])) {
                $memoryArray[$memoryPointer] = ord($input[$inputPointer++]);
            } else {
                $memoryArray[$memoryPointer] = 0;
            }
            break;
        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>BrainfuckPHP</title>
    </head>
    <body>
        <h1>BrainfuckPHP</h1>
        <h2>Program</h2>
        <pre><?=$program?></pre>
        <h2>Input string</h2>
        <pre><?=$input?></pre>
        <h2>Output string</h2>
        <pre><?=$output?></pre>
        <h2>Memory</h2>
        <pre><?=print_r($memoryArray, true)?></pre>
    </body>
</html>
