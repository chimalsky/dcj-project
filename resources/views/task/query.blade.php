

    <div class="cell medium-shrink">
        <select name="status" data-action="change->form#submit">
            <option value="all" @if(request()->query('status') == 'all') selected @endif>
                All Tasks
            </option>
            <option value="0" @if(request()->query('status') == '0') selected @endif>
                Tasks in Progress
            </option>
            <option value="1" @if(request()->query('status') == 1) selected @endif>
                Tasks completed by coders
            </option>
            <option value="2" @if(request()->query('status') == 2) selected @endif>
                Tasks that are under review
            </option>
            <option value="3" @if(request()->query('status') == 3) selected @endif>
                Finalized Tasks (done and reviewed)
            </option>
        </select>
    </div>
