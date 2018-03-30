function alert_box(message)
{
	bootbox.alert({
        message: message,
        callback: function () {
        },
        className: 'bootbox-sm'
    });
}

function phoneNumberValidation(phone)
{
	var phone = phone;
    intRegex = /[0-9 -()+]+$/;
	if((phone.length < 6) || (!intRegex.test(phone)))
	{
	     return false;
	}else{
		return true;
	}
}