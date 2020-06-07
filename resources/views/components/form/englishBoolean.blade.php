<section class="cell grid-x english-boolean">
    <header class="cell">
        {{ $label }}
    </header>

    <div data-controller="radio-group"
        class="cell grid-x grid-margin-x">

        {{ $model }}
        <div class="cell shrink"> 
            {{ Form::radio($name, $values[1] ?? 'Yes', $model->$name, [
                'id' => "$name-0",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-0", $labels[1] ?? $values[1] ?? 'Yes') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, $values[0] ?? 'No', $model->$name, [
                'id' => "$name-1",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-1", $labels[0] ?? $values[0] ?? 'No') }}
        </div>

        <div class="cell shrink">
            {{ Form::radio($name, "N/A", $model->$name, [
                'id' => "$name-na",
                'data-target' => 'radio-group.radio',
                'data-action' => 'click->radio-group#select'
            ]) }}
            {{ Form::label("$name-na", 'N/A') }}   
        </div>
    </div>
</section>

{"id":1764,"dcjid":"6_1984_A_1",
"implemented":null,"type":"amnesty","target":"Side B",
"civilian":null,"rank_and_file":null,"elite":null,
"sender":"Side A","scope":"Named Group","scope_count":null,"peace_initiated":null,"start":"1984-10-01T00:00:00.000000Z","start_event":"Initiated","start_precision":"Medium","end":null,"end_event":null,"end_precision":null,"wrong":"1","gender":"9","sexviolence":"0","conflict_id":"33","justiceable_id":"2","justiceable_type":"App\\Amnesty","related":null,"created_at":"2019-05-14T09:12:25.000000Z","updated_at":"2020-05-22T19:19:52.000000Z","user_id":null,"deleted_at":null,"dyadic_conflicts":[{"id":33,"dyad_id":"406","conflictyear_id":"33","type":"3","location":"Iran","incompatibility":"1","side_a":"Government of Iran","side_a_id":"114","side_b":"KDPI","side_b_id":"164","territory":"Kurdistan","year":"1984","intensity":"1","start_date":"1946-05-31","start_precision":"3","start_2_date":"1979-12-31","start_2_precision":"5","episode_ended":"0","episode_end_date":null,"episode_end_precision":null,"gwno_a":"630","gwno_a_2nd":null,"gwno_b":null,"gwno_b_2nd":null,"gwno_location":"630","region":"Middle East","created_at":"2019-06-02T17:03:29.000000Z","updated_at":"2019-06-02T17:03:29.000000Z","pivot":{"justice_id":"1764","dyadic_conflict_id":"33"}}]}
Yes
No
N/A

{"id":1766,"dcjid":"10_1980_A_1","implemented":null,
"type":"amnesty","target":"Side B",
"civilian":null,"rank_and_file":null,"elite":null,"sender":"Side A","scope":"Named Group","scope_count":"375","peace_initiated":null,"start":"1980-12-21T00:00:00.000000Z","start_event":"Establishment","start_precision":"High","end":null,"end_event":null,"end_precision":null,"wrong":"1","gender":"9","sexviolence":"0","conflict_id":"72","justiceable_id":"4","justiceable_type":"App\\Amnesty","related":null,"created_at":"2019-05-14T09:12:25.000000Z","updated_at":"2019-06-26T09:49:21.000000Z","user_id":null,"deleted_at":null,"dyadic_conflicts":[{"id":72,"dyad_id":"411","conflictyear_id":"72","type":"3","location":"Philippines","incompatibility":"2","side_a":"Government of Philippines","side_a_id":"154","side_b":"CPP","side_b_id":"169","territory":null,"year":"1980","intensity":"1","start_date":"1969-09-30","start_precision":"4","start_2_date":"1969-09-30","start_2_precision":"4","episode_ended":"0","episode_end_date":null,"episode_end_precision":null,"gwno_a":"840","gwno_a_2nd":null,"gwno_b":null,"gwno_b_2nd":null,"gwno_location":"840","region":"Asia","created_at":"2019-06-02T17:03:29.000000Z","updated_at":"2019-06-02T17:03:29.000000Z","pivot":{"justice_id":"1766","dyadic_conflict_id":"72"}}]}
Yes
No
N/A
