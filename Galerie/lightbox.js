let lightboxwarp = $("#lightbox-wrap");
let lightBoxImg = $("#lightbox-img");
let overlay = $("#overlay");

function hideLightBox()
{
    lightboxwarp.hide();
    overlay.hide();
}
$('img').on('click',function(){
    let img = $(this);
    lightBoxImg.attr("src",img.attr("original"));
    lightboxwarp.show();
    overlay.show();
    
})

window.addEventListener("keydown",function(e){
    if(e.keyCode == 27)
    {
        hideLightBox();
    }
});

overlay.on("click",function()
{
    hideLightBox();
})