<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Product and Service master</a></li>
    </ol>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Product and Service master</h4>

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
                <form id="myForm" method="POST" action="<?php echo site_url(); ?>/admin/products/add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Category Name</label>
                        <div class="controls">
                            <select class="form-control" name="category_name" id="category_name">
                                <option value="">select</option>
                                <?php foreach($pscm_list as $pl){ ?>
                                    <option value="<?= $pl->id; ?>"><?= $pl->category_name; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Product Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="product_name" id="product_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Product Description</label>
                        <div class="controls">
                            <textarea id="wysiwyg" name="product_description" class="form-control" placeholder="Enter message ..." rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Upload Product Gallery Images</label>
                        <div class="controls">
                            <input type="file" class="form-control" name="product_gallery_images[]" id="product_gallery_images" multiple >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Upload Product Images</label>
                        <div class="controls">
                            <input type="file" class="form-control" name="product_images[]" id="product_images" multiple >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1"></label>
                        <div class="controls">
                            <input type="submit" class="btn btn-primary" name="save" id="save" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
       
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">List Of Products</h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="table-basic" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product & Service name</th>
                        <th>Product & Service category name</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($product_list as $pl ) { ?>
                        <tr id="prod-id-<?php echo $pl->product_id; ?>">
                            <td><?= $pl->product_name;?></td>
                            <td><?= $pl->category_name;?></td>
                            <td>
                                <a href="<?php echo site_url(); ?>/admin/products/edit/<?php echo $pl->product_id; ?>">Edit</a> | 
                                <a href="javascript:void(0);" class="delete" prod-id="<?php echo $pl->product_id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
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
        $('#table-basic').dataTable();

        /*$("#myForm").submit(function(e){
            var category_name = $('#category_name').val() || '';
            Barva.admin.add_pscm(category_name,'#myForm');
            e.preventDefault();
        });*/
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
                        alert_box('Product added successfully');
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

        $('.delete').click(function(){
            if(confirm("Do you want to delete ?"))
            {
                var id = $(this).attr('prod-id');
                Barva.admin.delete_products(id);    
            }
            
        });
    });
</script>

            </div>
        </div>
    <?php $this->load->view('includes/footer'); ?>    
    </body>
</html>
