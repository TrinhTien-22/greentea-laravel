    <div class="x_panel">
      <div class="x_title">
        <h2>Form Wizards <small>Sessions</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- Smart Wizard -->
        <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps anchor">
            <li>
              <a href="#step-2" class="selected" isdone="1" rel="1">
                <span class="step_no">1</span>
                <span class="step_descr">
                                  Step 1<br>
                                  <small>Step 1 description</small>
                              </span>
              </a>
            </li>
            <li>
              <a href="#step-1" class="disabled" isdone="0" rel="2">
                <span class="step_no">2</span>
                <span class="step_descr">
                                  Step 2<br>
                                  <small>Step 2 description</small>
                              </span>
              </a>
            </li>
          </ul>
        <div class="stepContainer" style="height: 289px;"><div id="step-1" class="content" style="display: block;">
            <form class="form-horizontal form-label-left" action="{{route('addproduct')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Menu <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="menuinput" name="menuname" required="required" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="last-name" name="name" required="required" class="form-control ">
                </div>
              </div>
              <div class="form-group row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                <div class="col-md-6 col-sm-6 ">
                  <input  type="file" name="image">
                </div>
              </div>
              <div class="form-group row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="middle-name" class="form-control col" type="text" name="price">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="birthday" class="date-picker form-control" name="description" required="required" type="text">
                </div>
              </div>
              <div class="form-group row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Sale Off</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="middle-name" class="form-control col" type="text" name="saleoff">
                </div>
              </div>
              <div class="form-group row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                <select name="active" id="">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <br>
              <div style="text-align:center">
                <button  class="btn btn-success">Finish</button>
              </div>
            </form>

          </div><div id="step-2" class="content" style="display: none;">
            <h2>
              Bạn muốn thêm Drink vào Menu nào : 
            </h2>
            <div class="form-group row">
              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Menu</label>
              <div class="col-md-6 col-sm-6 ">
                <select name="selectmenu" id="selectmenu">
                  @foreach ($menunames as $menuname)
                  <option value="{{$menuname}}">{{$menuname}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
      </div>
    </div>
    <script>
      // Lấy các phần tử cần thao tác
      const selectElement = document.getElementById("selectmenu");
      const inputElement = document.getElementById("menuinput");
      inputElement.value = selectElement.value;
      // Xử lý sự kiện khi thay đổi lựa chọn trong thẻ select
      selectElement.addEventListener("change", function() {
          // Gán giá trị của option đã chọn cho input
          inputElement.value = selectElement.value;
      });
  </script>