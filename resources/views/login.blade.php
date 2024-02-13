
<h1>Silahkan Login</h1>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $item)
          <li> {{ $item }} </li>
      @endforeach
    </ul>
  </div>
    
@endif
<form action="" method="POST">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email')}}">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>