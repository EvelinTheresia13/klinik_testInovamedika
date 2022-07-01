<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Tambah Obat</title>
</head>
<body>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Daftar Obat</h2>
            </div>
            <br>
            <div class="float-right">
                <a class="btn btn-success" href="/pegawai/obat"> Kembali </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Tambah obat gagal<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/pegawai/obat/add" method="POST">
     @csrf
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Obat</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Satuan Obat</strong>
                    <input type="number" name="harga" class="form-control" placeholder="Nama Satuan Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Obat</strong>
                    <input type="number" name="stok" class="form-control" placeholder="Stok Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        
    </form>


</div>



    
</body>
</html>