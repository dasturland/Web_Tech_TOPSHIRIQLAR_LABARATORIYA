<?php
$stringVar = "PHP dasturlash tili";
$integerVar = 2024;
$floatVar = 3.14;
$booleanVar = true;
$arrayVar = array("HTML", "CSS", "JavaScript");
$nullVar = null;

echo "String: " . $stringVar . " - Turi: " . gettype($stringVar) . "<br>";
echo "Integer: " . $integerVar . " - Turi: " . gettype($integerVar) . "<br>";
echo "Float: " . $floatVar . " - Turi: " . gettype($floatVar) . "<br>";
echo "Boolean: " . ($booleanVar ? "true" : "false") . " - Turi: " . gettype($booleanVar) . "<br>";
echo "Array: " . implode(", ", $arrayVar) . " - Turi: " . gettype($arrayVar) . "<br>";
echo "Null: " . ($nullVar === null ? "null" : $nullVar) . " - Turi: " . gettype($nullVar) . "<br>";
?>
