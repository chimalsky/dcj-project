<ul class="cell menu text-center 
    align-center grid-x grid-margin-x callout">

    @unless ( isset($hideAllOption) )
        <li class="@unless ($justiceType) is-active @endunless">
            <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id
                ] )
            }}"
                class="cell is-active shrink">
                All DCJ Types
            </a>
        </li>
    @endunless

    <li class="@if ($justiceType == 'trial') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'trial'
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
                    'justice_type' => 'truth'
                ] )
            }}"
            class="cell shrink">
            Truth
        </a>
    </li>

    <li class="@if ($justiceType == 'reparation') is-active @endif">
        <a href="{{ route(
                route::currentRouteName(), 
                [
                    'conflict' => $conflict->id,
                    'justice_type' => 'reparation'
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
                    'justice_type' => 'amnesty'
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
                    'justice_type' => 'purge'
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
                    'justice_type' => 'exile'
                ] )
            }}"
            class="cell shrink">
            Exile
        </a>
    </li>
</ul>
