<x-dashboard-layout>
    <section class="content-header">
        <h1>
          Dashboard
          <small>Treatments</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Treatments</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <a href="{{ route('add-complaints') }}" class="btn btn-success"><h3 class="box-title">Tambah Komplain</h3></a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Keluhan</th>
                    <th>Perawatan</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  @foreach ($complaints as $complaint)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$complaint->kd_treatment}}</td>
                    <td>{{$complaint->keluhan}}</td>
                    <td style="display: flex"><span class="badge bg-blue"><i class="fa fa-trash-o"></i></span> &nbsp;<span class="badge bg-red"><i class="fa fa-upload"></i></span></td>
                  </tr>
                  @endforeach
                </table>
              </div><!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
</x-dashboard-layout>