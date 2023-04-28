<!DOCTYPE html>
<html>
<head>
<title>Laravel 9 Add/remove multiple input fields dynamically using Jquery</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <div class="card mt-3">
        <div class="card-header"><h2>Dynamic Input fields using laravel 10 and JQuery</h2></div>
        <div class="card-body">
            <form action="{{ route('store') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="dynamicAddRemove">  
                        <input type="text" name="title" placeholder="Enter title" class="form-control" />
                        
                        <div class="row mt-3">
                          <div class="col-8">
                            <input type="text" name="moreFields[0][message]" placeholder="Enter message" class="form-control form-control-sm" />
                          </div>
                          <div class="col-4">
                            <button type="button" name="add" id="add-btn" class="btn btn-success btn-sm">Add More</button> 
                          </div>
                        </div>

                    </table> 
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </form>
        </div>
    </div>
    <p class="text-center">Designed and developed by <a href="www.alphaflare.co.ke/sos" target="_blank">S0S</a></p>

</div>
<script type="text/javascript">
    var i = 0;
    $("#add-btn").click(function(){
    ++i;
    $("#dynamicAddRemove").append('<div class="row mt-3"><div class="col-8"><input type="text" name="moreFields['+i+'][message]" placeholder="Enter message" class="form-control form-control-sm" /></div><div class="col-4"><button type="button" name="add" id="add-btn" class="btn btn-danger btn-sm remove-tr">Remove</button></div></div>');
    });
    $(document).on('click', '.remove-tr', function(){  
    $(this).closest('.row').remove();
    });  
</script>
</body>
</html>