<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MHS Production</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h1 class="text-center mb-5">ADMIN ULP LAMONGAN</h1>
</head>

<body>

    <div class="container">
        <a href="/tambahdatapelanggan" class="btn btn-success">+ Tambah data Pelanggan</a>

        <div class="row g-3 align-items-center mt-2"> 
            <div class="col-auto">
              <form action="/adminulplmg" method="GET">
              <input type="search" id="exampleDataList" name = "search" class="form-control" placeholder="Type to search...">
            </div>
            <div class="col-auto">
                <button type="search" class="btn btn-outline-warning">Search</button>
              </div>
            </form>
        </div>
        <div class="row g-3 align-items-center mt-1"> 
        <div class="col-auto">
            <a href="/exportpdf" class="btn btn-info">Export PDF</a>
          </div>
          <div class="col-auto">
            <a href="/exportexcel" class="btn btn-success">Export Excel</a>
          </div>

          <div class="col-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Import Data
            </button>
          </div>
        
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload Data</button>
        </div>
      </div>
    </form>
    </div>
  </div>

        <div class="row">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Idpel</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Daya</th>
                        <th scope="col">PK</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstitem() }}</th>
                            <td>{{ $row->Idpel }}</td>
                            <td>{{ $row->Nama }}</td>
                            <td>{{ $row->Alamat }}</td>
                            <td>{{ $row->Daya }}</td>
                            <td>
                                <img src="{{ asset('perintahkerja/' . $row->PK) }}" alt="" style="width: 40px;">
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning">View</button>
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-Idpel="{{ $row->Idpel }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
    $('.delete').click(function() {
        var pelangganid = $(this).attr('data-id');
        var pelangganidpel = $(this).attr('data-Idpel');

        swal({
                title: "Yakin?",
                text: "Anda akan menghapus data pelanggan dengan Idpel " + pelangganidpel + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/" + pelangganid + ""
                    swal("Data Pelanggan Berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data Pelanggan tidak Di Hapus!");
                }
            });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

</html>
