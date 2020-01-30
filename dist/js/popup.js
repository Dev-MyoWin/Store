$('#intro').hide();

$(document).ready(function()
{
    $('#hide').click(function()
    {
        $('#intro').hide(400,'linear')
        
    });
    
    $('#show').click(function()
    {
        $('#intro').slideDown(400)
        
    });       

  } 
);

