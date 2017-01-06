<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

$color = $_GET['color'];
if ($color == 'red') {
   printf("<div id='val1'>Rose</div>");
   printf("<div id='val2'>Apple</div>");
} else if ($color == 'blue') {
    printf("<div id='val1'>Berry</div>");
    printf("<div id='val2'>Sky</div>");
}
?>
</body>
</html>
