<title>Courses</title>

@extends('admin/layouts.adminapp')

@section('content')

  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html"> </a>
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
            <p class="text-white mt-0 mb-5"></p>

          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8 order-xl-1">
          <div class="card shadow">
            <div class="card-header border-0">
              
            </div>

                <div class="row justify-content-center pb-5 mb-3 ">

                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h3>Update Course!</h3>
                </div>
                </div>

                <div class="row">
            

                            <div class="col-lg-12 col-md-6 mb-4" >

                                    <form class="border border-light p-5" method="POST" action="{{route('admin.updateCoursePost')}}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="text" class="form-control" name="course_id" value="{{$courses->id}}" aria-describedby="emailHelp" hidden>

                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Banner</label><br>
                                                <img src="{{$courses->banner}}" class="img-fluid" alt="Responsive image">
                                        </div>

                                          @foreach($courseCategories->reverse() as $c_value)
                                               @if($c_value->id == $courses->category)
                                                       <div class="form-group">
                                                        <label for="exampleInputEmail1">Category</label>
                                                        <input readonly type="text" class="form-control" name="category" value="{{$c_value->name}}" aria-describedby="emailHelp" >
                                                      </div>
                                               @endif
                                          @endforeach

      

                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input readonly  type="text" class="form-control" name="title" value="{{$courses->title}}" aria-describedby="emailHelp" >
                                          </div>


                                          <div class="form-group">
                                              <label for="comment">Overview:</label>
                                              <textarea readonly class="form-control" rows="5"  name="overview" required>{{$courses->overview}}</textarea>
                                          </div>

                                          <div class="form-group">
                                              <label for="comment">Prerview:</label>
                                              <textarea readonly class="form-control" rows="5"  name="preview" required>{{$courses->preview}}</textarea>
                                          </div>


                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input readonly  type="text" class="form-control" name="price" value="{{$courses->price}}" step="any" min="0" aria-describedby="emailHelp" >
                                          </div>

                                          <div class="form-group">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select class="form-control" name="status" required id="shops">                   
                                                            <option value="Pending" {{$courses->status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                                            <option value="Accepted" {{$courses->status == "Accepted"  ? 'selected' : ''}} >Accepted</option>
                                                            <option value="Reject" {{$courses->status == "Reject"  ? 'selected' : ''}} >Reject</option>
                                              </select>
                                          </div>
                                          
                                          <button class="btn btn-success" type="submit">Update</button><br>   
                                          

                                        </form>

                                        </div>

     
                            
                            
                            </div>



            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

          </div>
        </div>

      </div>
      <!-- Footer -->

    </div>
  </div>


  <script>

function BannerPreview(input){
    var file = $("input[type=file]").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewBanner").attr("src",reader.result);
        }
        reader.readAsDataURL(file);
    }
}



</script>


@endsection

