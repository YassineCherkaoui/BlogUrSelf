<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if ($row['postID'] == '') {
    header('Location: ./');
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap core CSS -->
    <link href="style/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="style/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="style/images/fiveicon.png" type="image/x-icon">
    <!-- Custom styles for this template -->
    <link href="style/home/css/clean-blog.min.css" rel="stylesheet">


    <title>blogUeSelf<?php echo $row['postTitle']; ?></title>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="style/images/logo.png" width="23%"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" href="#" style="color: #FFC273;">JointUS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('style/home/img/home-bg.jpg')">
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
    
    <header>
        <a href="/" class="home"><i class="fa fa-book" alt=""></i><i class="fa fa-hand-lizard-o" alt=""></i></a>
    </header>
    <main id="content">
        <article id="post">
            <progress id="reading-progress" max="100" value="0"></progress>
            <header>
                <h1 class="headline">A new Ice Age: How you can become a subzero cool peep and lead an exclusive
                    lifestyle</h1>
                <img class="author-img" src="https://dev-to-uploads.s3.amazonaws.com/uploads/user/profile_image/361098/3dbb565c-6cd7-42db-9376-bfad8f9e6647.jpeg" alt="profile pic">
                <div class="author-detail">
                    <span class="author">Rob O'Leary</span>
                    <button class="follow-btn">Follow</button>
                </div>
                <div>
                    <span class="social"><a href="https://codepen.io/robjoeol/"><i class="fa fa-codepen"></i></a><span>
                            <span class="social"><a href="https://github.com/robole/"><i class="fa fa-github"></i></span>
                            <span class="social"><a href="#"><i class="fa fa-bookmark-o"></i></a></span>
                </div>
                <span class="publish-date">Apr. 16, 2020</span>
                <span class="reading-time">3 min read</span>
                </div>
            </header>
            <img src="https://dev-to-uploads.s3.amazonaws.com/i/3hj2gsz3ipnwo2sgeftg.jpg" alt="subzero cool peeps" />
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
            <p>Something chiller killer here. Aliquip est reprehenderit officia laborum esse ea aute fugiat labore.
                Culpa enim labore culpa sit enim irure. Sunt elit voluptate mollit enim sunt aute consectetur. Officia
                fugiat occaecat sit minim consectetur officia labore amet nisi do. Sint ad aliquip labore enim laboris
                occaecat sint sit id consequat nostrud velit anim laborum.</p>
        </article>
        <section class="recommended-articles">
            <h2>Dont go! Read more articles from this author!</h2>
            <ul>
                <li>
                    <a href="" class="article-img">
                        <img src="https://www.fillmurray.com/200/200" alt="story with bill murray">
                    </a>
                    <a href="" class="article-title">
                        <h2>For the love of Bill</h2>
                    </a>
                    <span class="publish-date">Apr. 13, 2020</span>
                    <span class="reading-time">5min</span>

                </li>
                <li>
                    <a href="" class="article-img">
                        <img src="https://baconmockup.com/200/200" alt="story with slab of bacon">
                    </a>
                    <a href="" class="article-title">
                        <h2>Ham time with a friend of mine</h2>
                    </a>
                    <span class="publish-date">Apr. 11, 2020</span>
                    <span class="reading-time">4min</span>
                </li>
                <li>
                    <a href="" class="article-img">
                        <img src="https://www.fillmurray.com/200/200" alt="story with random photo">
                    </a>
                    <a href="" class="article-title">
                        <h2>Sailor, sailor, groundhog pie</h2>
                    </a>
                    <span class="publish-date">Apr. 1, 2020</span>
                    <span class="reading-time">15min</span>
                </li>
            </ul>
        </section>
    </main>
    <footer>
        <section class="pledge">
            <div>

                <h2>Discover</h2>
                <p>Welcome to shangri-la. Voices and original ideas are king and queen. We don't mine you, or advertise
                    to you.</p>
            </div>
            <div>
                <h2>Read</h2>
                <p>We got articles on topics, fo real.</p>
            </div>
            <div>
                <h2>Write</h2>
                <p>Become a member and share your ideas.</p>
            </div>
        </section>
        <section>
            <p>Arghhh legal stuff. brain shutting down</p>
            <p>&copy; copyright some corp some era</p>
        </section>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>