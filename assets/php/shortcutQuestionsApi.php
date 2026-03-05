<?php

header("Content-Type: application/json");

$questions = [

[
"question"=>"What is the shortcut to copy?",
"answers"=>["CTRL + C","CTRL + V","CTRL + X","ALT + C"],
"correctIndex"=>0
],

[
"question"=>"What is the shortcut to paste?",
"answers"=>["CTRL + C","CTRL + V","CTRL + X","CTRL + P"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to select all?",
"answers"=>["CTRL + A","CTRL + S","CTRL + Z","CTRL + D"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to cut?",
"answers"=>["CTRL + C","CTRL + V","CTRL + X","CTRL + P"],
"correctIndex"=>2
],

[
"question"=>"Shortcut to undo?",
"answers"=>["CTRL + Y","CTRL + Z","CTRL + U","CTRL + R"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to redo?",
"answers"=>["CTRL + Z","CTRL + Y","CTRL + D","CTRL + R"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to print?",
"answers"=>["CTRL + P","CTRL + T","CTRL + R","CTRL + O"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to save?",
"answers"=>["CTRL + O","CTRL + P","CTRL + S","CTRL + W"],
"correctIndex"=>2
],

[
"question"=>"Shortcut to open file?",
"answers"=>["CTRL + N","CTRL + O","CTRL + L","CTRL + B"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to find text?",
"answers"=>["CTRL + F","CTRL + H","CTRL + S","CTRL + K"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to replace text?",
"answers"=>["CTRL + F","CTRL + R","CTRL + H","CTRL + D"],
"correctIndex"=>2
],

[
"question"=>"Shortcut to bold text?",
"answers"=>["CTRL + B","CTRL + I","CTRL + U","CTRL + L"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to italic text?",
"answers"=>["CTRL + U","CTRL + I","CTRL + B","CTRL + P"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to underline text?",
"answers"=>["CTRL + B","CTRL + I","CTRL + U","CTRL + T"],
"correctIndex"=>2
],

[
"question"=>"Shortcut to new document?",
"answers"=>["CTRL + N","CTRL + O","CTRL + S","CTRL + D"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to close document?",
"answers"=>["CTRL + W","CTRL + Q","CTRL + D","CTRL + B"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to refresh browser?",
"answers"=>["CTRL + R","CTRL + T","CTRL + N","CTRL + W"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to open new tab?",
"answers"=>["CTRL + T","CTRL + N","CTRL + O","CTRL + P"],
"correctIndex"=>0
],

[
"question"=>"Shortcut to close tab?",
"answers"=>["CTRL + T","CTRL + W","CTRL + Q","CTRL + R"],
"correctIndex"=>1
],

[
"question"=>"Shortcut to zoom in?",
"answers"=>["CTRL + +","CTRL + -","CTRL + 0","CTRL + Z"],
"correctIndex"=>0
]

];

$randomQuestion = $questions[array_rand($questions)];

echo json_encode($randomQuestion);

?>