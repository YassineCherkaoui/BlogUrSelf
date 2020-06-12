<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="de">

<head>
    <title>bootstrap 4 admin theme</title>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- fontawesome JS -->
    <script src="https://use.fontawesome.com/f225000782.js"></script>
</head>

<body>
    <!-- container open -->
    <div class="container-fluid">

        <nav class="navbar navbar-toggleable-sm navbar-light bg-faded fixed-top">

            <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="javascript:;">
                <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="align-top" alt="">
                Bootstrap 4
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:;">middle1<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">middle2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">middle3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">middle4</a>
                    </li>
                </ul>

                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>


        <nav class="sidebar" data-toggle="pill">
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/325053/profile/profile-80.jpg" alt=""></a>
                    </div>
                    <div class="info">
                        Your Name
                        <small>Frontend Developer</small>
                    </div>
                </li>
            </ul>

            <ul class="nav flex-column">
                <li class="nav-header active">Navigation</li>
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:;"><i class="fa fa-bar-chart-o"></i>menu left 1<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;"><i class="fa fa-cogs"></i>menu left 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;"><i class="fa fa-cloud-download"></i>menu left 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                        <i class="fa fa-code"></i>
                        menu left 4
                    </a>
                </li>

                <li class="nav-item has-sub">
                    <a class="nav-link" data-toggle="collapse" href="#sub1" aria-expanded="false" aria-controls="sub1">
                        <i class="fa fa-align-left"></i>
                        menu level 1
                    </a>
                    <ul class="sub collapse" id="sub1">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                menu level 1.1
                            </a>
                        </li>
                        <li class="nav-item has-sub">
                            <a class="nav-link" data-toggle="collapse" href="#sub2" aria-expanded="false" aria-controls="sub2">
                                menu level 1.2
                            </a>
                            <ul class="sub collapse" id="sub2">
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;">menu level 2.1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;">menu level 2.2</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">menu level 1.3</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-sub">
                    <a class="nav-link" data-toggle="collapse" href="#sub3" aria-expanded="false" aria-controls="sub3">
                        <i class="fa fa-align-left"></i>
                        menu level 1
                    </a>
                    <ul class="sub collapse" id="sub3">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                menu level 1.1
                            </a>
                        </li>
                        <li class="nav-item has-sub">
                            <a class="nav-link" data-toggle="collapse" href="#sub4" aria-expanded="false" aria-controls="sub4">
                                menu level 1.2
                            </a>
                            <ul class="sub collapse" id="sub4">
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;">menu level 2.1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;">menu level 2.2</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">menu level 1.3</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a class="sidebar-minify" href="javascript:;">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>

            </ul>
        </nav>


        <!-- container close -->
    </div>

    <!-- JavaScript: placed at the end of the document so the pages load faster -->
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <!-- Tether -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>