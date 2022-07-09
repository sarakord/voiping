@foreach($calls as $call)
    <tr>
        <td>{{ $call->dst_user_number }}</td>
        <td>{{ $call->src_contact_number }}</td>
        <td>{{ optional($call->contact)->name }}</td>
        <td>{{ $call->call_date }}</td>
    </tr>
@endforeach


