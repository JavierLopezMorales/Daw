$(".game").click(function() {
   $('.carrousel-container').attr("game-center", this.id);
   if (this.id == "game1") centerGame1();
   if (this.id == "game2") centerGame2();
   if (this.id == "game3") centerGame3();

});


function centerGame1() {
   var tl = new TimelineMax()
   tl.to('#game1', 1, {xPercent: 0, z: 1}, 0)
   tl.to('#game2', 1, {xPercent: 140, z: -800}, 0)
   tl.to('#game3', 1, {xPercent: -140, z: -800}, 0)

}

function centerGame2() {
   var tl = new TimelineMax()
   tl.to('#game1', 1, {xPercent: -140, z: -800}, 0)
   tl.to('#game2', 1, {xPercent: 0, z: 1}, 0)
   tl.to('#game3', 1, {xPercent: 140, z: -800}, 0);
}

function centerGame3() {
   var tl = new TimelineMax()
   tl.to('#game1', 1, {xPercent: 140, z: -800}, 0)
   tl.to('#game2', 1, {xPercent: -140, z: -800}, 0)
   tl.to('#game3', 1, {xPercent: 0, z: 1}, 0);
}


$(function() {
   centerGame2();
})


