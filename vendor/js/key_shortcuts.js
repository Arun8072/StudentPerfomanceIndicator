// mousetrap works after it defined

//keyup - trigger for only once

Mousetrap.bind('0', function() {
     location.replace("#class1");  location.reload();
}, 'keyup' );
Mousetrap.bind('1', function() {
   //  location.replace("#class2");  location.reload();
}, 'keyup' );
Mousetrap.bind('2', function() {
     location.replace("#college");  location.reload();
}, 'keyup' );
Mousetrap.bind('3', function() {
     location.replace("#rpt");  location.reload();
}, 'keyup' );
Mousetrap.bind('4', function() {
     location.replace("#chrt_tab");  location.reload();
      
}, 'keyup' );

Mousetrap.bind(['v','V'], function() { 
location.replace("veiw.php");
}, 'keyup' );
Mousetrap.bind(['r','R'], function() { 
location.replace("register.php");
}, 'keyup' );
Mousetrap.bind(['e','E'], function() { 
location.replace("entry.php");
}, 'keyup' );
Mousetrap.bind(['s','S'], function() { 
location.replace("StudentView.php");
}, 'keyup' );
Mousetrap.bind(['f','F'], function() { 
location.replace("chatbot/index.php");
}, 'keyup' );