<h1>
    {{ $title }}
    <small>{{ $dir }}</small>
</h1>

<table>
    <thead>
        <tr>
            <th>Thread</th>
            <th>Participants</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach($threads as $t)
        <tr>
            <td>
                <a href="http://142.93.73.63/forums/thread-{{ $t->tid}}-post-{{ $t->firstpost }}.html">{{ $t->subject }}</a> <br/>
                <small>on {{ $t->forum->name }}</small>
            </td>
            <td>
                @foreach(($t->participants->unique('uid'))->all() as $p)
                 {{ $p->username }} 
                @endforeach
            </td>
            <td>{{ (Carbon\Carbon::createFromTimestamp($t->dateline))->format('F j, Y h:i:s A') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>