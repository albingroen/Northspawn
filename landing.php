<?php 
  $news = $db->prepare("SELECT * FROM newsItems");
  $news->execute();
?>

<div class="content">
  <!-- <?php 
  
    if($_SESSION['cookies'] == FALSE){
      echo <<<COOKIES
      <div class="cookies">      
        <p>Vi använder cookies för att göra din upplevelse bättre. Veganska cookies för en bättre miljö såklart.</p>
        <form method="post">
          <input type="submit" value="Jag förstår">      
          <input type="hidden" name="accept" value="true">;
        </form>
      </div>
COOKIES;
    } else {
      echo '';
    }

  ?> -->
  <div class="about">
    <h2>Om eventet</h2>
    <div class="date">
      <h4>Aros Congress Center</h4>
      <h3>18 November - 21 November </h3>      
    </div>
    <p>Ambitionen med NorthSpawn är att skapa ett årligt återkommande event med spel och gaming som huvudfokus. Eventet ligger i linje med Västmanlands ambition att vara en attraktiv region med högteknologisk kompetens och industrier i teknikens framkant. Vi hoppas att NorthSpawn kan bidra till regionens utveckling och skapa en levande mötesplats för spelare och IT-intresserade. NorthSpawn ska även vara en plattform för att skapa värdefulla kontaktytor mellan näringslivet och den kompetens som finns inom spelvärlden.
    Idéen kring Northspawn bygger på samarbete mellan en mängd aktörer av varierad typ och storlek som på olika sätt bidrar till att göra denna framtidssatsning möjlig. 
    </p>
  </div>
  <section>
    <div class="left" id="left1">
      <h2>Lan event</h2>
      <p>Med sina 1000 platser kommer NorthSpawns LAN att vara kärnan under eventet. På LANet samlas spelarna som tycker det är roligare att spela tillsammans. Ta med datorn och spela ditt favoritspel i en häftig miljö där du kan träffa nya och gamla vänner med gaming som gemensamt intresse.  LANet pågår dygnet runt under eventets alla dagar, men deltagare kan när som helst ta sovpauser i eventets bevakade sovsal. Även mat och snacks finns tillgängligt dygnet runt och kan köpas med matkuponger, Swish eller kontanter.</p>
    </div>
    <div  class="right" id="right1"></div>
  </section>
  <section class="section2" >
    <div class="left" id="left2">
      <h2>E-sport</h2>
      <p>NorthSpawn skapas framför allt för spelarna och därför har e-sport en solklar plats i eventet med 3 huvudturneringar som alla kan delta i. Vi vill erbjuda regionens gamers tävlingar i deras närhet, där alla har en chans att vinna. </p>
    </div>
    <div class="right" id="right2"></div>
  </section>
  <section class="section3">
    <div class="left" id="left3">
      <h2>Hackathon</h2>
      <p>Vill du lära dig programmering? Skapa en ny APP? Eller kanske bygga din egen speldator? På NorthSpawn kommer det att finnas aktiviteter för alla! Utmana dig själv och prova att göra något nytt, eller gör något du är duktig på! Under eventet kommer det att finnas hackathons och workshops som utmanar hjärnan och ger möjligheter att både lära sig nya saker, men också att hjälpa företag att lösa verkliga problemställningar. </p>
    </div>
    <div class="right" id="right3"></div>
  </section>

  <div class="newsFeed">
    <h2 class="title" >Nyheter om eventet</h2>
    <?php

      while($newsItem = $news->fetch()){
        echo <<<NEWSITEM
        <div class="newsItem">
          <h2>{$newsItem['title']}</h2>
          <p>{$newsItem['text']}</p>
          <div class="bottom">
            <h4>{$newsItem['date']}</h4>
            <h4>{$newsItem['author']}</h4>
          </div>
        </div>
NEWSITEM;
      } 

    ?>
  </div>

</div>
<style>
  <?php include('styles/landing/style.css') ?>
</style>
