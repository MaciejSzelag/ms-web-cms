const img_container = document.querySelector(".img-container");
const img = document.querySelector(".img-container img");


document.body.addEventListener("mousemove", (e) => {    
    const x = e.clientX;
    const y = e.clientY;
    const width = ((window.innerWidth / 2) - x) / 2
    const height = ((window.innerHeight / 2) - y) / 2;
    
    if (window.innerWidth > 1024) {

        if (img_container !== null) {
      
            img.style.setProperty("transform", `rotateX(${(-height / 20)}deg) rotateY(${(width / 20)}deg) translate(${width / 10}px, ${height / 10}px)`)
 
            img.style.setProperty("filter", `drop-shadow(${-width / 10}px ${-height / 10}px 20px rgba(29, 96, 163, .6))`)

  }
       
    }
   
})




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
        console.log("nie ok " + active)
    }    
})

