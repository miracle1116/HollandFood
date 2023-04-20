let sectionContent = document.querySelector(".section-content");
let sectionTitle = document.querySelector(".section-title");
let sectionBg = document.querySelector(".cover-section");

sectionTitle.addEventListener("click",function(){
    sectionContent.classList.toggle("hide");
    sectionBg.classList.toggle("cover-customer");
});


let reserve = document.querySelector(".reservation");
let wait = document.querySelector(".waitlist");

reserve.addEventListener("click",function(){
    reserve.classList.add("selectedReservation")
    wait.classList.remove("selectedWaitlist")

    
});

wait.addEventListener("click",function(){
    wait.classList.add("selectedWaitlist")
    reserve.classList.remove("selectedReservation");
});