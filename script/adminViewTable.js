let sectionContent = document.querySelector(".section-content");
let sectionTitle = document.querySelector(".section-title");
let sectionBg = document.querySelector(".cover-section");

sectionTitle.addEventListener("click",function(){
    sectionContent.classList.toggle("hide");
    sectionBg.classList.toggle("cover-customer");
});

/*
let x=0;
sectionTitles.forEach(title => {
    title.addEventListener('click', () => {
        sectionContent[x].classList.toggle("hide");
        sectionBg[x].classList.toggle("cover-customer");
        x++;
    });
  });
*/

let reserve = document.querySelector(".reservation");
let wait = document.querySelector(".waitlist");

reserve.addEventListener("click",function(){
    reserve.classList.add("selectedReservation");
    wait.classList.remove("selectedWaitlist");
    reserveWait("reserve");
    
});

wait.addEventListener("click",function(){
    wait.classList.add("selectedWaitlist");
    reserve.classList.remove("selectedReservation");
    reserveWait("waitList");
});

function reserveWait(reservewait) {
    var i;
    var x = document.querySelectorAll(".reserveWaitTab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(reservewait).style.display = "block";  
}


function toggleSidebar() {
    var sidebar = document.querySelector(".sidebar");
    var sidebarToggle = document.querySelector(".sidebar-toggle");
    var sidebarContent = document.querySelector(".sidebar-content");
    var rightBar = document.querySelector(".rightBar");
    sidebarContent.innerHTML = rightBar.innerHTML;
  
    if (sidebar.classList.contains("sidebar-open")) {
      sidebar.classList.remove("sidebar-open");
      sidebarToggle.classList.remove("sidebar-toggle-open");
      sidebarToggle.style.display = "block";
    } else {
      sidebar.classList.add("sidebar-open");
      sidebarToggle.classList.add("sidebar-toggle-open");
      sidebarToggle.style.display = "none";

      // add event listener to close sidebar when clicking outside of the container
        window.addEventListener("click", function(event) {
            if (!sidebar.contains(event.target)) {
            sidebar.classList.remove("sidebar-open");
            sidebarToggle.classList.remove("sidebar-toggle-open");
            sidebarToggle.style.display = "block";
            }
        });
    }
}


//table
const tables = document.querySelectorAll('.table');

tables.forEach(table => {
  if (table.classList.contains('reserved')) {
    table.textContent += " Reserved";
  }else if (table.classList.contains('checkedIn')) {
    table.textContent += " Checked-In";
  }else{
    table.textContent += " Free";
  }

});

