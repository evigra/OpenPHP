$(document).ready(function()
{  
    $(".galery").hide();    
        
    $(".galery").first().show("slow", siguiente);    



    $( ".galery" )
    .mouseover(function() {
        $(this).stop();
    })
    .mouseout(function() {
        $(this).next(".galery").hide("slow");
        $(this).next(".galery").show("slow", siguiente);
    });

    /*
    $( ".galery" )
    .mouseenter(function() {

    })
    .mouseleave(function() {

    });
    */

});

function siguiente()
{
    if(parseInt($(".galery").index(this))== parseInt($(".galery").length) -1 )
    {
        
        $(".galery").first().show("slow");        
        $(".galery").first().hide("slow", siguiente);
    }
    else
    {        
        $(this).next(".galery").show("slow");
        $(this).next(".galery").hide("slow", siguiente);
    }    
}
