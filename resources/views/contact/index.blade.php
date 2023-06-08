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
                    <div class="card-body">
                        <div class="form">
                            <form action="{{route('contact.store')}}" method="POST">
                                @csrf
    
                                <div id="name" class="item"></div>
                                <div id="email" class="item"></div>
                                <label for="phone">Phone:</label>
                                <div id="phone" class="item"></div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div id="form2"></div>
            </div>
        </div>
    </div>





    <script>

        // name 
        $("#name").alpaca({
            "schema": {
                "format": "text",
                "required": true
                
            },
            "options": {
                "label": "UserName ",
                "disallowEmptySpaces": true,
                "focus": true,
                "name":"name"

            }
        });

        // email 
        $("#email").alpaca({
            "schema": {
                "format": "text",
                "required": true
                
            },
            "options": {
                "label": "Email Address",
                "focus": false,
                "name": "email",
                "disallowEmptySpaces": true
                
            }
        });

        // phone 
        $("#phone").alpaca({
          
            "schema": {
                "type": "object",
                "properties": {
                    "list": {
                        "type": "array",
                        "items": {
                            "type": "object",
                            "properties": {
                                "type": {
                                    "enum": ["Home", "Office","Personal"],
                                    "required": true
                                },
                                "phone": {
                                    "type": "string",
                                    "format": "text",
                                    "required": true
                                   
                                }
                            },
                            "minItems": 1,
                            "maxItems": 3,
                        }
                    }
                    
                },
                
            },
            "options": {
                "fields": {
                    "list": {
                        "toolbarSticky": true,
                        "toolbarPosition": "bottom",
                        "items": {
                            "fields": {
                                "type": {
                                    "name":"type[]",
                                    "label": "Type",
                                    "optionLabels": ["Home", "Office","Personal"],
                                    "type": "select",
                                },
                                "phone": {
                                    "label": "Phone",
                                    "name": "phone[]",
                                    "disallowEmptySpaces": true,
                                    "helper": "No Need to enter '0'",
                                    "maskString": "phone"
                                }
                            }
                        }
                    }
                }
            }
        });

    </script>

  </body>
</html>