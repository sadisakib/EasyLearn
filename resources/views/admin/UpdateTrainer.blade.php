<title>Trainers</title>


@extends('admin/layouts.adminapp')


@section('content')

<!--View N_ID-->
<div class="panel-body">

        <div style="top: 50px;" class="modal fade" id="targetn" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                    <h5 style="color: black;" class=modal-title>Trainer Curriculum Vitae</h5>
                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                    </div>
                        <div class="modal-body">


                            <div class="card">
                              <img style="max-width: 450px; max-height: 280px;" alt="Image placeholder" src="{{$trainer->n_id}}">
                            </div>

                       </div>
                           <div class="modal-footer">
                           </div>
                           </div>
                           </div>
                           </div>


</div>
<!--View N_ID end -->


<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">Update Trainer</a>
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
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Trainer</h3>
            </div>

          </div>
        </div>
        <div class="card-body">






              <form method="POST" action="{{ route('admin.updateTrainer') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="email" value="{{$trainer->email}}" hidden/>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group text-center">
                        <a href="#" style="width: 130px;" class="avatar rounded-circle mr-3 ">
                          <img alt="Image placeholder" src="{{$trainer->profileimage}}">
                        </a><br><br>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" name="name" class="form-control form-control-alternative" placeholder="Username"  value="{{ $user->name }}" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" class="form-control form-control-alternative" value="{{ $trainer->email }}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Age</label>
                        <input type="text" name="age" class="form-control form-control-alternative"  value="{{$trainer->age}}" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone</label>
                        <input type="text" name="phone" class="form-control form-control-alternative"  value="{{$trainer->phone}}" readonly>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input name="address" class="form-control form-control-alternative"  value="{{$trainer->address}}" type="text" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Gender</label>
                        <input name="address" class="form-control form-control-alternative"  value="{{$trainer->gender}}" type="text" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Status</label>
                         <select class="form-control" name="status" required id="product_category">

                           <option value="Pending" {{$trainer->status == "Pending"  ? 'selected' : ''}} >Pending</option>
                           <option value="Approved" {{$trainer->status == "Approved"  ? 'selected' : ''}} >Approved</option>
                           <option value="Reject" {{$trainer->status == "Reject"  ? 'selected' : ''}} >Reject</option>

                         </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group text-left">
                        <label class="form-control-label">Curriculum Vitae</label>
                        <a  data-toggle="modal" data-target="#targetn" >
                          <img style="width: 100px; height: 70px;" alt="Image placeholder" src="{{$trainer->n_id}}">
                        </a><br><br>
                      </div>
                    </div>
                  </div>
                </div>
                
                <input type="submit"  class="btn btn-success float-left" value="Update"/>
              </form>

            </div>
          </div>
        </div>




        </div>
      </div>
      <!-- Footer -->

    </div>
  </div>


@endsection
