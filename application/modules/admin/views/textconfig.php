<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Text Configurations</a></li>
    </ol>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Text Configurations</h4>

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
                <form id="myForm" >
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">sidebar materials</label>
                        <div class="controls">
                            <textarea id="sidebar_materials" name="sidebar_materials" class="form-control" placeholder="Enter message ..." rows="5"><?php echo @$getTextConfiguration["sidebar_materials"]["data"]; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">contact details</label>
                        <div class="controls">
                            <textarea id="contact_details" name="contact_details" class="form-control" placeholder="<p>Lorem ipsun i ssimple text </br> Lorem ipsun i ssimple text </br></p>
    <p>Email ID : <a href='mailto:info@barva.com'>info@barva.com</a></p>

    <p>Contact Person :</p>
    <p> Raju Palshetkar :09812371231 </br> Rakesh Palshetkar : 65675675735</p>" rows="5"><?php echo @$getTextConfiguration["contact_details"]["data"]; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">header contact us</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="header_contact_us" id="header_contact_us" value="<?php echo @$getTextConfiguration["header_contact_us"]["data"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">footer address</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="footer_address" id="footer_address" value="<?php echo @$getTextConfiguration["footer_address"]["data"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">footer emailid</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="footer_emailid" id="footer_emailid" value="<?php echo @$getTextConfiguration["footer_emailid"]["data"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">facebook link</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="<?php echo @$getTextConfiguration["facebook_link"]["data"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">twitter link</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="<?php echo @$getTextConfiguration["facebook_link"]["data"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1"></label>
                        <div class="controls">
                            <input type="button" class="btn btn-primary" name="save" id="save" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
       
</div>
<?php /* ?>
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
</div><?php */ ?>
</div>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script>
    jQuery(function ($) {
        $('.wysiwyg').wysihtml5({
            stylesheets: ['assets/plugins/bootstrap-wysihtml5/css/wysiwyg-color.css']
        });
        $('.wysihtml5-toolbar .btn-default').removeClass('btn-default').addClass('btn-white');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-basic').dataTable();

        $("#save").click(function(e){
            var sidebar_materials = $('#sidebar_materials').val() || '';
            var contact_details = $("#contact_details").val() || '';
            var header_contact_us = $("#header_contact_us").val() || '';
            var footer_address = $("#footer_address").val() || '';
            var footer_emailid = $("#footer_emailid").val() || '';
            var facebook_link = $("#facebook_link").val() || '';
            var twitter_link = $("#twitter_link").val() || '';
            var post = {"sidebar_materials":sidebar_materials,"contact_details":contact_details,"header_contact_us":header_contact_us,"footer_address":footer_address,"footer_emailid":footer_emailid,"facebook_link":facebook_link,"twitter_link":twitter_link}

            Barva.admin.add_textconfig(post,'#myForm');
            e.preventDefault();
        });
        

        $('.delete').click(function(){
            var id = $(this).attr('prod-id');
            Barva.admin.delete_products(id);
        });
    });
</script>

            </div>
        </div>
    <?php $this->load->view('includes/footer'); ?>    
    </body>
</html>
