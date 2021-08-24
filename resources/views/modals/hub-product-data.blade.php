<div class="modal fade" id="hub-product-data" tabindex="-1" role="dialog" aria-labelledby="hub-product-data" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="shipping-txt-form" class="form" method="post" action="{{ @route('warehouses.update', $warehouse->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section">Modifica quantità</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" id="hub_id" class="form-control" name="hub_id" value="" readonly required hidden>
                                    <input type="number" id="product_id" class="form-control" name="product_id" value="" readonly required hidden>
                                    <label for="product-quantity">Quantita</label>
                                    <input type="numebr" id="product_quantity" class="form-control" placeholder="Quantità " min="0" name="product_quantity" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Modifica"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
