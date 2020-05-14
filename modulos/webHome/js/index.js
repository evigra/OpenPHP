$(document).ready(function()
{  
        
        
    $(".galery").first().show("slow", siguiente);    
    //alert($(".galery").length -1);
});

function siguiente()
{
    if(parseInt($(".galery").index(this))== parseInt($(".galery").length) -1 )
    {
        alert("entra");
        $(this).first().hide("slow");
        $(this).first().show("slow", siguiente);        
    }
    else
    {
        $(this).next(".galery").hide("slow");
        $(this).next(".galery").show("slow", siguiente);
    }    
}
