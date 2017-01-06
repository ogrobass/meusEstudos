<?php

//If no search string is passed, then we can"t search
if(empty($_REQUEST["state"])) {
    echo "<city>No State Sent</city>";
} else {
    //Remove whitespace from beginning & end of passed search.
    $search = trim($_REQUEST["state"]);
    switch($search) {
      case "MO" :
         $result = '[ { "value" : "stlou", "title" : "St. Louis" }, ' . 
                   '{ "value" : "kc", "title" :" Kansas City" } ]';
         break;
      case "WA" :
         $result = '[ { "value" : "seattle", "title" : "Seattle" }, ' .
                   '  { "value" : "spokane", "title" : "Spokane" }, ' .
                   '  { "value" : "olympia", "title" : "Olympia" } ]';
         break;
      case "CA" :
         $result = '[ { "value" : "sanfran", "title" : "San Francisco" }, ' .
                   '  { "value" : "la",      "title" : "Los Angeles"   }, ' .
                   '  { "value" : "web2",    "title" : "Web 2.0 City"  }, ' .
                   '  { "value" : "barcamp", "title" : "BarCamp"       } ]';
         break;
      case "ID" :
         $result = '[ { "value" : "boise", "title" : "Boise" } ]';
         break;
      default :
         $result = '[ { "value" : "", "title" : "No Cities Found" } ]';
         break;
    }

    echo $result;
}
?>
