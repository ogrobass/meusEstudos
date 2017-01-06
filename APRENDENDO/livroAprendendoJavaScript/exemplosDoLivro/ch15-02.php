<?php
//If no search string is passed, then we can't search
if(empty($_GET['state'])) {
    echo "<city>No State Sent</city>";
} else {
    //Remove whitespace from beginning & end of passed search.
    $search = trim($_GET['state']);
    $cities = array();
    switch($search) {
      case "MO" :
         $cities [] = array(
                   'value' => 'kc',
                    'title' => "Kansas City");
         $cities [] = array(
                    'value' => 'stlou',
                    'title' => "St. Louis");
         break;
      case "WA" :
         $cities [] = array(
                   'value' => 'seattle',
                    'title' => "Seattle");
         $cities [] = array(
                    'value' => 'spokane',
                    'title' => "Spokane");
         $cities [] = array(
                    'value' => 'olympia',
                    'title' => "Olympia");
         break;
      case "CA" :
         $cities [] = array(
                   'value' => 'sanfran',
                    'title' => "San Francisco");
         $cities [] = array(
                    'value' => 'la',
                    'title' => "Los Angeles");
         $cities [] = array(
                    'value' => 'web2',
                    'title' => "Web 2.0 City");
         break;
      case "ID" :
         $cities [] = array(
                   'value' => 'boise',
                    'title' => "Boise");

         break;
      default :
         $cities [] = array(
                   'value' => '',
                    'title' => "No Cities Found");
         break;
      }

   header("Content-Type: text/xml; charset=utf-8");

}
 
  $doc = new DOMDocument();
  $doc->formatOutput = true;
  
  $r = $doc->createElement("cities");
  $doc->appendChild( $r );
 
  foreach ($cities as $city) { 
     $c = $doc->createElement( "city" );
  
     $value  = $doc->createElement( "value" );
     $value->appendChild(
        $doc->createTextNode($city['value']));
     $c->appendChild( $value );
  
     $title = $doc->createElement( "title" );
     $title->appendChild(
        $doc->createTextNode($city['title']));
     $c->appendChild( $title );
     $r->appendChild( $c );
  }
  echo $doc->saveXML();
  ?>

