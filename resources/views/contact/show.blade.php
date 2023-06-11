<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Phonebook</title>
    <style>
        .card-header{
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .type-button{
            display: flex;
            justify-content: space-between;
            align-items: center;
            

        }
        .select{
            width: 190px;
            padding: 5px;
            margin-right: 10px;
            align-items: center;
            border: none;
            
            
        }
        .select:focus{
            border: none;
        }
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
        .contact{
            margin-bottom: 5px;
            box-sizing: border-box;
            background: #eee;
            box-shadow: 0 4px 4px -4px 
        }
        .person-details{
            background: rgb(221, 211, 198);
            padding-left: 5px;
            padding-right: 5px;
            border-radius: 5px 0 5px;
            cursor: pointer;
            box-sizing: border-box;
            border-left: 5px solid blueviolet;
            transition-duration: .5s;
        }
        .person-details:hover{
            /* margin-left: 10px; */
            border-left: 15px solid blueviolet;
            border-radius: 0;
        }
        
        .number-list{
            display:none;
            
        }
        .phonebook{
            display: flex;
            justify-content: space-around;

        }
        ul li {
            list-style-type: none;
           
        }
        ul li a{
            padding: 2px;
            color: rgb(197, 104, 104);
            text-decoration: none;
            transition-duration: .2s;
            
        }
        ul li a:hover{
            /* border-left: 4px solid rgb(140, 7, 180); */
            text-decoration: none;
            padding-left: 5px;
            
        }
        .toster{
            position: absolute;
            top:100;
            right: 200px;
        }
     
    </style>
  </head>
  <body>
    <div class="container">
        
        <div class="row ">
            <div class="col-md-6">
                <div class="car d">
                    <div class="card-header">
                        <h3>Contact List</h3>
                        <form action="{{route('contacts.download')}}" method="POST" >
                            @csrf
                            <div class="type-button">
                                <select class="select text-muted" name="type" id="" >
                                    <option disabled selected>Filter</option>
                                    <option value="Home">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Personal">Personal</option>
                                </select>
                                <button class="btn btn-info btn-sm">Download</button>
                            </div>
                        </form>
                    </div>
                    @if(Session::has('success'))
                        <div class="toster"><p class="alert alert-info">{{ Session::get('success') }}</p></div>
                    @endif
                    <div class="card-body">

                        @foreach($personlist as $key=>$person)
                            <div class="contact">
                                <div class="person-details" onclick="showNumber('phone-{{$key}}')">
                                    <p><span>{{$person->name}}</span></p>
                                    <p><span>{{$person->email}}</span></p>
                                </div>
                                <div class="number-list" id="phone-{{$key}}">
                                    <div class="phonebook">
                                        <div class="number">
                                            <ul>
                                                @foreach($person->phonebook as $phonebook) 
                                                    <li><a href="">{{$phonebook->phone}} </a> <span>{{ $phonebook->type}}</span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="action">
                                                <a href="{{route('contact.delete',$person->id)}}" class="btn-danger btn-sm btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <a  href="{{route('contact.edit',$person->id)}}" class="btn-success btn-sm btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                 </div>   
            </div>
        </div>
        

    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>

    <script>
        var personDetails=document.getElementsByClassName('person-details');
        var numberList=document.getElementsByClassName('number-list');
       
  



        
            function showNumber(id){
                // $(phone-id).css('display','style');
                // alert(id);
                var phoneId=document.getElementById(id);
                if (phoneId.style.display === "none") {
                    phoneId.style.display = "block";
                } else {
                    phoneId.style.display = "none";
                }
            };
          
        
    </script>

  </body>
</html>