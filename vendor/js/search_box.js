//filter-type searching
$("#sch").keyup(function(){
var txt=$(this).val().toLowerCase();
$("#clg li").filter(function(){
 $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 }); 
 $("#cla li").filter(function(){
  $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 });
 $("#cl li").filter(function(){
  $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 });
});//kyp

$("#searchi").click(function(){
  $(".brand-logo").hide();
  $("#searchf").removeClass("hide");
  $("#searchf").show();
  $(this).hide();
  $( "#sch" ).focus();
});//clk


$("#close").click(function(){
 $("#searchi").show();
 $("#searchf").hide();
 $(".brand-logo").show();
});//clk