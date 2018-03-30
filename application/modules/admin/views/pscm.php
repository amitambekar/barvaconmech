<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Product and Service category master</a></li>
    </ol>
</div>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Product and Service category master</h4>

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
                <form id="myForm" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1">Category Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="category_name" id="category_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputText1"></label>
                        <div class="controls">
                            <input type="submit" class="btn btn-primary" name="save" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
       
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">List Of Parts</h4>

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
                        <th>Product & Service category name</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pscm_list as $pl ) { ?>
                        <tr id="cat-id-<?php echo $pl->id; ?>">
                            <td><?= $pl->category_name;?></td>
                            <td>
                                <a href="<?php echo site_url(); ?>/admin/pscm/edit/<?php echo $pl->id; ?>">Edit</a> | 
                                <a href="javascript:void(0);" class="deleteCategory" cat-id="<?php echo $pl->id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>    
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-basic').dataTable();

        $("#myForm").submit(function(e){
            var category_name = $('#category_name').val() || '';
            Barva.admin.add_pscm(category_name,'#myForm');
            e.preventDefault();
        });

        $('.deleteCategory').click(function(){
            if(confirm("Do you want to delete ?"))
            {
                var id = $(this).attr('cat-id');
                Barva.admin.delete_pscm(id);    
            }
        });
    });
</script>

            </div>
        </div>
    <?php $this->load->view('includes/footer'); ?>    
    </body>
</html>
