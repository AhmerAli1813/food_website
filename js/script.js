let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
const header = document.querySelector("header");




// end here user image


menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

// header.style.position = "fixed";
let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

// window.onscroll = () =>{
//   header.style.position = "fixed";
//   header.style.left = "0";
//   header.style.boxShadow = "var(--box-shadow)";
//   if(window.scrollY == 0){
//     header.style.boxShadow = "var(--box-shadow-light)";
    

//   }
//   menu.classList.remove('fa-times');
//   navbar.classList.remove('active');


//   section.forEach(sec =>{

//     let top = window.scrollY;
//     let height = sec.offsetHeight;
//     let offset = sec.offsetTop - 150;
//     let id = sec.getAttribute('id');

//     if(top >= offset && top < offset + height){
//       navLinks.forEach(links =>{
//         links.classList.remove('active');
//         document.querySelector('header .navbar a[href*='+id+']').classList.add('active');
//       });
//     };

//   });

// }

document.querySelector('#search-icon').onclick = () =>{
  document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('.close_btn').onclick = () =>{
  document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  loop:true,
  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

function loader(){
//   document.querySelector('.loader-container').classList.add('fade-out');
};

function fadeOut(){
  setInterval(loader, 3000);
};
  
//  heart styling

// window.onload = fadeOut;
//  form
// dropdwon

$(".dropdown").click(function (e) { 

  e.preventDefault();
  var dropdown_item = $(this).attr("data-dropdown");
  // alert(dropdown_item)
  $(dropdown_item).toggle("active");
  $(this).siblings().children(".caret").toggleClass('rotate-180');
  
  
});
    // themes

    $("#color-gallery .color-item").click(function (e) { 
      let lst = window.localStorage;
      e.preventDefault();
      var hsl = $(this).data("hsl");
    var color =  $(this).data("color");
    var color_alt =  $(this).data("color-alt");
    var color_lighter =  $(this).data("color-lighter");
    console.log(`lighter : ${color_lighter} , alt ${color_alt} ,color : ${color}` )
    var color_sts =  $(this).data("color-sts");
              lst.setItem("hsl" , hsl);
              lst.setItem("theme" , color_sts );
    theme();
  });
 
function theme(){
  let lst = window.localStorage;
      let hsl = lst.getItem("hsl");
      let theme = lst.getItem("theme");
      $(":root").css("--hue-color" , hsl );
      if(theme== "dark"){
        $(":root").css("--body-color" , `var(--bs-dark)`)   
        $(":root").css("--body-color-light" , `var(--bs-gray-dark)`)   
        $(":root").css("--text-color" , `white`)   
        
    }else {
        
        $(":root").css("--body-color" , `white`)
        $(":root").css("--body-color-light" , `#eee`)      
        $(":root").css("--text-color" , `var(--bs-dark)`)  
    }
}
theme();