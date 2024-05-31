<div>
    <!-- Modal -->
    <div class="modal fade" id="show-{{$modalName}}" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document" wire:ignore.self>
          <div class="modal-content" wire:ignore.self>
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">{{$name}}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
                <img class="d-block w-full" src="{{ asset('assets/images/'.$image) }}" style="object-fit: cover; object-position: center; height: 100%" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
</div>
