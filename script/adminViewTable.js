function sidebarFunction() {
  let sectionContents = document.querySelectorAll(".section-content");
  let sectionTitles = document.querySelectorAll(".section-title");
  let sectionBgs = document.querySelectorAll(".cover-section");

  // sectionTitle.addEventListener("click",function(){
  //     sectionContent.classList.toggle("hide");
  //     sectionBg.classList.toggle("cover-customer");
  // });

  for (let x = 0; x < sectionTitles.length; x++) {
    sectionTitles[x].addEventListener("click", function () {
      sectionContents[x].classList.toggle("hide");
      sectionBgs[x].classList.toggle("cover-customer");
    });
  }

  let reserve = document.querySelector(".reservation");
  let wait = document.querySelector(".waitlist");

  reserve.addEventListener("click", function () {
    reserve.classList.add("selectedReservation");
    wait.classList.remove("selectedWaitlist");
    reserveWait("reserve");
  });

  wait.addEventListener("click", function () {
    wait.classList.add("selectedWaitlist");
    reserve.classList.remove("selectedReservation");
    reserveWait("waitList");
  });
}

// initialize the listener
sidebarFunction();

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
  sidebarFunction();

  if (sidebar.classList.contains("sidebar-open")) {
    sidebar.classList.remove("sidebar-open");
    sidebarToggle.classList.remove("sidebar-toggle-open");
    sidebarToggle.style.display = "block";
  } else {
    sidebar.classList.add("sidebar-open");
    sidebarToggle.classList.add("sidebar-toggle-open");
    sidebarToggle.style.display = "none";

    // add event listener to close sidebar when clicking outside of the container
    window.addEventListener("click", function (event) {
      if (!sidebar.contains(event.target)) {
        sidebar.classList.remove("sidebar-open");
        sidebarToggle.classList.remove("sidebar-toggle-open");
        sidebarToggle.style.display = "block";
      }
    });
  }
}

function updateSidebarToggle() {
  var reserveWaitCount = document.querySelectorAll(".section-title").length;
  document.querySelector(".sidebar-toggle .reserve-wait-count").textContent =
    reserveWaitCount;
}

updateSidebarToggle();

function updateReserveToggle() {
  var ReserveCount = document.querySelectorAll(
    "#reserve .section-title"
  ).length;
  document.querySelector(".reservation .reserve-count").textContent =
    ReserveCount;
}

updateReserveToggle();

function updateWaitlistToggle() {
  var WaitCount = document.querySelectorAll("#waitList .section-title").length;
  document.querySelector(".waitlist .wait-count").textContent = WaitCount;
}

updateWaitlistToggle();

//table
const tables = document.querySelectorAll(".table");
const tableNo = document.querySelectorAll(".table-label");
let reservedNum = 0,
  checkedInNum = 0,
  freeNum = 0;

tables.forEach((table) => {
  if (table.classList.contains("reserved")) {
    table.textContent += " Reserved";
    reservedNum++;
  } else if (table.classList.contains("checkedIn")) {
    table.textContent += " Checked-In";
    checkedInNum++;
  } else {
    table.textContent += " Free";
    freeNum++;
  }
});

tableNo[0].textContent = "Free: " + freeNum;
tableNo[1].textContent = "Reserved: " + reservedNum;
tableNo[2].textContent = "Checked-in: " + checkedInNum;
