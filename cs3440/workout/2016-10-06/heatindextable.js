function init()
{
    document.getElementById("but").onclick = createHeatIndexTable;
}
window.onload = init;

function createHeatIndexTable()
{
   //setting up the table
   var table = document.createElement("table");

   //setting up the header row
   var tHead = table.createTHead();
   var headRow = tHead.insertRow(0);
   var headCell = headRow.insertCell(0);
   headCell.innerHTML = "Temperature(F) versus Relative Humidity(%)";

   //getting the humidity variables entered in the form
   var minHumid = document.getElementById("form1").elements[2].value;
   var maxHumid = document.getElementById("form1").elements[3].value;

   var spanCount = 0;
   var minH = parseInt(minHumid, 10);
   var maxH = parseInt(maxHumid, 10);
   while (maxH > minH - 10)
   {
       spanCount++;
       maxH -= 10;
   }

   headCell.colSpan = spanCount + 1;
 
   //first non header row
   var row1 = table.insertRow(1);
   var r1c1 = row1.insertCell(0);
   r1c1.innerHTML = "&deg;F";
   r1c1.style.textAlign = "left";
   var count = 1;
   var i;
   for (i = maxHumid; i > minHumid; i -= 10)
   {
       var newCell = row1.insertCell(count);
       newCell.innerHTML = i + "%";
       newCell.style.textAlign = "left";
       count++;
   }
   var r1end = row1.insertCell(count);
   r1end.innerHTML = minHumid + "%";
   r1end.style.textAlign = "left";
   //end row first non header row
   
   //getting the temperature variables
   var minT = document.getElementById("form1").elements[0].value;
   var maxT = document.getElementById("form1").elements[1].value;
   
   //nested loop for all other rows
   var rowCount = 2;
   var j = parseInt(minT, 10);
   var q = parseInt(maxT, 10);
   for (j; j < q; j += 5)
   {
       var newRow = table.insertRow(rowCount);
       var c1 = newRow.insertCell(0);
       c1.innerHTML = j;
       c1.style.textAlign = "left";
       console.log("first");
       var newCount = 1;
       var w = parseInt(minHumid, 10);
       var z = parseInt(maxHumid, 10);
       for (z; z > w; z -= 10)
       {
           var c2 = newRow.insertCell(newCount);
           console.log(table.rows[rowCount].cells[0]);
           c2.innerHTML = heatindex(j, z);
           console.log("inner");
           newCount++;
       }
       var newRowEnd = newRow.insertCell(newCount);
       newRowEnd.innerHTML = heatindex(j, w);
       console.log("second");
       rowCount++;
   }
   
   var containerDiv = document.getElementById("table-container");
   var oldTable = containerDiv.firstChild;
   containerDiv.replaceChild(table, oldTable);
}

