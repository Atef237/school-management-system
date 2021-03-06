<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

        @if (!empty($errorMessage))
            <div class="alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $errorMessage }}
            </div>
        @endif


    @if($show_table)
        @include('livewire.show_parents')
    @else
            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showParent" type="button">{{ trans('addPArent.showParents') }}</button>

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('addPArent.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('addPArent.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">3</a>
                    <p>{{ trans('addPArent.Step3') }}</p>
                </div>
            </div>
        </div>


        @include('livewire.Father_Form')

        @include('livewire.Mother_Form')

        @include('livewire.confirm_information')

    @endif

</div>
