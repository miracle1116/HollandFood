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