var xmlhttp;

// get recipe using Ajax
function getRecipe(evnt) {
   if (!xmlhttp) xmlhttp = aaGetXmlHttpRequest();
   if (!xmlhttp) return;
   var drink = encodeURIComponent(document.getElementById('drink').value);
   var qry = "drink=" + drink;
   var url = 'recipe.php?' + qry;
   xmlhttp.open('GET', url, true);
   xmlhttp.onreadystatechange = printRecipe;
   xmlhttp.send(null);
   if (evnt && evnt.preventDefault())
     evnt.preventDefault();
   return false;
}

// Add recipe to page 
function printRecipe() {
   if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    
      var body = document.getElementsByTagName('body');
 
      // remove, if exists
      if (document.getElementById('recipe')) {
         body[0].removeChild(document.getElementById('recipe'));
      }        
      var recipe = document.createElement('div');
      recipe.id = 'recipe';
      recipe.className = 'recipe';
      recipe.innerHTML = xmlhttp.responseText;
      body[0].appendChild(recipe);
   }
}

// intercede in form submission
window.onload=function() {
   if (aaScreenIE()) return;
   document.getElementById('myform').onsubmit=getRecipe;
};


