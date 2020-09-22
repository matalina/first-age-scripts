<h1>Application</h1>
<p>
<strong>Forum Name:</strong> {{ $username }}
</p>

<p>
    <strong>Character Name:</strong> {{ $first_name }} {{ $last_name }}<br/>
    <strong>Age:</strong> {{ $age }}<br/>
    <strong>Origin:</strong> {{ $origin }}<br/>
    <strong>Occupation:</strong> {{ $job }}<br/>
</p>

<p>
    <strong>Psychological description:</strong> <br/>{!! nl2br($personality) !!}
</p>

<p>
    <strong>Physical description:</strong> <br/>{!! nl2br($description) !!}
</p>

<p>
    <strong>Powers & Supernatural Powers:</strong> <br/>{!! nl2br($powers) !!}
</p>


@if($i_can_channel)
    <p>
        <strong>Can Channel?</strong> Yes<br/>
        <strong>Current Strength:</strong> {{ $current_strength }}<br/>
        <strong>Potential Strength:</strong> {{ $potential_strength }}<br/>
        <strong>Current Experience Level</strong> {{ $experience }}<br/>
        <strong>Reborn God:</strong> {{ $reborn_god }}
    </p>
@endif

<h2>Biography</h2>

<p>{!! nl2br($biography) !!}</p>
