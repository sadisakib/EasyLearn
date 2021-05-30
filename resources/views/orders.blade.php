<title>Profile</title>

@extends('layouts.pageapp')


@section('content')




    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
      <br>
        <div class="section-title">
          <p>Course !</p>
        </div>
        
        <div class="row justify-content-center">
            @foreach($orders->reverse() as $value)
            
                    @if($value->learner_email == Auth::user()->email )

                           @foreach($c_courses->reverse() as $c_value)
                                    @if($c_value->id == $value->course )                                   
                                            <div class="col-lg-4 col-md-6 mb-4" >

                                                        <form class="border border-light p-5" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-group">                                                   
                                                                    <img src="{{$c_value->banner}}" class="img-fluid" alt="Responsive image">
                                                            </div>   
                                                            
                                                            
                                                            <div class="form-group">
                                                            <a>{{$c_value->title}}</a>
                                                            </div>

                                                            <div class="form-group">
                                                                BDT: <a>{{$c_value->price}}</a>
                                                            </div>


                                                            <div class="form-group">
                                                                <textarea readonly class="form-control" rows="5"  name="overview" required>{{$c_value->overview}}</textarea>
                                                            </div>
                                                            @if($value->payment == "Approved" )
                                                                <div class="form-group"><br>
                                                                Course Unlocked
                                                                    <textarea readonly class="form-control" rows="5"  name="overview" required>{{$c_value->preview}}</textarea>
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                Payment: <a>{{$value->payment}}</a>
                                                            </div>
                                                            
                                                            </form>

                                                </div>
                                        @endif
                                @endforeach   
                                
                    @endif

            @endforeach 
        </div>

      </div>
    </section><!-- End Services Section -->

@endsection
