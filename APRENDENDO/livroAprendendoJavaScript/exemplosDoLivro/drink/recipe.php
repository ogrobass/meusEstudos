<?php

//If no search string is passed, then we can't search
$drink = $_REQUEST['drink'];
if(!empty($drink)) {
    //Remove whitespace from beginning & end of passed search.
    $search = trim($drink);

    switch($search) {
      case "TEA" :
         $result = "<h3>Hot Tea</h3><p>Boil water. " . 
                   "Pour over tea leaves. Steep five minutes. " . 
                   "Strain and serve</p>";
         break;
      case "APPLETINI" : 
         $result = "<h3>Appletini</h3><p>Mix 1 oz vodka and 1/2 oz Sour Apple Pucker or " .       
                   "apple schnapps in a glass filled with ice. Strain into martini glass. " .
                   "Garnish with an apple slice or raisin.</p>";
         break;
      case "NONCHAMP" :
         $result = "<h3>Non-Alcoholic Champagne</h3><p>Mix 32 ounces club soda" .
                   " with 12 ounces frozen white grape juice concentrate.</p>";
         break;
      case "SWMPMARGARITA" :
         $result = "<h3>Swamp Margarita</h3>" .
                   "<p>Mix 1 1/2 ounce good quality tequila, 3/4 ounce Cointreau, " .
                   "3/4 ounce Grand Marnier, 1/2 ounce lime juice, and 2 ounces sour mix. Chill an hour. " .
                   "Fill bottom of tall glass with several green olives and a few drops olive juice. " .
                   "Pour margarita over the olives and let sit for ten minutes. " . 
                   "Strain and serve with a few olives stuffed with pimento on a toothpick.</p>";
         break;
      case "LEMON" :
         $result = "<h3>Lemon Drop</h3><p>Mix 1 ounce lemon vodka " .
                   "with 1 ounce lemon juice and 1 teaspoon sugar. Shake with ice, " .
                   "strain and serve.</p>";
         break;
      default :
         $result = "No recipes found";
         break;
      }
}

echo $result;
?>
