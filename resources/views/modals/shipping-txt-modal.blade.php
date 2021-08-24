<div class="modal fade" id="shipping-txt-data" tabindex="-1" role="dialog" aria-labelledby="shipping-txt-data" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="shipping-txt-form" class="form" method="post" action="{{ @route('generate-shipping-txt') }}">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section">Creazione file spedizione</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="shipping-date">Data affidamento merce</label>
                                <input type="text" id="order-code" class="form-control" name="order_code" value="" readonly required>
                                <input type="date" id="shipping-date-input" class="form-control" placeholder="Data affidamento merce" min="'.date("Y-m-d").'" name="shipping_date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Crea file"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>