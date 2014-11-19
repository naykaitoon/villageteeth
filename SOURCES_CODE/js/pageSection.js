  $(function() {
    applyPagination();
    function applyPagination() {
      $(".ajax_paging a").click(function(event) {
		  event.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "$page=1",
          url: url,
          beforeSend: function() {
			   event.preventDefault();
            $(".content").load(url);
          },
          success: function(msg) {
			   event.preventDefault();
            $(".content").load(url);
            applyPagination();
          }
        });
        return false;
      });
    }
  });