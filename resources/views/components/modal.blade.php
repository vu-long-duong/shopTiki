<div class="modal fade" id="{{ $id }}" style="display: none; padding:17px;" aria-hidden="true">
    <form method="{{ $method }}" action="{{ $route }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{ $title }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"
                        {{ $attributes->merge(['class' => 'btn btn-primary']) }}>{{ $buttonText }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
