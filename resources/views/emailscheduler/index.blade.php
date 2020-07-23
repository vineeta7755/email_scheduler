<h1>set Date and time to send Campaign mail</h1>
<hr>
<form action="/emailscheduler/store" method="post">
@csrf
<div class="form-group">
        <label >Date (mm/dd/yyyy)</label>
        <input type="text" class="form-control" id="sc_date"  name="sc_date">
    </div>
    <div class="form-group">
        <label >Time (24hr HH:MM)</label>
        <input type="text" class="form-control" id="sc_time" name="sc_time">
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