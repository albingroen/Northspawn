<div id="chatWindow">
  <header>
    <img src="./imgs/Northspawn_logo_vit.png" id="logo" alt="Logotyp">
    <h2>Hej, 
    <?php 
      if(!empty($_SESSION['user'])){
        echo $displayUser , " 👋";
      } else {
        echo "ge oss gärna feedback 👍";
      }      
    ?>          
    </h2>
  </header>
  <form method="post">
    <div class="modal">
      <input name="feedback" type="text" placeholder="Feedback" required >      
      <button>Skicka feedback</button>
    </div>                      
  </form>
  <div class="content-cards">
    <div class="modal">
      <h3 class="modal-title" >Feedback</h3>
      <p>Här kan du skicka in feedback eller ställa frågor till teamet på Northspawn. Alla frågor besvaras så snabbt som möjligt.</p>
    </div>

    <div class="modal">
      <h3 class="modal-title" >Kontakt</h3>
      <div>
        <a class="contact-link" href="">info@northspawn.se</a>
      </div>
      <div>
        <a class="contact-link" href="">Kopparbergsvägen 8, 722 13 Västerås</a>
      </div>
    </div>             
  </div>
</div>

<div onClick="openWindow()" id="chatWindowBtn"><i class="fas fa-comment-alt"></i></div>  
<div onClick="closeWindow()" id="chatWindowBtn2"><i class="fas fa-times"></i></div>  

<style>
  <?php include('style.css');?>
</style>

<script>      
    function openWindow() {
      document.getElementById("chatWindow").style.display = "block";
      document.getElementById("chatWindowBtn").style.display = "none";
      document.getElementById("chatWindowBtn2").style.display = "flex";            
      setTimeout(() => {
        document.getElementById("chatWindow").style.opacity = 1;
        document.getElementById("chatWindow").style.bottom = '130px';
        document.getElementById("chatWindowBtn2").style.transform = "rotate(0deg)";
      }, 100);
    }    
    document.getElementById("chatWindowBtn").addEventListener("click", openWindow);
    function closeWindow() {                 
      document.getElementById("chatWindow").style.opacity = 0;
      document.getElementById("chatWindow").style.bottom = '100px';      
      document.getElementById("chatWindowBtn").style.display = "flex";
      document.getElementById("chatWindowBtn2").style.transform = "rotate(-180deg)";
      setTimeout(() => {
        document.getElementById("chatWindow").style.display = "none";        
        document.getElementById("chatWindow").style.opacity = 0;   
        document.getElementById("chatWindowBtn2").style.display = "none";    
      }, 500);
    }    
    document.getElementById("chatWindowBtn2").addEventListener("click", closeWindow);
  </script>
