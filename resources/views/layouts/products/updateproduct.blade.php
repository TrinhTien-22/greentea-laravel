<div class="updateform">
    <form action="{{route('updateproduct' , ['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <Select name="menuname" >
            @foreach ($menus as $menu)
                <option {{$menu->name === $menunamerow ? 'selected' : ''}} value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
          </Select>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Image Current</label>
            <img src="{{asset('imageproduct/'.$product->image)}}" style="width: 100px; border-radius:5px" alt="">
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" value="{{$product->description}}"  class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Saleoff</label>
            <input type="text" name="saleoff" value="{{$product->saleoff}}"  class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Active</label>
            <select name="active" value="{{$product->active}}">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            
          </div>
          <div class="buttonupdate">
            <button class="btn btn-success">Update</button>
          </div>
    </form>
</div>
<style>
    .updateform{
        width: 500px;
        margin: 30px auto;
    }
    .buttonupdate{
        text-align: center;
    }
</style>