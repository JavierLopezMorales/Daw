

 var start = false;
 var modo = 5;
 var check = true;
 var cont= 0;
  if(start == false){

  function swapTiles(cell1,cell2,x) {
    //Esta funcion permite cambiar las fichas unas por otras, lo que hace es cambiar la clase de una por la otra
    //apoyandose en una variable auxiliar.

  var temp = document.getElementById(cell1).className;
  document.getElementById(cell1).className = document.getElementById(cell2).className;
  document.getElementById(cell2).className = temp;
//Aqui tenemos el contador de movimientos , para que con cada intercambio , se incremente y al final tener un total de movimientos
  if(x == true){


    cont++;


  var l = document.getElementsByClassName("moves");
  for(var x =0;x<l.length;x++){
      l[x].innerHTML = cont;
    }



  Comprobar();

  }
  //Mostramos el contenido en la variable movimientos
  $(document).ready(function() {

    $('#moves1').attr('value', cont);
    });
  }




//Esta funcion baraja las piezas.
function shuffle() {
  var game = false;
  if(start==true){
      var opcion = confirm("¿Estas seguro que quieres iniciar un nuevo juego?");
      if (opcion == true) {
          game=true;

        } else {
          game=false;

        }

        }else{
          game=true;
            start=true;
          }
  if(game==true){
    temporizador();
    cont=0;
    //Use bucles anidados para acceder a cada celda de la cuadrícula de 5x5
    for (var row=1;row<=5;row++) { //Para cada fila de la cuadrícula de 5x5
      for (var column=1;column<=5;column++) { //Para cada columna de esta fila

        var row2=Math.floor(Math.random()*5 + 1); //Elija una fila aleatoria del 1 al 5
        var column2=Math.floor(Math.random()*5 + 1); //Elija una columna aleatoria del 1 al 5

        swapTiles("cell"+row+column,"cell"+row2+column2,false); //Cambia el aspecto de ambas celdas

        }

      }



    }



  }
  //Este es el boton de resolver , para mostrarlo en la demostracion.Basicamente recorre la tabla y las situa en su posicion original
  function resolver(){
    start=true;
    victoria=true;
    var contadorcelda=1;
      for (var row=1;row<=5;row++) {
        for (var column=1;column<=5;column++) {
          document.getElementById("cell"+row+column).className="tile"+contadorcelda;

          contadorcelda++;

        }

      }//Si el juego se ha empezado (dado el boton Juego Nuevo), y ha acabado(puzzle completo)muestra un div de fin de juego que esta oculto.
   if(victoria == true && start==true){
     $('.game-end').css({'display': 'flex', 'opacity': 0.8});
    }
  }
//Funcion para identificar que celda hay en sus lados  al clicar para ver si se puede intercambiar.
function clickTile(row,column) {
  var cell = document.getElementById("cell"+row+column);/*ID*/
  var tile = cell.className;/*CLASE*/
console.log("cell="+ row+column);
console.log("tile="+ tile);
console.log("------------");

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
//Funcion de contador de tiempo
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

//Funcion comprobar, identifica si cada pieza esta en su lugar y si todo el puzzle esta resuelto.
  function Comprobar(){
	var contador= 0;
	var victoria = true;
	while(victoria == true && contador < (modo*modo)){

		for(row=1;row<=modo;row++){
			for(column=1;column<=modo;column++){
				contador++;
				var posicion = ("cell"+row+column);
				var tile = ("tile"+contador);

				if(document.getElementById(posicion).className != tile){
				victoria = false;

				 }

			 }
		}

	}//Muestra la pantalla de fin oculta.
	if(victoria == true && start==true){
    $('.game-end').css({'display': 'flex', 'opacity': 0.8});
    }
  }
  //En proceso para ver si puedo alternar la visibilidad de los numeros
  $(document).ready(function(){
	    $(".show").click(function(){
	           $(".numeroImg").toggle();
	   });
   });
}
