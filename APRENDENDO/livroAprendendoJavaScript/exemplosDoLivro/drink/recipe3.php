<?php

//If no search string is passed, then we can't search
$drink = $_REQUEST['drink'];
if(empty($drink)) {
    echo "<title>No drink name sent</title>";
} else {
    //Remove whitespace from beginning & end of passed search.
    $i = 0;
    $str = "";
    while ($i < $arg) {
       $str += $i++;
    }
    $search = trim($drink);
    switch($search) {
      case "TEA" :
         $result = '{ "title" : "Hot Tea",' . 
                   ' "ingredients" : [ {  "ingredient" : "tea leaves" },' . 
                   '   {"ingredient" : "water"}],' .
                   '  "instruction" : "Boil water. Pour over tea leaves.' .
                   ' Steep five minutes. Strain and serve."}';  
         break;
      case "APPLETINI" :
         $result = '{ "title" : "Appletini", ' .
                   ' "ingredients" : [ { "ingredient" : "1 ounce vodka" }, ' .
                   ' { "ingredient" : "1/2 ounce Sour Apple Pucker or apple schnapps"}],' .
                   ' "instruction" : "Mix vodka and schnapps in a glass filled with ice. Strain ' .
                   'into martini glass. Garnish with an apple slice or raisin."}';
         break;
      case "NONCHAMP" :
         $result = '{ "title" : "Non-Alcoholic Champagne", ' .
                   ' "ingredients" : [ { "ingredient" : "32 ounces club soda" }, ' . 
                   ' { "ingredient" : "12 ounces frozen white grape juice concentrate"}],' .
                   ' "instruction" : "Mix club soda with grape juice concentrate."}';
         break;
      case "SWMPMARGARITA" :
         $result = '{ "title" : "Swamp Margarita", ' .
                   ' "ingredients" : [ { "ingredient" : "1 1/2 ounce good quality tequila"}, ' .
                   ' { "ingredient" : "3/4 ounce Cointreau"}, ' .
                   ' { "ingredient" : "3/4 ounce Grand Marnier"}, ' .
                   ' { "ingredient" : "1/2 ounce lime juice"}, ' .
                   ' { "ingredient" : "2 ounces sour mix"}, ' .
                   ' { "ingredient" : "several green olives"}],' .
                   ' "instruction" : "Mix all ingredients. Chill an hour. ' .
                   'Fill bottom of tall glass with several green olives. ' .
                   'Pour margarita over the olives, let sit for ten minutes, strain and serve."}'; 
         break;
      case "LEMON" :
         $result = '{ "title" : "Lemon Drop", ' .
                   ' "ingredients" : [ { "ingredient" : "1 ounce lemon vodka"}, ' .
                   ' { "ingredient" : "1 ounce lemon juice"}, ' .
                   ' { "ingredient" : "1 teaspoon sugar"}],' .
                   ' "instruction" : "Shake with ice, ' .
                   'strain and serve."}';
         break;
      default :
         $result = "{ 'title','No recipes found'}";
         break;
      }

     echo $result;

}
?>
