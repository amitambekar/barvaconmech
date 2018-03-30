<style>
.select
{
  width:36%;
  padding:10px 0;
}

.contact-form ul li 
{
    margin-bottom:15px;
}
ul .textarea
{
    padding:10px;
    width:33.2%;
}

ul .text
{
    padding:10px;
    width:33.2%;
}
.contact-form .submit
{
    text-transform: uppercase;
    color:#FFFFFF;
    background: #035f91;
    padding: 16px 0;
    width:36%;
    border:none;
    cursor:pointer;
    transition: all 0.30s ease-in-out 0s;
    font-family:'Open Sans';
    font-weight:600;
    box-shadow: 0px 0px 2px #04283c inset;
}
.contact-form .submit:hover
{
  background: #f26f2f;
}
</style>
<div class="content">
    <h1>Contact Us</h1>
    <h4>Contact details</h4>
    <?php 
        $contact_details = getConfigurationsData('contact_details');
        $contact_details = isset($contact_details['data']) ? $contact_details['data']:'';
    ?>
    <?= $contact_details; ?>

    <div class="contact-form" id="contact-form">
        <h4>Contact Us</h4>
        <form id="contact_us_form" >
            <ul style="list-style:none;">
                <li>
                    <input type="text" class="text" name="name" id="contact_name" placeholder="Your name">
                </li>
                <li>
                    <input type="text" class="text" name="contact_number" id="contact_number1" placeholder="Your mobile number/telephone number">
                    <span style="color:red;">*</span>
                </li>
                <li>
                    <input type="text" class="text" name="company" id="company_name" placeholder="Your company name">
                </li>
                <li>
                    <p>Select Products/services interested:</p>
                    <?php 
                    $product_list = getProductList();
                    foreach ($product_list as $pl) { ?>
                        <?php echo $pl['product_name']; ?> <input type="checkbox" class="checkbox" name="products" value="<?php echo $pl['product_id']; ?>">    
                    <?php } ?>
                </li>
                
                <!--<li>
                    <select class="select">
                        <option value="">Select</option>
                        <option value="">Select</option>
                        <option value="">Select</option>
                    </select>
                </li>-->
                <li>
                    <textarea class="textarea" placeholder="your query" rows="10" id="query"></textarea>
                </li>
                <!--<li>
                    <input type="file" name="upload">
                </li>-->
                <li>
                    <input type="radio" class="checkbox" name="requirement" value="regular"> Regular Requirement
                    <input type="radio" class="checkbox" name="requirement" value="onetime"> One Time Requirement
                </li>
                <li>
                    <input type="button" value="Submit" class="submit" id="submit">
                </li>
            </ul>
        </form>
    </div>
</div>
<script type="text/javascript">
$("#submit").click(function(){
    var name = $("#contact_name").val() || '';
    var company_name =  $("#company_name").val() || '';
    var contact_number = $("#contact_number1").val() || '';
    var query = $("#query").val() || '';
    var products = [];
    $.each($("input[name='products']:checked"), function(){            
        products.push($(this).val());
    });
    var requirement = $("input[name=requirement]:checked").val()
    products = products.join(", ");
    if (contact_number == '')
    {
        alert("Please enter contact number");
        return false;
    }else if(!phoneNumberValidation(contact_number))
    {
        alert('Please enter valid contact number')
        return false;
    }else{
        Barva.frontend.contact_us(name,contact_number,company_name,products,query,requirement);
    }
});
</script>