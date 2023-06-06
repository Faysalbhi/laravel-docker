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
     
    </style>
  </head>
  <body>
    <div class="container">
        
        <div class="row ">
            <div class="col-8 mt-5">
                <div class="add-person">
                    <h4>Add New Person</h4>
                    <form action="{{route('addperson')}}" method="post" class="d-flex">
                        @csrf
                        <input type="text"  name="name" class="item-input form-control" placeholder="Enter Name">
                        <input type="email"  name="email" class="item-input form-control" placeholder="Enter Email">
                        <button class="button" type="submit">Submit</button>
                    </form> 
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>All Person List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr style="text-align: center">
                                <th>sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($persons as $person)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$person->name}}</td>
                                    <td>{{$person->email}}</td>
                                    <td>
                                        @php
                                            
                                            foreach($person->phonebook as $phonebook) {
                                                echo "<span>$phonebook->type</span></span>$phonebook->phone</span>".'<br>';
                                            }
                                        @endphp
                                    </td> 
                                    <td><a  href="{{route('deleteperson',$person->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
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