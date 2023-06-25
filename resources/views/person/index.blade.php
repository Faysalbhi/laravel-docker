<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Phonebook</title>
    <style>
        input,.button{
            text-decoration: none;
            margin: 5px;
            
        }
        .button{
            border: none;
        }
     
        .add-person{
            padding: 5px;
            margin-top: 50px;
            margin-bottom: 50px;
            width: 100%;
            border: 1px solid black;

        }

        .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
        }
        .form1{
            border-bottom: 1px solid gray;
            margin-bottom: 10px;
        }
        .select,.input{
            width: 190px;
            padding: 5px;
            margin-right: 60px;
            align-items: center;
            border: none;
        }
        .toster{
            position: fixed;
            top: 0;
            right: 0;
        }
     
    </style>
  </head>
  <body>
    <div class="container">
        
        <div class="row ">
            <div class="col-8 mt-5">
               

                <div class="card">
                    <div class="card-header">
                        <div class="header">
                            <h4>All Person List</h4>
                            @if(Session::has('success'))
                                <div class="toster"><p class="alert alert-info">{{ Session::get('success') }}</p></div>
                            @endif
                            <div class="form">
                                <form action="" method="POST" class="form1" >
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-info btn-sm">Download</button>
                                </form>
                                
                                <form action="" method="POST" class="form2" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file">
                                    <button  type="submit" class="btn-info btn-sm">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr style="text-align: center">
                                <th>sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($persons as $person)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$person->name}}</td>
                                    <td>{{$person->email}}</td>
                                   
                                    <td>
                                        <form action="{{route('persons.destroy',$person->id)}}" onsubmit="return confirm('Are You sure? you want to delete this Permanently..')" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        
                                            <button  type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        
                                    
                                    </td>
                                </tr>
                            @endforeach

                       </table>
                    </div>
                    
                 </div>   
            </div>
        </div>
        

    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>

    {{-- <script>
        $(document).ready(function() {
        
            $.ajax({
                url: "{{url('phonebooklist')}}",
                type: "GET",
                contentType: "application/json",
                success: function(response) {
                   
                    var phoneNumbers=response;
                    console.log(phoneNumbers);
                    for (var phoneNumber of phoneNumbers) {
                        console.log(phoneNumber.phone);

                        // for (const [key, value] of Object.entries(items)) {
                        // console.log(`${key}: ${value}`);
                        // }

                    }

                },
                error: function(error) {
                    // Handle error response from the server
                    console.log("Error sending face data: " );
                }
            });
           
        });

    </script> --}}


  </body>
</html>