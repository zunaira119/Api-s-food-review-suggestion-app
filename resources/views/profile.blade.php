@extends('layouts.main')
@section('title','User profile')
@section('style')
<style>
        .cover-bg{
            background-image: url(images/bg-banner.jpg);
            background-position: center;
            height: 350px;
            background-size: cover;
        }
        .profile-img{
            width: 150px;
            height: 150px;
            margin-bottom: -75px;
           margin-left: 130px;
        }
        .img-show{
            background-image: url(images/col-4.jpeg) ;
            background-position: center;
            background-size: cover;
            height: 400px;
            width: 100%;
        }
        .bg-footer{
            background-image: url(images/bg.jpg);
            background-position: center;
           
            background-size: cover;
        }
        
    </style>
@endsection
@section('content')

        <section class="content">
            <div class="container-fluid">
                <div class="row cover-bg">
                    <div class="col-md-12 align-self-end ">
                        <img class="profile-img border rounded-circle "src="images/col-1.jpeg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class=" col-md-4">
                                
                            </div>
                            <div class=" col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="ml-4">Posts(10)</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="ml-2">Following(56)</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="ml-5">Followers(67)</h4>
                                    </div>
                                    <div class="col-md-3 text-right ">
                                        
                                    </div>
                                    <div class="col-md-3  ">
                                        <button class="btn btn-outline-dark" style="width: 100px;">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                                
                            </div>
                            <div class="col-md-9">
                               <h4> Floyd MayWeather</h4>
                               <h6> @FloydMayWeather</h6>
                               <p>undefeated boxer and the part of the money team. Visit themoney.com for the official merchandise</p>
                                <div class="card " id="side-pane">
                                    <div class="card-header">
                                        <h6>Sponosors</h6>
                                    </div>
                                    <div class="card-body">
                                       <h4>Restaurant Name</h4>
                                       
                                       <span> <p><img src="images/col-2.jpeg" class="m-2" style="width: 20%;" alt="">undefeated boxer and the part of the money team. Visit themoney.com for the official merchandise</p></span>
                                    </div>
                                    <div class="card-body">
                                        <h4>Restaurant Name</h4>
                                        
                                        <span> <p><img src="images/col-2.jpeg" class="m-2" style="width: 20%;" alt="">undefeated boxer and the part of the money team. Visit themoney.com for the official merchandise</p></span>
                                     </div>
                                     
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
 
                           <div class="row mt-3">
                            <div class="col-md-1">
                               
                            </div>
                            <div class="col-md-11">
                                
                                <div class="row">
                                   <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="70"height="70" alt="">
                                                </div>
                                                <div class="col-xs-8 ml-3">
                                                 <h4>User Name</h4>
                                                 <h6><i class="fa fa-address-book mr-2"></i>Restaurant Name</h6>
                                                 <p><i class="fa fa-map-marker mr-2"></i>Location</p>
                                             </div>
                                            </div>
                                         </div>
                                        <div class="card-body p-0 ">
                                         
                                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <ol class="carousel-indicators">
                                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-4 text-center"><i class="fa fa-thumbs-up text-primary"></i>Like</div>
                                                <div class="col-4 text-center"><i class="fa fa-comment text-primary"></i>Comment</div>
                                                <div class="col-4 text-center"><i class="fa fa-share text-primary"></i>Share</div>
                                            </div>
                                        </div>  
                                        <div class="card-body p-0">
                                            <form >
                                                <input class="border-0 col-12 p-3"style="outline:none"  type="text" placeholder="Add a Comment....">
                                            </form>
                                        </div>    
                                      </div>
                                   </div>
                                   <div class="col-md-1"></div>
                                </div>
                              </div>
                           </div>
                           
                            <!-- slider -->
                           <div class="row mt-3">
                            <div class="col-md-1">
                               
                            </div>
                            <div class="col-md-11">
                                
                                <div class="row">
                                   <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="70"height="70" alt="">
                                                </div>
                                                <div class="col-xs-8 ml-3">
                                                 <h4>User Name</h4>
                                                 <h6><i class="fa fa-address-book mr-2"></i>Restaurant Name</h6>
                                                 <p><i class="fa fa-map-marker mr-2"></i>Location</p>
                                             </div>
                                            </div>
                                         </div>
                                        <div class="card-body p-0 ">
                                         
                                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <ol class="carousel-indicators">
                                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-4 text-center"><i class="fa fa-thumbs-up text-primary"></i>Like</div>
                                                <div class="col-sm-4 text-center"><i class="fa fa-comment text-primary"></i>Comment</div>
                                                <div class="col-sm-4 text-center"><i class="fa fa-share text-primary"></i>Share</div>
                                            </div>
                                        </div> 
                                        <div class="card-body p-0">
                                            <form>
                                                <input class="border-0 col-12 p-3"style="outline:none" type="text" placeholder="Add a Comment...." >
                                            </form>
                                        </div>     
                                      </div>
                                   </div>
                                   <div class="col-md-1"></div>
                                </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                            <div class="col-md-1">
                               
                            </div>
                            <div class="col-md-11">
                                
                                <div class="row">
                                   <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                 <img src="images/col-3.jpeg" class="border rounded-circle " width="70"height="70" alt="">
                                                </div>
                                                <div class="col-xs-8 ml-3">
                                                 <h4>User Name</h4>
                                                 <h6><i class="fa fa-address-book mr-2"></i>Restaurant Name</h6>
                                                 <p><i class="fa fa-map-marker mr-2"></i>Location</p>
                                             </div>
                                            </div>
                                         </div>
                                        <div class="card-body p-0 ">
                                         
                                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <ol class="carousel-indicators">
                                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              <div class="carousel-item">
                                                <img src="images/col-2.jpeg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption  " style="margin: 0 -10% 45% 0; font-size: 40px;"> 
                                                    <span  class=" bg-white float-right text-danger border border-danger rounded-circle px-1" >9.0</span>
                                                  
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-4 text-center"><i class="fa fa-thumbs-up text-primary"></i>Like</div>
                                                <div class="col-sm-4 text-center"><i class="fa fa-comment text-primary"></i>Comment</div>
                                                <div class="col-sm-4 text-center"><i class="fa fa-share text-primary"></i>Share</div>
                                            </div>
                                        </div> 
                                        <div class="card-body p-0">
                                            <form >
                                                <input class="border-0 col-12 p-3"style="outline:none"  type="text" placeholder="Add a Comment....">
                                            </form>
                                        </div>     
                                      </div>
                                   </div>
                                   <div class="col-md-1"></div>
                                </div>
                              </div>
                           </div>
                    </div>
                </div>
            </div>
        </section>
        
@endsection
@section('script')
<script>
   $(function(){
    var stickyHeaderTop = $('#side-pane').offset().top;

    $(window).scroll(function(){
            if( $(window).scrollTop() > stickyHeaderTop ) {
                    $('#side-pane').css({position: 'fixed', top: '1px', width:'285px'});
            } else {
                    $('#side-pane').css({position: 'static', top: '0px'});
            }
    });
});
</script>
@endsection