<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Employee</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1>Edit Employee</h1>
    <form action="{{ route('dashboard.update', $users->id) }}" method="post">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $users->name }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $users->email }}">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="address">address</label>
        <input type="address" class="form-control" id="address" name="address" placeholder="Enter address" value="{{ $users->address }}">
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
