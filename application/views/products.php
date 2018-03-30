<div class="content">
          <h1>products & services</h1>
          <?php   
            $productList = getProducts();
             //dump($productList);
            foreach($productList as $pl) { 
              //dump($pl);
              ?>
                <h3 class="hvr-underline-from-center" id="category_id_<?= $pl['category_data']['category_id']; ?>"><?= $pl['category_data']['category_name']; ?></h3>
                <ul style="list-style:none" >
                    <?php 
                    foreach($pl['category_data']['product_data'] as $plpd) { ?>
                        <li id="product_id_<?= $plpd['product_id']; ?>">
                            <h4 ><?= $plpd['product_name']; ?></h4>
                            <div class="lf">
                            <img src="<?= product_image($plpd['images'][0]['image_path'],243,188); ?>" />
                            </div>
                            <div class="rf">
                            <p><?= $plpd['product_description']; ?></p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    <?php } ?>
                    
                </ul>
            <?php } ?>
          
          <!--<ul class="pagination">
              <li><a href="#">Previous</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">next</a></li>
          </ul>-->
 </div>