Common = {
    
    web_call : function( url, method, callback_func, body , async , fail_cb ) {
	body = body || {};
	if(typeof async == 'undefined' )
    {
        async = true;    
    }
        ws_base_url = window._ws_url;
        $.ajax({
            url : ws_base_url + url, 
            crossDomain: true,
            data:body,
            type:method,
            async:async,
            beforeSend: function (xhr) {
                
                xhr.setRequestHeader ("authtoken", window._token);
                xhr.setRequestHeader ("userid", window._user);
            },
                      
            headers: {
                "Accept" : "application/json",
                "Content-Type" : "application/json", 
                "authtoken" :  window._token,
                "userid" : window._user,
                "app":"course"
            },
           
            success: function(data){
            
                callback_func(data);
            },
            
            error : function( data ){
                
                fail_cb(data);
                error_message = JSON.parse( data.responseText );
                
                //console.log("There was an error processing your request. \n\n Reason : \n " + error_message.reason);
                
            }
        
        });

    
    },

    site_call : function( url, method, callback_func , body    ){
     
	body = body || {};
	site_url = window._site_url;
        $.ajax({
            url : site_url+url, 
            data : body,
            type: method,
            success: function(data){
                callback_func(data);
            }
        });
    }
}