<title>Buy</title>

@extends('layouts.pageapp')


@section('content')



                    <!--Buy popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade" id="targetBuy" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Payment</h6>
                              <a type="button" class="close" data-dismiss="modal" >&times</a>

                          </div>
                                <div class="modal-body">

                                    <form class="text-left border border-light p-5" method="POST" action="{{route('learner.buyPost')}}" enctype="multipart/form-data">
                                    @csrf

                                       <input type="text" name="c_id" value="{{$id}}" hidden/>
                                       <input type="text" name="c_owner" value="{{$email}}" hidden/>
                                       <input type="text" name="c_price" value="{{$price}}" hidden/>
                                       <input type="text" name="trainer_bkash" value="{{$phone}}" hidden/>

                                            <div class="form-group">
                                                Send <a>BDT: {{$price}}</a>
                                            </div>
                                            <div class="form-group">
                                                Bkash Agent: <a>{{$phone}}</a>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="learner_bkash" placeholder="Your Bkash Number" required/>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="t_id" placeholder="Transaction ID" required/>
                                            </div>
                                            
                                            
                                            

                                        <br><input type="submit"  class="btn btn-warning float-left" value="Confirm"/>
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>


                    </div>
                    <!--Buy popup end--> 




    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
      <br>
        <div class="section-title">
          <p>Course !</p>
        </div>
        
        <div class="row justify-content-center">
            @foreach($c_courses->reverse() as $value)
            
                    @if($value->id == $id)
                                    
                            <div class="col-lg-4 col-md-6 mb-4" >

                                        <form class="border border-light p-5" enctype="multipart/form-data">
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


                                            <div class="form-group">
                                                <textarea readonly class="form-control" rows="5"  name="overview" required>{{$value->overview}}</textarea>
                                            </div>





                                            <div class="form-group text-center"><br>  
                                               <a  href="{{ route('trainer.updateCourseGet',$value->id) }}" data-toggle="modal" data-target="#targetBuy" >Buy Now</a>
                                            </div>
                                            
                                            </form>

                                </div>
                    @endif

            @endforeach 
        </div>

      </div>
    </section><!-- End Services Section -->

@endsection
