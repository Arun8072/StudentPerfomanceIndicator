$("#t2").click(function(){
 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{dept:"all",a:"fview"},
    success: function(data){
      $("#clg").html(data);
      
 var i=1;
while(i!==0){
i=1; //mandatory
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh
      
    }//suc
 });//aj
});//clk
   
    
$(".dep").click(function(){
var dept = $(this).attr("value");
 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{dept:dept,a:"dview"},
    success: function(data){
      $("#clg").html(data);
 $(".select-year").attr("dept",dept);
 
  //sorting
 var i=1;
while(i!==0){
i=1; //mandatory
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh
  //sorting
  
    }//suc
    });// aj
});//clk

$(".select-year").click(function(){
var year = $(this).attr("yr");
var dept = $(this).attr("dept");

 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{year:year,dept: dept,a:"dview"},
    success: function(data){
      $("#clg").html(data);
    
 var i=1;
while(i!==0){
i=1;
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh

    }//suc
    });//aj
});//clk
