$(document).ready(function()
{
    setTimeout(function() 
    {
        var width = 0;
        $(".galery").each(function() 
        { 
           width += parseInt($(this).width()) + 10;  
        });     
        setTimeout(function() 
        {
            width=parseInt(width/3);    
            $("div.view_report_d2").width(width);
        }, 500 );
    }, 3500 );



    
    /*  
    $(".galery").hide();    
        
    $(".galery").first().show("slow", siguiente);    



    $( ".galery" )
    .mouseover(function() {
        $( ".galery" ).stop();
    })
    .mouseout(function() {
        $(this).hide("slow");
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
    /*
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
    */    
}
