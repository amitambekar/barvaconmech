</div>
      <div class="leftAlign">
        <!--<h4>Call me back I'm interested</h4>-->
        <div class="form-sec">
          <form method="POST" name="enquiryForm">
            <ul>
              <li>
                <input id="name" type="text" class="name" placeholder="YOUR NAME" style="height: 2px;">
              </li>
              <li>
                <input id="contact_number" type="text" class="name" placeholder="CONTACT NO" style="height: 2px;">
              </li>
              <li>
                <input type="button" id="call_me_back" type="submit" value="Call me back I'm interested" class="btn" style="padding: 9px 0;font-size: 15px;">
              </li>
            </ul>
          </form>
        </div>
        <div class="place-enquiry-sec">
          <a href="<?= site_url(); ?>/contact#contact-form"><h5>Place Enquiry</h5></a>
        </div>
        <div class="left-products-sec" style="margin: 12px 0 12px;">
          <h4 style="padding: 2px 25px;">PRODUCTS</h4>
          <ul style="padding: 7px;">
            <?php 
              $category_list = getCategoryProductList();
              foreach($category_list as $cl) { 
                $category_name = isset($cl['category_name']) ? $cl['category_name'] : ''; ?>
                <li class="product_sidebar accordion_head" style="margin-bottom: 5px;border-bottom: 0px dashed #b3b3b3;">
                      <span class="plusminus">+</span><a href="javascript:void(0);" style="padding-bottom: 0px;"><?= $category_name; ?></a>
                      <div class="product_description accordion_body" style="display: none;">
                      <?php if(count($cl["product_array"]) > 0) { ?>
                      <?php foreach($cl["product_array"] as $pa)
                      { ?>
                        <p style="height: 20px;margin: 0 5%;"><a href="<?= site_url(); ?>/products/#product_id_<?php echo $pa['product_id']; ?>"><?php echo $pa['product_name']; ?></a></p>
                      <?php  } ?>
                      <?php } ?>
                      </div>
                </li>        
                <?php 
                }
                ?>
              
          </ul>
        </div>
        <?php 
        $materials = getConfigurationsData('sidebar_materials');
        $materials_data = isset($materials['data']) ? $materials['data']:'';
        if($materials_data != '')
        {
        ?>
        <div class="materials-sec" style="margin-bottom: 12px;padding: 0px;">
          
          <p><span>Materials :</span> 
          <?= $materials_data; ?>
        </div> 
        <?php } ?>
        <div class="download-broucher-sec"> <a href="<?= base_url(); ?>assets/pdf/test.pdf" download class="hvr-radial-in">Download broucher</a> </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="footer">
    <div class="container">
      <?php 
        $footer_address = getConfigurationsData('footer_address');
        $footer_address = isset($footer_address['data']) ? $footer_address['data']:'';
      ?>
      <div class="footer-1"> <span></span>
        <p><?= $footer_address; ?></p>
      </div>
        <?php 
          $footer_emailid = getConfigurationsData('footer_emailid');
          $footer_emailid = isset($footer_emailid['data']) ? $footer_emailid['data']:'';
        ?>
      <div class="footer-2"> <span></span> <a href="emailto:<?= $footer_emailid; ?>"><?= $footer_emailid; ?></a> </div>
      <?php 
          $facebook_link = getConfigurationsData('facebook_link');
          $facebook_link = isset($facebook_link['data']) ? $facebook_link['data']:'';

          $twitter_link = getConfigurationsData('twitter_link');
          $twitter_link = isset($twitter_link['data']) ? $twitter_link['data']:'';
      ?>
      <div class="footer-3">
        <ul>
          <?php if($facebook_link != ""){  ?>
          <li><a href="<?php echo $facebook_link; ?>" class="fb"></a></li>
          <?php } ?>
          <?php /*if($twitter_link != ""){  ?>
          <li><a href="<?php echo $twitter_link; ?>" class="twt"></a></li>
          <?php }*/ ?>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="copy-right-sec">
    <div class="container">
      <p>Copyright</p>
    </div>
  </div>
</div>
<script src="<?= base_url(); ?>assets/js/jquery.easing.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.slider.js"></script>
<script>
$(function(){
  $(".accordion_head").click(function(){
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(600);
      $(".plusminus").text('+');
    }
    $(this).children(".accordion_body").slideDown(600); 
    $(this).children(".plusminus").text('-');
  });
  /*$( ".left-products-sec" ).on( "click", ".product_sidebar", function() {
      $('.product_description').hide();
      $(this).children('div.product_description').slideDown();
  });*/
  $( "#call_me_back" ).on( "click", function() {
      var name = $('#name').val();
      var contact_number = $('#contact_number').val();
      if(name == '')
      {
          alert('Please enter name');
          return false;
      }else if(contact_number == '')
      {
          alert('Please enter Contact Number');
          return false;
      }else if(!phoneNumberValidation(contact_number)){
          alert('Please enter valid contact number')
          return false;
      } else
      {
          Barva.frontend.enquiry(name,contact_number);
      }
  });
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58810638bcf30e71ac11f977/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>