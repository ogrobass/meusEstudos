var xmlhttp;

// get recipe using Ajax
function getRecipe(evnt) {
   if (!xmlhttp) xmlhttp = aaGetXmlHttpRequest();
   if (!xmlhttp) return;
   var drink = encodeURIComponent(document.getElementById('drink').value);
   var qry = "drink=" + drink;
   var url = 'recipe3.php?' + qry;
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
      recipe.className='recipe';

      // create object
      var recipeObj = JSON.parse(xmlhttp.responseText);

      // add title
      var title = recipeObj['title'];
      var titleNode = document.createElement('h3');
      titleNode.appendChild(document.createTextNode(title));
      recipe.appendChild(titleNode);

      // add ingredients
      var ul = document.createElement('ul');
      var ingredients = recipeObj.ingredients;
      for (var i = 0; i < ingredients.length; i++) {
         var x = document.createElement('li');
         x.appendChild(document.createTextNode(ingredients[i].ingredient));
         ul.appendChild(x);
      }
      recipe.appendChild(ul);

      // add instruction
      var instr = recipeObj.instruction;
      var instrNode = document.createElement('p');
      instrNode.appendChild(document.createTextNode(instr));
      recipe.appendChild(instrNode);
      body[0].appendChild(recipe);
   }
}

// intercede in form submission
window.onload=function() {
   if (aaScreenIE()) return;
   document.getElementById('myform').onsubmit=getRecipe;
};


