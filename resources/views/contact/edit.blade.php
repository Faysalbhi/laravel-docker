<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <link type="text/css" href="//cdn.jsdelivr.net/npm/alpaca@1.5.27/dist/alpaca/bootstrap/alpaca.min.css" rel="stylesheet" />
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/alpaca@1.5.27/dist/alpaca/bootstrap/alpaca.min.js"></script>

    
    <style>
        .card{
            max-width: 600px;
            padding: 5px;
        }

        .card-header{
            background: yellowgreen;
            height: 40px;
            text-align: center;
            font-weight: 700px;
            font-size: 23px;
        }
        #item{
            margin: 5px;
            border: none;
        }.toster{
            position: absolute;
            top: 20px;
            right: 20px;
            width: 200px;
        }
        .name-email, .phone-type{
            display: flex;
            /* justify-content: space-around; */
            margin:5px; 
            padding: 10px;

        }
        input{
            margin-right: 10px;
        }

        
       

    </style>
    <title>Contact PhoneBook</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="card">

                    <div class="card-header"><h3>Phonebook Contact</h3></div>
                    @if(Session::has('status'))
                        <div class="toster"><p class="alert alert-info">{{ Session::get('status') }}</p></div>
                    @endif

                    <div class="card-body">
                        <div class="form">
                            <form action="{{route('contact.update',$id)}}" method="POST">
                                @csrf
    
                                <div class="name-email">
                                    <div id="name" class="item" >
                                        <label for="">UserName</label>
                                        <input type="text" name="name" value="{{$person->name}}" class="form-control">
                                    </div>
                                    <div id="email" class="item">
                                        <label for="">email</label>
                                        <input type="text" name="email" value="{{$person->email}}" class="form-control">
                                    </div>
                                </div>
                                @foreach ($phonebooks as $phonebook )
                                    <div class="phone-type">
                                        <div class="type">
                                            <label for="">Type</label>
                                            <input type="text" name="type[]" value="{{$phonebook->type}}" class="form-control" readonly>
                                        </div>
                                        <div class="phone">
                                            <label for="">Phone</label>
                                            <input type="text" name='phone[]'  value="{{$phonebook->phone}}" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                                
                                <button type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    </div>





 

  </body>
</html>