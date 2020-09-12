<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">

    @yield('style')
    <style>
        .form-control1{
        border: none;
        border-radius: 0;
        border-right: 1px solid #e6e6e6;

    }
    .form-group{
        margin-bottom: 0;
    }
        .footer-menu_item{
            list-style-type: none;
        }
    </style>
</head>
<body>
    {{-- Nav bar for any user --}}
    @if(false)
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row m-1">
                        <div class="col-md-2 text-center">
                            <img src="images/logo1.png" style="width:50%;"/>
                        </div>
                        <div class="col-md-6 col-xs-12 align-self-center">


                        </div>
                        <div class="col-md-4 align-self-center">

                                        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#signup">Sign Up</button>
                                        <button class="btn btn-outline-danger  float-right mr-2" data-toggle="modal" data-target="#login">Login</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Nav bar for users --}}
    @if(true)
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row my-2">
                        <div class="col-md-2 text-center">
                            <img src="images/logo1.png" style="width:50%;"/>
                        </div>
                        <div class="col-md-6 col-xs-12 align-self-center">
                            <form >
                                <div class="form-row shadow ">
                                    <div class="form-group col-md-5 col-xs-12">
                                        <input type="text" class="form-control form-control1" style="outline:none;" placeholder=" Tacos, Burgers and much more"/>
                                    </div>
                                    <div class="form-group col-md-5 col-xs-12">
                                        <select class="form-control form-control1" style="outline:none;">
                                            <option>San fransisco</option>
                                            <option>San fransisco</option>
                                            <option>San fransisco</option>
                                            <option>San fransisco</option>
                                            <option>San fransisco</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-xs-12">
                                        <button class="btn btn-sm btn-danger w-75" ><i class="fa fa-search"></i></button>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="col-md-4 align-self-center text-sm-center " >
                            <button class=" btn-outline-warning border p-2 rounded-lg">Write a review</button>
                            <img src="images/avatar.png" class="rounded-circle border-light ml-2" width="50" style="border:2px solid"/>
                            <span class="font-weight-bold text-info">Faisal</span>
                            {{-- <i class="fa fa-chevron-down"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
  <!-- Full Height Modal Right -->
  <div class="modal fade right" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-full-height modal-right " >


      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
                    <img width="100" src="images/logo1.png"/>
                    <h5 class="text-danger mt-3">Sign up</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">User Name</label>
                            <input type="text" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="text" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Confirm Password</label>
                            <input type="password" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input type="text" class="form-control border bg-light rounded-lg"/>
                        </div>
                        <div class="form-group mt-1" >
                            <input type="checkbox" class=""/>
                            <label>I agree to Foodage</label>
                            <span class="text-warning float-right">Terms and Conditions</span>
                        </div>
                        <button type="button" class="btn btn-danger rounded-pill" style="width:100%; border:2px solid;">SIGNUP</button>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                  <p><span class="font-weight-bold">Already have an account yet?</span> Sign in</p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- login -->
  <div class="modal fade right" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right " >


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-12 text-center">
                  <img width="100" src="images/logo1.png"/>
                  <h5 class="text-danger mt-3">Sign in</h5>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <form>
                      <div class="form-group">
                          <label class="font-weight-bold">Email</label>
                          <input type="text" class="form-control border bg-light rounded-lg"/>
                      </div>
                      <div class="form-group">
                          <label class="font-weight-bold">Password</label>
                          <input type="password" class="form-control border bg-light rounded-lg"/>
                      </div>
                      <div class="form-group mt-1" >
                          <input type="checkbox" class=""/>
                          <label>Show Password</label>
                          <span class="text-warning float-right">Forgot Password?</span>
                      </div>
                      <button type="button" class="btn btn-danger rounded-pill" style="width:100%; border:2px solid;">LOGIN</button>
                  </form>
              </div>
          </div>
          <div class="row mt-3 justify-content-center">
              <div class="col-5"><hr></div>
              <div class="col-2 ">OR</div>
              <div class="col-5"><hr></div>
          </div>
          <div class="row">
              <div class="col-12 text-center">
                  <img src="images/facebook.png" width="50" class="m-2"/>
                  <img src="images/google.png" width="50" class="m-2"/>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-12 text-center">
                <p><span class="font-weight-bold">don't have an account yet?</span> Sign Up</p>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
    @yield('content')
    <!-- footer -->
    <footer id="footers" class="mt-5" style="background-image: url(images/bg.jpg); background-position: center; background-size: cover;">
        <div class="container-fluid">
            <div class="row justify-content-center  ">
                <div class="col-md-9 mt-5">
                    <div class="row mt-5">
                        <div class="col-sm-3">

                            <ul class="footer-menu_list">
                                <h3 class="footer-menu_header text-dark">About</h3>
                                <li class="footer-menu_item">
                                    <a href="#" class="text-dark">About Foodage</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Careers</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Press</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Investor Relations</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#" class="text-dark">Content Guidelines</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Terms of Service</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#" class="text-dark">Privacy Policy</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Ad Choices</a>
                                </li>
                        </ul>
                        </div>
                        <div class="col-sm-3">

                            <ul class="footer-menu_list">
                                <h3 class="footer-menu_header text-dark">Restaurants</h3>
                                <li class="footer-menu_item">
                                    <a href="#" class="text-dark">About Foodage</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#" class="text-dark">Careers</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Press</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Investor Relations</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Content Guidelines</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Terms of Service</a>
                                </li>

                        </ul>
                        </div>
                        <div class="col-sm-3">

                            <ul class="footer-menu_list">
                                <h3 class="footer-menu_header text-dark">Discover</h3>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">About Foodage</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Careers</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Press</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Investor Relations</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Content Guidelines</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Terms of Service</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Privacy Policy</a>
                                </li>
                                <li class="footer-menu_item">
                                    <a href="#"class="text-dark">Ad Choices</a>
                                </li>
                        </ul>
                        </div>
                        <div class="col-sm-3"><ul class="footer-menu_list">
                            <h3 class="footer-menu_header text-dark">Contact Us</h3>
                            <li class="footer-menu_item">
                                <i class="fa fa-mobile text-dark" style="font-size: 15px;"> +0800 567 345 </i>
                            </li>
                            <li class="footer-menu_item">
                                <i class="fa fa-envelope text-dark " style="font-size: 15px;"> support@themessoft .com</i>
                            </li>
                            <li class="footer-menu_item">
                                <i class="fa fa-map-marker text-dark" style="font-size: 15px;"> ABC Town Luton Street, New York 226688 </i>
                            </li>
                         </ul>

                             <ul class="footer-menu_list">
                                <h3 class="footer-menu_header text-text-dark">Follow Us</h3>
                                <li class="footer-menu_item mt-2">
                                    <i class="fa fa-facebook-square text-dark m-2" style="font-size: 25px;"></i>
                                    <i class="fa fa-instagram text-dark m-2" style="font-size: 25px;"></i>
                                    <i class="fa fa-linkedin text-dark m-2" style="font-size: 25px;"></i>
                                    <i class="fa fa-youtube text-dark m-2" style="font-size: 25px;"></i>
                             </ul>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 text-center">
                            <div class="py-4 ml-5">
                                <img src="images/logo1.png" width="100">
                             </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
 <!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
