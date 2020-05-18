$(document).ready(function()
{
    var imagenes=$("div.galery img").length;
    console.log(imagenes);


    $("div.galery ul").css("width":(imagenes*50) +"%");
    $("div.galery ul li").css("width":(200/imagenes) +"%");



/*
    var width = 0;
    var index = 0;
    $(".galery").each(function() 
    { 
        index+=1;
        $(this).attr({"index":index});            
    });     
    
    siguiente(1);            
    */
});

function siguiente(index)
{




/*
    $("img.img_big").hide("slow");            
    var src =$("img[index='" + index + "']").attr("path");   
    $("img.img_big").attr({"src" : src});
    $("img.img_big").show("slow");            
    setTimeout(function() 
    {
        index+=1;
        siguiente(index);
    }, 2000 );
    */
}
