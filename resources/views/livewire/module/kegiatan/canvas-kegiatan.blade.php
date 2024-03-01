<div>
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" wire:ignore
        style="height: 98%">
        <div class="offcanvas-header" wire:ignore>
            <h5 id="offcanvasBottomLabel" class="offcanvas-title">Form Kegiatan</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" wire:ignore>
            <form wire:submit='save'>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form</h5>
                    <small class="text-muted float-end">Kegiatan</small>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Title Kegiatan</label>
                        <input type="text" class="form-control" id="basic-default-fullname" wire:model='title'
                            placeholder="Title Kegiatan" />
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" id="exampleFormControlSelect1" wire:model="status" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="pending">pending</option>
                            <option value="publish">publish</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Image Thumnail</label>
                        <div class="input-group" wire:ignore>
                            <input type="file" class="form-control" id="inputGroupFile02" wire:model='thumnail' wire:ignore />
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                          </div>
                    </div>

                    <div class="mb-3" wire:ignore>
                        <label class="form-label" for="basic-default-message">Message</label>
                        <textarea class="form-control @error('article') is-invalid @enderror" wire:model='article'
                             placeholder="Leave a comment here" id="editor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" >Continue</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas" id="dimisCanvas">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>


    @push('script')
    @script
        <script defer>
            window.onload = function() {
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
