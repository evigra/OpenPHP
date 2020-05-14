$(document).ready(function()
{  
        
        
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
        $(".galery").first().hide("slow");
        $(".galery").first().show("slow", siguiente);        
    }
    else
    {
        $(this).next(".galery").hide("slow");
        $(this).next(".galery").show("slow", siguiente);
    }    
}
