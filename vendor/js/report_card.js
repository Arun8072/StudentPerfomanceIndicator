$(document).ready(function(){

function srbrd(d){
 $("#report").append("<div class="+"flip-card value="+d.AB12+"> <div class="+"flip-card-inner"+"> <div class="+"flip-card-front"+"> <h4"+" class="+"counter"+" data-target=\""+d.AB12+"\">0</h4> <h5>"+d.dep+"</h5> </div> <div class="+"flip-card-back col"+"> <div class="+"row"+"> <div class="+"col"+"> <p>1st year (<span>"+d.AB1+"</span>)</p> <p>A : <span>"+d.A1+"</span></p> <p>B : <span>"+d.B1+"</span></p> </div> <div class="+"col"+"> <p>2nd year (<span>"+d.AB2+"</span>)</p> <p>A : <span>"+d.A2+"</span></p> <p>B : <span>"+d.B2+"</span></p> </div> <div class="+"col"+"> <p>3rd year (<span>"+d.AB3+"</span>)</p> <p>A : <span>"+d.A3+"</span></p> <p>B : <span>"+d.B3+"</span></p> </div> </div><!--row--> </div><!--fcb--> </div><!--fci--> </div><!--fc--><br>");
}

$("#t3").click(function(){
  $("#report").text("");
  $.ajax({
    type: "POST",
    url: 'demo.php',
    data:{an:"report"},
    success: function(data){
   data=JSON.parse(data); 
 //   $("#report").html(data);
 srbrd(data.dep0);
 srbrd(data.dep1);
 srbrd(data.dep2);
 srbrd(data.dep3);
 srbrd(data.dep4);
 countup(); // function called here to count up every time report card loaded
	
    $('.flip-card-back .row .col p span').each(function(){
      if($(this).text()=="undefined"){
        $(this).text(0);
      }
    });
	}//suc
	
  });//aj
});//clk

});//doc