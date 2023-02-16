function generateRandomCircle(numberOfCircles) {
    console.log("Number of circles: "+numberOfCircles)
    let allCircles = "";
    let i = 1;
    while (i < numberOfCircles) {
        let size = Math.floor(Math.random() * (175 - 10) + 10);
        let duration = Math.floor(Math.random() * (90 - 20) + 20);
        let wait = Math.floor(Math.random() * (70) - 50 );
        let background = Math.random() * (0.4 - 0.1) + 0.1;
        let position = Math.floor(Math.random() * 100);
        allCircles += "<li style='left: "+position+"%;width: "+size+"px;height: "+size+"px;animation-delay: 0s;animation-duration: "+duration+"s;border-radius: 50%;background: rgba(96, 183, 199, "+background+"); opacity: 0; bottom: "+wait+"vh'></li>"   ;
        i++;
    };
    return allCircles
}

jQuery.noConflict();
jQuery( window ).on( "load", function() {
    jQuery(".circles-container-wrap").each(function (index) {
        console.log(jQuery( this )+index+" run time")
        let elemWidth =  jQuery( this )[0].offsetWidth / 80 ;
        console.log( elemWidth )
        jQuery( this ).append("<ul class='circles'>"+generateRandomCircle( elemWidth )+"</ul>");
    });
}); 
