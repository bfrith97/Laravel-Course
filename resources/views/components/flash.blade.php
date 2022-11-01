@if (session()->has('success'))
<div    x-data="{ visible: true }"
        x-init="setTimeout(() => visible = false, 6000)"
        x-show="visible"
        class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 rounded-xl">
    <p>{{ session('success')}}</p>
</div>
@endif

@if (session()->has('email'))
<div    x-data="{ visible: true }"
        x-init="setTimeout(() => visible = false, 6000)"
        x-show="visible"
        class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 rounded-xl">
    <p>{{ session('email')}}</p>
</div>
@endif