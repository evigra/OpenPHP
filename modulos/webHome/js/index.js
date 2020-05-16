$(document).ready(function()
{
    setTimeout(function() 
    {   
        var width = 0;
        var index = 0;
        $(".galery").each(function() 
        { 
            index+=1;
            $(this).attr({"index":index});            
            width += parseInt($(this).width()) + 12;  
        });     
        setTimeout(function() 
        {
            width=parseInt(width/3);    
            $("div.view_report_d2").width(width);
        }, 500 );
    }, 5500 );
    
    siguiente($(".galery").first().attr("index"));        
    
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

    */

});

function siguiente(index)
{
    $("img.img_big").hide("slow");            
    var src =$("img[index='" + index + "']").attr("path");   
    $("img.img_big").attr({"src":src});
    $("img.img_big").show("slow");            
    setTimeout(function() 
    {
        index+=1;
        siguiente(index);
    }, 1500 );
}
