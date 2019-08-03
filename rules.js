/*
var d = new Date();
var n = d.getFullYear();
var reqyr = n - 18;
*/

//var bdy.value + "-" + bdm.value + "-" bdd.value;
$(function()
{
	$('#reguser').validate({
			rules:
			{
				fname:
				{
					required:true
				},
				lname:
				{
					required:true
				},
				
				
				gender:
				{
					required:true
				},
				bdm:
				{
					required:true,
					number:true
				},
				bdd:
				{
					required:true,
					number:true
				},
				bdy:
				{
					required:true,
					number:true
				},
				
				
				password:
				{
					required:true,
					minlength:6
				},
				confirmpassword:
				{
					required:true,
					minlength:6,
					equalTo:"#password"
				},
				username:
				{
					required:true,
					minlength:6
				},
				contact:
				{
					required:true
				},
				address:
				{
					required:true,
					minlength:10
				},
				city:
				{
					required:true,
					minlength:2
				}
				
				
				
			}
		
	});	
});