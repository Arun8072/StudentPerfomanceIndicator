$(".log").click(function(){
 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{logout:"yes"},
    success: function(data){
    }//suc
    });//aj
 });//clk
 
 $(".stud-log").click(function(){
 $.ajax({
    type: "POST",
    url: 'demo.php', 
    data:{cnm:"studreg",cvl:"",cki:"y"},
    });//aj
 $.ajax({
    type: "POST",
    url: 'demo.php', 
    data:{cnm:"tname",cvl:"",cki:"y"},
   success: function(){
    window.location="index.php";
	}//suc
    });//aj
});//clk
 
$("#dft").click(function(){
 var slt=$('[name=sem]').val().concat($('[name=slot]').val());
 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{cnm:"slot",cvl:slt,cki:"y"},
    success: function(data){
    alert(data);
	}//suc
  });//aj
});//clk

$("#delacc").click(function(e){
 $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{ae:"delaccount"},
    success: function(data){
    window.location="index.php";
    }//suc 
    });//aj
});//cl
