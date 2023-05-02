const menuItems = document.querySelectorAll('#menucard .col-4');
  const categoryButtons = document.querySelectorAll('.menu_con');

  categoryButtons.forEach(item => {
    item.addEventListener('click', () => {
      const category = item.dataset.category;

      menuItems.forEach(item => {
        if (category === 'all') {
        item.style.display = 'block';
        } else if (item.dataset.category === category) {
        item.style.display = 'block';
        } else {
        item.style.display = 'none';
        }
     });
    });
 });


 $(document).ready(function() {
    $('#menucard .col-4').click(function() {
      // get the menu item name, price and image source
      var name = $(this).find('.fw-bold').text().trim();
      var price = $(this).find('.price').children('p').text().trim();
      var imageSrc = $(this).find('.menu-item img').attr('src');
      console.log(imageSrc);   

       // check if the item already exists in the cart
      var existingItem = $('.my-cart').find('.foodname:contains("' + name + '")').closest('.menu-in-cart');
      if (existingItem.length) {
        // increase the quantity of the existing item
        var quantity = parseInt(existingItem.find('.qt').text());
        existingItem.find('.qt').text(quantity + 1);
      } else {
  
      // create a new menu cart item and add it to the cart
      var menuItem = '<div class="menu-in-cart my-3">' +
        '<div class="menucart-item container-fluid bg-body">' +
        '<img src="' + imageSrc + '" class="menucart-item rounded-circle bg-body">' +
        '</div>' +
        '<div class="border_menucart">' +
        '<div class="menucart-item-desc container-fluid">' +
        '<div class="menucart-itemname fw-bold">' +
        '<h1 class="foodname">' + name + '</h1>' +
        '<h2 class="price ms-2">' + price + '</h2>' +
        '</div>' +
        '<div class="content">' +
        '<span class="qt-minus">-</span>' +
        '<span class="qt">1</span>' +
        '<span class="qt-plus">+</span>' +
        '<div class="col  d-flex justify-content-end align-items-start">' +
        '<div id="remove">' +
        '<button class="btn" id="remove" ><i class="fa fa-trash" style="font-size: 22px;"></i></button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
  
      // add the new menu cart item to the cart
      $('.my-cart').append(menuItem);
      }
      event.stopPropagation();
      updateSidebarToggle();
  
      // update the cart count
      var cartCount = parseInt($('.cart-count').text());
      $('.cart-count').text(cartCount + 1);
    });
  
  
    // remove item from the cart
    $(document).on('click', '.btn#remove', function() {
      event.stopPropagation();
      $(this).closest('.menu-in-cart').remove();
      updateSidebarToggle();
  
      // update the cart count
      var cartCount = parseInt($('.cart-count').text());
      $('.cart-count').text(cartCount - 1);
    });
  
    // increase or decrease item quantity
    $(document).on('click', '.qt-plus', function() {
      var quantity = parseInt($(this).siblings('.qt').text());
      $(this).siblings('.qt').text(quantity + 1);
    });
  
    $(document).on('click', '.qt-minus', function() {
      var quantity = parseInt($(this).siblings('.qt').text());
      if (quantity > 1) {
        $(this).siblings('.qt').text(quantity - 1);
      }
    });
  });

  function toggleSidebar() {
    var sidebar = document.querySelector(".sidebar");
    var sidebarToggle = document.querySelector(".sidebar-toggle");
  
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

function updateSidebarToggle() {
  var cartItemsCount = $('.menu-in-cart').length;
  $('.sidebar-toggle .cart-items-count').text(cartItemsCount);
}

updateSidebarToggle();