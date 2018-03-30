  <div class="footer">
    <div class="container">
      <div class="footer-1"> <span></span>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
      </div>
      <div class="footer-2"> <span></span> <a href="emailto:info@yourdomain.com">info@yourdomain.com</a> </div>
      <div class="footer-3">
        <ul>
          <li><a href="#" class="fb"></a></li>
          <li><a href="#" class="twt"></a></li>
          <li><a href="#" class="db"></a></li>
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
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.easing.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.slider.js"></script>
<script>
$(function(){
	$("#demo").slider({
		size:3,
		prev:"#prev",
		next:"#next",
		prev_disable_class:"prev-disabled",
		next_disable_class:"next-disabled",
		pager:"#pager",
		pager_event:'click',
		easing:'easeOutExpo',
		mousewheel:true,
		speed:800,
		prev_callback:function(page){
 
		},
		next_callback:function(page){
 
		},
		pager_callback:function(page){
 
		}
	});
});
</script>
</body>
</html>