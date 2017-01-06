<?php

//If no search string is passed, then we can't search
if(empty($_REQUEST['state'])) {
    echo "No State Sent";
} else {
    //Remove whitespace from beginning & end of passed search.
    $search = trim($_REQUEST['state']);
    switch($search) {
      case "MO" :
         $result = "<ul><li>St. Louis</li>" .
                   "<li>Kansas City</li></ul>";
         break;
      case "WA" :
         $result = "<ul><li>Seattle</li>" .
                   "<li>Spokane</li>" .
                   "<li>Olympia</li></ul>";
         break;
      case "CA" :
         $result = "<ul><li>San Francisco</li>" .
                   "<li>Los Angeles</li>" .
                   "<li>Web 2.0 City</li>" .
                   "<li>BarCamp</li></ul>";
         break;
      case "ID" :
         $result = "<ul><li>Boise</li></ul>";
         break;
      default :
         $result = "No Cities Found";
         break;
      }
    echo "<h3>Cities:</h3><p>" . $result . "</p>";
}
?>
