
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form method="post" class="form-horizontal form-label-left" action="{{route('menu.update.form' , ['id'=>$menu->id])}}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" name="name" required="required" class="form-control " value="{{$menu->name}}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image Current<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <img style="width:100px" src="{{ asset('imagesave/' . $menu->image) }}" alt="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_new" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="price" required="required" class="form-control" value="{{$menu->price}}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="description" value="{{$menu->description}}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-secondary" id="yes" data-value="Yes" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="active" value="YES" class="join-btn" data-parsley-multiple="gender">  YES 
                                </label>
                                <label class="btn btn-primary" id="no" data-value="No" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="active" value="NO" class="join-btn" data-parsley-multiple="gender">&nbsp; NO &nbsp;
                                </label>
                            </div>
                            <br><br>
                            <h4 id="test">{{$menu->active}}</h4>
                            <script>
                                const yes = document.getElementById('yes');
                                const no = document.getElementById('no');
                                const test = document.getElementById('test');
                                
                                yes.addEventListener('click', function () {
                                    test.textContent = yes.getAttribute('data-value');
                                });
                                
                                no.addEventListener('click', function () {
                                    test.textContent = no.getAttribute('data-value');
                                });
                            </script>
                        </div>
                    </div>
                    {{-- <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                        </div>
                    </div> --}}
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
