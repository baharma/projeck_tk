<div>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit='save'>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Name</label>
                            <input type="name"  class="form-control" placeholder="" wire:model.live='name' />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="Email"  class="form-control" placeholder="xxxx@xxx.xx" wire:model.live='gmail' />
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Password</label>
                            <input type="password"  class="form-control" placeholder="password" wire:model.live='password' />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closemodal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
