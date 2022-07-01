<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Tambah Pasien</title>
</head>
<body>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Daftar Pasien</h2>
            </div>
            <br>
            <div class="float-right">
                <a class="btn btn-success" href="/pegawai/pasien"> Kembali </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Tambah pasien gagal<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/pegawai/pasien/add" method="POST">
     @csrf
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama pasien</strong>
                    <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Telp</strong>
                    <input type="number" name="no_telp" class="form-control" placeholder="No Telp">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin</strong>
                    <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
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