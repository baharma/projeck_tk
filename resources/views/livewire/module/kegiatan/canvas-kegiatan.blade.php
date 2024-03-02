<div>
    <div class="card">
        <form wire:submit='save'>

            <div class="card-body">
                <h2>Form Kegiatan</h2>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="basic-default-fullname" wire:model='title'
                        placeholder="Title Kegiatan" />
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Status</label>
                    <select class="form-select" id="exampleFormControlSelect1" wire:model="status"
                        aria-label="Default select example">
                        <option selected>Select Status Kegiatan</option>
                        <option value="pending">pending</option>
                        <option value="publish">publish</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Image Thumnail</label>
                    <div class="input-group" wire:ignore x-data="{ view: false,upload:true }" x-init="
                if({{ json_encode($thumnail) }}) {
                    view = true;
                    upload = false;
                }
                ">
                        <input type="file" class="form-control" id="inputGroupFile02" wire:model='thumnail'
                            wire:ignore />
                        <label class="input-group-text" for="inputGroupFile02" x-show="upload">Upload</label>

                        <a class="input-group-text" href="#" x-show="view" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#modalToggle">
                            View Your Image <i class='bx bx-image-alt'></i> </a>


                    </div>
                </div>

                <div class="mb-3" wire:ignore>
                    <label class="form-label" for="basic-default-message">Message</label>
                    <textarea class="form-control @error('article') is-invalid @enderror" wire:model='article'
                        placeholder="Leave a comment here" id="editor"></textarea>
                </div>
                <button type="submit" class="btn btn-primary me-2">Save</button>

            </div>
        </form>
        <!-- Modal 1-->
        <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{$thumnail}}" width="200" alt="" class="img-fluid d-flex mx-auto my-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
@script
<script defer>
    window.onload = function () {
        ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') }}?_token={{ csrf_token() }}',
                },
                config: {
                    height: 500 // Set the desired height in pixels
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('article', editor.getData());
                });
                editor.keystrokes.set('Space', (key, stop) => {
                    editor.execute('input', {
                        text: '\u00a0'
                    });
                    stop();
                });
            })
            .catch(error => {
                console.error(error);
            });
    };
</script>
@endscript

@endpush
