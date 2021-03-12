$(".tematica").click(function() {
   $('.container').attr("tematica-center", this.id);
   if (this.id == "tematica1") centerTematica1();
   if (this.id == "tematica2") centerTematica2();
   if (this.id == "tematica3") centerTematica3();

});


function centerTematica1() {
   var tl = new TimelineMax()
   .to('#tematica1', 1, {xPercent: 0, z: 1}, 0)
   .to('#tematica2', 1, {xPercent: 140, z: -800}, 0)
   .to('#tematica3', 1, {xPercent: -140, z: -800}, 0)

}

function centerTematica2() {
   var tl = new TimelineMax()
   .to('#tematica1', 1, {xPercent: -140, z: -800}, 0)
   .to('#tematica2', 1, {xPercent: 0, z: 1}, 0)
   .to('#tematica3', 1, {xPercent: 140, z: -800}, 0);
}

function centerTematica3() {
   var tl = new TimelineMax()
   .to('#tematica1', 1, {xPercent: 140, z: -800}, 0)
   .to('#tematica2', 1, {xPercent: -140, z: -800}, 0)
   .to('#tematica3', 1, {xPercent: 0, z: 1}, 0);
}


$(function() {
  centerTematica2();
})
