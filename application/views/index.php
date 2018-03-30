<script src="<?= base_url(); ?>assets/js/jquery.easing.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/slick/slick-theme.css">
<script src="<?= base_url(); ?>assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>
        <?php $getProducts = $this->getProducts; 
        foreach($getProducts as $p) { 
        $category_name = isset($p['category_data']['category_name'])? $p['category_data']['category_name'] : '';  
        $category_id = isset($p['category_data']['category_id'])? $p['category_data']['category_id'] : 0;  
        $product_data = isset($p['category_data']['product_data'])? $p['category_data']['product_data'] : array();  
          ?>
        <h3><a href="<?= site_url(); ?>/products/#category_id_<?= $category_id; ?>"><?= $category_name; ?></a></h3>
        <div class="fire-prd-sec">
          <div id="demo-layout">
            <div class="demo" id="category_id<?= $category_id; ?>">
              <ul class="regular">
                  <?php foreach($product_data as $pd){ 
                    $product_id = isset($pd['product_id']) ? $pd['product_id'] : 0;
                    $product_name = isset($pd['product_id']) ? $pd['product_name'] : 0;
                    $main_image = isset($pd['images'][0]['image_path'])? $pd['images'][0]['image_path'] : '';
                    ?>
                    <li><abbr><img src="<?= product_image($main_image,248,192); ?>" class="img-border"><span><a href="<?= site_url(); ?>/products/#product_id_<?= $product_id; ?>">read more</a></span></abbr>
                      
                    </li>
                  <?php } ?>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </div>

        <?php } ?>
        <div class="clear"></div>
        <!--<h3>Non-ferrous Castings</h3>
        <div class="casting-sec">
          <ul>
            <li><img src="<?= base_url(); ?>assets/images/fire-product-3.jpg"></li>
            <li><img src="<?= base_url(); ?>assets/images/fire-product-3.jpg"></li>
          </ul>
          <div class="clear"></div>
        </div>-->
<style>
/*#demo-layout ul{list-style:none; width:100%;}
#demo-layout li{float:left; margin-right:10px; text-align:center;}
#demo-layout li span{position: absolute; display: block;top: 3px;left: 3px;background:url(../images/li-bg.png) repeat;height: 97.3%;width: 97.7%; display:none;transition: all 0.30s ease-in-out 0s;}*/
</style>
<script>
$(function(){
  $(".regular").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
      });
  <?php 
  foreach($getProducts as $p) { 
  $category_id = isset($p['category_data']['category_id'])? $p['category_data']['category_id'] : 0;    
  ?>
  /*$("#category_id<?= $category_id; ?>").slider({
    size:3,
    prev:"#prev<?= $category_id; ?>",
    next:"#next<?= $category_id; ?>",
    prev_disable_class:"prev-disabled",
    next_disable_class:"next-disabled",
    pager:"#pager<?= $category_id; ?>",
    pager_event:'click',
    autoplay:true,
    //easing:'easeInExpo',
    mousewheel:true,
    speed:800,
    prev_callback:function(page){
 
    },
    next_callback:function(page){
 
    },
    pager_callback:function(page){
 
    }
  });*/
  <?php } ?>
});
</script>