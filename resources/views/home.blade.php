<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Mahasiswa CRUD</title>
  <style>
    body{
      background-color: #eeeeee;
    }
    .julyo{
      font-size: 20px;
      color: #0d6efd;
      font-weight: 500;
      text-align: center;
      margin-bottom: 40px;
    }
  </style>
</head>
<body>
  <section class="home">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="mb-2 mt-5 text-center">Data Mahasiswa</h1>
          <p class="julyo">Made By - Julyo (2301902245)</p>
          <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary mb-2">Add New Mahasiswa</a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">NIM</th>
                <th scope="col">Email</th>
                <th scope="col">Major</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($mahasiswas as $mahasiswa)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $mahasiswa->name }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->email }}</td>
                <td>{{ $mahasiswa->major }}</td>
                <td>
                  <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-warning">Edit</a>
                  <form action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @empty
                <td colspan="5" class="text-center"> There is no mahasiswa data...</td>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>