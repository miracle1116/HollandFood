<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Step 2: User Order Food</title>

  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- external css stylesheet -->
  <link rel="stylesheet" href="/styles/user_menu.css">
  <link rel="stylesheet" href="/styles/user_progress.css">
  <link rel="stylesheet" href="/styles/user_all_style.css">

  <!-- Include Bootsrap JavaScript plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- external font -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/index2.html"><img src="/images/holland_food_icon.png"
                    width="35px" />
                Holland Food</a>
            <!-- hamburger icon when screen size become small -->
            <button class="bg-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-stream navbar-toggler-icon"></i>
            </button>

            <div class="collapse navbar-collapse " id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-3">
                    <li class="nav-item active">
                        <a class="nav-link active nav-link-underline" aria-current="page" href="/index2.html#home">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link nav-link-underline" href="/index2.html#aboutUs">About Us</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link nav-link-underline" href="/index2.html#menu">Menu</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link active nav-link-underline" href="/index2.html#bookNow">Book Now</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/images/profile-icon.png" width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/Layout/user/user_profile.html">Edit Profile</a>
                            <a class="dropdown-item" id="logoutBtn">Log Out</a>
                          </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>

  <!-- Progressbar -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 
            col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2 ">
            <div class="px-0 pt-2 pb-0 mb-3 ">
                <form id="form">
                    <ul id="progressbar">
                        <li class="active" id="step1">
                            <strong>Step 1: <br>Choose Table</strong>
                        </li>
                        <li class="active" id="step2"><strong>Step 2: <br>Select Menu</strong></li>
                        <li class="" id="step3"><strong>Step 3: <br>Confirmation</strong></li>

                    </ul>
                </form>
            </div>
        </div>
    </div>
  </div>


  <!-- <div class=" row row-no-gutters justify-content-center">

        <div id="leftcolumn">
            <div class="col col-lg-6 col-md-6 justify-content-center bg-light ms-5 rounded-5">
            <div class="container ms-3 mt-3">
                <div class=" justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="bi bi-geo-alt-fill icon"></i></span>
                    </div>
                    <div class=""  style="display: inline-block;">
                        <p class=""><strong>Holland Food</strong></br><small>Kolej Kediaman Kinabalu, University of Malaya</small></p>
                    </div>
    
                </div>
                
            </div>    
            </div>
            

        </div> -->

  <!-- left user info -->
  <!-- <div class="col col-lg-3 col-md-3 justify-content-center bg-light rounded-5 p-3">
            <div class="text-center justify-content-center">
                <img src="/images/profile-icon-blue.png " width="120px">
            </div>

            <div class="justify-content-center p-lg-5 p-md-3 p-sm-1" >
                <div class="form-group mt-3">
                    <label class="fw-bold" for="username">Name</label>
                    <input type="text" class="form-control input" id="username"  placeholder="John Wick">
                </div>

                <div class="form-group mt-3">
                    <label class="fw-bold" for="email">Email</label>
                    <input type="email" class="form-control input" id="email"  placeholder="example@gamil.com">
                </div>

                <div class="form-group mt-3 mb-5">
                    <label class="fw-bold" for="contactnumber">Contact Number</label>
                    <input type="text" class="form-control input" id="contactnumber"  placeholder="0123456789">
                </div>

                
            </div>

        </div>

    </div> -->

  <div class="row justify-content-center p-5 ">
    <div class="leftcolumn row">
      <div class="col-12 category-div">  
        <div class="row justify-content-center d-flex flex-nowrap mt-2" style="background-color: #130D25">
          <!-- Menu Category -->
          <div class="menu_con col-2 justify-content-center " data-category="all">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/all-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                All
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Salad -->
          <div class="menu_con col-2 justify-content-center" data-category="salad">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/salad-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Salad
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Dutch -->
          <div class="menu_con col-2 justify-content-center " data-category="dutch">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/dutch-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Dutch
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Pizza -->
          <div class="menu_con col-2 justify-content-center " data-category="pizza">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/pizza-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Pizza
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Spaghetti -->
          <div class="menu_con col-2 justify-content-center" data-category="spaghetti">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/spaghetti-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Spaghetti
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Snacks -->
          <div class="menu_con col-2 justify-content-center" data-category="snacks">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/snacks-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Snacks
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
  
          <!-- Drink -->
          <div class="menu_con col-2 justify-content-center" data-category="drink">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/beverage-category.png"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                Drink
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <div id="menucard">
        <div class="card" style="height:1000px; background-color: #130D25">
          <!-- pizza -->
          <div class="row mt-5 justify-content-around pe-3">

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="pizza">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/garlic-herb-pizza.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Garlic Herb Pizza</div>
                  <div class="ingredient">Garlic, Herb, Olive oil</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM22.00</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="pizza">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/menu-icon-3.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Margherita Pizza</div>
                  <div class="ingredient">Tomatoes, Fresh basil</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM22.00</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="pizza">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/mushroom pizza.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Mushroom Pizza</div>
                  <div class="ingredient">Mushroom</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM15.00</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>


            <!-- spaghetti -->
            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="spaghetti">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/menu-icon-4.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Aglio e Olio</div>
                  <div class="ingredient">Beef, Tomatoes</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM20.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="spaghetti">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/spaghetti-tomato_chicken_pasta.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Chicken Pasta</div>
                  <div class="ingredient">Tomato, Chicken</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM18.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="spaghetti">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/spaghetti-Vegan_Carbonara.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Vegan Carbonara</div>
                  <div class="ingredient">Vegetables</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM16.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>


            <!-- drink -->
            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="drink">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/drinks-iceLemonTea.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Ice Lemon Tea</div>
                  <div class="ingredient">Lemon, Tea</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM6.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="drink">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/drinks-latte.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Latte</div>
                  <div class="ingredient">Coffee, Milk</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM9.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="drink">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/drinks-lemonade.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Lemonade</div>
                <div class="ingredient">Rasberry, Soda</div>
                <div class="mt-4 price">
                  <p class="m-0">RM7.00</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>
            
          
          <!-- salad -->
          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="salad">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/menu-icon-2.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Caesar Salad</div>
                <div class="ingredient">Cucumber, Onions</div>
                <div class="mt-4 price">
                  <p class="m-0">RM9.90</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          

            <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="salad">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/Avocado Salad.png" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold">Avocado Salad</div>
                  <div class="ingredient">Avocado, Chickpea</div>
                  <div class="mt-4 price">
                    <p class="m-0">RM13.50</p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>
            
          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="salad">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/garden salad.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Garden Salad</div>
                <div class="ingredient">Tomato, Vegetables</div>
                <div class="mt-4 price">
                  <p class="m-0">RM11.50</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>


          <!-- snacks -->
          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="snacks">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/taco.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Taco</div>
                <div class="ingredient">Ground beef</div>
                <div class="mt-4 price">
                  <p class="m-0">RM17.50</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="snacks">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/french fries.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">French Fries</div>
                <div class="ingredient">Potato</div>
                <div class="mt-4 price">
                  <p class="m-0">RM10.50</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>


          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="snacks">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/menu-icon-5.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Buffalo Wings</div>
                <div class="ingredient">Chicken</div>
                <div class="mt-4 price">
                  <p class="m-0">RM18.50</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          <!-- dutch -->

          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="dutch">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/menu-icon-1.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Stamppot</div>
                <div class="ingredient">Potatoes, Shallots</div>
                <div class="mt-4 price">
                  <p class="m-0">RM28.00</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="dutch">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/dutch-herby-smoked-salmon.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Smoked Salmon</div>
                <div class="ingredient">Lemon, Salmon</div>
                <div class="mt-4 price">
                  <p class="m-0">RM31.00</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          <div class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
            data-category="dutch">
            <div class="menu-item container-fluid shadow-lg bg-body ms-3">
              <img src="../../images/dutch-lasagna.png" class="menu-item" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc ps-4 container-fluid">
                <div class="fw-bold">Lasagna</div>
                <div class="ingredient">Cottage cheese</div>
                <div class="mt-4 price">
                  <p class="m-0">RM28.00</p>
                  <span>
                    <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                  </span>

                </div>
              </div>
            </div>
          </div>

          


          </div>
        </div>
      </div>
    </div>


    <div class="sidebar col-2">
      <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="slideOutIcon fs-4 bi bi-cart"></i>
        <span class="cart-items-count"></span>
      </button>

      <div class="rounded-4 justify-content-center ">
        <div class="container" id="mycart">
          <h2>My Cart</h2>
        </div>
        <hr>

        <div class="my-cart">
          <div class="menu-in-cart my-3">
            <div class="menucart-item container-fluid bg-body">
              <img src="../../images/spaghetti_icon.png" class="menucart-item rounded-circle bg-body" />
            </div>
            <div class="border_menucart">
              <div class="menucart-item-desc container-fluid">
                <div class="menucart-itemname fw-bold ">
                  <h1 class="foodname">
                    Pizza <br>
                  </h1>
                  <h2 class="price ms-2">
                    RM 53.99<br>

                  </h2>
                </div>

                <div class="content">

                  <span class="qt-minus">-</span>
                  <span class="qt">1</span>
                  <span class="qt-plus">+</span>

                  <div class="col  d-flex justify-content-end align-items-start">
                    <div id="remove">
                      <button class="btn" id="remove"><i class="fa fa-trash" style="font-size: 22px;"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>


      </div>
    </div>




    <!--<div class="rightcolumn rounded-4 justify-content-center ">
            <div class="container" id="mycart">
            <h2>My Cart</h2>
            </div>
            <hr>

            <div class="row">
               Cart item 
            <div class="col-xl-12 col-lg-4 ms-lg-5 ms-3 my-3">
              <div class="menucart-item container-fluid shadow-lg bg-body">
                <img
                  src="../../images/spaghetti_icon.png"
                  class="menucart-item rounded-circle shadow-lg bg-body"
                />
              </div>
              <div class="border_menucart">
                <div class="menucart-item-desc container-fluid">
                  <div class="menucart-itemname fw-bold ">
                    <h1 class="foodname">
                      Pizza <br>
                    </h1>
                    <h2 class="price ms-5">
                      RM 53.99<br>

                    </h2>
                  </div>

                  <div class="content">
					
                    <span class="qt-minus">-</span>
                    <span class="qt">1</span>
                    <span class="qt-plus">+</span>

                    <div class="col  d-flex justify-content-end align-items-start">
                      <div id="remove">
                        <button class="btn" id="remove" ><i class="fa fa-trash" style="font-size: 22px;"></i></button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
             Cart item end 
          </div>-->




  </div>

  </div>

  <div class="button-container mt-3 px-5">
    <button class="start-button button-shape" onclick="location.href = 'user_table.html';">Previous</button>
    <button type="submit" onclick="location.href = 'user_confirmation.html';"
      class="end-button button-shape">Next</button>
  </div>

  <div id="logout-modal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header ">
                <div class="icon-box3">
                    <i class="bi bi-box-arrow-right"></i>
                </div>
                <h4 class="modal-title w-100">Logout</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">You are loging out your account!</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button id="btn-cancel-logout" class="btn2 btn-success btn-block p-2 btn-cancel" data-dismiss="modal" onclick="location.href = 'user_menu.html';">Cancel</button>
                <button id="btn-confirm" class="btn2 btn-success btn-block p-2 btn-confirm" data-dismiss="modal" onclick="location.href = '/index.html';">Confirm</button>
            </div>
        </div>
    </div>
</div>


  <script src="/script/userMenu.js"></script>



</body>

</html>