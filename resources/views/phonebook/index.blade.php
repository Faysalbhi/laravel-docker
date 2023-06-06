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
     
    </style>
  </head>
  <body>
    <div class="container">
        
        <div class="row ">
            <div class="col-6">
                <div class="card">
                    <h3>Phone Book</h3>
                    <div class="item-input ">
                        <form action="{{route('addphonebook')}}" method="post" class="d-flex">
                            @csrf
                            <select name="person_id" id class="form-control">
                                <option value="" >Selece Person</option>
                               @foreach ($persons as $person)
                                    <option value="{{$person->id}}" class="form-control">{{$person->name}}</option>
                               @endforeach 
                            </select>
                            <select name="type" id class="form-control">
                                <option value="" >Selece Type</option>
                                <option value="1" class="form-control">Home</option>
                                <option value="2" class="form-control">Office</option>
                                <option value="3" class="form-control">Personal</option>
                            </select>
                            <input type="text"  name="phone" class="form-control" placeholder="Enter Phone Number">
                            <button class="btn-sm btn-info" type="submit">Add +</button>
                        </form>    
                    </div>
                    <div class=item-list>
                        <table class="table table-bordered">

                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                            </tr>
                        
                            @foreach ($phonebooklist as $phonebook)
                                <tr>   
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$phonebook->person->name}}</td>
                                    <td>{{$phonebook->person->email}}</td>
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