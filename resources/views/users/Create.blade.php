<h1>Add New User</h1>
<hr>
<form action="/store" method="post">
@csrf
<div class="form-group">
        <label for="title">User Name</label>
        <input type="text" class="form-control" id="userName"  name="name">
    </div>
    <div class="form-group">
        <label for="description">Email</label>
        <input type="text" class="form-control" id="userEmail" name="email">
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>