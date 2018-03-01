# FutureActivities Customer Orders

This extension will create the following Magento REST API endpoint:

    GET /rest/V1/orders/mine
    
Which will return an array of all the orders placed by the authorized customer.

Hopefully this extension won't be needed for long as this endpoint should be built
into the API by default.

As an added bonus, the following endpoint has also been included:

    GET /rest/V1/orders/:orderId/addresses
    
Which will return the shipping & billing address for a customers specific order.
This is included because for some reason the Magento order interface only includes the billing address.

Both the above endpoints require a customer authorization bearer token.