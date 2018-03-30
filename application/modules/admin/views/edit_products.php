<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Product and Service master</a></li>
    </ol>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Product and Service master</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-block alert-danger" style="display: none;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <p class="error_message"></p>
                </div>
                <form id="myForm" method="POST" action="<?php echo site_url(); ?>/admin/products/edit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Category Name</label>
                        <div class="controls">
                            <select class="form-control" name="category_name" id="category_name">
                                <option value="">select</option>
                                <?php foreach($pscm_list as $pl){ ?>
                                    <option value="<?= $pl->id; ?>" <?php if($pl->id == $product_details['category_id']){ echo 'selected'; } ?> ><?= $pl->category_name; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Product Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_details['product_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Product Description</label>
                        <div class="controls">
                            <textarea id="wysiwyg" name="product_description" class="form-control" placeholder="Enter message ..." rows="10"><?php echo trim($product_details['product_description']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Upload Product Gallery Images</label>
                        <div class="controls">
                            <?php 
                            if(!empty($product_details['images'])){ ?>
                            <div>
                                <?php 
                                $gallery_image_count = 0;
                                foreach($product_details['images'] as $pi){ 
                                    if($pi['type'] == "product_gallery"){
                                    ?>
                                    <span><img src="<?php echo product_image($pi['image_path']); ?>" style="width:70px;height:70px;"><span class="delete_product_image" media-id="<?= $pi['media_id']; ?>">X</span></span>
                                <?php $gallery_image_count++; }} ?>   
                            </div>
                            <?php } ?>
                            <input type="hidden" name="gallery_image_count" value="<?php echo @$gallery_image_count; ?>">
                            <input type="file" class="form-control" name="product_gallery_images[]" id="product_gallery_images" multiple >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Upload Product Images</label>
                        <div class="controls">
                            <?php 
                            if(!empty($product_details['images'])){ ?>
                            <div>
                                <?php 
                                $image_count = 0;    
                                foreach($product_details['images'] as $pi){ 
                                    if($pi['type'] == "product"){
                                    ?>
                                    <span><img src="<?php echo product_image($pi['image_path']); ?>" style="width:70px;height:70px;"><span class="delete_product_image" media-id="<?= $pi['media_id']; ?>">X</span></span>
                                <?php $image_count++; }} ?>   
                            </div>
                            <?php } ?>
                            <input type="hidden" name="image_count" value="<?php echo @$image_count; ?>">
                            <input type="file" class="form-control" name="product_images[]" id="product_images" multiple >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1"></label>
                        <div class="controls">
                            <input type="hidden" name="product_id" value="<?php echo $product_details['product_id']; ?>"/>
                            <input type="submit" class="btn btn-primary" name="save" id="save" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
       
</div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script>
    jQuery(function ($) {
        $('#wysiwyg').wysihtml5({
            stylesheets: ['assets/plugins/bootstrap-wysihtml5/css/wysiwyg-color.css']
        });
        $('.wysihtml5-toolbar .btn-default').removeClass('btn-default').addClass('btn-white');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').ajaxForm({
            beforeSend: function() {
                //status.empty();
                console.log('beforeSend')
                var percentVal = '0%';
                $('#save').attr('disabled',true);
                //bar.width(percentVal);
                //$(".aj_loader").attr("src", "https://dev-course2016.stepathlon.com/images/cube.gif");
                //$(".aj_loader").show();
                
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                //bar.width(percentVal)
                console.log('uploadProgress')
                
            },
            success: function() {
                var percentVal = '100%';
                //bar.width(percentVal);

                console.log('success')
            },
            complete: function(xhr) {
                 //$(".aj_loader").attr("src", "https://dev-course2016.stepathlon.com/images/success.png");
                console.log('complete')
                console.log(xhr)
                if(xhr.status == 200)
                {
                    var response = xhr.responseJSON;
                    if(response.status == 'success')
                    {
                        alert_box('Product edited successfully');
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000);

                    } else if(response.status == 'error') {
                        var err_msg = '';
                        $.each(response.message, function( index, value ) {
                            err_msg += value+'</br>';
                        });
                        alert_box(err_msg);
                        $('#save').attr('disabled',false);
                    }
                }
            }
        });

        $(".delete_product_image").click(function(){
            var media_id = $(this).attr('media-id')
            Barva.admin.delete_product_media(media_id,this);
        });
    });
</script>

            </div>
        </div>
    <?php $this->load->view('includes/footer'); ?>    
    </body>
</html>
