



const hamburger_wrap = document.querySelector(".menu-cross-wrap");
const hamburger = document.querySelector(".small-wrap");
const nav = document.querySelector("nav");
const nav_li = document.querySelectorAll(".nav-li");

let active = false;
hamburger_wrap.addEventListener("click", () => {
    
    hamburger.classList.toggle("small-wrap-active");
    hamburger_wrap.classList.toggle("menu-cross-wrap-upside-down");
    nav.classList.toggle("nav-active");
    console.log('clicked')


    if (!active) {
        setTimeout(() => {
            for (var i = 0; i < nav_li.length; i++)
            (function(t) {
              setTimeout(function() {
                nav_li[t].classList.add("nav-li-active");
              }, t * 150);
            })(i);
        }, 300)
        active = !active
       
      
    } else if (active){
        for (let i = 0; i < nav_li.length; i++) {
                     nav_li[i].classList.remove("nav-li-active")
                 }
        active = !active
        console.log( active)
    }    
})


