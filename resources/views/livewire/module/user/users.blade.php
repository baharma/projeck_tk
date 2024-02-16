<div>
    <div class="card text-center p-2">

        <div class="d-flex justify-content-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Launch modal
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $userAll as $index => $item )
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $item->name }}</td>
                    <td></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @livewire('module.user.component.modal-users')
    </div>

</div>


@script

<script>
   $wire.on('updateUserTable',()=>{
        const closeButton = document.getElementById('closemodal');
        if (closeButton) {
            closeButton.click();
        } else {
            console.error('Button with ID "close-modal" not found');
        }
   })
</script>

@endscript
