@extends('client.layouts.app')

@section('content')
    {{-- @include('client.modal.auth.login') --}}
    @include('client.modal.auth.register')
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const btnAccount = document.querySelector('#js-account');
            const modal = document.querySelector('#js-modal');

            if (btnAccount && modal) {
                btnAccount.addEventListener('click', function() {
                    modal.classList.add('flex');
                });

                const btnClose = document.querySelector('.btn__close-icon');
                if (btnClose) {
                    btnClose.addEventListener('click', function(){
                        modal.classList.remove('flex');
                    });
                }

                modal.addEventListener('click', function(event){
                    modal.classList.remove('flex');
                });

                const authForm = document.querySelector('#js-auth-form');
                if (authForm) {
                    authForm.addEventListener('click', function(event){
                        event.stopPropagation();
                    });
                }
            } else {
                console.error('Required elements not found.');
            }
        });
    </script>
@endpush
