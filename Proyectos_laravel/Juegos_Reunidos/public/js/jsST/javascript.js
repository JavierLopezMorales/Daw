/*Puzzle 4x4*/
/*function swapTiles(cell1,cell2) {
  var temp = document.getElementById(cell1).className;
  document.getElementById(cell1).className = document.getElementById(cell2).className;
  document.getElementById(cell2).className = temp;
}

function shuffle() {
//Use bucles anidados para acceder a cada celda de la cuadrícula de 4x4
for (var row=1;row<=4;row++) { //Para cada fila de la cuadrícula de 4x4
   for (var column=1;column<=4;column++) { //Para cada columna de esta fila
  
    var row2=Math.floor(Math.random()*4 + 1); //Elija una fila aleatoria del 1 al 4
    var column2=Math.floor(Math.random()*4 + 1); //Elija una columna aleatoria del 1 al 4
     
    swapTiles("cell"+row+column,"cell"+row2+column2); //Cambia el aspecto de ambas celdas
  } 
}
}

function clickTile(row,column) {
  var cell = document.getElementById("cell"+row+column);
  var tile = cell.className;
  if (tile!="tile16") { 
       //Comprueba si hay un hueco blanco a la derecha
       if (column<4) {
         if ( document.getElementById("cell"+row+(column+1)).className=="tile16") {
           swapTiles("cell"+row+column,"cell"+row+(column+1));
           return;
         }
       }
       //Comprueba si hay un hueco blanco a la izquierda
       if (column>1) {
         if ( document.getElementById("cell"+row+(column-1)).className=="tile16") {
           swapTiles("cell"+row+column,"cell"+row+(column-1));
           return;
         }
       }
         //Comprueba si hay un hueco blanco encima
       if (row>1) {
         if ( document.getElementById("cell"+(row-1)+column).className=="tile16") {
           swapTiles("cell"+row+column,"cell"+(row-1)+column);
           return;
         }
       }
       //Comprueba si hay un hueco blanco debajo
       if (row<4) {
         if ( document.getElementById("cell"+(row+1)+column).className=="tile16") {
           swapTiles("cell"+row+column,"cell"+(row+1)+column);
           return;
         }
       } 
  }
  
}
*/
/*Puzzle 5x5*/
 var cont= 0;
function swapTiles(cell1,cell2,x) {
  
  var temp = document.getElementById(cell1).className;
  document.getElementById(cell1).className = document.getElementById(cell2).className;
  document.getElementById(cell2).className = temp;
  if(x == true){
  cont++;
  var l = document.getElementById("moves");
  l.innerHTML = cont;
  }
}


function shuffle() {
//Use bucles anidados para acceder a cada celda de la cuadrícula de 4x4
for (var row=1;row<=5;row++) { //Para cada fila de la cuadrícula de 4x4
   for (var column=1;column<=5;column++) { //Para cada columna de esta fila
  
    var row2=Math.floor(Math.random()*5 + 1); //Elija una fila aleatoria del 1 al 5
    var column2=Math.floor(Math.random()*5 + 1); //Elija una columna aleatoria del 1 al 5
     
    swapTiles("cell"+row+column,"cell"+row2+column2,false); //Cambia el aspecto de ambas celdas
  } 
}
}

function clickTile(row,column) {
  var cell = document.getElementById("cell"+row+column);
  var tile = cell.className;
  if (tile!="tile25") { 
       //Comprueba si hay un hueco blanco a la derecha
       if (column<5) {
         if ( document.getElementById("cell"+row+(column+1)).className=="tile25") {
           swapTiles("cell"+row+column,"cell"+row+(column+1),true);
           return;
         }
       }
       //Comprueba si hay un hueco blanco a la izquierda
       if (column>1) {
         if ( document.getElementById("cell"+row+(column-1)).className=="tile25") {
           swapTiles("cell"+row+column,"cell"+row+(column-1),true);
           return;
         }
       }
         //Comprueba si hay un hueco blanco encima
       if (row>1) {
         if ( document.getElementById("cell"+(row-1)+column).className=="tile25") {
           swapTiles("cell"+row+column,"cell"+(row-1)+column,true);
           return;
         }
       }
       //Comprueba si hay un hueco blanco debajo
       if (row<5) {
         if ( document.getElementById("cell"+(row+1)+column).className=="tile25") {
           swapTiles("cell"+row+column,"cell"+(row+1)+column,true);
           return;
         }
       } 
  }
 
 
  
}
function temporizador(){
	
	
	
	
	
	 var n = 0;
	 var l = document.getElementById("number");
		var interval = window.setInterval(function(){
			l.innerHTML = n;
				n++;
				
		}	
		,1000);
		for(var i=0;i<interval;i++){
			window.clearInterval(i);
		}
		
}
var modo = 5;
/*----------------Comprobar solucion---------------*/
/* 1ºCrear otro bucle doble para cada vez que se mueva una pieza y despues comprobar que el nuevo array (Orden2 ) sea igual a orden 
 y si son iguales has ganado , si son diferentes , continua*/
function comprobar(){
	
	var orden = [];
	for (var row=1;row<=modo;row++) { 
   for (var column=1;column<=modo;column++) {
	   
	   orden.push("cell"+row+column);
	   
   }
	}
	   for (var x=0;x<=orden.length;x++) {
	   
	   alert(orden[x]);
	   
   }
	
}
  
