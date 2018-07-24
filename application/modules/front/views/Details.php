<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <title>SI Cinema - IF-11</title>
      <meta name="keywords" content="HTML5,CSS3,HTML,Template,Themeton" >
      <meta name="description" content="Tenguu Cinema - Movie Theater Template">
      <meta name="author" content="Themeton">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>frontendassets/images/favicon.png"/>
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>frontendassets/css/packages.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>frontendassets/css/default.css">
   </head>
   <body class="sticky-menu">
      <div id="loader">
         <div class="loader-ring">
            <div class="loader-ring-light"></div>
            <div class="loader-ring-track"></div>
         </div>
      </div>
      <div class="wrapper">
         <header id="header" class="menu-top-left">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-4">
                     <a href="./" id="logo" title="Tenguu" class="logo-image" data-bg-image="<?php echo base_url()?>frontendassets/images/logo.png">Tenguu
                     </a>
                  </div>
                  <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-8 phl0">
                     <div class="header_author">
                        <a href="<?php echo base_url() ?>">HOME</a>
                     </div>
                     <div class="header_ticket">

                        <a href="<?php echo base_url() ?>movies">Movies</a>
                     </div>
                     <a href="javascript:;" id="header-search"></a>
                     <div class="button_container" id="toggle">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                     </div>
                     <div class="overlay" id="overlay">
                        <a href="javascript:;" class="close-window"></a>
                        <nav class="overlay-menu">
                           <ul >
                              <li ><a href="<?php echo base_url() ?>">Home</a></li>
                              <li><a href="blog.html">Blog</a></li>
                              <li><a href="single.html">Single</a></li>
                              <li><a href="#order" class="order_btn">Order</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </header>
<section class="section-content pv12 bg-cover" data-bg-image="<?php echo base_url()?>frontendassets/images/blog/bg-single.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article class="blog-item single" >
                    <div class="col-md-4 col-sm12 post-image hover-dark" data-bg-image="<?php echo base_url()?>frontendassets/images/blog/single_thumb.jpg">
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 ph0">
                        <div class="post-content bg-cover" data-bg-image="<?php echo base_url()?>frontendassets/images/blog/post-single.jpg">
                            <div class="content-meta">
                                <h2 class="entry-title"><?php echo $datafilm->judul_film ?>
                                <span>Synopsis</span>
                                </h2>
                            </div>

                            <p class="entry-text"><?php echo $datafilm->sinopsis ?></p>
                            <div class="info-content">
                                <ul class="item-info">
                                    <li><span>Durasi:</span>  <p><?php echo $datafilm->durasi ?></p></li>
                                    <li><span>Genre:</span>  <p>Action ,triller</p></li>
                                    <li><span>Tanggal Tayang:</span>  <p><?php echo $datafilm->tanggal_mulai ?></p></li>
                                </ul>
                            </div>
                                <div class="content-footer">
                                    <a href="#order" class="order_btn btn order text-right"> By ticket</a>
                                </div>
                        </div>

                    </div>
                </article>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12 mt4">
                   <div class="single-slider">
                        <div class="swiper-container movie-images" id="singleslider" data-col="5">
                            <div class="swiper-wrapper">
                              <?php foreach ($datasemuafilm as $d): ?>
                                    <div class="swiper-slide">
                                        <div class="movie-image" data-bg-image="<?php echo base_url()?>frontendassets/images/carousel/movie-1.jpg">
                                            <div class="entry-hover">
                                                <div class="entry-actions">
                                                    <a href="<?php echo base_url().'front/details/'.$d->id_film?>" class="btn fill">More</a>
                                                </div>
                                            </div>
                                            <div class="entry-desc">
                                                <h3 class="entry-title"><?php echo $d->judul_film ?></h3>
                                                <ul class="entry-date">
                                                    <li><?php echo $d->tanggal_mulai ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                          <?php endforeach; ?>
                        </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
        </div>
    </div>
</section>
    <footer id="footer">
        <div class="container footer-container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Menu</h5>
                        <ul class="menu">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="<?php echo base_url() ?>movies">Movies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">Address information</h5>
                        <p>
                            California. AMC Dine-In Theatres Marina,
                            Street 26, Distritc 543 #108
                         </p>
                         <p>
                            <i class="fa fa-mail"></i>Example@mail.com<br>
                            <i class="fa fa-phone"></i> + 123 456 7890
                         </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row copyright-text">
                    <div class="col-sm-12 text-center">
                        <p class="mv3 mvt0">&copy; Copyrights 2017 Tenguu. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- Overlay Search -->
    <div id="overlay-search">
        <form method="get" action="./">
            <input type="text" name="s" placeholder="Search..." autocomplete="off">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
        <a href="javascript:;" class="close-window"></a>
    </div>
    <div id="order">
        <div class="container">
            <div class="row order-content">
                <div class="col-sm-8 col-xs-12 seat_content ph0">
                    <h2>order a ticket</h2>
                    <div class="entry-order-content">
                        <form id="msform" name="msform">
                            <!-- fieldsets -->
                            <fieldset>
                                 <div class="wpc-content">
                                    <h3>location</h3>
                                    <select name="location">
                                        <option>Tenguu Cinema Tysons corner</option>
                                        <option>Tenguu Cinema </option>
                                        <option>Tenguu Cinema corner</option>
                                        <option>Tenguu Cinema Tysons</option>
                                    </select>
                                    <h3 class="mt3">Movie</h3>
                                    <select>
                                        <option>Dead pool</option>
                                        <option>THE BATTLE OF ALGIERS (DI ALGERI)</option>
                                        <option>LORD OF THE RINGS: THE RETURN OF THE KINGS</option>
                                        <option>Tenguu Cinema Tysons corner</option>
                                    </select>
                                    <h3 class="mt3">Date</h3>
                                    <input type='date' class="datetime"/>
                                    <h3 class="mt3">TIME</h3>
                                    <ul class="order-date">
                                        <li><a href="javascript:;"><i>11:50</i></a></li>
                                        <li><a href="javascript:;"><i>13:40</i></a></li>
                                        <li><a href="javascript:;"><i>16:35</i></a></li>
                                        <li><a href="javascript:;"><i>17:30</i></a></li>
                                        <li><a href="javascript:;"><i>19:50</i></a></li>
                                        <li><a href="javascript:;"><i>21:10</i></a></li>
                                    </ul>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset class="seat-content">
                                <div class="wpc-content">
                                    <h3 class="seat_title">seat</h3>
                                    <div id="seat-map"></div>
                                    <div id="legend"></div>
                                </div>
                                <input type="button" name="previous" class="action-button previous" value="Previous" />
                                <input type="submit" name="submit" class="submit action-button" value="Submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                    <h2>Your Information</h2>
                    <div class="order-details">
                        <span> Location:</span><p id="locationp">Tenguu Cinema Tysons corner</p>
                        <span>Time:</span>  <p>2016.3.8 18:30</p>
                        <span>Seat: </span>
                        <ul id="selected-seats"></ul>
                        <div>Tickets: <span id="counter">0</span></div>
                        <div>Total: <b>$<span id="total">0</span></b></div>
                    </div>
                    <a href="javascript:;" class="close-window"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Scripts -->
    <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/packages.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/scripts.min.js"></script>
<!-- jQuery easing plugin -->
</body>
</html>
