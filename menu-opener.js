$(".menu-opener").click(function(){
  $(".menu-opener, .menu-opener-inner, .menu").toggleClass("active");
});


$("#l1").click(function(event){
    window.open($("#1").attr('href'),'_blank');
});
$("#l2").click(function(event){
    window.open($("#2").attr('href'),'_blank');
});
$("#l3").click(function(event){
    window.open($("#2").attr('href'),'_blank');
});