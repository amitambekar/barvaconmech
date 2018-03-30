<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<title>BarvaConMech</title>
<link href="<?= base_url(); ?>assets/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/css/print.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/barva/common_lib.js"></script>
<script src="<?php echo base_url(); ?>assets/js/barva/barva.js"></script>
<script src="<?php echo base_url(); ?>assets/js/barva/functions.js"></script>
</head>
<script type="text/javascript">
    window._site_url = '<?php echo site_url(); ?>/';
</script>
<body>
<div id="wrapper">
  <div class="header">
    <div class="container">
      <div class="logo"> <a href="#"><img src="<?= base_url(); ?>assets/images/logo.png"></a> </div>
      <div class="contact">
        <?php 
          $contact_us = getConfigurationsData('header_contact_us');
          $contact_us_data = isset($contact_us['data']) ? $contact_us['data']:'';
        ?>
        <p>CONTACT US <a href="tel:<?= $contact_us_data; ?>" class="hvr-underline-from-center"><span>+</span> <?= $contact_us_data; ?></a></p>
      </div>
      <div class="clear"></div>
    </div>
    <div class="right-bg"> </div>
  </div>
  <?php /*?><div class="banner"> <img src="<?= base_url(); ?>assets/images/banner.jpg">
    <div class="caption">
      <div class="container">
        <div class="caption-text">
          <h1>WELCOME TO BARVA CONMECH</h1>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
          <!--<a href="#" class="hvr-sweep-to-top">LEARN MORE</a>--> </div>
      </div>
    </div>
  </div>
  <?php */
$this->getProducts = getProducts();
  //dump($this->getProducts);
  ?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/rolling.css">
<link href="<?= base_url(); ?>assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<div class="demo-wrap">
  <div id="rolling_demo" class="rolling_demo">
    <ul class="slide-wrap" id="example">
      <?php
      $counter = 1; 
      foreach($this->getProducts as $p) { 
        $category_name = isset($p['category_data']['category_name'])? $p['category_data']['category_name'] : '';  
        $category_id = isset($p['category_data']['category_id'])? $p['category_data']['category_id'] : 0;  
        $product_data = isset($p['category_data']['product_data'])? $p['category_data']['product_data'] : array();  
        
        foreach($product_data as $pd){ 
            $product_id = isset($pd['product_id']) ? $pd['product_id'] : 0;
            $product_name = isset($pd['product_id']) ? $pd['product_name'] : '';
            $product_description = isset($pd['product_description']) ? $pd['product_description'] : '';
            
            foreach($pd['images'] as $img)
            {

            if($img['type'] == 'product_gallery'){ 
              $main_image = isset($img['image_path'])? $img['image_path'] : '';
              ?>
            <li class="pos<?php echo $counter; ?>" style="margin-top:5px;">
              <div class="inner">
                <a href="<?= site_url(); ?>/products/#product_id_<?= $product_id; ?>">
                  <img src="<?= product_image($main_image,300,390); ?>"/>
                  <p class="pic-tit"><?php echo $product_name; ?></p>
                </a>
              </div>
            </li>
            <?php 
            $counter++;
            }
            }
            ?>
            
            <?php 
            } ?>
  

        <?php } ?>

    </ul>
    <i class="arrow prev" id="jprev">&lt;</i>
    <i class="arrow next" id="jnext">&gt;</i>
  </div>
</div>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.rollingslider.js"></script>
<script>
$('#rolling_demo').RollingSlider({
  showArea:"#example",
  prev:"#jprev",
  next:"#jnext",
  moveSpeed:500,
  stay:2000,
  autoPlay:true
});
</script>
  <div id="container">
    <div class="container">
      <div class="main-container">
        <div class="nav">
          <ul>
            <li><a href="<?= site_url(); ?>" class="hvr-sweep-to-top">Home</a></li>
            <li><a href="<?= site_url(); ?>/about" class="hvr-sweep-to-top">About</a></li>
            <li><a href="<?= site_url(); ?>/products" class="hvr-sweep-to-top">Products & services</a></li>
            <!--<li><a href="#" class="hvr-sweep-to-top">Facilities</a></li>-->
            <li><a href="<?= site_url(); ?>/contact" class="hvr-sweep-to-top">Contact Us</a></li>
          </ul>
          <div class="clear"></div>
        </div>
<style>
.nav li a {
    width: 180px;
}

</style>