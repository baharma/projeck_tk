<div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form wire:submit='save'>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Title Kegiatan</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                placeholder="Title Kegiatan" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="pending">pending</option>
                                <option value="publish">publish</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Message</label>
                            <textarea class="form-control @error('article') is-invalid @enderror" wire:model='article'
                            placeholder="Leave a comment here" id="editor" style="height: 500px"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script src="{{asset('sneat-1.0.0/js/skeditor.js')}}"></script>
<script defer>
            window.onload = function() {
                ClassicEditor.create(document.getElementById('editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
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
                    console.error('CKEditor initialization error:', error);
                });
            }
    </script>

@endpush

