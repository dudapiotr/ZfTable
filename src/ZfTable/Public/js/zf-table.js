(function(jQuery) {
    jQuery.fn.zfTable = function(url) {
        
        var initialized = false;
        
        function init($obj) {
            ajax($obj);
        }
        function ajax($obj){
             $obj.prepend('<div class="processing" style=""></div>');
             jQuery.ajax({
                url:  url,
                data: $obj.find(':input').serialize(),
                type: 'POST',
                success: function(data) {
                    $obj.html('');
                    $obj.html(data);
                    initNavigation($obj);
                    $obj.find('.processing').hide();
                },
                dataType: 'html'
            });
        }
        function initNavigation($obj){
            $obj.find('table th.sortable').on('click',function(e){
                $obj.find('input[name="zfTableColumn"]').val(jQuery(this).data('column'));
                $obj.find('input[name="zfTableOrder"]').val(jQuery(this).data('order'));
                ajax($obj);
            });
            $obj.find('.pagination').find('a').on('click',function(e){
                $obj.find('input[name="zfTablePage"]').val(jQuery(this).data('page'));
                e.preventDefault();
                ajax($obj);
            });
            $obj.find('.itemPerPage').on('change',function(e){
                $obj.find('input[name="zfTableItemPerPage"]').val(jQuery(this).val());
                ajax($obj);
            });
            $obj.find('input.filter').on('keypress',function(e){
               if(e.which === 13) {
                   e.preventDefault();
                   ajax($obj);
               }
            });
            $obj.find('select.filter').on('change',function(e){
                   e.preventDefault();
                   ajax($obj);
            });
            $obj.find('.quick-search').on('keypress',function(e){
               if(e.which === 13) {
                   e.preventDefault();
                   $obj.find('input[name="zfTableQuickSearch"]').val(jQuery(this).val());
                   ajax($obj);
               }
            });
            
            jQuery('.editable').dblclick(function(){
                if(jQuery(this).find('input').size() === 0){
                    var val = jQuery(this).html();
                    jQuery(this).html('<input type="text" value="'+val+'"/><i class="icon-pencil row-save cursor-pointer"></i>');
                }
            });
            $obj.on('click','.row-save',function(){
                var newVal = jQuery(this).siblings('input').val();
                var $td = jQuery(this).parent('td');
                $td.html(newVal);
                $td.animate({
                        backgroundColor: "#68e372"
                    }, 1000, function() {
                        $td.removeAttr('style');
                });
                jQuery.ajax({
                    url:  $obj.find('#rowAction').attr('href'),
                    data: 'column='+$td.data('column')+'&value='+newVal+'&row='+$td.parent().data('row'),
                    type: 'POST',
                    success: function(data) {
                    },
                    dataType: 'json'
                });
                
            });
        }
        return this.each(function() {
           var $this = jQuery( this );
           if(!initialized){
              init($this); 
           }  
          
        });
    };
})(jQuery); 