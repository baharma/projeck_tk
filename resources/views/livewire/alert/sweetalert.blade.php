@script

<script>
    $wire.on('deleteData', (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('deleteThis', event).then(() => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                })
            }
        });
    })

    $wire.on('succes', (event) => {
        Swal.fire({
            title: "Save",
            text: event,
            icon: "success"
        });
    })
</script>


@endscript
