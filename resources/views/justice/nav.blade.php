<ul class="cell menu grid-x grid-margin-x align-center text-center">

    @unless ( isset($hideAllOption) )
        <li class="@unless ($justiceType) is-active @endunless">
            <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"
                class="cell is-active shrink">
                All Process Types
            </a>
        </li>
    @endunless

    <li class="@if ($justiceType == 'trial') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'trial',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"
            class="cell shrink">
            Trial
        </a>
    </li>

    <li class="@if ($justiceType == 'truth') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'truth',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"
            class="cell shrink">
            Truth Commission
        </a>
    </li>

    <li class="@if ($justiceType == 'reparation') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'reparation',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"class="cell shrink">
            Reparation
        </a>
    </li>

    <li class="@if ($justiceType == 'amnesty') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'amnesty',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"
            class="cell shrink">
            Amnesty
        </a>
    </li>

    <li class="@if ($justiceType == 'purge') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'purge',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"class="cell shrink">
            Purge
        </a>
    </li>

    <li class="@if ($justiceType == 'exile') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'exile',
                    'task' => isTaskWorkflow() ?? false
                ] )
            }}"
            class="cell shrink">
            Exile
        </a>
    </li>
</ul>
