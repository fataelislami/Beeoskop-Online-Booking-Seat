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
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>
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
                     <a href="./" id="logo" title="Tenguu" class="logo-image" data-bg-image="<?php echo base_url()?>frontendassets/images/logo.png">Bioskop
                     </a>
                  </div>
                  <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-8 phl0">
                     <div class="header_author">
                        <a href="<?php echo base_url() ?>">HOME</a>
                     </div>
                     <div class="header_ticket">
                        <a href="<?php echo base_url() ?>movies" class="">Movies</a>
                     </div>
                     <?php if($this->session->userdata('status')!='login'){?>
                       <div class="header_ticket">
                          <a href="<?php echo base_url() ?>login" class="">Masuk</a>
                       </div>
                     <?php }else{ ?>
                       <div class="header_ticket">
                          <a href="<?php echo base_url() ?>pelanggan" class=""><?php echo $this->session->userdata('username'); ?></a>
                       </div>
                     <?php } ?>


                  </div>
               </div>
            </div>
         </header>
         <div class="fullwidth-slider">
            <div id="headerslider" class="carousel slide">
               <div class="carousel-inner" role="listbox">
                  <div class="item active">
                     <div class="fill" data-bg-image="<?php echo base_url()?>assets/fixslide.jpg">
                        <div class="bs-slider-overlay"></div>
                        <div class="container movie-slider-container">
                           <div class="row">
                              <div class="col-sm-12 movie-slider-content">
                                 <div class="slider-content" >
                                    <ul class="subtitle"  data-animation="animated bounceInRight">
                                       <li>Selamat</li>
                                       <li>Datang</li>
                                       <li>BroBro</li>
                                    </ul>
                                    <div class="title" data-animation="animated bounceInRight" >Liburan Uas kemana nih? Bioskopin Aja!</div>
                                    <div class="slide_right" data-animation="animated bounceInRight">
                                       <a href="#order" class="btn-ticket order_btn">Order Sekarang</a>
                                       <br>
                                       <br>
                                       <br><br>
                                    </div>
                                    <!-- <div class="chart-cirle">
                                       <div class="chart-circle-l" data-animation="animated bounceInUp">
                                          <div class="circle-chart" data-circle-width="7" data-percent="64" data-text="6.4" >
                                          </div>
                                          <span>IMDB Ratffing</span>
                                       </div>
                                       <div class="chart-circle-r" data-animation="animated bounceInUp">
                                          <div class="circle-chart" data-circle-width="7" data-percent="84" data-text="8.4" >
                                          </div>
                                          <span>Rotten Rating</span>
                                       </div>
                                    </div> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


               </div>
               <!-- Controls -->
               <a class="carousel-control left" href="#headerslider" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control right" href="#headerslider" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <section class="section-content">
            <div class="container-fluid pv11 ">
               <div class="row">
                  <div class="col-sm-12">
                     <h3 class="heading text-center">Now playing</h3>
                     <div class="ticket-carousel pvt85">
                        <div class="swiper-container carousel-container movie-images" data-col="5">
                           <div class="swiper-wrapper">
                             <!-- START -->
                             <?php foreach ($datafilm as $d): ?>
                               <div class="swiper-slide">
                                  <div class="movie-image" data-bg-image="<?php echo base_url()?>assets/film-image/<?php echo $d->url_gambar ?>">
                                     <div class="entry-hover">
                                        <div class="entry-actions">
                                           <a href="#" class="btn-trailers">Lihat Deskripsi</a>
                                           <a href="#order" class="btn-ticket order_btn ">buy ticket</a>
                                        </div>
                                     </div>
                                     <div class="entry-desc">
                                        <div class="rating">
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                        </div>
                                        <h3 class="entry-title"><?php echo $d->judul_film ?></h3>
                                        <ul class="entry-date">
                                           <li>11 :00</li>
                                           <li>13 :50</li>
                                           <li>14 :00</li>
                                           <li>18 :00</li>
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                             <?php endforeach; ?>

                              <!-- START -->

                           </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>

               <!-- COMINGSOON DISINI -->
               <div class="row">
                  <div class="col-sm-12">
                     <h3 class="heading text-center">Coming Soon</h3>
                     <div class="ticket-carousel pvt85">
                        <div class="swiper-container carousel-container movie-images" data-col="5">
                           <div class="swiper-wrapper">
                             <!-- START -->
                             <?php foreach ($datafilmcoming as $d): ?>
                               <div class="swiper-slide">
                                 <div class="movie-image" data-bg-image="<?php echo base_url()?>assets/film-image/<?php echo $d->url_gambar ?>">
                                     <div class="entry-hover">
                                        <div class="entry-actions">
                                           <a href="#" class="btn-trailers video-player">Lihat Deskripsi</a>
                                        </div>
                                     </div>
                                     <div class="entry-desc">
                                        <div class="rating">
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                           <input name="stars" type="radio">
                                           <label>☆</label>
                                        </div>
                                        <h3 class="entry-title"><?php echo $d->judul_film ?></h3>
                                        <ul class="entry-date">
                                           <li>11 :00</li>
                                           <li>13 :50</li>
                                           <li>14 :00</li>
                                           <li>18 :00</li>
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                             <?php endforeach; ?>

                              <!-- START -->

                           </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
               <!-- COMING SOON -->
            </div>




            <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/google-maps.js"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
         </section>
         <footer id="footer">
            <div class="container footer-container">
               <div class="row">
                  <div class="col-md-2 col-sm-6">
                     <div class="widget">
                        <h5 class="widget-title">Menu</h5>
                        <ul class="menu">
                           <li><a href="#">Home</a></li>
                           <li><a href="#">Coming soon</a></li>
                           <li><a href="#">Order</a></li>
                           <li><a href="#">Terms of service</a></li>
                           <li><a href="#">Pricing</a></li>
                        </ul>
                     </div>
                     <div class="widget">
                        <div class="social-links">
                           <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                           <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                           <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                        </div>
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
                  <div class="col-md-6">
                     <div class="widget">
                        <h5 class="widget-title">Leave a message</h5>
                        <form class="contact_form transparent">
                           <div class="row">
                              <div class="col-sm-12">
                                 <input type="text" class="inputValidation" name="name" placeholder="Name *">
                              </div>
                              <div class="col-sm-12">
                                 <input type="text" class="inputValidation" name="email" placeholder="Email *">
                              </div>
                              <div class="col-sm-12 ">
                                 <textarea class="inputValidation" placeholder="Message *"></textarea>
                                 <button type="submit" class="button fill rectangle">Send to us</button>
                              </div>
                           </div>
                        </form>
                        <div class="errorMessage"></div>
                     </div>
                  </div>
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
              <?php if($this->session->userdata('status')!='login'){?>
                <a href="javascript:;" class="close-window pull-right"><i class="fa fa-times"></i></a>
                <div class="col-md-12">
                  Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu <a href="<?php echo base_url();?>login">LOGIN</a>,Atau lakukan pendaftaran disini <a href="<?php echo base_url();?>register">DAFTAR</a>
                </div>

             <?php } else if($this->session->userdata('level')=='admin'){ ?>
               <a href="javascript:;" class="close-window pull-right"><i class="fa fa-times"></i></a>
               <div class="col-md-12">
                 Pembelian tiket tidak bisa dilakukan oleh admin
               </div>
             <?php } else{ ?>
               <div class="col-sm-8 col-xs-12 seat_content ph0">
                  <h2>order a ticket</h2>
                  <div class="entry-order-content">
                    <form id="msform" action="<?php echo base_url()?>pelanggan/tiket/proses" method="post" name="msform">
                        <!-- fieldsets -->
                        <fieldset>
                           <div class="wpc-content">
                              <h3>Movie</h3>
                              <select name="movie" id="movie">
                              </select>
                              <h3>Studio</h3>
                              <select name="studio" id="studio">
                              </select>
                              <h3 class="tanggal">Date</h3>
                              <select name="tanggal" id="tanggal">
                              </select>
                              <h3 class="mt3">TIME</h3>
                              <select name="waktu" id="waktu">

                              </select>
                           </div>
                           <input type="button" id="nextProses" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset class="seat-content">
                           <div class="wpc-content">
                              <h3 class="seat_title">seat</h3>
                              <div id="seat-map"></div>
                              <div id="legend"></div>
                           </div>
                           <div id="checkboxKursi">

                           </div>
                           <a href="<?php echo base_url() ?>"><input type="button" href="<?php echo base_url()?>" class="action-button" value="Reset" /></a>
                           <input type="submit" name="submit" class="action-button" value="Submit" />
                        </fieldset>
                      </form>
                  </div>
               </div>
               <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                  <h2>Informasi</h2>
                  <div class="order-details">
                     <span> Lokasi:</span>
                     <p id="locationp">Bioskop SI</p>
                     <span>Tanggal:</span>
                     <p id="timesummary"></p>
                     <span>Pukul:</span>
                     <p id="waktusummary"></p>
                     <span>Kursi: </span>
                     <ul id="selected-seats"></ul>
                     <div>Tiket: <span id="counter">0</span></div>
                     <div>Total: <b>Rp.<span id="total">0</span></b></div>
                  </div>
                  <a href="javascript:;" class="close-window"><i class="fa fa-times"></i></a>
               </div>
             <?php } ?>

            </div>
         </div>
      </div>

      <!-- Include jQuery and Scripts -->
      <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/packages.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        function load(){
          var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost/bioskop/admin/json/getJudulFilm",
              "method": "GET",
            }

            $.ajax(settings).done(function (response) {
              items=JSON.parse(response);
              var akhir=items.length;
              $("#movie").html('<option>--</option>');
              for(var i=0;i<=akhir;i++){
                $("#movie").append('<option value="'+items[i].id_film+'">'+items[i].judul_film+'</option')
              }
            });
        }
        load();
        function tanggal(value){//ambil tanggal dengan perulangan value, nilai fungsi sebagai array dar [tanggal,tanggal+hari]
          var today = new Date();
          var dd = today.getDate()+value;
          var hari =today.getDay()+value;
          var hariArray=["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
          var mm = today.getMonth()+1; //January is 0!
          var yyyy = today.getFullYear();

          if(dd<10) {
              dd = '0'+dd
          }

          if(mm<10) {
              mm = '0'+mm
          }

          today = yyyy + '-' + mm + '-' + dd;
          todaywithHari = hariArray[hari] + '-' + mm + '-' + yyyy;
          var returnValue=[today,todaywithHari]
          return returnValue;
        }
        $("#movie").change(function(){
          var id_film=$(this).val();
          var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost/bioskop/admin/json/getStudiobyFilm/"+id_film,
              "method": "GET",
            }

            $.ajax(settings).done(function (response) {
              items=JSON.parse(response);
              var akhir=items.length;
              $("#studio").html('<option>--</option>');
              for(var i=0;i<=akhir;i++){
                $("#studio").append('<option value="'+items[i].id_studio+'">'+items[i].nama_studio+'</option>');
              }
            });
            var setting2 = {
                "async": true,
                "crossDomain": true,
                "url": "http://localhost/bioskop/admin/json/getJudulFilmbyId/"+id_film,
                "method": "GET",
              }

              $.ajax(setting2).done(function (response2) {
                items2=JSON.parse(response2);
                var akhir=items2[0].DurasiHari;
                var d=new Date("yyyy-mm-dd");
                $("#tanggal").html('<option>--</option>');
                for(var i=0;i<3;i++){
                  $("#tanggal").append('<option value="'+tanggal(i)[0]+'">'+tanggal(i)[1]+'</option>');
                }
              });
        });


        $("#studio").change(function(){
          var id_film=$("#movie").val();
          var id_studio=$("#studio").val();
          var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost/bioskop/admin/json/getJamFilm/"+id_film+"/"+id_studio,
              "method": "GET",
            }

            $.ajax(settings).done(function (response) {
              items=JSON.parse(response);
              var akhir=items.length;
              $("#waktu").html('<option>--</option>');
              for(var i=0;i<=akhir;i++){
                $("#waktu").append('<option value="'+items[i].id_jam_tayang+'">'+items[i].jam_tayang+'</option>');
              }
            });
        });
        $("#tanggal").change(function(){
          $("#timesummary").text($("#tanggal option:selected").text());
        });
        $("#waktu").change(function(){
          $("#waktusummary").text($("#waktu option:selected").text());
        });

      });
      </script>
      <script type="text/javascript">

        var harga=35000;
      </script>
      <script type="text/javascript" src="<?php echo base_url()?>frontendassets/js/scripts.js">

      </script>

      <!-- jQuery easing plugin -->
   </body>
</html>
