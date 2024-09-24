 /*speech recognition*/
    const speakBtn = document.getElementById("mic");
     speakBtn.addEventListener("click",speakNow);

    const SpeechRecognition = 
     window.SpeechRecognition || window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
    // recognition.continuous = true;
    
    recognition.onerror = function(event) {
      console.log('Speech recognition error detected: ' + event.error);
    }

    recognition.onaudiostart = function() {
     console.log('Audio capturing started');
    }

    recognition.onaudioend = function() {
     console.log('Audio capturing ended');
    }

    recognition.onspeechstart = function() {
     console.log('Speech has been detected');
    }
   
    recognition.onstart = function() {
      console.log("Speech recognition service connected,listening...");
    }

     recognition.onend = function() {
      console.log('Speech recognition service disconnected');
    }

    recognition.onresult = function(e) {
      const resultIndex = e.resultIndex;
      const result = e.results[resultIndex][0].transcript;

      console.log(result);
      speakOutLoud(result);
    }

    function speakNow(){
      recognition.start();
      console.log("Speech recognition service starting...");
    }

     function speakOutLoud(user_said){

      if(user_said.includes("hello")){
        var reply = "hello,how can i help you?";
      }else if(user_said.includes("what is your name")){
        var reply = "My name is sisily";
      }else if(user_said.includes("open Google")){
        window.open("https://www.google.com","_blank");
      }else if(user_said.includes("tab1") || user_said.includes("class 1")){
         location.replace("#class1"); location.reload();
      }else if(user_said.includes("tab2") || user_said.includes("class 2")){
         location.replace("#class2"); location.reload();
      }else if(user_said.includes("tab3")){
         location.replace("#clg"); location.reload();
      }else if(user_said.includes("tab4") || user_said.includes("report")){
         location.replace("#rpt"); location.reload();
      }else if(user_said.includes("tab5") || user_said.includes("chart")){
         location.replace("#chrt_tab"); location.reload();
      }else if(user_said.includes("register page")){
         location.replace("register.php");
      }else if(user_said.includes("entry page")){
         location.replace("entry.php");
      }else if(user_said.includes("go backward")){
         history.go(-1);
      }else if(user_said.includes("go forward")){
         history.go(1);
      }else{
        $("#sch").val(user_said);
      } 

      const SpeechSynthesisUtterance = window.SpeechSynthesisUtterance || window.webkitSpeechSynthesisUtterance;
        
      const utterance = new SpeechSynthesisUtterance();

      utterance.volume = 1;
      utterance.pitch = 1;
      utterance.rate = 1;
      utterance.text = reply ;
      utterance.lang = 'en-US';

      const speechSynthesis = window.speechSynthesis || window.webkitspeechSynthesis;
      speechSynthesis.speak(utterance);
       console.log(utterance);
    }
