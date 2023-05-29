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


            @include('project.admin.content')
          
          
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
     
       @include('project.admin.script')

  </body>
</html>
