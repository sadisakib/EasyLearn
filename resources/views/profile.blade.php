<title>Profile</title>

@extends('layouts.pageapp')

<script type="text/javascript">

      window.onload = function Gender(){
        
            var gender = $( "#dbgender" ).val();

            if(gender === "Female"){
               
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }
      }

</script>

@section('content')


                                <!--Change Password-->
                                <div class="panel-body">

                                        <div style="top: 50px;" class="modal fade" id="targetCP" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                    <h6 style="color: black;" class=modal-title>Change Password!</h6>
                                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                                    </div>
                                                        <div class="modal-body">

                                                        <form class="text-left border border-light p-2" method="POST" action="{{ route('learner.changePassPost') }}">
                                                                
                                                                @csrf                                                
                                                                <input type="email" name="email" readonly value="{{ Auth::user()->email }}" hidden>                     
                                    
                                                                <a class = "label label-left">Current Password</a>
                                                                <input type="password" name="c_pass" class="form-control mb-4" placeholder="Current Password" value="" required>                      
                                                                <a class = "label label-left">New Password</a>
                                                                <input type="password" name="n_pass" class="form-control mb-4" placeholder="New Password" required> 
                                                                
                                    
                                                                <!-- Send button -->
                                                                <input type="submit"  class="btn btn-warning  float-right" value="Update"/>
                                    
                                                        </form>  

                                                                </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>


                                </div>
                                <!--Change Password end -->


                                <!--profile popup-->
                                <div class="panel-body">

                                <div style="top: 50px;" class="modal fade" id="targetp" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <h6 style="color: black;" class=modal-title>Update Profile Photo!</h6>
                                            <button type="button" class="close" data-dismiss="modal" >&times</button>

                                            </div>
                                                <div class="modal-body">

                                                    <form class="text-left border border-light p-5" method="POST" action="{{ route('learner.storeprofile') }}" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="form-group">
                                                                <input type="text" name="id" value="{{$learners->id}}" hidden/>
                                                                <img id="previewProfile" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                                                                <input required type="file" name="p_file" placeholder="Choose Image" onchange="profilePreview(this)"/>
                                                            </div></br>

                                                            <input type="submit"  class="btn btn-warning float-right" value="Update"/>
                                                    </form>

                                                        </div>
                                                <div class="modal-footer">
                                                </div>
                                                </div>
                                                </div>
                                                </div>


                                </div>
                                <!--profile popup end -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
      <br>
        <div class="section-title">
          <p>My Profile</p>
        </div>
        
        <div class="row justify-content-center">
                <img id="previewProfile" src="{{$learners->profileimage}}" style="max-width:130px; margin-top:20px;"/>
                <a type="button" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#targetp" >Profile Photo</a>
                    <div class="col-lg-8 mt-5 mt-lg-0">

                    @if($errors->any())
                        <h6 style="color: #ffc107  !important;" class="text-center">{{$errors->first()}}</h6>
                    @endif 

                            <form class="text-left border border-dark p-5" method="POST" action="{{ route('learner.profilePost') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{$learners->id}}" hidden/>
                                <a class = "label label-left">Name</a>
                                <input type="text" name="name" class="form-control mb-4" placeholder="Age" value="{{ Auth::user()->name }}">

                                <a class = "label label-left">Email</a><br>
                                <input type="email" name="email" class="form-control mb-4" readonly value="{{ Auth::user()->email }}" >

                                <a class = "label label-left">Age</a>
                                <input type="number" name="age" class="form-control mb-4" placeholder="Age" value="{{$learners->age}}" min="15"max="70">

                                <a class = "label label-left">Address</a>
                                <input type="text" name="address" class="form-control mb-4" placeholder="Address" value="{{$learners->address}}">


                                <div class="form-group">
                                    <label for="gender">Gender</label><br>
                                    <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                                    <input type="radio" id="female" name="gender" value="Female" required />Female                           
                                </div>

                                <input type="text" id="dbgender" value="{{$learners->gender}}" hidden>
                    
                                <a class = "label label-left">Phone</a>
                                <input type="text" name="phone" class="form-control mb-4" placeholder="Phone" value="{{$learners->phone}}"> 
                                <!-- Send button -->
                                <button class="btn btn-warning" type="submit">Update</button><br><br>
                   
                            </form>

                            <a type="button" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#targetCP" >Change Password</a>
                    </div>

        </div>

      </div>
    </section><!-- End Services Section -->

@endsection
<script>

      function profilePreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewProfile").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }


</script>