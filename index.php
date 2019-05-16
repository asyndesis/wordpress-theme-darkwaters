<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,900" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <!--
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
  -->
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
  <script type="text/javascript">
    if (typeof DW == 'undefined') {
      var DW = {};
    }
    DW.loading = function (isLoading) {
      if (isLoading) {
        document.querySelector('body').classList.add('loading');
      } else {
        document.querySelector('body').classList.remove('loading');
      }
    }
  </script>
  <!--
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
  -->
  <?php wp_head();  ?>
  <title>Dark Waters Metal</title>
</head>

<body class="loading <?php $bodyclasses = get_body_class(); foreach ($bodyclasses as $class) echo ' '.$class; ?>">
  <div class="wrapper">

    <canvas id="dw-ocean"></canvas>
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="clouds"></div>
    <div id="dw-logo">
      <a href="/"><img src="<?php echo get_stylesheet_directory_uri().'/img/dw-logo.png'; ?>" />
        <br />
        <h1>Dark Waters Metal</h1>
      </a>
      <div class="lights">
        <div class="shining-lights-container">
          <div class="shining-light-left"></div>
          <div class="shining-light-right"></div>
        </div>
        <div class="glow-shine-container layer">
          <div class="glow-shine-5 shine-circle"></div>
          <div class="glow-shine-4 shine-circle"></div>
          <div class="glow-shine-3 shine-circle"></div>
          <div class="glow-shine-1 shine-circle"></div>
          <div class="glow-shine-2 shine-circle"></div>
        </div>
      </div>
      <!--/.lights-->
    </div>
    <div id="dw-content">
      <div id="dw-mountains"></div>
      <div id="dw-drawyer" class="dw-drawyer">
      <div class="cruncher">
        <?php echo do_shortcode('[contact-form-7 id="19" title="Contact form 1"]'); ?>
      </div>
    </div>
      <div class="container-fluid">
        <div class="inner-belcher">
            <?php if (is_home() || is_front_page()) : ?>
            <div class="row">
            <div class="f-col col-12 col-lg-6">
              <div class="card-bg-top text-white"
                style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/sketches.jpg';?>');">
                <div class="dw-cap d-flex justify-content-between">
                  <h5 class="card-title">Dark Waters Etsy Shop</h5>
                  <div><a href="http://darkwatersmetal.etsy.com" class="btn btn-primary">Visit Shop</a></div>
                </div>
                <!--/.text-center-->
              </div>
            </div>
            <!--/.col-->
            <div class="f-col col-12 col-lg-6">
              <div class="card-bg-top text-white"
                style="background-image:url('<?php echo get_stylesheet_directory_uri().'/img/etsy-tag.jpg';?>');">
                <div class="dw-cap d-flex justify-content-between">
                  <h5 class="card-title">Prototypes &amp; Works</h5>
                  <div><a href="/portfolio" class="btn btn-primary">View Works</a></div>
                </div>
                <!--/.text-center-->
              </div>
            </div>
            <!--/.col-->
            </div><!--/.row-->
            <?php else : ?>
              <?php while ( have_posts() ) : the_post(); ?>
              <?php $images =& get_children( array (
                          'post_parent' => $post->ID,
                          'post_type' => 'attachment',
                          'post_mime_type' => 'image'
                        )); ?>
                <?php if ( empty($images) ) : ?>
                <?php else : ?>
                  <?php foreach ( $images as $attachment_id => $attachment ) : ?>
                  <a class="dw-thumb" title="<?php echo get_the_title(); ?>"
                    href="<?php echo wp_get_attachment_image_src( $attachment_id, 'large' )[0]; ?>"
                    style="background-image:url('<?php echo wp_get_attachment_image_src( $attachment_id, 'medium' )[0]; ?>');">
                      <span class="capples">
                      <?php the_title(); ?>
                      </span>
                  
                  </a>
                  <?php endforeach; ?>
                <?php endif; ?>
              <?php endwhile; ?>
              <div style="clear:both; height:1px;"></div>
            <?php endif; ?>

        </div>
        <!--/.inner-belcher-->
      </div>
      <!--/.container-->
      <footer>
        <div class="text-center">
          &copy; <?php echo date("Y"); ?> by Dark Waters Metal
        </div>
      </footer>
    </div>
    <!--/#dw-content-->
  </div>
  <!--/#wrapper-->
  <?php wp_footer(); ?>
  <script type="text/javascript">
    /* Link fade trigger */
    var elements = document.getElementsByTagName('a');
    for (var i = 0, len = elements.length; i < len; i++) {
      if (elements[i].getAttribute('target') !== '_blank') {
        if (!$(elements[i]).hasClass('dw-thumb') && !$(elements[i]).hasClass('dw-phone')){
          elements[i].onclick = function () {
            DW.loading(true);
          }
        }
      }
    }
  </script>
  <script type="text/javascript">
    /* Fade in and out animation */
    document.body.onload = function () {
      DW.loading(false);
    };
    document.body.onunload = function () {
      DW.loading(false);
    };
    $(window).on('pagehide', function (event) {
      DW.loading(true);
    });
    $(window).on('pageshow', function (event) {
      DW.loading(false);
    });
    $(document).ready(function () {
      DW.loading(false);
      $('.dw-thumb').magnificPopup({
        type:'image',
        gallery:{
          enabled:true
        },
        showCloseBtn:true
      });
    });
    // break the bfcache (ie11 and all others likely)
    $(window).focus(function () {
      DW.loading(false);
    });
  </script>
</body>

</html>