
@foreach($personlist as $key=>$person)
<table>
    <tr>
        <td>{{$person->name}}</td>
        <td>{{$person->email}}</td>

        @foreach($person->phonebook->whereIn('type', $data['type']) as $phonebook) 
                    
            <td >{{$phonebook->phone}}</td>
            
        @endforeach
        
    </tr>
    
    
</table>
@endforeach