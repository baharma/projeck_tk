@push('style')
<link rel="stylesheet" href="{{asset('sneat-1.0.0/css/editor-form-post.css')}}">


@endpush

<div>
    <form wire:submit='save'>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="width: 400px">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <i class='bx bx-arrow-back'></i>
                </span>
                <span class="app-brand-text ">Back</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner p-2">
            <h5 id="">Form Post</h5>

            <label class="form-label" for="basic-default-fullname">Nama Kegiatan</label>
            <input type="text" class="form-control mb-3" id="basic-default-fullname" wire:model='title'
            placeholder="Title Kegiatan" />

            <label for="exampleFormControlSelect1" class="form-label">Status</label>
            <select class="form-select mb-3" id="exampleFormControlSelect1" wire:model="status"
                aria-label="Default select example">
                <option selected>Select Status Kegiatan</option>
                <option value="pending">pending</option>
                <option value="publish">publish</option>
            </select>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Image Thumnail</label>
                <div class="input-group" wire:ignore x-data="{ view: false,upload:true }" x-init="
                        if({{ json_encode($thumnail) }}) {
                            view = true;
                            upload = false;
                        }">
                    <input type="file" class="form-control" id="inputGroupFile02" wire:model='thumnail' wire:ignore />
                    <label class="input-group-text" for="inputGroupFile02" x-show="upload">Upload</label>
                    <a class="input-group-text" href="#" x-show="view" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalToggle">
                        View Your Image <i class='bx bx-image-alt'></i> </a>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-success rounded-0">
            <i class='bx bx-save' ></i>
            Save
        </button>
    </aside>
    <div class="content-wrapper" style="margin-left: 400px; background-color: azure">
        <div style="" wire:ignore>
            <textarea class="form-control @error('article') is-invalid @enderror" wire:model='article'
                placeholder="Leave a comment here" id="editor"></textarea>
        </div>

    </div>

    </form>

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
                    height: 500
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
