Barva = { }
Barva.admin = {
	
	add_pscm : function(category_name,formName){
		var category_name = category_name || '';
		var url = "admin/pscm/add";
		var post = { 'category_name':category_name};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Product Category added successfully');
				$(formName)[0].reset();
				window.location.reload();
			}else if(response.status == 'error')
			{
				alert_box('Product Category can not be empty');
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},

	edit_pscm : function(category_name,id,formName){
		var category_name = category_name || '';
		var id = id || 0;
		var url = "admin/pscm/edit/"+id;
		var post = { 'category_name':category_name,'id':id};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Product Category updated successfully');
				window.location.href=window._site_url+"admin/pscm";
			}else if(response.status == 'error')
			{
				alert_box('Product Category can not be empty');
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},

	delete_pscm : function(id,formName){
		var id = id || 0;
		var url = "admin/pscm/delete/"+id;
		var post = {'id':id};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Product Category deleted successfully');
				$('#cat-id-'+id).remove();
				//window.location.href=window._site_url+"admin/pscm";
			}else if(response.status == 'error')
			{
				alert_box('Can not be deleted');
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},

	delete_products : function(id,formName){
		var id = id || 0;
		var url = "admin/products/delete/"+id;
		var post = {'id':id};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Product deleted successfully');
				$('#prod-id-'+id).remove();
				//window.location.href=window._site_url+"admin/pscm";
			}else if(response.status == 'error')
			{
				alert_box('Can not be deleted');
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},

	delete_product_media : function(media_id,self)
	{
		var media_id = media_id || 0;
		var url = "admin/products/delete_product_media/"+media_id;
		var post = {'media_id':media_id};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Image deleted successfully');
				window.location.reload();
			}else if(response.status == 'error')
			{
				alert_box('Can not be deleted');
			}

		}
		Common.site_call(url,'POST',callback_f,post);	
	},
	add_textconfig : function(post,formName){
		var post = post || {};
		var url = "admin/textconfig/add";
		
		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert_box('Text Configuration updated successfully');
				//window.location.reload();
			}else if(response.status == 'error')
			{
				alert_box('Some problem occured');
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},

	clear_cache : function()
	{
		var callback_f = function(response){
			alert_box('Cleared Cache..!!');
		}
		Common.site_call("admin/home/clear_all_cache",'POST',callback_f,{});	
	}
}

Barva.frontend = {
	enquiry : function(name,contact_number,self){
		var name = name || '';
		var contact_number = contact_number || '';
		var url = "/common/enquiry";
		var post = { 'name':name,'contact_number':contact_number};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert('successfully Sent')
				$("enquiryForm")[0].reset();
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},
	contact_us : function(name,contact_number,company_name,interests,query,requirement,self){
		var name = name || '';
		var contact_number = contact_number || '';
		var company_name = company_name || '';
		var interests = interests || '';
		var query = query || '';
		var requirement = requirement || '';
		var url = "/common/contact_us";
		var post = { 'name':name,'contact_number':contact_number,'company_name':company_name,'interests':interests,'query':query,'requirement':requirement};

		var callback_f = function(response){
			
			if(response.status == 'success')
			{
				alert('successfully Sent')
				window.locaation.reload();
				//$("contact_us_form")[0].reset();
			}

		}
		Common.site_call(url,'POST',callback_f,post);
	},
}