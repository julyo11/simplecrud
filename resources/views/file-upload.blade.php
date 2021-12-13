<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Upload File</title>
  <style>
    body{
      background-color: #eeeeee;
    }
    .julyo{
      font-size: 20px;
      color: #0d6efd;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <section class="home">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="mb-2 mt-5">Assignment 9 - Uploading File</h1>
          <p class="julyo">Made By - Julyo (2301902245)</p>
          <hr>
          <form action="{{ url('file-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="nama" class="mb-1">Nama Gambar</label>
              <input type="text" class="form-control" id="nama" name="nama"> <br>
              <div class="input-group">
                <label for="berkas" class="input-group-text">Upload Gambar</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
              </div>
              @error('berkas')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Upload File</button>
          </form>

        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>