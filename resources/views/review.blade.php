@extends('layouts.main')
@section('title','Restaurant profile')
@section('style')
<style>

     .position-fixed{
        margin-left: 00px;
        margin-top: -900px;
    }
    li{
        list-style-type:none;
    }

</style>
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row ml-2">
                <div class="col-md-9">
                    <div class="row pt-5" style="background-image:url(images/TdClV4QlpucjFX4GdPc2QQ.jpg); height:300px; background-position:center; background-size:contain; ">
                        <div class="col-4 mt-5">
                            <img class="border border-danger rounded-circle" src="images/res-logo.png" style="width:200px; height:200px; margin-bottom:-250px;"/>

                        </div>
                        <div class="col-8"></div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="row mt-4">
                                <div class="col-3"></div>
                                <div class="col-9 ">
                                        <h2>Kalz Burger</h2>
                                        <h5> A Name of Trust</h5>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row justify-content-center pl-2 ">
                                <div class="col-md-4 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <span class=" border-danger rounded-circle p-1 py-2" style="border:2px solid;"> 7.8</span>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star "></i>
                                                    <p class="mt-1"><b>Environmental Rating</b></p>
                                                </div>
                                                <div class="col-6">
                                                    <span class="border-danger rounded-circle p-1 py-2" style="border:2px solid;">7.1</span>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star "></i>
                                                    <p class="mt-1"><b>Food Rating</b></p>
                                                </div>
                                            </div>
                                            <p><b> @ Cuisines, Fast Food</b></p>
                                            <p>This is the description or about info of the restaurant. This is the description or about info of the restaurant.</p>
                                        </div>
                                        <div class="card">
                                            <div class="card-body ">
                                                <i class="fa fa-phone"></i><span><b> Phone</b></span><p> <b> +92 000 0000000</b></p>
                                            <hr>
                                            <i class="fa fa-envelope"></i><span><b> Email</b></span><p> <b> abc@xyz.com</b></p>
                                            <hr>
                                            <h5>Hours</h5>
                                                    <hr>
                                                    <div class="row" style="font-size:12px;">
                                                        <div class="col-4">
                                                            <li><b>Sunday</b></li>
                                                        </div>
                                                        <div class="col-6" >
                                                            <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                        </div>
                                                        <div class="col-1"><i  class="fa fa-chevron-down" onclick="hrs()"></i></div>
                                                    </div>
                                                    <div id="hours" style="display:none;">
                                                        <div class="row" style="font-size:12px;">
                                                            <div class="col-4">
                                                                <li><b>Sunday</b></li>
                                                            </div>
                                                            <div class="col-6" >
                                                                <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="font-size:12px;">
                                                            <div class="col-4">
                                                                <li><b>Sunday</b></li>
                                                            </div>
                                                            <div class="col-6" >
                                                                <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="font-size:12px;">
                                                            <div class="col-4">
                                                                <li><b>Sunday</b></li>
                                                            </div>
                                                            <div class="col-6" >
                                                                <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>

                                            <div class="row">

                                                <div class="col-md-12 col-xs-12">
                                                    <h5>Location</h5>
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.1729058257442!2d74.24167311488961!3d31.46442948138813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190354d1b26e45%3A0x8847a66d4be8a3ae!2sSigi%20Technologies!5e0!3m2!1sen!2s!4v1582896116306!5m2!1sen!2s"  frameborder="0" style="border:0; width:100%; " allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <div class="row mt-2">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" style="background:none;">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <img class="border rounded-circle" src="images/avatar.png" width="70" style=""/>

                                                        </div>
                                                        <div class="col-xs-8 ml-1">
                                                            <h5 class="text-primary">Name of Person</h5>
                                                            <span><i class="fa fa-globe text-primary"></i> 1 hr. </span>
                                                            <p><i class="fa fa-map-marker text-danger"></i> <b>Location</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div id="slides" class="carousel slide"  data-ride="carousel" data-interval="false">
                                                        <div class="carousel-inner">
                                                          <div class="carousel-item active">
                                                            <img class="d-block w-100" src="images/food2.jpg" alt="First image">
                                                            <div class="carousel-caption" style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >9.0</span>
                                                            </div>
                                                          </div>
                                                          <div class="carousel-item">
                                                            <img class="d-block w-100" src="images/food1.jpg" alt="Second image">
                                                            <div class="carousel-caption " style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >9.0</span>
                                                            </div>
                                                          </div>
                                                          <div class="carousel-item">
                                                            <video class="d-block w-100" controls  height="318">
                                                                <source src="videos/post_videos/video-5e2e99b15c42a.mp4" type="video/mp4">
                                                            </video>
                                                            <div class="carousel-caption " style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >9.0</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                          <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                          <span class="sr-only">Next</span>
                                                        </a>
                                                      </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-thumbs-up text-primary"></i> Like
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-comment text-primary"></i> Comment
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-share text-primary"></i> Share
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ">
                                                    <form >
                                                        <input class="col-12 border-0 p-3" style="outline:none;" type="text" placeholder="Add a comment"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2" id="nosticky">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" style="background:none;">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <img class="border rounded-circle" src="images/avatar.png" width="70" style=""/>
                                                        </div>
                                                        <div class="col-xs-8 ml-1">
                                                            <h5 class="text-primary">Name of Person</h5>
                                                            <span><i class="fa fa-globe text-primary"></i> 1 hr. </span>
                                                            <p><i class="fa fa-map-marker text-danger"></i> <b>Location</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div id="slides1" class="carousel slide"  data-ride="carousel" data-interval="false">
                                                        <div class="carousel-inner">
                                                          <div class="carousel-item active">
                                                            <img class="d-block w-100" src="images/food2.jpg" alt="First image">
                                                            <div class="carousel-caption" style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >7.6</span>
                                                            </div>
                                                          </div>
                                                          <div class="carousel-item">
                                                            <img class="d-block w-100" src="images/food1.jpg" alt="Second image">
                                                            <div class="carousel-caption " style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >7.6</span>
                                                            </div>
                                                          </div>
                                                          <div class="carousel-item">
                                                            <video class="d-block w-100" controls  height="318">
                                                                <source src="videos/post_videos/video-5e2e99b15c42a.mp4" type="video/mp4">
                                                            </video>
                                                            <div class="carousel-caption " style="margin:0 -10% 33% 0; font-size:40px;">
                                                                <span style="border:3px solid;" class=" border-danger rounded-circle float-right bg-white text-danger px-1" >7.6</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#slides1" role="button" data-slide="prev">
                                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                          <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#slides1" role="button" data-slide="next">
                                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                          <span class="sr-only">Next</span>
                                                        </a>
                                                      </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-thumbs-up text-primary"></i> Like
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-comment text-primary"></i> Comment
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <i class="fa fa-share text-primary"></i> Share
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ">
                                                    <form >
                                                        <input class="col-12 border-0 p-3" type="text" style="outline:none;" placeholder="Add a comment"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-2 sticky" >
                            {{-- <div class="card">
                                <div class="card-body ">
                                    <i class="fa fa-phone"></i><span><b> Phone</b></span><p> <b> +92 000 0000000</b></p>
                                <hr>
                                <i class="fa fa-envelope"></i><span><b> Email</b></span><p> <b> abc@xyz.com</b></p>
                                <hr>
                                <h5>Hours</h5>
                                        <hr>
                                        <div class="row" style="font-size:12px;">
                                            <div class="col-4">
                                                <li><b>Sunday</b></li>
                                            </div>
                                            <div class="col-6" >
                                                <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                            </div>
                                            <div class="col-1"><i  class="fa fa-chevron-down" onclick="hrs()"></i></div>
                                        </div>
                                        <div id="hours" style="display:none;">
                                            <div class="row" style="font-size:12px;">
                                                <div class="col-4">
                                                    <li><b>Sunday</b></li>
                                                </div>
                                                <div class="col-6" >
                                                    <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size:12px;">
                                                <div class="col-4">
                                                    <li><b>Sunday</b></li>
                                                </div>
                                                <div class="col-6" >
                                                    <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size:12px;">
                                                <div class="col-4">
                                                    <li><b>Sunday</b></li>
                                                </div>
                                                <div class="col-6" >
                                                    <li><span>7:00 AM</span> - <span>10:00 PM</span></li>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                <div class="row">

                                    <div class="col-md-12 col-xs-12">
                                        <h5>Location</h5>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.1729058257442!2d74.24167311488961!3d31.46442948138813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190354d1b26e45%3A0x8847a66d4be8a3ae!2sSigi%20Technologies!5e0!3m2!1sen!2s!4v1582896116306!5m2!1sen!2s"  frameborder="0" style="border:0; width:100%; " allowfullscreen=""></iframe>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card" id="side-pane">
                        <div class="card-header">
                            You Might Also Consider
                        </div>
                        <div class="card-body">
                            <p class="text-info">Sponsored</p>
                            <div class="row">
                                <div class="col-3 text-right">
                                    <img class="rounded" src="images/60s.jpg"/>
                                </div>
                                <div class="col-9">
                                    <h5>New Karahi Restaurant </h5>
                                    <span class="d-block">Cusisines</span>
                                    <i class="fa fa-map-marker text-danger"></i><b> Location</b>
                                    <p>Jan S. said"My girlfriend and I went there two nights ago and sat at the bar. She ordered a…"<a href="#"> read more</a></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 text-right">
                                    <img class="rounded" src="images/60s.jpg"/>
                                </div>
                                <div class="col-9">
                                    <h5>New Karahi Restaurant </h5>
                                    <span class="d-block">Cusisines</span>
                                    <i class="fa fa-map-marker text-danger"></i><b> Location</b>
                                    <p>Jan S. said"My girlfriend and I went there two nights ago and sat at the bar. She ordered a…"<a href="#"> read more</a></p>
                                </div>
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
    var stickyHeaderBottom = $('#side-pane').offset().bottom;
    var foot = $('#nosticky').offset().top;
    $(window).scroll(function(){
            if( $(window).scrollTop() > stickyHeaderTop && $(window).scrollTop() < foot) {
                    $('#side-pane').css({position: 'fixed', top: '1px'});
            } else{
                    $('#side-pane').css({position: 'static', top: '0px'});
            }
    });
});

function hrs(){
    if(document.getElementById("hours").style.display == "none"){
        document.getElementById("hours").style.display = "block";
    }else{
        document.getElementById("hours").style.display = "none";
    }

}
    // window.onscroll = function () {myFunction()};
    // var side_panel = document.getElementById("side-pane");
    // var sticky = side_panel.offsetTop;
    // function myFunction() {
    //     if (window.pageYOffset > sticky) {
    //         side_panel.classList.add("position-fixed");
    //     } else {
    //         side_panel.classList.remove("position-fixed");
    //     }
    // }
</script>
@endsection
