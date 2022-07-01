<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{url('assets/css/styles.css')}}" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Daftar Data Pasien</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-success navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ Auth::user()->role }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Auth::user()->role }}/obat">Obat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Pasien</a>
            </li>
        </ul>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"/>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="userDropdown"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                    </div>
                </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Daftar Nama Pasien</h2>
                </div>
                <br>
                <div class="float-right">
                    <a class="btn btn-success" href="/pegawai/pasien/add">Tambah Pasien</a>
                </div>
            </div>
        </div>
        
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="20px" class="text-center">Nama Pasien</th>
                <th width="20px" class="text-center">No Telp</th>
                <th width="20px" class="text-center">Jenis Kelamin</th>
                <th width="20px" class="text-center">Email</th>
                <th width="20px" class="text-center">Keterangan</th>
            </tr>
            @foreach($pasien as $p)
            <tr>
                <td class="text-center">{{$p->id}}</td>
                <td>{{$p->nama_pasien}}</td>
                <td>{{$p->no_telp}}</td>
                <td>{{$p->jenis_kelamin}}</td>
                <td>{{$p->email}}</td>
                <td class="text-center">
                    <form action="/pegawai/pasien/delete/{{ $p->id }}" method="GET">
                    <a class="btn btn-info btn-sm" href="/pegawai/pasien/edit/{{ $p->id }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    <a class="btn btn-info btn-sm" href="/pegawai/pasien/tindakan/{{ $p->id }}">Tindakan</a>
                    </form>
                </td>

            </tr>          
            @endforeach
        </table>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>