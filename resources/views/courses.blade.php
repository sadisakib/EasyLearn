<title>Courses</title>

@extends('layouts.pageapp')


@section('content')




    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
      <br>
        <div class="section-title">
          <p>Courses !</p>
        </div>
        
        <div class="row justify-content-center">
            @foreach($c_courses->reverse() as $value)
            
                    @if($value->category == $id)
                                    
                            <div class="col-lg-4 col-md-6 mb-4" >

                                        <form class="border border-light p-5" method="POST" action="" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                    <img src="{{$value->banner}}" class="img-fluid" alt="Responsive image">
                                            </div>                                   

                                                <input type="text" class="form-control" name="owner" value="{{$value->owner}}" aria-describedby="emailHelp" hidden>


                                            <div class="form-group">
                                               <a>{{$value->title}}</a>
                                            </div> 


                                            <div class="form-group">
                                                BDT: <a>{{$value->price}}</a>
                                            </div>

                                            <div class="form-group text-center"><br>  
                                               <a  href="{{ route('learner.buyCourseGet',$value->id) }}">View</a>
                                            </div>
                                            
                                            </form>

                                </div>
                    @endif

            @endforeach 
        </div>

      </div>
    </section><!-- End Services Section -->

@endsection
