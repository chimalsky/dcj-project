<section data-controller="form-item-edit">

    {{ html()->form('POST', route('form.item.store', $form))->open() }}
        {{ html()->label('Name', 'name') }}
        {{ html()->text('name') }}

        {{ html()->label('Label', 'label') }}
        {{ html()->text('label') }}

        {{ html()->label('Type', 'type') }}
        {{ 
            html()->select('type')
                ->options(['englishBoolean' => 'Radio Buttons', 'dropdown' => 'dropdown'])
                ->attributes([
                    'data-target' => 'form-item-edit.type',
                    'data-action' => 'form-item-edit#changeType'
                ])
        }}

        {{ html()->label('Options', 'options') }}
        {{
            html()->text('options[]')
        }}
        {{
            html()->text('options[]')
        }}

        <button class="button">
            Create Form Item 
        </button>

    {{ html()->form()->close() }}

</section>