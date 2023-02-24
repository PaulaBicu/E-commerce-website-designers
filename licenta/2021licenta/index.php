<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php
include("header.php");
?>


    <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/img1.png" style="width:100%">
          <div class="text"></div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/img2.png" style="width:100%">
          <div class="text"></div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/img3.png" style="width:100%">
          <div class="text"></div>
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        
        <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
        </script>


   <!-- <section class="hero">
        <div class="container">
            <div class="left-col">
                <p class="subhead">It's Nitty &amp; Gritty</p>
                <h1>A Task App That Doesn't Stink</h1>

                <div class="hero-cta">
                    <a href="#" class="primary-cta">Try for free</a>
                    <a href="#" class="watch-video-cta">
                        <img src="https://assets.codepen.io/2621168/watch.svg" alt="Watch a video">Watch a video
                    </a>
                </div>
            </div>

            <img src="https://assets.codepen.io/2621168/illustration.svg" class="hero-img" alt="Illustration">
        </div>
    </section>
-->
    <section class="features-section">
        <div class="container">
            <ul class="features-list">
                <li>Interfață prietenoasă și ușor de utilizat</li>
                <li>Oportunități de avansare în carieră</li>
                <li>O platformă dedicată nevoilor tale</li>
                <li>Prețuri accesibile</li>
                <li>Asistență constantă</li>
                <li>Protecție a datelor</li>
            </ul>

            <img src="images/teemo.png" alt="Teemo">
        </div>
    </section>

    <section class="testimonials-section">
        <div class="container">
            <ul>
                <li>
                    <img src="images/person1.jpg" alt="Person">

                    <blockquote>"Platforma Bezal.el mi-a oferit ea mai placută experiență de până acum în vederea vânzării operelor create în mediul digital. "</blockquote>
                    <cite>- Maria Ciobănescu</cite>
                </li>
                <li>
                    <img src="images/person2.jpg" alt="Person">

                    <blockquote>"Personal specializat și mereu dornic de a-și îmbunătății serviciile. Recomand cu toată căldura."</blockquote>
                    <cite>- Andrei Marian</cite>
                </li>
                <li>
                    <img src="images/person3.jpg" alt="Person">

                    <blockquote>"Este exact ce căutam pentru a-mi începe cariera de artist. "</blockquote>
                    <cite>- Elena Copac</cite>
                </li>
            </ul>
        </div>
    </section>

<?php
include("footer.php");
?>

</body>
</html>