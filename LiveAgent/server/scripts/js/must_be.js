(function($) {

    if ($.Widget) { return; }

    var Widget = $.$class({
        construct: function(id) {
            this.id = id;
            this.elementId = this.buildElementId(id);

            this.sendInitRequest_();
        },

        //-------------------------------------------------------------------------------
        // API - PHP

        isInitialized: function() {
            return this.dateChanged != undefined;
        },

        initDateChanged: function(dateChanged) {
            this.dateChanged = dateChanged;
        },

        //-------------------------------------------------------------------------------

        sendInitRequest_: function() {
            var request = this.getCreateRequest();
            $.instance.addScript('scripts/button.php?ChS=' + escape($.instance.getPageCharset())
                + request.getParamsString());
        },

        addButtonParamsToUrl_: function(url) {
            return url;
        },

        getCreateRequest: function() {
            var request = new $.Request('Widget');
            request.add('i', this.id);
            request.add('p', request.fullEncodeUrl_(document.location.href));
            if ($.instance.isMobile()) {
                request.add('m', 'Y');
            }
            return request;
        },

        buildElementId: function(id) {
            return "b_" + id + "_" + Math.round((Math.random() * 1000)).toString();
        },

        getElementId: function() {
            return this.elementId;
        },

        getId: function() {
            return this.id;
        }
    });

    $.Widget = Widget;
})(LA);