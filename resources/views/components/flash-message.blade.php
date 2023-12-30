<div class="container py-2">
    @if (session()->has('message'))
        <div x-data="{ showMessage: true }" x-show="showMessage" class="alert alert-success fade show" role="alert"
            x-init="setTimeout(() => showMessage = false, 4000)">
            {{ session('message') }}
        </div>
    @endif
</div>