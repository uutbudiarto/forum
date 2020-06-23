</div>
  <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script>
    $('.btn-sign').on('mouseenter',function () {
      $(this).find('.icon-btn-sign').addClass('on');
    });
    $('.btn-sign').on('mouseleave',function () {
      $(this).find('.icon-btn-sign').removeClass('on');
    });

    const alt = $('body div.alert');
    if (alt) {
      setTimeout(() => {
        alt.remove();
      }, 3000);
    }
  </script>
</body>
</html>