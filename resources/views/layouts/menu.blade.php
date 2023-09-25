@if(Session::has('success'))
    <div class="alertsuccess">
        {{ Session::get('success') }}
    </div>
@endif
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>image</th>
            <th>price</th>
            <th>description</th>
            <th>active</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
      @php
      $id = 1;
      @endphp
      @foreach ($data as $menu)
        
        <tr>
          <td scope="row">{{$id++}}</td>  
          <td>{{$menu->name}}</td>
          <td><img style="width: 40px ; height:40px ; border-radius:10px" src="{{asset('imagesave/'.$menu->image)}}" alt=""></td>
          
          <td>{{$menu->price}}</td>
          <td>{{$menu->description}}</td>
          <td>{{$menu->active}}</td>
          <td style="display: flex;">
            <a href="{{route('menu.update', ['id'=>$menu->id])}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
            
            <form action="{{route('menu.delete',['id'=>$menu->id])}}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-danger " onclick="confirmDelete({{$menu->id}})"><i class="fa-solid fa-trash"></i></button>
            </form>
            
          </td>
      </tr>
      @endforeach
    </tbody>
</table>

{{-- 
<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Menu</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">


          <!-- start project list -->
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">ID</th>
                <th style="width: 20%">Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Active</th>
                <th style="width: 20%">Edit</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <a>Pesamakini Backend UI</a>
                </td>
                <td>
                  <ul class="list-inline">
                    <li>
                      <img src="" class="avatar" alt="Avatar">
                    </li>
                  </ul>
                </td>
                <td class="project_progress">
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57" aria-valuenow="56" style="width: 57%;"></div>
                  </div>
                  <small>57% Complete</small>
                </td>
                <td>
                  <button type="button" class="btn btn-success btn-xs">NO</button>
                </td>
                <td>
                  
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <a>Pesamakini Backend UI</a>
                </td>
                <td>
                  <ul class="list-inline">
                    <li>
                      <img src="" class="avatar" alt="Avatar">
                    </li>
                    
                  </ul>
                </td>
                <td class="project_progress">
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="47" aria-valuenow="46" style="width: 47%;"></div>
                  </div>
                  <small>47% Complete</small>
                </td>
                <td>
                  <button type="button" class="btn btn-success btn-xs">YES</button>
                </td>
                <td>
                  
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                </td>
              </tr>
              
           
            </tbody>
          </table>
          <!-- end project list -->

        </div>
      </div>
    </div>
  </div> --}}