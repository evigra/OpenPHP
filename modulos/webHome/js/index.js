$(document).ready(function()
{  
    $("img.galery")
        .before("<div>" )     
        .after("</div>");
        
        
    $(".galery").first().show("slow", siguiente);    
    //alert($(".galery").length -1);
});

function siguiente()
{
    alert(parseInt($(".galery").index(this)) + "==" + parseInt($(".galery").length) -1 );

    if(parseInt($(".galery").index(this))== parseInt($(".galery").length) -1 )
    {
        $(this).first().hide("slow");
        $(this).first().show("slow", siguiente);        
    }
    else
    {
        $(this).next(".galery").hide("slow");
        $(this).next(".galery").show("slow", siguiente);
    }    
}
