function isScrolledIntoView(elem)
{
    var docViewTop = jQuery(window).scrollTop();
    var docViewBottom = docViewTop + jQuery(window).height();

    var elemTop = jQuery(elem).offset().top + ( jQuery(elem).height() * 0.6 );
    var elemBottom = jQuery(elem).offset().top + ( jQuery(elem).height() * 0.5 );

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

jQuery.noConflict();
jQuery( window ).on( "load", function() {
  
  fancyReveal();
  window.addEventListener('scroll', throttle(fancyReveal, 10));
  
  allImgs = document.querySelectorAll(".invisible img");
  allImgs.forEach((img) => {
    //console.log(img);
    img.addEventListener('load', imgLoaded(img));
  });
  //for (let i in allImgs) {
  //  console.log(allImgs[i]);
  //  allImgs[i].addEventListener('load', imgLoaded(allImgs[i]));
  //};
  
  function imgLoaded(imgToLoad) {
    //console.log("image loaded!");
    //console.log(imgToLoad);
    imgToLoad.parentElement.classList.remove("invisible");
    imgToLoad.parentElement.classList.add("visible");
    imgToLoad.classList.add("visible");
  }

  function throttle(fn, wait) {
    var time = Date.now();
    return function() {
      if ((time + wait - Date.now()) < 0) {
        fn();
        time = Date.now();
      }
    }
  }

  function fancyReveal() {
    var scroll = window.scrollY;
    console.log("try reveal");
      jQuery(".fancy-hide").each(function () {
        if(window.scrollY < 5) {
          if (jQuery( this ).is(".visible")) {
            jQuery( this )[0].classList.remove("visible");
            jQuery( this )[0].classList.add("hidden");
          } else if (jQuery( this).is(".hidden")) {
            jQuery( this )[0].classList.remove("hidden");
            jQuery( this )[0].classList.add("invisible");
          }
        } else if(isScrolledIntoView(jQuery( this ))) {
          //console.log("made visible");
          if (jQuery( this ).is(".invisible, .hidden")) {
            jQuery( this )[0].classList.add("visible");
            jQuery( this )[0].classList.remove("invisible");
            jQuery( this )[0].classList.remove("hidden");
          } else if (jQuery ( this ).is("")) {

          }

        } else if (jQuery( this ).is(".visible")) {
          //console.log("made invisible");
          jQuery( this )[0].classList.remove("visible");
          jQuery( this )[0].classList.add("hidden");
        //} else if (jQuery( this ).is(".hidden")) {
        //  jQuery( this )[0].classList.remove("hidden");
        //  jQuery( this )[0].classList.add("invisible");
        };
    });
  };

  

}); 
