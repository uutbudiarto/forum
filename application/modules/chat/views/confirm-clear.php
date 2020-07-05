<div class="modal-body">
  <span class="text-center d-block" id="mess">Anda akan membersihkan chat ?</span>
</div>
<div class="d-flex justify-content-between px-3 py-2">
  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">TIDAK</button>
  <button type="button" class="btn btn-sm btn-primary px-4" id="clearAllChat">YA</button>
  <input type="hidden" id="root" value="<?=$root ?>">
</div>

<script type="text/javascript">
const root = $('#root').val();
  $('body').on('click','#clearAllChat',function () {
    $.ajax({
      url: '<?=base_url()?>chat/clear_chat_by_root/',
      type: 'POST',
      data: {
        'chat_root_id' : $('#root').val()
      },
      success : function (res) {
          $('#mess').html('Berhasil Membersihkan chat');
          setTimeout(() => {
            $('#modal_conf').modal('hide');
            window.location.replace('<?=base_url()?>chat/get_chat_by_history/'+root)
          }, 500);
      }
    })
  })
</script>