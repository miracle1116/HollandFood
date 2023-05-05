//animation on scroll
$(window).scroll(function () {
  $(".animation").each(function () {
    var position = $(this).offset().top;
    var windowHeight = $(window).height();
    if (position < $(window).scrollTop() + windowHeight) {
      $(this).addClass("show");
    }
  });
});

//animation on load
$(document).ready(function () {
  $('.animation-on-load').each(function (i) {
    setTimeout(function () {
      $('.animation-on-load').eq(i).css({
        'opacity': '1',
        'transform': 'translateY(0)'
      });
    }, 400 * (i + 1));
  });
});



// slider
const productContainers = [...document.querySelectorAll('.slide-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
  let containerDimensions = item.getBoundingClientRect();
  let containerWidth = containerDimensions.width;

  nxtBtn[i].addEventListener('click', () => {
    item.scrollLeft += containerWidth;
  })

  preBtn[i].addEventListener('click', () => {
    item.scrollLeft -= containerWidth;
  })
})


// get the menu container, all menu cards, and the menu image
const menuContainer = document.querySelector('.menu-container');
const menuCards = document.querySelectorAll('.menu-outer');
const menuImage = menuContainer.querySelector('.food-icon');

// add event listeners to each menu card
menuCards.forEach((card) => {
  // const originalRank = menuContainer.querySelector('.dish-rank').textContent;
  const originalName = menuContainer.querySelector('.dish-name').textContent;
  const originalInfo = menuContainer.querySelector('.dish-info').textContent;
  const originalImage = menuImage.getAttribute('src');

  card.addEventListener('mouseover', () => {
    // get the data from the menu card
    const name = card.querySelector('.menu-name').textContent;
    const details = card.querySelector('.menu-details').textContent;
    const image = card.querySelector('.menu-img').getAttribute('src');

    // get the elements in the menu container that need to change
    // const dishRank = menuContainer.querySelector('.dish-rank');
    const dishName = menuContainer.querySelector('.dish-name');
    const dishInfo = menuContainer.querySelector('.dish-info');

    // add a transition effect to the element changes
    dishName.style.transition = 'transform 0.5s';
    dishInfo.style.transition = 'transform 0.5s';
    menuImage.style.transition = 'transform 0.5s';

    // slide out the old image
    menuImage.style.transform = 'translateX(-100%)';
    dishInfo.style.transform = 'translateY(100%)';
    dishName.style.transform = 'translateY(-100%)';

    setTimeout(() => {
      // change the elements in the menu container
      // dishRank.textContent = '';
      dishName.textContent = name;
      dishInfo.textContent = details;
      menuImage.setAttribute('src', image);

      // slide in the new image
      menuImage.style.transform = 'translateX(0%)';
      dishInfo.style.transform = 'translateY(0%)';
      dishName.style.transform = 'translateY(0%)';
    }, 300);
  });

  card.addEventListener('mouseout', () => {
    // remove the transition effect when the mouse leaves the menu card
    const dishName = menuContainer.querySelector('.dish-name');
    const dishInfo = menuContainer.querySelector('.dish-info');

    dishName.style.transition = 'transform 0.5s';
    dishInfo.style.transition = 'transform 0.5s';
    menuImage.style.transition = 'transform 0.5s';

    // slide out the new image
    menuImage.style.transform = 'translateX(-100%)';
    dishInfo.style.transform = 'translateY(100%)';
    dishName.style.transform = 'translateY(-100%)';

    setTimeout(() => {
      // reset the values of the elements in the menu container to their original values
      // dishRank.textContent = originalRank;
      dishName.textContent = originalName;
      dishInfo.textContent = originalInfo;
      menuImage.setAttribute('src', originalImage);

      // slide in the original image
      menuImage.style.transform = 'translateX(0%)';
      dishInfo.style.transform = 'translateY(0%)';
      dishName.style.transform = 'translateY(0%)';
    }, 300);
  });
});


// logout modal
var modalLogout = new bootstrap.Modal("#logout-modal");
var logoutButton = document.getElementById('logoutBtn');
logoutButton.addEventListener("click", function () {
    console.log(1);
    modalLogout.show();
});