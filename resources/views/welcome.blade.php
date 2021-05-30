<title>EasyLearn</title>

@extends('layouts.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Devlop Your Skill With EasyLearn<span>.</span></h1>
          <h2>We have team of talented Trainers</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="">Sedare Perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-paint-brush-line"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-database-2-line"></i>
            <h3><a href="">Nemos Enimade</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->








    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
    <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Category</h2>
      <p>Check Course Category</p>
    </div>

    <div class="row" data-aos="fade-left">

         @foreach($categories->reverse() as $value)
            
                <div class="col-lg-3 col-md-4">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">

                    <a href="{{ route('learner.courseGet',$value->id) }}"><h1>{{$value->name}}</h1></a>

                  </div>
                </div>
            
          @endforeach

          </div>

    </div>
    </section><!-- End Features Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Trainers</h2>
          <p>Check our Trainers</p>
        </div>

        <div class="row">
            @foreach($users->reverse() as $u_value)
              
              @foreach($trainer->reverse() as $value)
                @if($u_value->email == $value->email)
                      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                          <div class="member-img">
                            <img src="{{$value->profileimage}}" class="img-fluid" alt="">
                            <div class="social">
                              <a href=""><i class="bi bi-twitter"></i></a>
                              <a href=""><i class="bi bi-facebook"></i></a>
                              <a href=""><i class="bi bi-instagram"></i></a>
                              <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                          </div>
                          <div class="member-info">
                            <h4>{{$u_value->name}}</h4>

                          </div>
                        </div>
                      </div>
                @endif      
              @endforeach
            @endforeach



        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>





        </div>

      </div>
    </section><!-- End Contact Section -->



@endsection