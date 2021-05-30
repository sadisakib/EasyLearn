<title> Admin Profile</title>


@extends('admin/layouts.adminapp')



<script type="text/javascript">
      window.onload = function Gender(){
            var gender = $( "#dbgender" ).val();
            if(gender === "Female"){
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }

            var covid = $( "#dbcovid" ).val();
            if(covid === "1"){
                $("#c_status").text("Positive");
            }
            else{
                $("#c_status").text("Negative");
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

                                        <form class="text-left border border-light p-2" method="POST" action="{{ route('admin.changePassPost') }}">
                                                   
                                                   @csrf                                                
                                                   <input type="email" name="email" readonly value="{{ Auth::user()->email }}" hidden>                     
                       
                                                   <a class = "label label-left">Current Password</a>
                                                   <input type="password" name="c_pass" class="form-control mb-4" placeholder="Current Password" required>                      
                                                   <a class = "label label-left">New Password</a>
                                                   <input type="password" name="n_pass" class="form-control mb-4" placeholder="New Password" required> 
                                                   
                       
                                                   <!-- Send button -->
                                                   <button class="btn btn-success" type="submit">Update</button><br>
                       
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

                                            <form class="text-left border border-light p-5" method="POST" action="{{ route('admin.storeprofile') }}" enctype="multipart/form-data">
                                                 @csrf
                                                      <div class="form-group">
                                                        <input type="text" name="id" value="{{$admins->id}}" hidden/>
                                                        <img id="previewProfile" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                                                        <input required type="file" name="p_file" placeholder="Choose Image" onchange="profilePreview(this)"/>
                                                      </div>

                                                      <input type="submit"  class="btn btn-success float-right" value="Update"/>
                                            </form>

                                                 </div>
                                           <div class="modal-footer">
                                           </div>
                                           </div>
                                           </div>
                                           </div>


                </div>
                <!--profile popup end -->


                <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">Profile</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{$admins->profileimage}}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="{{route('admin.profileGet')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
             </form> 
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{$admins->profileimage}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#targetCP" >Change Password</button>
                <button type="button" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#targetp" >Profile Photo</button>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                    @if($errors->any())
                        <h6 style="color: blue !important;" class="text-center">{{$errors->first()}}</h6>
                    @endif 
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                {{ Auth::user()->name }}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{ $admins->email }}
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>

              </div>
            </div>
            <div class="card-body">

              <form method="POST" action="{{ route('admin.profilePost') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$admins->id}}" hidden/>

                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" name="name" class="form-control form-control-alternative" placeholder="Username" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" class="form-control form-control-alternative" readonly value="{{ $admins->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Age</label>
                        <input type="text" name="age" class="form-control form-control-alternative"  value="{{$admins->age}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone</label>
                        <input type="text" name="phone" class="form-control form-control-alternative"  value="{{$admins->phone}}">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input name="address" class="form-control form-control-alternative"  value="{{$admins->address}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                      <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female
                    </div>
                      </div>
                    </div>
                    <input type="text" id="dbgender" value="{{$admins->gender}}" hidden>

                  </div>
                </div>
                <hr class="my-4" />
                <input type="submit"  class="btn btn-success float-right" value="Update"/>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->

    </div>
  </div>


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
