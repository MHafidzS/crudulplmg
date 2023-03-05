<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MHS Production</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>
  <body>
    <h1 class="text-center mb-5">TAMBAH DATA PELANGGAN</h1>

    <div class="container">
        
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
              
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                 @csrf
                 
                 
                 <div class="col-md-6">
          <label for="exampleInputEmail1" class="form-label">Id Pelanggan</label>
          <input type="number" name="Idpel" class="form-control" id="exampleInputEmail1" placeholder="">
          </div>
          <div class="col-md-6">
          <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="Nama" class="form-control" id="exampleInputEmail1" placeholder="">
          </div>
          <div class="col-md-6">
          <label for="exampleInputEmail1" class="form-label">Alamat Lengkap</label>
                    <input type="text" name="Alamat" class="form-control" id="exampleInputEmail1" placeholder="">
          </div>
          <div class="col-md-6">
          <label for="exampleInputEmail1" class="form-label">Daya</label>
                    <select class="form-select" name="Daya" aria-label="Default select example">
                      <option selected>Pilih Jenis Daya Meter</option>
                      <option value="R1 450">R1 450</option>
                      <option value="R1 900">R1 900</option>
                      <option value="R1M 900">R1M 900</option>
                      <option value="B1 900">B1 900</option>
                      <option value="S2 1300">S2 1300</option>
                    </select>
          </div>
          <div class="col-md-4">
          <label for="exampleInputEmail1" class="form-label">Masukan Foto PK</label>
          <input type="file" name="PK" class="form-control">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                I'am not Robot
              </label>
              </div>
            </div>
            <div class="col-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                  </form>
              </div>
            </div>
          </div>
            
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>