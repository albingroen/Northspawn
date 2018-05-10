# Northspawn

## Initializing boilerplate

```
mkdir northspawn && cd northspawn && mkdir incs &&
mkdir imgs && mkdir styles && touch index.php && cd styles && touch styles.scss
```

## Tools and methods

* 😅 PHP
* :metal: SASS
* :sparkles: CSS
* :camel: VSCode
* :octocat: Github Desktop
* 🖥 Iterm 2
* 🔨 SQLite Studio

## Project status

* [x] Create ideas
* [x] Idea feedback from mentors
* [x] Project plan
* [x] Start building
* [ ] Finish build
* [ ] Review of project

## Ideas & features

* Start page w/ news feed and comments
* Register form for showing interest in joining event
* All texts should be database sources for easy editing
* Admin page for creating news

## Notes

## 2018-05-04

Today I started the day by building on the functionalities with user accounts. I finished my register and login pages so I could begin with the functionalities. I realized the best way of making the flow was to make a user register and sign in on their account before actually being able to place and order. I added a user_passwrod column into my users table in SQLite Studio.

Adding an user to the database was no problem, with a few sql injections and if-statements. Our teacher also decided to have a class in hashing and salting passwords using B-crypt. This made encrypting the password for a user before storing it in the datebase for each user a breeze. The problems starting occuring though when I had to sign in a user on the page over at the login page. My knowledge of SESSION was quite weak, so I googled a little bit and asked for a good explanation from my teacher. I soon realized it was not that complicated, you just had to start the session at some place, and than store for example the email which the user would sign in with in a SESSION variable.

I also decided to create a functionality for being able to load in pages dynamically. For doing this you need something called a page-controller. I created one of these, where i also set `session_start()` and some other variables that need to be globally aplied through out the site. Now I could simply go to pages by doing `index.php?pageid=login` were `index.php` then also would contain header and footer. I think doing this was a good choise and will help me in the future of building the website.

## 2018-05-09

The past days, including today, I have spent on designing and implementing at the site. I added the proper images that for now just are placeholder images. I added the content for the footer with all close to all links needed. I also styled the footer, and continued the styling on the login and register page. I included a illustration of a avatar which is shown when signed in.

Today, I also started doing some testing on the website to make sure everything worked properly on different browesers like Safari and Firefox. I took a general website compatability test which gave me a below average score in Sweden. The results also showed me what had to be improved on the site in general. I wrote these down and started on working on making my site responsive. I began with making the landing-page responsive, which turned out pretty good. I also decided to spin the website up on the webserver via FileZilla client to view it on a phone for the first time. Everything but the Login and Register pages looked and worked good as expected.

---

## Tests

### General test

https://webbriktlinjer.se/testa-din-webbplats/?start

1.  Är webbplatsen konsekvent i sin navigation, struktur och övriga utformning?

* [ ] Ja, navigeringen och strukturen är likadan på hela webbplatsen och utformningen följer en grafisk profil. Inga eller endast ett par sidor gör avsteg från detta.
* [x] Nja, webbplatsen har avsnitt som ser lite olika ut i form och struktur men inom dessa avsnitt är det konsekvent.
* [ ] Nej, det är inte helt konsekvent. En del sidor byter utseende ganska markant både när det gäller struktur och utformning, och ibland även navigeringen.

2.  Är det möjligt att navigera på webbplatsen genom att enbart använda tangentbordet på en dator?

* [x] Ja, det går att använda tangentbordet för att ta sig fram till samtliga länkar och objekt på sidan. Användarna kommer åt all information enbart med hjälp av tangentbordet.
* [ ] Nja, det går att navigera i menyer och den huvudsakliga informationen, men vissa funktioner är inte åtkomliga via tangentbordet.
* [ ] Nej, det gå inte att nå de flesta funktioner och huvudparten av informationen genom att enbart navigera med tangentbordet

3.  Går det att zooma gränssnittet utan att text hamnar bakom andra objekt och utan att information eller funktionalitet går förlorad?

* [ ] Ja, all text och alla funktioner går att både se tydligt och komma åt. Det fungerar även utan att användaren behöver scrolla i sidled för att läsa texten.
* [x] Delvis, det går att förstora men man måste scrolla i sidled för att kunna läsa en rad
* [ ] Nej, det går inte att förstora, alternativt text och funktioner går förlorade om man zoomar.

4.  Finns det formulär på webbplatsen som använder sig av en grafisk CAPTCHA-lösning?

* [ ] Ja, webbplatsens formulär använder sig av grafisk CAPTCHA.
* [x] Nej, inga formulär på webbplatsen använder en grafisk captcha.
* [ ] Delvis, det finns formulär som använder grafiska CAPTCHA men webbplatsens huvudsakliga funktioner har formulär utan CAPTCHA.
* [ ] Frågan är inte aktuell för vår webbplats. Vi använder oss inte av formulär.

5.  Är alla visuella rubriker uppmärkta med html-elementen h1-h4 i rätt hierarkisk ordning?

* [x] Ja, webbplatsens rubriker är uppmärkta med rätt h-element.
* [ ] Delvis, de flesta rubriker är uppmärkta som rubriker men det finns undantag. Däremot är inte mer än var tionde visuell rubrik per sida är felaktig och huvudrubriken är korrekt på alla sidor.
* [ ] Nej, det finns många sidor som inte har uppmärkta rubriker eller fel hierarkisk ordning på rubriknivåerna.

6.  Fungerar webbplatsen även i enheter med små skärmar som smartphones och surfplattor?

* [ ] Ja, hela gränssnittet, inklusive tjänster går att använda i smartphones och på surfplattor.
* [ ] Delvis, enskilda tjänster fungerar inte, men webbplatsen är byggd med responsiv (följsam) design.
* [x] Webbplatsen fungerar att surfa på men är inte byggd med responsiv (följsam) design.
* [ ] Nej, flera tjänster eller hela webbplatsen är svår eller omöjlig att använda på en enhet med liten skärm.

7.  Är ledtexterna placerade i direkt anslutning till formulärens olika objekt (textfält, radioknapp, kryssruta, select-lista)? Tänk på att ett sökfält är ett formulär som behöver en ledtext.

* [x] Ja, alla ledtexter ligger i direkt anslutning till formulärsobjektet.
* [ ] Nej, det är bitvis eller alltid långt mellan ledtexterna och formulärsobjekten.
* [ ] Frågan är inte aktuell för vår webbplats. Vi använder oss inte av formulär.
* [ ] Delvis, avståndet mellan ledtext och formulärsobjektet är ibland långt men det finns då en linje/färgskiftning som gör att det går att se kopplingen även vid stark förstoring.

8.  Är det tydliga kontraster mellan bakgrund och förgrund?

* [x] Ja, alla viktiga delar som avviker från övrigt innehåll är tydligt markerade. De har antingen tydliga kontraster, är understrukna, har en ikon eller något annat som kompletterar färg för att visa att de är klickbara.
* [ ] Delvis, det är oftast tydligt, men när det gäller till exempel klickbara bilder är det inte tydligt markerat.
* [ ] Nej, det finns till exempel länkar och andra delar på webbplatsen som inte har tydliga kontraster.

9.  Är klickytorna så väl tilltagna att det går att klicka på dem på en liten skärm?

* [ ] Ja, alla klickbara objekt är väl tilltagna.
* [ ] Delvis, men det finns ett undantag, exempelvis en kalenderfunktion.
* [x] Nej, det finns flera undantag

10. Är webbplatsens filmer textade?

* [ ] Ja, alla filmer är textade
* [ ] Delvis. Videofilmerna är inte textad men det finns tydliga länkar i nära anslutning till filmerna som leder till material som ger samma information som filmerna.
* [ ] Nej, videofilmerna är inte textade. Det finns inte heller, eller är inte självklart för besökarna var de kan hitta motsvarande textbaserade material som ger samma information som filmerna.
* [x] Inte aktuellt. Vi har inga filmer på vår webbplats.

11. Kompletterar ni texter med ljud, bild eller film i de fall någon bedömer att det skulle behövas?

* [ ] Ja, vi gör alltid en avvägning för att avgöra om vi behöver komplettera texterna på något sätt.
* [ ] Delvis, enskilda redaktörer kan inte köpa in detta men det finns rutiner som gör att webbplatsens innehåll kan kompletteras med illustrationer och film i informationssyfte.
* [x] Nej, vi brukar inte komplettera texter med ljud, bild eller film.

12. Lyfter ni fram det som är mest relevant i era texter?

* [x] Ja, våra texter har alltid ett tydligt syfte och lyfter det relevanta för läsaren.
* [ ] Nja, vi har en mix av texter – en del är omfångsrika och svårgenomträngliga medan andra har ett tydligt syfte och lyfter fram det viktigaste för läsaren.
* [ ] Nej, vi har många omfångsrika texter med ett komplicerat språk.

13. Finns det tydligt markerade länkar till hjälp eller infogad hjälp i alla e-tjänster? Tänk på att detta även gäller till exempel flödet i en en köpprocess i en nätbutik eller när man beställer material, blanketter, bokar tider med mera.

* [x] Nej, det finns varken generellt eller för enskilda formulärsobjekt.
* [ ] Delvis, det finns antingen enbart för enskilda objekt i formulär eller alla e-tjänster.
* [ ] Ja, det finns tydliga hjälptexter både för enskilda objekt i formulär och generellt för alla e-tjänster.
* [ ] Frågan är inte aktuell för vår webbplats. Vi har inga e-tjänster.

14. Har länkarna unika länktexter?

* [x] Ja, alla länkar är unika och använder rubriken på den sida de länkas till.
* [ ] Ja, de är unika, men inleds ofta med "Läs mer om ..." "Klicka här ..." eller liknande.
* [ ] Nej, länkarna på en sida ser ofta ut på samma sätt såsom "Klicka här för hela nyheten" eller liknande.

15. Har ni aktivt gjort era pdf:er tillgängliga

* [ ] Ja, vi har bara tillgängliga pdf:er på vår webbplats.
* [ ] Nja, vi har pdf:er som går att använda i skärmläsare, men texten är ostrukturerad.
* [ ] Nej, våra pdf:er är bara skapade för utskrift och är bara som en bild.
* [x] Frågan är inte aktuell för oss. Vi har inga pdf:er på vår webbplats.

16. Är all information på webbplatsen skriven på begriplig svenska?

* [x] Ja, alla våra texter är skrivna på begriplig svenska.
* [ ] Nja, vi har en mix av texter – en del är skrivna på begriplig svenska, medan andra texter har ett komplicerat språk.
* [ ] Nej, de flesta av våra texter har ett komplicerat språk.

17. Visas fokus visuellt tydligt när användaren förflyttar sig med tangentbordet på webbplatsens sidor?

* [ ] Ja, det är tydligt på alla länkar och knappar på sidorna.
* [x] Nja, det är oftast tydligt. Men för enstaka länkar och knappar i innehållet.
* [ ] Nej, det är inte alltid tydligt.

18. Är webbplatsens rubriker så tydliga att användarna snabbt förstår vad sidan, tabellen, funktionen eller e-tjänsten handlar om?

* [x] Ja, rubrikerna innehåller nyckelord och är så tydliga att användarna snabbt förstår vad webbplatsens olika sidor och detaljer ' [ handlar om.
* [ ] Nja, de flesta rubriker är tydliga och informativa men vi har inga rubriker på till exempel tabeller och många allmänt hållna ' rubriker som ”aktiviteter”, eller en och samma rubrik genom en hel e-tjänst.
* [ ] Nej, de flesta rubrikerna är allmänt hållna såsom ”Inledning”, ”Aktiviteter”, "Tabell", "E-tjänst" eller liknande.

19. Ligger kontaktinformationen åtkomlig från alla sidor på webbplatsen?

* [ ] Ja, vi har tydlig kontaktinformation som ligger åtkomliga från alla sidor.
* [x] Nej, vi har inte tydlig kontaktinformationen som ligger åtkomlig från alla sidor.

### Score = 63%

## To-do regarding general test

* [x] Make responsive
* [x] Better navigation
* [ ] Zoom-comaptablities
* [x] Bigger clickable areas for mobile users
* [ ] Add contact info in footer
* [x] Show focus when navigating with keyboard

### Broswer test

#### Google Chrome

The browser that the website actually is developed in. The site looks good with nice strokes on borders and proper styling on text in form of font weight.

#### Apple Safari

In Safari the site overall looks good. The main differences between these two are the font. Here the font looks a bit skinny. Login and registration works properly.

#### Mozilla Firefox

Site looks very good, in fact more or less identical to how it looks on Google Chrome. Login and registration works properly.
