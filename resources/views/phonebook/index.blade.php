<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Phonebook</title>
    <style>
        a{
            text-decoration: none;
        }
        .card{
            margin-top: 50px;
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
            margin-right: 20px;
            align-items: center;
            border: none;
            
            
        }
        .item-list li{
            background: #CF9FFF;
            text-decoration: none;
            list-style-type: none;
            color:white;
            padding-left:5px; 
            border-left: 10px solid #581845;
            margin-bottom:2px;
        }
        .item-input{
            padding:5px; 
            /* border-left: 10px solid rgba(174, 168, 211); */
            margin-bottom:2px;
            margin-left:10px;
            width: 100%;
        }
        .toster{
            position:fixed;
            top: 0;
            right: 0;
        }
     
    </style>
  </head>
  <body>
    <div class="container">
        
        <div class="row ">
            <div class="col-6 ">
                <div class="card">
                    <div class="header">
                        <h3>Phone Book</h3>
                        @if(Session::has('success'))
                            <div class="toster"><p class="alert alert-info">{{ Session::get('success') }}</p></div>
                        @endif
                        <div class="form">
                            <form action="{{route('phonebook.download')}}" method="POST" class="form1" >
                                @csrf
                                <select class="select text-muted" name="type" id="" >
                                    <option disabled selected>Filter</option>
                                    <option value="Home">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Personal">Personal</option>
                                </select>
                                <button type="submit" class="btn btn-info btn-sm">Download</button>
                            </form>
                            
                            <form action="{{route('phonebook.upload')}}" method="POST" class="form2" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file">
                                <button  type="submit" class="btn-info btn-sm">Upload</button>
                            </form>
                        </div>
                    </div>
                   
                    <div class=item-list>
                        <table class="table table-bordered">

                            <tr>
                                <th>SL</th>
                                <th>Phone</th>
                                <th>Type</th>
                            </tr>
                        
                            @foreach ($phonebooklist as $phonebook)
                                <tr>   
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$phonebook->phone}}</td>
                                    <td>{{$phonebook->type}}</td>

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