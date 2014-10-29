 $(function() {
    applyPagination();
    function applyPagination() {
      $(".ajax_paging a").click(function() {
        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "$page=1",
          url: url,
          beforeSend: function() {
            $(".content").load(url);
          },
          success: function(msg) {
            $(".content").load(url);
            applyPagination();
          }
        });
        return false;
      });
    }
  });