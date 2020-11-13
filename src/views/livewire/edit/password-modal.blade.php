{{-- Change password modal --}}
<form wire:ignore.self wire:submit.prevent="changePassword" class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <label for="accountCurrentPassword" class="col-md-4 control-label">Current Password</label>

                    <div class="col-md-6">
                        <input id="accountCurrentPassword" type="password" class="form-control"
                            wire:model.defer="current_password">

                        @if ($errors->has('current_password'))
                            <span class="help-block">
                                <strong>{{  $errors->first('current_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="accountrPassword" class="col-md-4 control-label">New Password</label>

                    <div class="col-md-6">
                        <input id="accountrPassword" type="password" class="form-control"
                            wire:model.defer="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>@lang($errors->first('password'))</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="accountPasswordConfirm" class="col-md-4 control-label">Confirm New Password</label>

                    <div class="col-md-6">
                        <input id="accountPasswordConfirm" type="password" class="form-control" wire:model.defer="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</form>
