 const menu = document.querySelector(".menu");
 const OpenMenuBtn = document.querySelector(".open-menu-btn");
 const CloseMenuBtn = document.querySelector(".close-menu-btn");

 [OpenMenuBtn, CloseMenuBtn].forEach((btn) =>{
  btn.addEventListener("click", () => {
    menu.classList.toggle("open");
    menu.style.transition = "transform 0.5 ease";
  });
 });

 menu.addEventListener("transitionend" , function() {
  this.removeAttribute("style");
 });
 
 menu.querySelectorAll(".dropdown > i").forEach((arrow) =>{
  arrow.addEventListener("click", function(){
    this.closest(".dropdown").classList.toggle("active")
  });
 });





//  parte do scroll


window.sr = ScrollReveal({ reset: true });

sr.reveal('.imageindex', { duration:4000 });

sr.reveal('.content', { duration:2000 });


ScrollReveal().reveal('.content', { scale: 0.6 });

ScrollReveal().reveal('.englobacard', { duration:3000}, { scale: 0.3 } );

ScrollReveal().reveal('.home', { scale: 0.8 }, { duration:2000 });

ScrollReveal().reveal('.containersobre', { scale: 0.8 }, { duration:5000 });



 




 