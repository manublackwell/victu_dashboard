$(function() {
    $('#orders-table').DataTable({
        "order": [[ 4, "desc" ]],
        "ordering": false,
        "info":     false
    });

    $('#shipping-txt-data').on('show.bs.modal', function (event) {
        let code = $(event.relatedTarget).data('code');
        $(this).find("#order-code").val(code);
    });

    $('#hub-product-data').on('show.bs.modal', function (event) {
        let hub_id = $(event.relatedTarget).data('hub');
        let product_id = $(event.relatedTarget).data('product');
        let quantity = $(event.relatedTarget).data('quantity');
        console.log(hub_id);

        $(this).find("#hub_id").val(hub_id);
        $(this).find("#product_id").val(product_id);
        $(this).find('#product_quantity').val(quantity);
    });
});
