<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,900" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <script type="text/javascript">
      if (typeof DW == 'undefined') {
        var DW = {};
      }
      DW.loading = function(isLoading) {
        if (isLoading){
          document.querySelector('body').classList.add('loading');
        }else{
          document.querySelector('body').classList.remove('loading');
        }
      }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <?php wp_head();  ?>
    <title>Dark Waters Metal</title>
  </head>
  <body class="loading <?php $bodyclasses = get_body_class(); foreach ($bodyclasses as $class) echo ' '.$class; ?>" >
    <div class="wrapper">
      <canvas id="dw-ocean"></canvas>
      <div class="stars"></div>
      <div class="twinkling"></div>
      <div class="clouds"></div>
      <div id="dw-logo">
        <a href="/"><img src="<?php echo get_stylesheet_directory_uri().'/img/dw-logo.png'; ?>" />
        <br/>
        <h1>Dark Waters Metal</h1>
        </a>
        <div class="lights">
          <div class="shining-lights-container">
            <div class="shining-light-left"></div>
            <div class="shining-light-right"></div>
          </div>
          <div class="glow-shine-container layer" >
            <div class="glow-shine-5 shine-circle"></div>
            <div class="glow-shine-4 shine-circle"></div>
            <div class="glow-shine-3 shine-circle"></div>
            <div class="glow-shine-1 shine-circle"></div>
            <div class="glow-shine-2 shine-circle"></div>
          </div>
        </div><!--/.lights-->
      </div>
      <div id="dw-content">
        <div id="dw-mountains"></div>
        <div class="container-fluid">
        <div class="inner-belcher">
            <div class="row">
            <?php if (is_home() || is_front_page()) : ?>
              <div class="f-col col-12 col-lg-6">
                <div class="card-bg-top text-white" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/etsy-tag.jpg';?>');">
                  <div class="dw-cap d-flex justify-content-between">
                    <h5 class="card-title">Dark Waters Etsy Shop</h5>
                    <div><a href="http://darkwatersmetal.etsy.com" class="btn btn-primary">Visit Shop</a></div>
                  </div><!--/.text-center-->
                </div>
              </div><!--/.col-->
              <div class="f-col col-12 col-lg-6">
                <div class="card-bg-top text-white" style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/sketches.jpg';?>');">
                  <div class="dw-cap d-flex justify-content-between">
                    <h5 class="card-title">Prototypes &amp; Portfolio</h5>
                    <div><a href="/portfolio" class="btn btn-primary">View Portfolio</a></div>
                  </div><!--/.text-center-->
                </div>
              </div><!--/.col-->
              <?php else : ?>
              <div class="f-col col-12">
                <div class="card-bg-top text-white">
                  <div id="archive-slides">
                    <div class="swiper-container swiper-container-h">
                      <div class="swiper-wrapper">
                      <?php while ( have_posts() ) : the_post(); ?>
                        <div class="ss-h swiper-slide">
                          <div class="swiper-container swiper-container-v">
                            <div class="swiper-wrapper">
                              <?php $images =& get_children( array (
                                'post_parent' => $post->ID,
                                'post_type' => 'attachment',
                                'post_mime_type' => 'image'
                              )); ?>
                              <?php if ( empty($images) ) : ?>
                              <?php else : ?>
                                <?php foreach ( $images as $attachment_id => $attachment ) : ?>
                                  <div class="ss-v swiper-slide" data-title="<?php echo get_the_title(); ?>" data-big-image="<?php echo wp_get_attachment_image_src( $attachment_id, 'large' )[0]; ?>" style="background-image:url('<?php echo wp_get_attachment_image_src( $attachment_id, 'thumbnail' )[0]; ?>');"></div>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </div>
                            <div class="swiper-pagination swiper-pagination-v"></div>
                          </div>
                        </div>
                      <?php endwhile; ?>
                      </div>
                      <!-- Add Pagination -->
                      <div class="swiper-pagination swiper-pagination-h"></div>
                    </div><!--/.swiper-container -->
                  </div><!--/.archive-slides-->
                  <div class="dw-cap d-flex justify-content-between">
                    <h5 class="card-title">Portfolio: <span></span></h5>
                    <div><a href="/" class="btn btn-dark">Home</a></div>
                  </div><!--/.text-center-->
                </div>
              </div><!--/.col-->
              <?php endif; ?>
            </div><!--/.row-->
          </div><!--/.inner-belcher-->
        </div><!--/.container-->
        <div id="dw-drawyer" class="dw-drawyer">
          <div class="cruncher">
            <?php echo do_shortcode('[contact-form-7 id="19" title="Contact form 1"]'); ?>
          </div>
        </div>
        <footer>
          <div class="text-center">
            &copy; <?php echo date("Y"); ?> by Dark Waters Metal and <a target="_blank" href="http://www.trevordesign.com">TD</a>.
          </div>
        </footer>   
      </div><!--/#dw-content-->
    </div><!--/#wrapper-->
    <?php wp_footer(); ?>
    <script type="text/javascript">
      /* Link fade trigger */
      var elements = document.getElementsByTagName('a');
        for(var i = 0, len = elements.length; i < len; i++) {
            if (elements[i].getAttribute('target') !== '_blank' ){
              elements[i].onclick = function () {
                DW.loading(true);
              }
            }
        }
    </script>
    <script type="text/javascript">
      /* swiper shit */
      function slideChange(){
        let slide = document.querySelector('.ss-h.swiper-slide-active .ss-v.swiper-slide-active') || 
                    document.querySelector('.ss-v.swiper-slide-active') ||
                    document.querySelector('.ss-v.swiper-slide:first-child');
        let cardTitle = document.querySelector('.inner-belcher .dw-cap .card-title span');
        if (!slide.classList.contains('loaded')){
          slide.classList.add('loaded');
          slide.setAttribute("style", "background-image: url('"+slide.getAttribute('data-big-image')+"');");
        }
        cardTitle.innerHTML = slide.getAttribute('data-title');
      }
      var swiperH = new Swiper('.swiper-container-h', {
        spaceBetween: 0,
        pagination: {
          el: '.swiper-pagination-h',
          clickable: true,
        },
        shortSwipes:false,
        longSwipesMs:0,
        longSwipesRatio:0.15,
        on: {
          init: function() { slideChange() },
          slideChangeTransitionEnd: function() { slideChange() }
        }
      });
      var swiperV = new Swiper('.swiper-container-v', {
        direction: 'vertical',
        spaceBetween: 0,
        pagination: {
          el: '.swiper-pagination-v',
          clickable: true,
        },
        shortSwipes:false,
        longSwipesMs:0,
        longSwipesRatio:0.15,
        on: {
          init: function() { slideChange() },
          slideChangeTransitionEnd: function() { slideChange() }
        }
      });
    </script>
    <script type="text/javascript">
        /* Fade in and out animation */
        document.body.onload = function() { DW.loading(false); };
        document.body.onunload = function(){ DW.loading(false); };  
        $(window).on('pagehide', function(event) {
          DW.loading(true);
        });
        $(window).on('pageshow', function(event) {
          DW.loading(false);
        });
        $(document).ready(function(){
          DW.loading(false);
        });
        // break the bfcache (ie11 and all others likely)
        $(window).focus(function() {
          DW.loading(false);
        });
    </script>
  </body>
</html>