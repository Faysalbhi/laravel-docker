{{-- @foreach($personlist as $key=>$person)
    <div class="contact">
        <div class="person-details" onclick="showNumber('phone-{{$key}}')">
            <p><span>{{$person->name}}</span></p>
            <p><span>{{$person->email}}</span></p>
        </div>
        <div class="number-list" id="phone-{{$key}}">
            <div class="phonebook">
                <div class="number">
                    <ul>
                        @foreach($person->phonebook->whereIn('type', $data['type']) as $phonebook) 
                            <li><a href="">{{$phonebook->phone}} </a> <span>{{ $phonebook->type}}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
@foreach($personlist as $key=>$person)
<table>
    <tr>
        <td>{{$person->name}}</td>
        <td>{{$person->email}}</td>
    </tr>
    <tr>
        <td>
            @foreach($person->phonebook->whereIn('type', $data['type']) as $phonebook) 
                <tr>
                    <td>phone</td>
                    <td>phone</td>
                </tr>
            @endforeach
        </td>
    </tr>
</table>
@endforeach