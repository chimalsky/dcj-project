@include('justice.episode.form')

{{ Form::label('target') }}
{{ Form::select('target', $justice->targetCodes, $justice->target) }}


{{ Form::label('sender') }}
{{ Form::select('sender', $justice->senderCodes, $justice->sender) }}