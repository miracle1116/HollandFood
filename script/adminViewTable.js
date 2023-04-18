let sectionContent = document.querySelector(".section-content");
let sectionTitle = document.querySelector(".section-title");
let sectionBg = document.querySelector(".cover-section");

sectionTitle.addEventListener("click",function(){
    sectionContent.classList.toggle("hide");
    sectionBg.classList.toggle("cover-customer");
});

