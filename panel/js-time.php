<strong>Stopwatch</strong>
<p><span id="seconds">00</span>:<span id="tens">00</span> Sec </p>
<script>
 
  var seconds = 00; 
  var tens = 00; 
  var appendTens = document.getElementById("tens");
  var appendSeconds = document.getElementById("seconds");
  var start = Date.now();
setInterval(function() {
    var delta = Date.now() - start; // milliseconds elapsed since start
   
    appendSeconds.innerHTML =Math.floor(delta / 1000); // in seconds 
}, 1000);
 
  var   Interval = setInterval(startTimer, 10);
 
   
  
  function startTimer () {
    tens++; 
    
    if(tens <= 9){
      appendTens.innerHTML = "0" + tens;
    }
    
    if (tens > 9){
      appendTens.innerHTML = tens;
      
    } 
    
    if (tens > 99) {
       
   
      tens = 0;
      appendTens.innerHTML = "0" + 0;
    }
    
   
  
  }  
</script>