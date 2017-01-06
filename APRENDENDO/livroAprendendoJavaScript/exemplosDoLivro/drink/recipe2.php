<?php

//If no search string is passed, then we can't search
$drink = $_REQUEST['drink'];
if(empty($drink)) {
    echo "<title>No drink name sent</title>";
} else {
    //Remove whitespace from beginning & end of passed search.
    $search = trim($drink);
    switch($search) {
      case "TEA" :
         $result = "<title>Hot Tea</title>" . 
                   "<ingredient>tea leaves</ingredient>" .
                   "<instruction>Boil water. Pour over tea leaves. " .
                   "Steep five minutes. Strain and serve.</instruction>"; 
         break;
      case "APPLETINI" :
         $result = "<title>Appletini</title>" .
                   "<ingredient>1 ounce vodka</ingredient>" .
                   "<ingredient>1/2 ounce Sour Apple Pucker or apple schnapps</ingredient>" .
                   "<instruction>Mix vodka and schnapps in a glass filled with ice. Strain into martini glass. " .
                   "Garnish with an apple slice or raisin.</instruction>";
         break;
      case "NONCHAMP" :
         $result = "<title>Non-Alcoholic Champagne</title>" .
                   "<ingredient>32 ounces club soda</ingredient>" . 
                   "<ingredient>12 ounces frozen white grape juice concentrate</ingredient>" .
                   "<instruction>Mix club soda" .
                   " with grape juice concentrate.</instruction>";
         break;
      case "SWMPMARGARITA" :
         $result = "<title>Swamp Margarita</title>" .
                   "<ingredient>1 1/2 ounce good quality tequila</ingredient>" .
                   "<ingredient>3/4 ounce Cointreau</ingredient>" .
                   "<ingredient>3/4 ounce Grand Marnier</ingredient>" . 
                   "<ingredient>1/2 ounce lime juice</ingredient>" .
                   "<ingredient>2 ounces sour mix</ingredient>" . 
                   "<ingredient>several green olives</ingredient>" .
                   "<instruction>Mix all ingredients. Chill an hour. " .
                   "Fill bottom of tall glass with several green olives. " .
                   "Pour margarita over the olives, let sit for ten minutes, and serve." . 
                   "</instruction>";
         break;
      case "LEMON" :
         $result = "<title>Lemon Drop</title>" . 
                   "<ingredient>1 ounce lemon vodka</ingredient>" .
                   "<ingredient>1 ounce lemon juice</ingredient>" . 
                   "<ingredient>1 teaspoon sugar</ingredient>" . 
                   "<instruction>Shake with ice, " .
                   "strain and serve.</instruction>";
         break;
      default :
         $result = "<title>No recipes found</title>";
         break;
      }

     $result = "<recipe>" . $result . "</recipe>";

     if ($callback) {
        $result = $callback . '("' . $result . '")';
        echo $result;
     } else {
        header("Content-Type: text/xml; charset=utf-8");
        echo $result;
     }

}
?>
