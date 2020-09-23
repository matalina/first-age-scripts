<style>
    #app {
        font-family: sans-serif;
        font-size: 12pt;
    }
</style>

<div id="app">
    <h1>
        {{ $title }}
        <small> {{ $dir }} </small>
    </h1>
    <p>
        <a href="{{ route('story.full', ['dir' => 'forward']) }}">Forward</a>
        <a href="{{ route('story.full', ['dir' => 'reverse']) }}">Reverse</a>
    </p>
    <table>
        <thead>
            <tr>
                <th width="25%">Thread</th>
                <th width="50%">Participants</th>
                <th width="25%">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($threads as $t)
            <tr>
                <td width="25%">
                    <a href="http://142.93.73.63/forums/thread-{{ $t->tid}}-post-{{ $t->firstpost }}.html">{{ $t->subject }}</a> <br/>
                    <small>on {{ $t->forum->name }}</small>
                </td>
                <td width="50%">
                    @foreach(($t->participants->unique('uid'))->all() as $p)
                     {{ $p->username }} 
                    @endforeach
                </td>
                <td width="25%">{{ (Carbon\Carbon::createFromTimestamp($t->dateline))->format('F j, Y h:i:s A') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>