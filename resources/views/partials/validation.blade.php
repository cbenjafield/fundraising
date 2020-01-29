@if ($errors->any())
    <div class="p-4 bg-red-200 border-l-4 border-red-600 my-4">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif