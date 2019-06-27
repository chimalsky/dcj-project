<ul class="cell menu grid-x grid-margin-x align-center text-center">

    @unless ( isset($hideAllOption) )
        <li class="@unless ($justiceType) is-active @endunless">
            <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'task' => isTaskWorkflow() ?? false,
                    'dyad' => request()->query('dyad') ?? false 

                ] )
            }}"
                class="cell shrink">
                All Process Types
            </a>
        </li>
    @endunless

    @foreach (App\Justice::possibleForms() as $possibleForm)
        <li class="@if ($justiceType == $possibleForm->name) is-active @endif">
            <a href="{{ route(
                    route::currentRouteName(), 
                    [
                        'conflict' => $conflict->id,
                        'justice_type' => $possibleForm->name,
                        'task' => isTaskWorkflow() ?? false,
                        'dyad' => request()->query('dyad') ?? false 

                    ] )
                }}"
                class="cell shrink">
                {{ ucwords($possibleForm->schema['name']) }}
            </a>
        </li>
    @endforeach
</ul>
