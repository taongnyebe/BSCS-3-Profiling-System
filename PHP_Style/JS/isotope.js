$(document).ready(function() {

      var $grid = $(".grid").isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
      });

      $(".btn-group").on("click", ".btn", function(){
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({filter:filterValue});
      });

});