{{-- Change password modal --}}
<div wire:ignore.self class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="accountPassword">Password</label>
                    <input type="password" class="form-control" name="accountPassword" id="accountPassword"
                        wire:model.lazy="user.password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="changePassword()" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
