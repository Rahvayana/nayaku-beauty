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
                <a href="{{ route('add-products') }}" class="btn btn-success"><h3 class="box-title">Tambah Produk</h3></a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  @foreach ($products as $product)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->nama}}</td>
                    <td><img src="thumbnail/{{$product->foto}}" alt=""></td>
                    <td>{{$product->harga}}</td>
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