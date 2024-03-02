<div>
    <div class="row">
        <div class="col-xl">
            <div class="d-flex flex-row-reverse bd-highlight mb-4">
                <a class="btn btn-primary" href="{{route('form.kegiatan')}}">
                    <i class='bx bxs-add-to-queue'></i>
                    Add Kegiatan
                </a>
            </div>
            <div>
                <div class="row">
                    @foreach ($data as $item)
                    <div class="card w-100 col mx-3 p-2">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <img class="img-fluid d-flex mx-auto my-4" src="{{$item->thumnail}}" alt="Card image cap" />
                            <p class="card-text">Status {{$item->status}}</p>
                        </div>

                            <div style="display: flex">
                                <button type="button" class="btn btn-secondary mx-2">
                                    <i class='bx bxs-detail' ></i>
                                    Detail</button>
                                <a type="button" class="btn btn-warning mx-2" href="{{route('form.kegiatan',$item->id)}}">
                                    <i class='bx bxs-edit-alt' ></i>
                                    Edit</a>
                                <button type="button" class="btn btn-danger mx-2" wire:click="$dispatch('deleteData',{{$item->id}})">
                                    <i class='bx bxs-trash-alt' ></i>
                                    Delete</button>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('livewire.alert.sweetalert')
    </div>
</div>
@script

<script>
    $wire.on('closeCanvas', () => {
        const closeButton = document.getElementById('dimisCanvas');
        if (closeButton) {
            closeButton.click();
        } else {
            console.error('Button with ID "close-modal" not found');
        }
    })

</script>

@endscript
