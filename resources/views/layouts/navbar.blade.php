<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">PBKK</a>
          </div>
          <ul class="nav navbar-nav">
            {{-- <li><a href="#">Home</a></li> --}}
            <li><a href="{{route('mahasiswa.index')}}">Mahasiswa</a></li>
            <li><a href="{{route('dosen.index')}}">Dosen</a></li>
            <li><a href="{{route('matkul.index')}}">Matakuliah</a></li>
            <li><a href="{{route('listmatkul.index')}}">Ambil Matakuliah</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>