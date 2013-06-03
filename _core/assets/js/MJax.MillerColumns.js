if(typeof MJax == 'undefined'){
    var MJax = {};
}
MJax.MillerColumns = {
    Init:function(strSelector){

        $('body').on('click', strSelector + ' .MJaxMCOption', function(objEvent){
            var strCtlSelector = strSelector;

            MJax.TriggerControlEvent(objEvent, strCtlSelector, 'mjax-mc-option-select', {});
        });
    }
};