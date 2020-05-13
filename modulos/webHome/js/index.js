$(document).ready(function()
{       
    /*  
    $(".view_report_d2").flipping_gallery({
        enableScroll: true,
        autoplay: 2000
    });
    //*/	
    

    $(".galery").first().hide("slow", siguiente);

    
});

function siguiente()
{
    $(this).next(".galery").hide("slow");
    $(this).next(".galery").show("slow", siguiente);
    
}
