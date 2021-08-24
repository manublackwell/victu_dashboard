<div class="modal fade" id="hub-product-data" tabindex="-1" role="dialog" aria-labelledby="hub-product-data" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="shipping-txt-form" class="form" method="post" action="{{ @route('warehouses.store') }}">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section">Crea nuovo hub</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" name="hub_account">
                                        @foreach($hub_accounts as $hub_account)
                                            <option value="{{ $hub_account->id }}">{{ $hub_account->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Crea"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
