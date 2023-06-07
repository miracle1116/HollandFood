<?php
// Include the library
include_once('../../simple_html_dom.php');

// Read the HTML file contents
$html = file_get_contents('../../Layout/user/user_menu.php');

// Create a DOM object
$dom = new simple_html_dom();
// Load HTML from a string
$dom->load($html);

// Find all menu item blocks
$menuBlocks = $dom->find('.my-cart');

// Iterate over each menu item block
foreach ($menuBlocks as $menuBlock) {
  // Find the menu item name
  $menuName = $menuBlock->find('h1.foodname', 0)->plaintext;

  // Find the menu item quantity
  $menuQuantity = $menuBlock->find('span.qt', 0)->plaintext;

  // Output the results
  echo 'Menu Name: ' . trim($menuName) . '<br>';
  echo 'Menu Quantity: ' . trim($menuQuantity) . '<br>';
  echo '<br>';
}

// Clean up the DOM object
$dom->clear();