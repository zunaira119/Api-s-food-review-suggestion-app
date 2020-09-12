@extends('layouts.main')
@section('title','Home')
@section('style')
    <style>
        .f-row{
            background-image: url(images/bg-banner.jpg);
            background-position: center;
            height: 500px;
            background-size: cover;
        }
        .bannar .carousel-item {
            height: 70vh;
            min-height: 350px;
            background: no-repeat center center scroll;
             -webkit-background-size: cover;
             -moz-background-size: cover;
              -o-background-size: cover;
             background-size: cover;
}
        .bg-footer{
            background-image: url(images/bg.jpg);
            background-position: center;

            background-size: cover;
        }
        .col1-img{
            background-image: url(images/col-1.jpeg) ;
            background-position: center;
            background-size: cover;
            width: 100%;
            height:200px;
        }
        .col2-img{
            background-image: url(images/col-2.jpeg) ;
            background-position: center;
            background-size: cover;
            height: 150px;
            width: 100%;
        }
        .col3-img{
            background-image: url(images/col-3.jpeg) ;
            background-position: center;
            background-size: cover;
            height: 150px;
            width: 100%;
        }
        .col4-img{
            background-image: url(images/col-4.jpeg) ;
            background-position: center;
            background-size: cover;
            height: 150px;
            width: 100%;
        }
        .footer-menu_item{
            list-style-type: none;
        }
        .slider-show{
            margin-bottom: 16%;
        }

    </style>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide bannar" data-ride="carousel" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('images/slider-img.jpg')">
          <div class="carousel-caption d-md-block">
            <div class="row ">
                <div class="col-xs-12 col-md-12">
                    <h2 class="mt-5 text-white">What Are You Searching Today?</h2>
                </div>
            </div>
            <div class="row justify-content-center mt-3 lead slider-show">
                <div class="col-md-12" style=" background: rgba(0,0,0,0.9); border-radius: 50px;">
                    <form>
                        <div class="form-row m-0">
                        <div class="form-group col-md-1 d-none d-sm-block text-white m-0 mt-2">
                            <i class="fa fa-search ml-2" style="font-size: 30px;" ></i>
                        </div>
                        <div class="form-group col-md-6  m-0 mt-2">
                            <input type="text" class="form-control text-white " style="background:transparent; border: none;"name="text" placeholder="Find Best Burgers spas and more" >
                        </div>
                        <div class="form-group col-md-3 m-0 mt-2">
                            <select class="form-control text-white"style=" background: transparent; border:none;" >
                                <option value="" selected>Sans Francisco</option>
                                <option value=""> florida</option>
                                <option value=""> Texas</option>
                                <option value=""> New Jwrsey</option>
                                <option value=""> Verginia</option>
                                <option value=""> Hawaii</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 m-0 ">
                            <button class="btn btn-outline-light text-white" style="border-radius: 50px; background: rgba(0,0,0,0.9);"> search</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('images/slider-img2.jpg')">
            <div class="carousel-caption d-md-block">
                <div class="row ">
                    <div class="col-xs-12 col-md-12">
                        <h2 class="mt-5 text-white">What Are You Searching Today?</h2>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 lead slider-show">
                    <div class="col-md-12" style=" background: rgba(0,0,0,0.9); border-radius: 50px;">
                        <form>
                            <div class="form-row m-0">
                            <div class="form-group col-md-1 d-none d-sm-block text-white m-0 mt-2">
                                <i class="fa fa-search ml-2" style="font-size: 30px;" ></i>
                            </div>
                            <div class="form-group col-md-6 m-0 mt-2">
                                <input type="text" class="form-control text-white " style="background:transparent; border: none;"name="text" placeholder="Find Best Burgers spas and more" >
                            </div>
                            <div class="form-group col-md-3 m-0 mt-2">
                                <select class="form-control text-white"style=" background: transparent; border:none;" >
                                    <option value="" selected>Sans Francisco</option>
                                    <option value=""> florida</option>
                                    <option value=""> Texas</option>
                                    <option value=""> New Jwrsey</option>
                                    <option value=""> Verginia</option>
                                    <option value=""> Hawaii</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 m-0 ">
                                <button class="btn btn-outline-light text-white" style="border-radius: 50px; background: rgba(0,0,0,0.9);"> search</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('images/slider-img3.jpg')">
            <div class="carousel-caption d-md-block">
                <div class="row ">
                    <div class="col-xs-12 col-md-12">
                        <h2 class="mt-5 text-white">What Are You Searching Today?</h2>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 lead slider-show">
                    <div class="col-md-12" style=" background: rgba(0,0,0,0.9); border-radius: 50px;">
                        <form>
                            <div class="form-row m-0">
                            <div class="form-group col-md-1 d-none d-sm-block text-white m-0 mt-2">
                                <i class="fa fa-search ml-2" style="font-size: 30px;" ></i>
                            </div>
                            <div class="form-group col-md-6 m-0 mt-2">
                                <input type="text" class="form-control text-white " style="background:transparent; border: none;"name="text" placeholder="Find Best Burgers spas and more" >
                            </div>
                            <div class="form-group col-md-3 m-0 mt-2">
                                <select class="form-control text-white"style=" background: transparent; border:none;" >
                                    <option value="" selected>Sans Francisco</option>
                                    <option value=""> florida</option>
                                    <option value=""> Texas</option>
                                    <option value=""> New Jwrsey</option>
                                    <option value=""> Verginia</option>
                                    <option value=""> Hawaii</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 m-0 ">
                                <button class="btn btn-outline-light text-white" style="border-radius: 50px; background: rgba(0,0,0,0.9);"> search</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>


<!-- End Banner Area -->
{{-- Quick search --}}
<div class="row justify-content-center mt-5">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body">
                <marquee onmouseover="this.stop()" onmouseout="this.start()">This is the scroll text.</marquee>
            </div>
        </div>
    </div>
</div>
<!-- Popular restaurants -->
<div class="row justify-content-center">
<div class="col-sm-10">
    <div class="row justify-content-center mt-3">
        <div class="col">
           <h3 class="text-dark">Popular Restaurants</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-sm-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-3 py-1 float-right" style="border:2px solid;"><img src="images/06-512.png" width="25" class="d-block"/><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-warning fa fa-map-marker"></span><span class="text-white"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-white fa fa-map-marker"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-white fa fa-map-marker"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-white fa fa-map-marker"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-white fa fa-map-marker"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body col1-img p-0 pt-1">
                                    <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>
                                    <span  class=" bg-white text-danger border-danger rounded-circle px-2 py-2 float-right mr-2" style="border:2px solid;"><b>9.2</b></span>
                                    <div class="p-1 pl-2"  style="margin-top:135px; background: rgba(0,0,0,0.8);">
                                        <h6 class="text-white"> Nandoos</h6>
                                        <span class="text-white fa fa-map-marker"> Lahore, Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
</div>

</div>
<!-- End Populat restaurants -->
<!-- News Feed Start -->


<div class="row justify-content-center">
<div class="col-sm-10">
    <div class="row justify-content-center mt-3">
        <div class="col">
           <h3 class="text-dark">News Feed</h3>
        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4 col-xs-6" >
                    <div class="card">
                    <div class="card-body col2-img ">
                        <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                        <span class="fa fa-map-marker text-danger"></span><span> Denguin, Pyrénées-Atlantiques</span>
                        <p><b>Reviews:</b>This is one of the best, authentic non-AYCE hot pot..... <a href="#">Read More</a></p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                    <div class="card-body col3-img ">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                        <h6 class="text-dark ">Denguin, Pyrénées-Atlantiques</h6>
                        <p><strong>Reviews:</strong>This is one of the best, authentic non-AYCE hot pot..... <a href="#" class="text-dark">Read More</a></p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                    <div class="card-body col4-img">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                        <h6 class="text-dark ">Denguin, Pyrénées-Atlantiques</h6>
                        <p><strong>Reviews:</strong>This is one of the best, authentic non-AYCE hot pot..... <a href="#" class="text-dark">Read More</a></p>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>

</div>
<!-- End News Feed -->
<!-- nearby restaurants Start -->
<div class="row justify-content-center">
<div class="col-sm-10">
    <div class="row justify-content-center mt-3">
        <div class="col">
           <h3 class="text-dark">Nearby Restaurants</h3>
        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4 col-xs-6" >
                    <div class="card">
                    <div class="card-body col4-img ">
                        <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                       <span >  <i class="fa fa-map-marker text-danger"></i> Denguin, Pyrénées-Atlantiques</span>
                       <p><i class="fa fa-fire text-warning"></i> 7 days ago</p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                    <div class="card-body col1-img ">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                        <h6 class="text-dark ">  <i class="fa fa-map-marker"></i> Denguin, Pyrénées-Atlantiques</h6>
                       <p><i class="fa fa-fire"></i>10 days ago</p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                    <div class="card-body col2-img">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-body p-0 pl-4 ">
                        <h4 class="text-dark mt-1"> Nandoos</h4>
                        <h6 class="text-dark ">  <i class="fa fa-map-marker"></i> Denguin, Pyrénées-Atlantiques</h6>
                        <p><i class="fa fa-fire"></i>15 days ago</p>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>

</div>
<!-- End Nearby Restaurants -->
<!-- Top reviews Start -->
<div class="row justify-content-center">
<div class="col-sm-10">
    <div class="row justify-content-center mt-3">
        <div class="col">
           <h3 class="text-dark">Top Reviews</h3>
        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4 col-xs-6" >
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-xs-4">
                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="50"height="50" alt="">
                                </div>
                                <div class="col-xs-8 ml-3">
                                 <h6>Jason roy</h6>
                                 <span><i class="fa fa-globe text-primary"></i> 1 hour ago</span>
                                 <span class="d-block"><i class="fa fa-map-marker mr-2 text-danger"></i> Location</span>

                             </div>
                            </div>
                        </div>

                    <div class="card-body col2-img ">
                        <span  class="mr-1 bg-white text-danger border-danger rounded-circle px-2 py-2 float-right" style="border:2px solid;"><b>8.2</b></span>

                    </div>
                    <div class="card-footer p-2 px-2 bg-white">

                        <p><b>Reviews:</b>This is one of the best, authentic non-AYCE hot pot..... <a href="#">Read More</a></p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xs-4">
                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="50"height="50" alt="">
                                </div>
                                <div class="col-xs-8 ml-3">
                                 <h6>Jason roy</h6>
                                 <span><i class="fa fa-globe "></i>1 hour ago</span>
                                 <span class="d-block"><i class="fa fa-map-marker mr-2"></i>Location</span>

                             </div>
                            </div>
                        </div>
                    <div class="card-body col3-img ">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-footer p-0 px-2 ">

                        <p><strong>Reviews:</strong>This is one of the best, authentic non-AYCE hot pot..... <a href="#">Read More</a></p>
                    </div>
                </div>
                </div>
                <div class=" col-md-4 col-xs-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xs-4">
                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="50"height="50" alt="">
                                </div>
                                <div class="col-xs-8 ml-3">
                                 <h6>Jason roy</h6>
                                 <span><i class="fa fa-globe "></i>1 hour ago</span>
                                 <span class="d-block"><i class="fa fa-map-marker mr-2"></i>Location</span>

                             </div>
                            </div>
                        </div>
                    <div class="card-body col4-img">
                        <span  class=" btn btn-default text-danger border border-danger" style="float:right;background-color: white; border-radius: 20px;">9</span>

                    </div>
                    <div class="card-footer p-0 px-2 ">

                        <p><strong>Reviews:</strong>This is one of the best, authentic non-AYCE hot pot..... <a href="#">Read More</a></p>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>

</div>
<!-- End Top Reviews -->
<!-- Mobile Section -->
<div class="row justify-content-center">
<div class="col-sm-12">
    <div class="row justify-content-center mt-3">
        <div class="col">
           <h3 class="text-dark">Foodage Mobile Apps</h3>
        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-xs-6">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img src="images/mobiles.jpg" width="200px"alt=""></div>
                                <div class="col-md-6 align-self-center">
                                    <h5>Foodage in your Mobile! Get our APP</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                   <a href="#"> <img src="images/appstore.png" alt="" width="200px" ></a>
                                    <a href="#"><img src="images/playstore.jpg" alt="" width="250px"></a>
                            </div>


                        </div>
                    </div>

                </div>

                </div>

                </div>


              </div>
        </div>

</div>
<!-- End Mobile section -->
</div>
    </div>
</section>
    @endsection
@section('script')
@endsection


