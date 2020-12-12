<x-dashboard-layout>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Rules</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('rules') }}"><i class="fa fa-dashboard"></i> Rules</a></li>
        <li class="active">Add Rules</li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tambah Rules</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('insert-rules') }}">
                <div class="box-body">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Rule</label>
                    <input type="text" name="kd_rule" id="kd_rule" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kulit</label>
                    <select name="kulit" id="kulit" class="form-control">
                      <option value="">Pilih Kulit</option>
                      <option value="1">Kulit Normal</option>
                      <option value="2">Kulit Sensitif</option>
                      <option value="3">Kulit Kering</option>
                      <option value="4">Kulit Berminyak</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rule 1</label>
                    <select name="rule1" id="rule1" class="form-control">
                      <option value="">Pilih Rule</option>
                      @foreach ($complaints as $complaint)
                          <option value="{{$complaint->keluhan}}">{{$complaint->keluhan}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rule 2</label>
                    <select name="rule2" id="rule2" class="form-control">
                      <option value="">Pilih Rule</option>
                      @foreach ($complaints as $complaint)
                          <option value="{{$complaint->keluhan}}">{{$complaint->keluhan}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rule 3</label>
                    <select name="rule3" id="rule3" class="form-control">
                      <option value="">Pilih Rule</option>
                      @foreach ($complaints as $complaint)
                          <option value="{{$complaint->keluhan}}">{{$complaint->keluhan}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Perawatan</label>
                    <select name="hasil" id="hasil" class="form-control">
                      <option value="">Pilih Rule</option>
                      @foreach ($treatments as $treatment)
                          <option value="{{$treatment->nama}}">{{$treatment->nama}}</option>
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