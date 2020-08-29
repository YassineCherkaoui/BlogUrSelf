<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="../public/images/logo.png" width="23%"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              CATEGORIES
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <?php
		

    while ($rowC = $resultC->fetch_assoc()) { ?>
              <a class="dropdown-item" href="category.php?category=<?= $rowC['name']; ?>"><?= $rowC['name']; ?></a>



              <?php
		}

		?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>


          <?php




          if (isset($_SESSION['username'])){ ?>





          <li class="nav-item">
            <a class="btn" href="blogger_profile.php" style="color: #FFC273;">
              <?= $_SESSION["username"]; ?></a>
          </li>

          <?php
          }else { ?>

          <li class="nav-item">
            <a class="btn" href="login.php" style="color: #FFC273;">Start Writing</a>
          </li>

          <?php   }

          
          
          
          ?>

        </ul>
      </div>
    </div>
  </nav>



  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../public/img-site/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>BlogUrSelf</h1>
            <span class="subheading">Create a unique and beautiful blog. It’s easy and free.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
