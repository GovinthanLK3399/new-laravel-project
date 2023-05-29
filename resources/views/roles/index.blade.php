<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>

   @include('project.admin.css')

   

  </head>
 
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

            @include('project.admin.aside')
        
        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
         

             @include('project.admin.navbar')
        

          <!-- / Navbar -->

          <!-- Content wrapper -->


          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
  <div class="row align-items-center justify-content-between mb-4">
    <div class="col">
      <h4 class="fw-bold py-3"><span class="text-muted fw-light">Roles</span></h4>
    </div>
    <div class="col-auto">
      <div class="demo-inline-spacing">
        <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#createModal"
        >
          Create Role
        </button>
      </div>
    </div>
  </div>



  

              
<!--Create Modal -->


<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5> -->
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                           
                            <form id="roleCreateForm">
                                @csrf
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameSmall" class="form-label">Role Name</label>
                                  <input type="text" id="name-create"  class="form-control" placeholder="Enter Name" />
                                </div>

                                

                      
                              </div>
                                        
                              
                            <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button> -->
                              <button type="submit" class="btn btn-primary">Create role</button>
                            </div>
                          </div>

                         </form>
                        </div>
                      </div>
                    </div>



<!--Create Modal -->

              <!-- <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Add Role</h5>

                   
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('success'))
             <div class="alert alert-success">
               {{ session()->get('success') }}
             </div>
            @endif

                    <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                     
                       

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Role Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter Role" name="name" value="{{old('name')}}" required>
                        </div>

                          <button type="submit" class="btn btn-primary">save</button>
                      </form>


                    </div>
                  </div>
                </div>
              </div>
 -->







              <!-- Basic Bootstrap Table -->
              <div class="card">
                <!-- <h5 class="card-header">Table Basic</h5> -->
                <div class="table-responsive text-nowrap text-center">
                  <table class="table serial-number" id="roleTable">
                    <thead>
                      <tr>
                        <th>Role</th>
                        <!-- <th>Gaurd</th> -->
                        <th>Edit</th>
                        <th>Delete</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($role as $view_role)
                      <tr id="rid{{$view_role->id}}">
                        <td>
                          <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> -->
                           <strong>{{$view_role->name}}</strong></td>
                        <!-- <td>{{$view_role->guard_name}}</td> -->
                        <td>
                             <!-- <button class="btn btn-primary btn-edit" data-id="{{ $view_role->id }}">edit</button> -->

                              <a  data-id="{{ $view_role->id }}" onclick="editRole ({{ $view_role->id}})"><img src="/icons/edit.png" alt="" class="edit-icon"></a>


                        </td>
                        <td>
                          
                            <!-- <span class="badge bg-label-primary me-1">Active</span> -->
                            <a class="btn-delete" onclick="deleterole({{ $view_role->id }})" data-id="{{ $view_role->id }}"><img src="/icons/delete.png" alt=""class="edit-icon"></a>


                        </td>
                        <!-- <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td> -->
                      </tr>
                      @endforeach
                     
                    
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Pagination links -->
                

              <!--/ Basic Bootstrap Table -->

            
              





<!-- edit Modal -->


                      <div class="modal fade" id="roleEditModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5> -->
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                           
                            <form id="roleUpdateForm">
                                @csrf
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameSmall" class="form-label">Role Name</label>
                                  <input type="text" id="name-edit"  class="form-control" placeholder="Enter Name" />
                                </div>

                                

                      
                              </div>
                                        <div class="form-check form-switch mb-2">
                                  <input class="form-check-input" type="checkbox"  id="status-edit" checked />
                                  <label class="form-check-label" for="flexSwitchCheckChecked"
                                    >Status</label
                                  >
                              </div>
                              
                            <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button> -->
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>

                         </form>
                        </div>
                      </div>



<!-- edit Modal -->



<script>

</script>

              
            </div>
          </div>


          
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

     @include('project.admin.script')
  </body>
</html>
