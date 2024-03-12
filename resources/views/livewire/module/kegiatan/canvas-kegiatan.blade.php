@push('style')
    <link rel="stylesheet" href="{{asset('sneat-1.0.0/css/editor-form-post.css')}}">
@endpush

<div>
    <form wire:submit='save' id="wrapper" class="toggled row">
        <div id="sidebar-wrapper">
            <div class="sidebar-nav">

            </div>
        </div>
        <div id="page-content-wrapper">
            <div style="z-index: 99999" wire:ignore>
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
