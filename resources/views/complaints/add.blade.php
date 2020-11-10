<x-dashboard-layout>
  <section class="content-header">
    <h1>
      Dashboard
      <small>Add Complaints</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('complaints') }}"><i class="fa fa-dashboard"></i> Complaints</a></li>
      <li class="active">Add Complaints</li>
    </ol>
  </section>
  <section class="content">
   <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Tambah Treatment</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('insert-complaints') }}">
              <div class="box-body">
                @csrf
                <label for="keluhan">Kode Perawatan</label>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" name="keluhan[]" placeholder="Masukkan Keluhan">
                  <span class="input-group-btn">
                    <button class="btn btn-info btn-flat" type="button" id="add_input">+</button>
                  </span>
                </div>
                <div class="input-add">
                  
                </div>
                <div class="form-group">
                  <label for="kd_perawatan">Kode Perawatan</label>
                  <select name="perawatan" id="perawatan" class="form-control">
                    <option value="">Pilih Perawatan</option>
                    @foreach ($treatments as $treatment)
                        <option value="{{$treatment->kd_treatment}}">{{$treatment->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- /.box-body -->
    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div><!-- /.box -->
       </div>
   </div>
  </section>
</x-dashboard-layout>
<script>
  $("#add_input").click(function(){
    $(".input-add").append('<div class="input-group input-group-sm">'+
      '<input type="text" class="form-control" name="keluhan[]" placeholder="Masukkan Keluhan">'+
      '<span class="input-group-btn">'+
        '<button class="btn btn-danger btn-flat" type="button" id="del_input">x</button>'+
      '</span>'+
    '</div>');
  });
  $("#del_input").click(function(){ // bind click on every div that has the class box
    $(this).remove(); //remove the clicked element from the dom
  });
</script>