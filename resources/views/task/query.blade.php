

    <div class="cell medium-shrink">
        <select name="status" data-action="change->form#submit">
            <option value="all" @if(request()->query('status') == 'all') selected @endif>
                All Tasks
            </option>
            <option value="0" @if(request()->query('status') == '0') selected @endif>
                Tasks in Progress
            </option>
            <option value="1" @if(request()->query('status') == 1) selected @endif>
                Completed Tasks
            </option>
        </select>
    </div>
