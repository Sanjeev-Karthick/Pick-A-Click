<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Photo box connects you with amazing photographers for your occasionss"
    />

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="vendors/css/ionicons.min.css"
    />
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/main.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800"
      rel="stylesheet"
      type="text/css"
    />
    <title>Pick a click</title>
  </head>
  <body>
    <header>
      <nav > 
        <div class="row">
        <img
            src="resources/img/logx.png"
            class="logo"
      
          />
        
          <img
            src="resources/img/logo.jpeg"
            class="logo-black"
          />
          <ul class="main-nav js--main-nav">
            <li><a href="#features">Explore</a></li>
            <li><a href="#works">How it works</a></li>
            <li><a href="register.php">Our cities</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign up</a></li>
          </ul>
          <a class="mobile-nav-icon js--nav-icon"
            ><i class="ion-navicon-round"></i
          ></a>
        </div>
      </nav>
      <div class="hero-text-box">
        <h1>
          Book the best photo studio, <br />
          with just a few clicks.
        </h1>
        <a class="btn btn-full js--scroll-to-plans"href="showpage.php"
          ><b>Book  now</b></a
        >
        <a class="btn btn-ghost js--scroll-to-start" href="studio_signup.php"
          >For photo studio</a
        >
      </div>
    </header>

    <section class="section-features js--section-features" id="features">
      <div class="row">
        <h2><b>Book amazing photo studios for any occasion </b></h2>
        <p class="long-copy">
          With over 1000 professional photo studios with diverse specialities,
          available across India. Be it your wedding, family photoshoot, little
          one's birthday, a total revamp of you businesses imagery, We have  for you!
        </p>
      </div>
    </section>
    <section class="section-cities">
      <center>
        <div class="row">
          <h4><b>Categories</b></h4>
          <div class="row js--wp-3">
            <div class="col span-1-of-4 box">
              <img src="resources/img/wedding.jpg" class="round" alt="Lisbon" />
              <h3>Wedding</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img
                src="resources/img/baby.jpg"
                class="round"
                alt="San Francisco"
              />
              <h3>Babies & Kids</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img
                src="resources/img/business.jpg"
                class="round"
                alt="Mumbai"
              />
              <h3>Commercial</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img src="https://st2.depositphotos.com/1005893/9729/i/950/depositphotos_97296594-stock-photo-baby-girl-crying-in-hindus.jpg" class="round" alt="London" />
              <h3>Ear piercing</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row js--wp-3">
            <div class="col span-1-of-4 box">
              <img
                src="resources/img/corporate.jpg"
                class="round meal-photo"
                alt="Lisbon"
              />
              <h3 class="underline">Corporate events</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img
                src="https://www.greavesindia.co.uk/wp-content/uploads/2017/12/Spiritual-India_Golden-Temple_credit-JagjitSiStock-httpswww.istockphoto.comgbphotoblue-hour-harmandir-sahib-gm603910462-103703823.jpg"
                class="round"
                alt="San Francisco"
              />
              <h3>Spiritual function</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img src="resources/img/travel.jpg" class="round" alt="Mumbai" />
              <h3>Travel</h3>
            </div>
            <div class="col span-1-of-4 box">
              <img
                src="resources/img/maternity.jpg"
                class="round"
                alt="London"
              />
              <h3>Special occasion</h3>
            </div>
          </div>
        </div>
      </center>
    </section>

    <section class="section-steps" id="works">
      <div class="row">
        <h2><b> How it works </b></h2>
      </div>
      <div class="row">
        <div class="col span-1-of-2 steps-box">
          <img
            src="resources/img/photo.jpg"
            alt="Photographer image"
            class="app-screen js--wp-2"
          />
        </div>
        <div class="col span-1-of-2 steps-box">
          <div class="works-step clearfix">
            <div class="circle">
              <i class="ion-ios-search-strong" aria-hidden="true"></i>
            </div>
            <div>Search</div>
            <p>
              Search for your perfect Photo studios based on your location,
              category and ratings.
            </p>
          </div>
          <div class="works-step clearfix">
            <div class="circle"><i class="ion-heart"></i></div>
            <div>Shortlist</div>
            <p>
              Shortlist Photo studios like based on their , packages
              and reviews to keep track.
            </p>
          </div>
          <div class="works-step clearfix">
            <div class="circle"><i class="ion-card"></i></div>
            <div>Book</div>
            <p>
              Book your finalized Photo studio by selecting a package or
              directly contacting them on Whatsapp.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-meals">
      <div class="container">
        <div class="big">
          <img
            src="https://images.unsplash.com/photo-1610276347233-2ab70fc71da8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=495&q=80"
            alt=""
          />
        </div>
        <div class="vertical">
          <img
            src="https://images.unsplash.com/photo-1496217590455-aa63a8350eea?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fGZhc2hpb258ZW58MHwxfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
        </div>
        <div>
          <img
            src="https://images.unsplash.com/photo-1555474488-d2282fe0593f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fG9mZmljZXxlbnwwfDJ8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
        </div>
        <div class="horizontal">
          <img
            src="https://images.unsplash.com/photo-1511895426328-dc8714191300?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8ZmFtaWx5fGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
        </div>
        <div class="vertical">
          <img
            src="https://images.unsplash.com/photo-1601758174493-45d0a4d3e407?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fG5hdHVyZXxlbnwwfDF8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
        </div>
        <div>
          <img
            src="https://images.unsplash.com/photo-1486020425824-a3da4762c3ca?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDl8fGtpZHN8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
        </div>
        <div class="horizontal">
          <img
            src="https://images.unsplash.com/photo-1619274049499-e113b094666a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTM2fHxsYW5zY2FwZSUyMHBob3RvZ3JhcGh5fGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=600"
            alt=""
          />
        </div>
      </div>
    </section>

    <section class="section-cities" id="cities">
      <div class="row">
        <h2><b>We're currently in these cities</b></h2>
      </div>
      <div class="row js--wp-3">
        <div class="col span-1-of-4 box">
          <img
            src="data:image/jpeg;base64,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"
            alt="Lisbon"
          />
          <h3 style="text-align: center;"> Chennai</h3>
          
        </div>
        <div class="col span-1-of-4 box">
          <img
            src="data:image/jpeg;base64,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"
            alt="San Francisco"
          />
          <h3 style="text-align: center;">Bengaluru</h3>
          
        </div>
        <div class="col span-1-of-4 box">
          <img src="https://images.unsplash.com/photo-1591413740659-2abf5686532a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8a29jaGl8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Kochi" />
          <h3 style="text-align: center;">Cochin</h3>
         
        </div>
        <div class="col span-1-of-4 box">
          <img
            src="https://images.unsplash.com/photo-1602230349051-e3140106ee4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGluZGlhJTIwZ2F0ZXxlbnwwfDB8MHx8&auto=format&fit=crop&w=500&q=60"
            alt="Delhi"
          />
          <h3 style="text-align: center;">Delhi (coming soon)</h3>
         
        </div>
      </div>
    </section>

    <section class="section-testimonials">
      <div class="row">
        <h2><b>Hear from customers like you</b></h2>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <blockquote>
            "The support team was extremely helpful and able to accommodate our
            last minute request for a very important shoot. The photographer
            assigned to us was one of the very best! Our photographer was very
            professional and highly personable. I highly recommend Perfocal
            service for anyone looking to hire a photographer.”
            <cite> - Vaanmathi </cite>
          </blockquote>
        </div>
        <div class="col span-1-of-3">
          <blockquote>
            "Fantastic service. I was matched with a photographer very quickly.
            She was brilliant and the photos are lovely. Would highly
            recommend." <cite> - Pranav Chandar</cite>
          </blockquote>
        </div>
        <div class="col span-1-of-3">
          <blockquote>
            "Booked a baby shoot only two days in advance, and photos ready in a
            private online gallery only two days after the session. Amazing
            photographer made our house and garden look like a pro studio! "
            <cite> - Dhee</cite>
          </blockquote>
        </div>
      </div>
    </section>

    <section class="section-form">
      <div class="row">
        <h2><b>We're happy to hear from you</b></h2>
      </div>
      <div class="row">
        <form method="post" action="#" class="contact-form">
          <div class="row">
            <div class="col span-1-of-3">
              <label for="name">Name</label>
            </div>
            <div class="col span-2-of-3">
              <input
                type="text"
                name="name"
                id="name"
                placeholder="Your name"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-3">
              <label for="email">Email</label>
            </div>
            <div class="col span-2-of-3">
              <input
                type="email"
                name="email"
                id="email"
                placeholder="Your email"
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-3">
              <label for="find-us">How did you find us?</label>
            </div>
            <div class="col span-2-of-3">
              <select name="find-us" id="find-us">
                <option value="friends" selected>Friends</option>
                <option value="search">Search engine</option>
                <option value="ad">Advertisement</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="row"></div>
          <div class="row">
            <div class="col span-1-of-3">
              <label>Drop us a line</label>
            </div>
            <div class="col span-2-of-3">
              <textarea name="message" placeholder="Your message"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-3">
              <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
              <input type="submit" value="Send it!" />
            </div>
          </div>
        </form>
      </div>
    </section>

    <footer>
      <div class="row">
        <ul class="social-links row">
          <li>
            <a href="#"><i class="ion-social-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="ion-social-twitter"></i></a>
          </li>
          <li>
            <a href="#"><i class="ion-social-googleplus"></i></a>
          </li>
          <li>
            <a href="#"><i class="ion-social-instagram"></i></a>
          </li>
        </ul>
        <p>Copyright &copy; 2021    Pick a click. All rights reserved.</p>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="resources/js/script.js"></script>
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
