<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../web/css/bootstrap.css" />
  <link rel="stylesheet" href="../../web/css/index.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@1&family=Lato:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body>
<!--  <nav class="navbar navbar-expand-lg navbar-light nav-background fixed-top">-->
<!---->
<!--    <a href="" class="navbar-brand">-->
<!--      <img src="img/php.png" width='30' height='30' alt="">-->
<!--      Code Samples-->
<!--    </a>-->
<!---->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"-->
<!--      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--      <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarNav">-->
<!--      <ul class="navbar-nav">-->
<!--        <li class="nav-item active">-->
<!--          <a href="" class="nav-link">-->
<!--            Home-->
<!--          </a>-->
<!--        </li>-->
<!--        <li class="nav-item dropdown">-->
<!--          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"-->
<!--            aria-haspopup="true" aria-expanded="false">-->
<!--            Languages-->
<!--          </a>-->
<!--          <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--            <a href="" class="dropdown-item">PHP</a>-->
<!--            <a href="" class="dropdown-item">MySQL</a>-->
<!--            <a href="" class="dropdown-item">Python</a>-->
<!--            <a href="" class="dropdown-item">Java</a>-->
<!--            <a href="" class="dropdown-item"></a>-->
<!--          </div>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a href="" class="nav-link">FeedBack</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a href="" class="nav-link">News</a>-->
<!--        </li>-->
<!--      </ul>-->
<!--      <ul class="navbar-nav ml-auto">-->
<!--        <li class="nav-list">-->
<!--          <a href="" class="nav-link">-->
<!--            <img src="img/ukraine.png" width ='20px' height='20px' alt="">-->
<!--          </a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a href="" class="nav-link">Sign In</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a href="" class="nav-link">Sign Up</a>-->
<!--        </li>-->
<!--      </ul>-->
<!--    </div>-->
<!--  </nav>-->


  <div id="demo" class="carousel slide mx-0" data-ride="carousel" style="margin-top: 33px;">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <div class="carousel-inner">
      <div class="carousel-item active">     
        <img src="../../web/img/1.png" width = '2498' height = '1000' class="d-block w-100 img-fluid" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Drink Coffee</h5>
          <p>Write your samples!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../../web/img/3.png" width = '2498' height = '1000' class="d-block w-100 img-fluid" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Make you workspace inspiring!</h5>
          <p>Be creative!</p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="crop">
          <img src="../../web/img/2.png" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>Write Simple!</h5>
          <p>Help beginners to achieve their goals.</p>
        </div>
      </div>
  
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>

  <div class="container" style = 'margin-top: 70px;'>
    <div class="row director rounded p-3">
      <div class="col-lg-4">
        <div class="home-director">
          <a href="#">
            <img src="../../web/img/news.png" class = 'd-block img-fluid mx-auto mt-3' alt="">
          </a>
          Check the latest news from the programming sphere.
        </div>
      </div>
      <div class="col-lg-4">
        <div class="home-director">
          <a href="#">
            <img src="../../web/img/posts.png" class = 'd-block img-fluid mx-auto mt-3' alt="">
          </a>
          Check the latest news from the programming sphere.
        </div>
      </div>
      <div class="col-lg-4">
        <div class="home-director">
          <a href="#opinions">
            <img src="../../web/img/feedback.png" class = 'd-block img-fluid mx-auto mt-3' alt="">
          </a>
          Check the latest news from the programming sphere.
        </div>
      </div>
    </div>
  </div>
  
  <div id = "opinions" class="container rounded" style = "margin-top: 70px; background-color: #E4F0D0;">
    <div class="row">
      <div class="col-12 testimonials">
        Programmer's testimonials
      </div>
      <div class="col-12 testimonials2">
        Real personal opinions
      </div>
    </div>
    <div  class="row mt-3 p-2" style = 'border-bottom: 1px dashed #8D98A0;'>
      <div class="col-lg-1" >
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3" style = 'border-right: 1px dashed #8D98A0;'>
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
      <div class="col-lg-1">
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3" style = 'border-right: 1px dashed #8D98A0;'>
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
      <div class="col-lg-1">
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3">
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
    </div>
    <div class="row mt-3 p-2" style = 'border-bottom: 1px dashed #8D98A0;'>
      <div class="col-lg-1">
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3" style = 'border-right: 1px dashed #8D98A0;'>
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
      <div class="col-lg-1">
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3" style = 'border-right: 1px dashed #8D98A0;'>
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
      <div class="col-lg-1">
        <img src="../../web/img/dog.jpg" class = 'd-block img-fluid rounded-circle' width= '100' height = '100' alt="">
      </div>
      <div class="col-lg-3">
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
      </div>
    </div>
  </div>
  



 

  <script src='js/bootstrap.bundle.min.js'></script>
  <script src='js/jquery.min.js'></script>
  <script src='js/bootstrap.min.js'></script>
</body>

</html>