define(['uiComponent',
    'Magento_Customer/js/customer-data',
    'underscore',
    'knockout'], function (Component,customerData, _, ko) {
    'use strict';
    return Component.extend({
        defaults: {
            freeShippingThreshold: 100,
            template: 'Pointeger_FreeShippingPromo/free-shipping-banner',
            subTotal: 0.00,
            tracks:{
                subTotal:true,
                message: true,
            }
        },
        initialize: function () {
            this._super();
            var self = this;
           const cart = customerData.get('cart');
               if(!_.isEmpty(cart()) && !_.isUndefined(cart())){
                   self.subTotal = parseFloat(cart().subtotalAmount);
               }
            customerData.getInitCustomerData().done(function(){
            self.subTotal = parseFloat(cart().subtotalAmount);
            })
           cart.subscribe(function(){
               if(!_.isEmpty(cart) && !_.isUndefined(cart.subtotalAmount) ){
                   self.subTotal = parseFloat(cart.subtotalAmount);
               }
           })
       self.message = ko.computed(function(){
    if(_.isUndefined(self.subTotal) || self.subTotal === 0){
        return self.messageDefault;
    }
    if(self.subTotal > 0 &&  self.subTotal < self.freeShippingThreshold  ){
        var subTotalRemaining = self.freeShippingThreshold - self.subTotal;
        var formattedSubTotalRemaining = self.formatCurrency(subTotalRemaining);
        return self.messageItemsInCart.replace('$XX.XX', formattedSubTotalRemaining)

    }
    if(self.subTotal >= self.freeShippingThreshold){
        return self.messageFreeShipping;
    }
   })

        },
        formatCurrency:function(value){
         return '$' + value.toFixed(2);
        }
    });
});
